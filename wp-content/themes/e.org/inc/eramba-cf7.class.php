<?php
if (!session_id()) {
	session_start();
}
/**
 * Contact Form 7 adjustments.
 */
class ErambaContactForm7 {
	private $downloadPostId = null;
	private $isDownloadForm = null;
	public $downloadCountMetaKey = 'ERAMBA_download_count';
	private $transientUrlPrefix = 'eramba_download_';

	//a random number for currently generated URL.
	private $rand = null;

	public function __construct() {
		add_action('template_redirect', array($this, 'download_file'));

		add_filter('wpcf7_form_elements', array($this, 'eramba_wpcf7_form_elements'));
		add_filter('wpcf7_posted_data', array($this, 'eramba_wpcf7_posted_data'));
		add_filter('wpcf7_ajax_json_echo', array($this, 'eramba_wpcf7_ajax_json_echo'));

		add_action('wpcf7_before_send_mail', array($this, 'eramba_wpcf7_before_send_mail'));
	}

	/**
	 * Visual adjustment for empty select element options.
	 */
	public function eramba_wpcf7_form_elements($html) {
		$text = __('Select from list', 'eramba');
		$html = str_replace('<option value="">---</option>', '<option value="">' . $text . '</option>', $html);
		return $html;
	}
	
	/**
	 * Set redirection location for CF7 to let user download a file after sucessfully submitting a form.
	 */
	public function eramba_wpcf7_ajax_json_echo($items) {
		if (!empty($this->downloadPostId)) {
			$fileUrl = $this->getDownloadUrl($this->downloadPostId);

			if (!empty($fileUrl)) {
				$items['onSentOk'][0] = "location = '".$fileUrl."'";
			}
		}

		if (!empty($this->isDownloadForm) && !isset($items['invalids'])) {
			$_SESSION['download-form-submitted'] = session_id();
			$items['onSentOk'][0] = "window.location.reload()";
		}

		return $items;
	}

	/**
	 * Set the current Post ID posted while submitting a CF7 form.
	 */
	public function eramba_wpcf7_posted_data($data) {
		if (isset($data['is_download_form'])) {
			$this->isDownloadForm = true;
		}

		if (isset($data['download_post_id'])) {
			$this->downloadPostId = $data['download_post_id'];
			//unset($data['download_post_id']);
		}

		return $data;
	}

	/**
	 * Generates temporary file download url with expiration.
	 */
	private function createUrl($fileUrl, $postId) {
		$setData = array(
			'url' => $fileUrl,
			'postId' => $postId
		);
		set_transient($this->transientUrlPrefix . $this->rand, $setData, 60*20);
	}

	/**
	 * Get a file download url if any.
	 */
	private function getDownloadUrl($postId) {
		$file = rwmb_meta('ERAMBA_file', 'type=file', $postId);
		$url = rwmb_meta('ERAMBA_file_url', array(), $postId);

		$fileUrl = '';
		$expireLink = '';
		if (!empty($file)) {
			$fileInfo = current($file);
			$fileUrl = $fileInfo['url'];

			$this->createUrl($fileUrl, $postId);
			$expireLink = $this->getExpireUrl();
		}
		elseif (!empty($url)) {
			$fileUrl = $url;

			$this->createUrl($fileUrl, $postId);
			$expireLink = $this->getExpireUrl();
		}

		return $expireLink;
	}

	/**
	 * Force file download to a user if provided url is not expired.
	 */
	public function download_file() {
		if(isset($_GET['download-file'])) {
			$download = $_GET['download-file'];
			$data = get_transient($this->transientUrlPrefix . $download);

			if ($data !== false) {
				$fileUrl = $data['url'];
				$postId = $data['postId'];

				$meta = get_post_meta($postId, $this->downloadCountMetaKey, true);
				if (empty($meta)) {
					add_post_meta($postId, $this->downloadCountMetaKey, 1);
				}
				else {
					update_post_meta($postId, $this->downloadCountMetaKey, ($meta+1));
				}

				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.basename($fileUrl));
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				//header('Content-Length: ' . filesize($fileUrl));
				readfile($fileUrl);

				//delete_transient($this->transientUrlPrefix . $download);
				exit;
			}
			else {
				wp_redirect(home_url());
				exit;
			}
		}
	}

	/**
	 * Replace a shortcode for an actual download URL in mail_2 contents sent to customer.
	 */
	public function eramba_wpcf7_before_send_mail($contact_form) {
		$mail_2 = $contact_form->prop('mail_2');

		$this->rand = mt_rand(10000, mt_getrandmax());

		$body = str_replace('[fileUrl]', $this->getExpireUrl(), $mail_2['body']);
		$mail_2['body'] = $body;

		$contact_form->set_properties(array('mail_2' => $mail_2));
	}

	/**
	 * Returns temporary download URL.
	 */
	private function getExpireUrl() {
		return add_query_arg(array('download-file' => $this->rand), get_site_url());
	}
}