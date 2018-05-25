<?php
if (!defined('ABSPATH')) die;

function zrf_form_action() {

	$error_msg = esc_html__('Please try again by clicking the back button on your browser.', 'zendesk-request-form');

	// Check if fake field has any content. If so, it is spam.
	if (!empty($_POST["zrf-email-website"])) {
		wp_die('Error: '.esc_html__('Spam check failed.', 'zendesk-request-form').' '.$error_msg);
	}

	// Check if year matches. If not, it is spam.
	if (!is_user_logged_in()) { // not for logged in users
		if (!empty($_POST["zrf-year-a"])) { // grab year from form
			$zrf_year_check = trim($_POST["zrf-year-a"]);
		}
		if (empty($_POST["zrf-year-a"])) { // no year? it's spam
			wp_die('Error: '.esc_html__('Spam check failed.', 'zendesk-request-form').' '.$error_msg);
		}
		if ($zrf_year_check != date('Y')) { // year does not match, it's spam
			wp_die('Error: '.esc_html__('Spam check failed.', 'zendesk-request-form').' '.$error_msg);
		}
	}

	if (current_user_can('manage_options')) {
		$error_msg_settings = 'Please check the API settings under "Settings > Zendesk Form". This message is only visible to Admins.';
		$error_msg_wp_error = 'Response from Zendesk was a "WP_Error". This message is only visible to Admins.';
	} else {
		$error_msg_settings = esc_html__('Request not submitted. Please contact the Admin of this website so they can check the settings for this form.', 'zendesk-request-form');
		$error_msg_wp_error = esc_html__('Ticket not created.', 'zendesk-request-form').' '.$error_msg;
	}

	$zendesk_settings = get_option('zendesk_request_form_settings');

	if (empty($zendesk_settings['zendesk_token'])) {
		wp_die('Error: '.$error_msg_settings);
	} else {
		$zendesk_token = strip_tags(trim($zendesk_settings['zendesk_token']));
	}
	if (empty($zendesk_settings['zendesk_user'])) {
		wp_die('Error: '.$error_msg_settings);
	} else {
		$zendesk_user = sanitize_email($zendesk_settings['zendesk_user']);
	}
	if (empty($zendesk_settings['zendesk_domain'])) {
		wp_die('Error: '.$error_msg_settings);
	} else {
		$zendesk_url = esc_url('https://'.sanitize_text_field($zendesk_settings['zendesk_domain']).'.zendesk.com/api/v2/tickets.json');
	}

	// Location, for returning after submission
	if (isset($_POST["zen_return_url"])) {
		$return_url = esc_url($_POST["zen_return_url"]);
		if (empty($return_url)) {
			wp_die('Error: Invalid return url. '.$error_msg);
		}
	} else {
		wp_die('Error: Invalid return url. '.$error_msg);
	}

	// Name field
	if (isset($_POST["zen_name"])) {
		$name = sanitize_text_field($_POST["zen_name"]);
		$name = ucwords(strtolower($name));
		if (empty($name)) {
			wp_die('Error: '.esc_html__('No name entered.', 'zendesk-request-form').' '.$error_msg);
		}
	} else {
		wp_die('Error: '.esc_html__('No name entered.', 'zendesk-request-form').' '.$error_msg);
	}

	// Email field
	if (isset($_POST["zen_email"])) {
		$email = sanitize_email($_POST["zen_email"]);
		if (empty($email)) {
			wp_die('Error: '.esc_html__('No email address entered.', 'zendesk-request-form').' '.$error_msg);
		}
	} else {
		wp_die('Error: '.esc_html__('No email address entered.', 'zendesk-request-form').' '.$error_msg);
	}

	// subject
	if (isset($_POST["zen_subject"])) {
		$subject = sanitize_text_field($_POST["zen_subject"]);
		if (empty($subject)) {
			$subject = '';
		}
	} else {
		$subject = '';
	}

	// Subject prefix, passed from shortcode
	$subject_prefix = '';
	if (isset($_POST["zen_subject_prefix"])) {
		$subject_prefix = esc_attr($_POST["zen_subject_prefix"]);
	}

	// Subject suffix, set via shortcode but not public yet
	$subject_suffix = '';
	if (isset($_POST["zen_subject_suffix"])) {
		$subject_suffix = esc_attr($_POST["zen_subject_suffix"]);
		if ($subject_suffix == 'name') {
			$subject_suffix = ': '.$name;
		}
	}



	// description field
	if (isset($_POST["zen_desc"])) {
		$desc = $_POST["zen_desc"];
		if (empty($desc)) {
			$desc = '-';
		}
	} else {
		wp_die('Error: '.esc_html__('No message content.', 'zendesk-request-form').' '.$error_msg);
	}


	// assignee
	if (isset($_POST["zen_assignee"])) {
		$assignee = sanitize_text_field($_POST["zen_assignee"]);
		if (empty($assignee)) {
			$assignee = '';
		}
	} else {
		$assignee = '';
	}

	// custom field group
	if (isset($_POST["zen_field_group"])) {
		$field_group = sanitize_text_field($_POST["zen_field_group"]);
		if (empty($subject)) {
			$field_group = '';
		}
	} else {
		$field_group = '';
	}


	$desc_suffix = ''; // desc suffix denoted by custom field property

	// custom fields loop and create array
	$custom_fields = new WP_Query( 
		array(
			'post_type' => 'zrf_custom_field',
			'showposts' => -1,
			'zrf_field_group' => $field_group,
		)
	);
	$custom_fields_array = array();
	while ( $custom_fields->have_posts() ): $custom_fields->the_post();
		$field_type = esc_attr(get_post_meta(get_the_ID(), 'field-type', true));		
		if ($field_type != 'descriptive') { // check if it's actually a field or just description text/html
			$field_id = sanitize_text_field(get_post_meta(get_the_ID(), 'field-id', true));
			if (isset($_POST[$field_id])) {
				
				// add prefix or suffix?
				$data_prefix = $data_suffix = '';
				$data_prefix = strip_tags(get_post_meta(get_the_ID(), 'field-prefix', true)); // strip_tags rather than sanitize_text_field so spaces are retained
				$data_suffix = strip_tags(get_post_meta(get_the_ID(), 'field-suffix', true));
				
				if ($field_type == 'url') { // check if url so we can sanitize properly
					$custom_field_data = $data_prefix . zrf_clean_url($_POST[$field_id]) . $data_suffix;
				} else {
					$custom_field_data = $data_prefix . sanitize_text_field($_POST[$field_id]) . $data_suffix;
				}
				
				$custom_fields_array += array($field_id => $custom_field_data);
				
				// add this field to description content?
				$add_to_desc_checked = sanitize_text_field(get_post_meta(get_the_ID(), 'field-desc-suffix', true));
				if ($add_to_desc_checked) {
					$desc_suffix .= "\n\n".$custom_field_data;
				}
				
			}
		}
	endwhile;

	// country code from cloudflare
	$country = '';
	if (!empty($_SERVER["HTTP_CF_IPCOUNTRY"])) {
		$country_code = sanitize_text_field(strtoupper($_SERVER["HTTP_CF_IPCOUNTRY"]));
		$country = zrf_code_to_country($country_code);
	}

	// add country code to custom field if defined via shortcode
	if ($country && (isset($_POST["zen_cf_geo"]))) {
		$cf_geo_field_id = sanitize_text_field($_POST["zen_cf_geo"]);
		$custom_fields_array += array($cf_geo_field_id => $country);	
	}

	// user-agent
	if (isset($_POST["zen_user_agent"])) {
		$user_agent = "\n\n".sanitize_text_field($_POST["zen_user_agent"])." ".$country; // add cloudflare country to user agent data
	} else {
		$user_agent = '';
	}


	//print_r ($custom_fields_array);

	$body = array(
		'ticket' => array(
			'requester' => array(
				'name' => stripslashes($name),
				'email' => stripslashes($email)
			),
			'assignee_id' => $assignee, // default assignee
			'custom_fields' => apply_filters('zrf_custom_fields_data', $custom_fields_array), // apply filter so dev can tinker with data if required
			'subject' => stripslashes($subject_prefix . $subject . $subject_suffix),
			'description' => stripslashes($desc . $desc_suffix . $user_agent)
		)
	);

	$headers = array(
		'Authorization' => 'Basic '.base64_encode($zendesk_user.'/token:'.$zendesk_token)
	);

	$args = array(
		'method' => 'POST',
		'timeout' => 15,
		'redirection' => 10,
		'blocking' => true,
		'headers' => $headers,
		'body' => $body
	);


	$response = wp_remote_request($zendesk_url, $args);

	//print_r($response);

	if (is_wp_error($response)) {
		wp_die('Error: '.esc_html__('Ticket not created.', 'zendesk-request-form').' '.$error_msg);
	}

	$resp_code = intval($response['response']['code']);

	if ($resp_code != 201) { // 201 = ticket is "created" response
		wp_die('Error: '.$error_msg_wp_error);
	}

	//print_r($response);
	$ticket_num = 0;
	$body_resp = json_decode($response['body'], true);

	if ($body_resp['ticket']['id']) {
		$ticket_num = sanitize_text_field($body_resp['ticket']['id']);	
	} else {
		wp_die(esc_html__('Your message has been received. We will get back to you as soon as possible.', 'zendesk-request-form'));
	}

	if (!$ticket_num) {
		wp_die(esc_html__('Your message has been received. We will get back to you as soon as possible.', 'zendesk-request-form'));
	}


	// check if return url has query param already
	if(strpos($return_url,'?') !== false) {
		$return_url .= '&zrf_ticket='.$ticket_num.'&zx=1';
	} else {
		$return_url .= '?zrf_ticket='.$ticket_num.'&zx=1';
	}

	echo '<script>window.location = "'.$return_url.'";</script>'; // ugly fix before we can use wp_redirect properly.

	echo '<p>'.sprintf(esc_html__('Form submitted successfully. If you are not redirected within 5 seconds please <a href="%s">click here</a>.', 'zendesk-request-form'), $return_url ).'</p>';

}
add_action( 'admin_post_nopriv_zrf_form_action', 'zrf_form_action' );
add_action( 'admin_post_zrf_form_action', 'zrf_form_action' );