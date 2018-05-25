<?php
if (!defined('ABSPATH')) die;

// display admin notice if no API set
function zendesk_request_form_admin_notice() {
	$options = get_option('zendesk_request_form_settings');
	if (!current_user_can('manage_options') || !empty($options['zendesk_token'])) {
		return;
	}
	global $pagenow;
	if ( $pagenow != 'plugins.php' ) {
		return;
	}
	?>
	<div class="notice notice-warning is-dismissible">
		<h2>Howdy!</h2>
		<p>The <a href="https://wordpress.org/plugins/zendesk-request-form/" target="_blank">Zendesk Request Form</a> plugin is active, but you have not yet setup your API key on <a href="<?php echo admin_url('options-general.php?page=zendesk-request-form'); ?>">this page</a>.</p>
		<p>You will need to do this for the form to send tickets to your Zendesk account.</p>
	</div>
	<?php
}
add_action( 'admin_notices', 'zendesk_request_form_admin_notice' );


// admin settings
function zendesk_request_form_add_admin_menu() { 
	add_options_page( 'Zendesk Request Form', 'Zendesk Form', 'manage_options', 'zendesk-request-form', 'zendesk_request_form_options_page' );
}
add_action( 'admin_menu', 'zendesk_request_form_add_admin_menu' );


function zendesk_request_form_settings_init() { 

	register_setting( 'zendesk_request_form_pluginPage', 'zendesk_request_form_settings' );

	add_settings_section(
		'zendesk_request_form_pluginPage_section', 
		'', //section description 
		'zendesk_request_form_settings_section_callback', 
		'zendesk_request_form_pluginPage'
	);

	add_settings_field( 
		'zendesk_token', 
		'Zendesk API Token (<a href="https://support.zendesk.com/hc/en-us/community/posts/203398626-api-key" target="_blank">?</a>)', 
		'zendesk_token_render', 
		'zendesk_request_form_pluginPage', 
		'zendesk_request_form_pluginPage_section' 
	);

	add_settings_field( 
		'zendesk_user', 
		'Zendesk Admin Email', 
		'zendesk_user_render', 
		'zendesk_request_form_pluginPage', 
		'zendesk_request_form_pluginPage_section' 
	);

	add_settings_field( 
		'zendesk_domain', 
		'Zendesk Subdomain', 
		'zendesk_domain_render', 
		'zendesk_request_form_pluginPage', 
		'zendesk_request_form_pluginPage_section' 
	);
	
	add_settings_field( 
		'zendesk_message', 
		'Success Message (optional)', 
		'zendesk_message_render', 
		'zendesk_request_form_pluginPage', 
		'zendesk_request_form_pluginPage_section' 
	);

}
add_action( 'admin_init', 'zendesk_request_form_settings_init' );


function zendesk_token_render() { 
	$options = get_option( 'zendesk_request_form_settings' );
	$token = '';
	if (isset($options['zendesk_token'])) {
		$token = sanitize_text_field($options['zendesk_token']);
	}
	?>
	<input type="text" id="zrf_zendesk_token" name="zendesk_request_form_settings[zendesk_token]" value="<?php echo $token; ?>" style="width: 350px">
	<?php
}


function zendesk_user_render() { 
	$options = get_option( 'zendesk_request_form_settings' );
	$user = '';
	if (isset($options['zendesk_user'])) {
		$user = sanitize_email($options['zendesk_user']);
	}
	?>
	<input type="email" id="zrf_zendesk_user" name="zendesk_request_form_settings[zendesk_user]" value="<?php echo $user; ?>" placeholder="john@example.com" style="width: 350px">
	<?php
}


function zendesk_domain_render() { 
	$options = get_option( 'zendesk_request_form_settings' );
	$domain = '';
	if (isset($options['zendesk_domain'])) {
		$domain = sanitize_text_field($options['zendesk_domain']);
	}
	?>
	https://<input type="text" id="zrf_zendesk_domain" name="zendesk_request_form_settings[zendesk_domain]" value="<?php echo $domain; ?>" placeholder="example" style="width: 210px">.zendesk.com
	<?php
}


function zendesk_message_render() { 
	$options = get_option( 'zendesk_request_form_settings' );
	$message = '';
	if (isset($options['zendesk_message'])) {
		$message = sanitize_text_field($options['zendesk_message']);
	}
	?>
	<input type="text" name="zendesk_request_form_settings[zendesk_message]" value="<?php echo $message; ?>" placeholder="<?php _e('Your message has been sent successfully.', 'zendesk-request-form'); ?>" style="width: 350px">
	<br />
	<span style="font-size:80%">Only displayed on forms that do not have the "redirect" <a href="#shortcode-attributes">shortcode attribute</a>.</span>
	<?php
}


function zendesk_request_form_settings_section_callback() {
	?>
	<h2><span class="dashicons dashicons-admin-plugins"></span> Main Settings</h2>
	<p>After completing these settings, use the shortcode [zendesk_request_form] to add the form to any post/page.</p>
	<p>For more information about the Zendesk API, please see the <a href="https://developer.zendesk.com/rest_api/docs/core/introduction" target="_blank">official guidance</a> from Zendesk.</p>
	<?php
}

function zendesk_request_form_options_page() { 
	if (!current_user_can('manage_options')) {
		wp_die();
	}
	?>
	<div class="wrap">
	
	<form action='options.php' method='post'>
	
		<style>
		.piperror {
			color: red;
		}
		.pipsuccess {
			color: green;
		}
		</style>
		
		<h1>Zendesk Request Form</h1>
		
		<div class="card">
		<?php
			settings_fields( 'zendesk_request_form_pluginPage' );
			do_settings_sections( 'zendesk_request_form_pluginPage' );
			submit_button();
		?>
		
		<!--<button type="button" class="button" id="zrf_test_connection">Click here to test API connection</button>-->
		<h2>Current Connection Status</h2>
		<p id="zrf_test_connection_result">This area will show your connection status to the Zendesk API.</p>
		
		<script>
		jQuery(document).ready(function($) {
			
			var domain = $("#zrf_zendesk_domain").val();
			var user = $("#zrf_zendesk_user").val();
			var token = $("#zrf_zendesk_token").val();
			
			if ((domain.length > 1) && (user.length > 1) && (token.length > 1)) {
				var data = {
					action: 'zrf_connection_tester',
					'domain': domain,
					'user': user,
					'token': token,
				};
					
				$.post(ajaxurl, data, function(response) {
					//alert(response);
					$('#zrf_test_connection_result').html(response);
				});
			}
			/*
			$('#zrf_test_connection').click(function(e) {
				
				var domain = $("#zrf_zendesk_domain").val();
				var user = $("#zrf_zendesk_user").val();
				var token = $("#zrf_zendesk_token").val();
				
				$(this).html("Testing, please wait...").prop( "disabled", true );
				
				var data = {
					action: 'zrf_connection_tester',
					'domain': domain,
					'user': user,
					'token': token,
				};
				
				$.post(ajaxurl, data, function(response) {
					//alert(response);
					$('#zrf_test_connection_result').html(response);
					$('#zrf_test_connection').html('Click here to test API connection').removeAttr('disabled');
				});
				
			});
			*/
		
		});
		</script>
		
		</div><!--// .card -->
		
	</form>
	
	<div class="card">
		<h2><span class="dashicons dashicons-testimonial"></span> Custom Fields</h2>
		<p>Here you can add any <a href="https://support.zendesk.com/hc/en-us/articles/203661496-Adding-and-using-custom-ticket-fields" target="_blank">Custom Fields</a> you have created in Zendesk.</p>
		<p>The following field types are supported: text, number, url, email, dropdown, password, hidden, descriptive (used to display information within the form).</p>
		<p><input class="button" type="button" value="Manage Custom Fields" onclick="window.location='<?php echo admin_url('edit.php?post_type=zrf_custom_field'); ?>';" /></p>
		<p><input class="button" type="button" value="Add New Field" onclick="window.location='<?php echo admin_url('post-new.php?post_type=zrf_custom_field'); ?>';" /></p>
	</div><!--// .card -->
	
	<div class="card">
		<h2><span class="dashicons dashicons-index-card"></span> Custom Field Groups</h2>
		<p>You can assign Custom Fields to a form by using Custom Field Groups.</p>
		<p>For example: [zendesk_request_form group="new-enquiry"] would create a form with all of the Custom Fields assigned to a "New Enquiry" group. This means you can create multiple forms with different fields</p>
		<p>Custom Fields will only be displayed on a form if a group is set in the <a href="#shortcode-attributes">shortcode attributes</a>.</p>
		<p><input class="button" type="button" value="Manage Field Groups" onclick="window.location='<?php echo admin_url('edit-tags.php?taxonomy=zrf_field_group&post_type=zrf_custom_field'); ?>';" /></p>
	</div><!--// .card -->
	
	<div id="shortcode-attributes" class="card">
		<h2><span class="dashicons dashicons-edit"></span> Shortcode Attributes</h2>
		<p>Some optional attributes can be used with the [zendesk_request_form] shortcode.</p>
		<table class="widefat">
			<thead>
			<tr>
				<th class="row-title">Option</th>
				<th>Description</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td class="row-title"><label for="tablecell">size<br /></label></td>
				<td>Changes the size of the main "Description" field text area.</td>
			</tr>
			<tr class="alternate">
				<td class="row-title"><label for="tablecell">subject<br /></label></td>
				<td>
					<p>Pre-fill the subject of the message. If the subject is pre-filled then the user cannot edit the value as it will be hidden.</p>
					<p>Alternatively, you can disable and hide the subject field completely by using subject="no".</p>
				</td>
			</tr>
			<tr>
				<td class="row-title"><label for="tablecell">subject_prefix<br /></label></td>
				<td>Can be used to add text to the front of the subject when sent to Zendesk. e.g. subject_prefix="Customer Complaint: "</td>
			</tr>
			<tr class="alternate">
				<td class="row-title"><label for="tablecell">group<br /></label></td>
				<td>After you have created a "Custom Form Group", you can assign it to a specific form by using this attribute. Use the "slug" of the group you have created.</td>
			</tr>
			<tr>
				<td class="row-title"><label for="tablecell">assignee<br /></label></td>
				<td>Requests created via this form will be automatically assigned to this User/Agent ID.</td>
			</tr>
			<tr>
				<td class="row-title"><label for="tablecell">redirect<br /></label></td>
				<td>Full URL to redirect user to after sucessfully submitting the form.</td>
			</tr>
			</tbody>
		</table>
		<h3>Example Shortcode</h3>
		<p>The shortcode below will display a form with the following options:</p>
		<style scoped>
			ul {list-style:initial;margin-left: 20px;}
		</style>
		<ul>
			<li>The description field will be size 10.</li>
			<li>The subject will be prefixed with "Customer Complaint - " when sent to Zendesk.</li>
			<li>This form will include the custom fields from the "complaints" group.</li>
			<li>User will be redirected to <em>http://example.com/complaint-received</em> on submission.</li>
		</ul>
		<textarea class="widefat">[zendesk_request_form size="10" subject_prefix="Customer Complaint - " group="complaints" redirect="http://example.com/complaint-received"]</textarea>

	</div><!--// .card -->
	
	<div class="card">
		<h2><span class="dashicons dashicons-heart"></span> Share some Zen!</h2>
		<p>We have spent many, many hours developing this plugin for our own support system. It seemed like a waste if we kept it to ourselves, so we are sharing it for <b>free</b>. If this plugin has helped you, then you may wish to say thanks by leaving a <a href="<?php echo esc_url('https://wordpress.org/support/view/plugin-reviews/zendesk-request-form?rate=5#postform'); ?>">5 star rating</a> on WordPress.org :]</p>
		<p>If you have any suggestions to improve the plugin you are also welcome to ask on the <a href="<?php echo esc_url('https://wordpress.org/support/plugin/zendesk-request-form'); ?>">Support Forum</a>.</p>
	</div><!--// .card -->
	
	</div><!--// .wrap -->
	<?php
}

function zrf_connection_tester_callback() {
	
	$zendesk_domain = sanitize_text_field($_POST['domain']);
	$zendesk_user = sanitize_text_field($_POST['user']);
	$zendesk_token = sanitize_text_field($_POST['token']);
	
	if (empty($zendesk_domain)) {
		echo '<span class="dashicons dashicons-no"></span> Error! Please check you have entered your "Zendesk Subdomain" in the settings above.';
		wp_die();
	}
	if (empty($zendesk_user)) {
		echo '<span class="dashicons dashicons-no"></span> Error! Please check you have entered your "Zendesk Admin Email" in the settings above.';
		wp_die();
	}
	if (empty($zendesk_token)) {
		echo '<span class="dashicons dashicons-no"></span> Error! Please check you have entered your "Zendesk API Token" in the settings above.';
		wp_die();
	}
	
	$url = esc_url('https://'.$zendesk_domain.'.zendesk.com/api/v2/tickets.json');

	$headers = array(
		'Authorization' => 'Basic '.base64_encode($zendesk_user.'/token:'.$zendesk_token)
	);
	
	$args = array(
		'method' => 'GET',
		'timeout' => 15,
		'redirection' => 10,
		'blocking' => true,
		'headers' => $headers,
	);
	
	$result_msg = '';
	
	$response = wp_safe_remote_request($url, $args);
	if (is_wp_error($response)) {
		$error_message = strip_tags($response->get_error_message());
		$result_msg = '<span class="piperror"><span class="dashicons dashicons-no"></span> Error! Response from your server: "'.$error_message.'". Please contact your web host for assistance.</span>';
	} elseif (is_array($response)) {
		$code = intval($response['response']['code']);
		if ($code === 200) {
			$result_msg = '<span class="pipsuccess"><span class="dashicons dashicons-yes"></span> Successfully connected to Zendesk. You can now add a form to any page by using the shortcode [zendesk_request_form]</span>';
		} elseif ($code === 404) {
			$result_msg = '<span class="piperror"><span class="dashicons dashicons-no"></span> Error! Invalid Zendesk Subdomain.</span>';
		} else {
			$result_msg = '<span class="piperror"><span class="dashicons dashicons-no"></span> Error! Response code from Zendesk is <a href="https://developer.zendesk.com/rest_api/docs/core/introduction#response-format" target="_blank" style="color: red">'.$code.'</a>.<br />Check that you have entered the correct Admin Email.<br />Check that you have copied the correct Zendesk <a href="https://developer.zendesk.com/rest_api/docs/core/introduction#api-token" target="_blank">API Token</a>.</span>';
		}
	} else {
		$result_msg = '<span class="piperror"><span class="dashicons dashicons-no"></span> Error! Could not connect to Zendesk API. Does your host have cURL enabled on your server?</span>';
	}
	
	echo $result_msg;

	wp_die();
}
add_action( 'wp_ajax_zrf_connection_tester', 'zrf_connection_tester_callback' );