<?php
/*
Plugin Name: Zendesk Request Form
Plugin URI: https://wordpress.org/plugins/zendesk-request-form/
Version: 2.3.3
Author: pipdig
Description: Add a Zendesk request form on any post/page via a shortcode. Submitted messages will create a new ticket in your Zendesk account.
Author URI: https://www.pipdig.co/
Text Domain: zendesk-request-form
Domain Path: /languages
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

*/

if (!defined('ABSPATH')) die;

// Load languages
function zendesk_request_form_textdomain() {
	load_plugin_textdomain('zendesk-request-form', false, 'zendesk-request-form/languages');
}
add_action('plugins_loaded', 'zendesk_request_form_textdomain');


// create global for allowed html tags
global $zrf_allowedtags;
$zrf_allowedtags = array(
	'a' => array(
		'href' => true,
		'title' => true,
		'target' => true,
		'rel' => true,
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'div' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'b' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'p' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'em' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'h2' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'h3' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'h4' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'i' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'img' => array(
		'class' => true,
		'id' => true,
		'style' => true,
		'src' => true,
		'title' => true,
		'alt' => true,
	),
	'br' => array(),
	'strong' => array(
		'class' => true,
		'id' => true,
		'style' => true,
	),
	'style' => array(
		'scoped' => true,
	),
);

// form action
include('inc/action.php');

// admin settings
include('inc/settings.php');

// custom fields
include('inc/custom-fields.php');

function zrf_clean_url($url) {
    if ((strlen($url) > 3) && !preg_match("~^(?:f|ht)tps?://~i", $url)) {
		$url = strip_tags($url);
		$url = trim($url);
		$url = ltrim($url, '/');
        $url = "http://" . $url;
    }
    return $url;
}

// Shortcode [zendesk_request_form]
function zendesk_request_form_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'subject' => '', // pre-fill or remove subject (set to "no" or "off" to disable)
		'description' => '', // pre-fill or remove description (set to "no" or "off" to disable)
		'size' => '8', // textarea size for description (if description enabled)
		'users' => '', // whether to grab user data or not
		'name' => '', // pre-fill name https://wordpress.org/support/topic/prepopulate-email-field
		'email' => '', // pre-fill email https://wordpress.org/support/topic/prepopulate-email-field
		'subject_prefix' => '', // prefix subject when sent to Zendesk
		'subject_suffix' => '', // suffix subject when sent to Zendesk
		'group' => '', // custom field group - defines the fields displayed in this form
		'redirect' => '', // url to redirect after successful submission
		'cf_geo' => '', // custom field ID (from Zendesk) for CF geo ip.
		'assignee' => '', // default assignee for ticket. Should be the user ID of desired agent
		'useragent' => '', // add User Agent data to ticket. (On by default. Set to "no" or "off" to disable)
	), $atts ) );
	
	$output = '';
	
	$ticket_num = 0;
	if (isset($_GET['zrf_ticket']) && isset($_GET['zx'])) {
		$ticket_num = intval($_GET['zrf_ticket']);
	}
	
	if ($ticket_num != 0) {
		
		$options = get_option('zendesk_request_form_settings');
		$message = __('Your message has been sent successfully.', 'zendesk-request-form');
		if (!empty($options['zendesk_message'])) {
			$message = sanitize_text_field($options['zendesk_message']);
		}
		$output .= '<p>'.$message.'</p>';
		$output .= '<p>'.sprintf(__('Your ticket number is %s.', 'zendesk-request-form'), $ticket_num ).'</p>';
		
	} else {
		
		global $zrf_allowedtags;
		
		if (empty($redirect)) { // if redirect url is not set via shortcode option, let's auto direct back to form page
			if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == 'on') {
				$redirect = 'https://';
			} else {
				$redirect = 'http://';
			}
			$redirect .= strip_tags($_SERVER['SERVER_NAME']);
			if ($_SERVER['SERVER_PORT'] != 80) {
				$redirect .= ':'.strip_tags($_SERVER["SERVER_PORT"]).strip_tags($_SERVER["REQUEST_URI"]);
			} else {
				$redirect .= strip_tags($_SERVER["REQUEST_URI"]);
			}
		}
		

		// grab data from user if logged in
		$current_user = $requester_email = $first_name = $last_name = $requester_name = $user_id = '';
		if (is_user_logged_in() && ($users != 'no')) {
			$current_user = wp_get_current_user();
			$requester_email = sanitize_email($current_user->user_email);
			//$url = esc_url($current_user->user_url);
			$first_name = sanitize_text_field($current_user->user_firstname);
			$last_name = sanitize_text_field($current_user->user_lastname);
			if ($first_name && $last_name) {
				$requester_name = $first_name.' '.$last_name;
			}
		} else { // if not logged in, let's check for "email" query in url
			if (isset($_GET["email"])) {
				$requester_email = sanitize_email($_GET["email"]);
			}
		}
		
		$output .= '<style scoped>.zrf-form label {width:100%}</style>';
		$output .= '<div id="zrf-form" class="zrf-form">';
		$output .= '<form method="post" action="'.esc_url(admin_url('admin-post.php')).'">';
		$output .= '<input type="hidden" name="zen_begin" value="zen_begin" readonly>';
		$output .= '<input type="hidden" name="zen_return_url" value="'.esc_url($redirect).'">';
		
		if (!is_user_logged_in()) { // add anti-spam fields only for not logged in users
			$output .= '<p style="display:none"><input class="form-control" type="text" name="zrf-email-website" value=""></p>';
			$output .= '<p style="display:none"><input type="hidden" name="zrf-year-a" value="'.date('Y').'"></p>';
		}
		
		// name
		$output .= '<p id="zendesk_field_zen_name"><label for="zen_name"><span class="zrf_field_title">'.__('Your Name', 'zendesk-request-form').'</span><br />';
		if (strlen($requester_name) > 2) { // taken from user account
			$output .= '  <input class="form-control" type="text" name="zen_name" value="'.$requester_name.'" required>';
		} elseif ($name) { // taken from shortcode pre-fill
			$output .= '  <input class="form-control" type="text" name="zen_name" value="'.esc_attr($name).'" required>';
		} else { // standard name field
			$output .= '  <input class="form-control" type="text" name="zen_name" value="" required>';
		}
		$output .= '</label></p>';
		
		// email
		$output .= '<p id="zendesk_field_zen_email"><label for="zen_email"><span class="zrf_field_title">'.__('Your Email', 'zendesk-request-form').'</span><br />';
		if (strlen($requester_email) > 3) { // taken from user account
			$output .= '  <input class="form-control" type="email" name="zen_email" value="'.$requester_email.'" required>';
		} elseif ($email) { // taken from shortcode pre-fill
			$output .= '  <input class="form-control" type="email" name="zen_email" value="'.esc_attr($email).'" required>';
		} else { // standard name field
			$output .= '  <input class="form-control" type="email" name="zen_email" value="" required>';
		}
		$output .= '</label></p>';
		
		
		if ($group) { // let's only show custom fields when group is set
		
			$output .= '<input type="hidden" name="zen_field_group" value="'.esc_attr($group).'" readonly>';
		
			$custom_fields = new WP_Query( // custom fields
				array(
					'post_type' => 'zrf_custom_field',
					'showposts' => -1,
					'orderby' => 'menu_order',
					'zrf_field_group' => $group
				)
			);
			while ( $custom_fields->have_posts() ): $custom_fields->the_post();
					
				$field_type = esc_attr(get_post_meta(get_the_ID(), 'field-type', true));
				
				if ($field_type != 'descriptive') { // check if it's actually a field or just description text/html
				
					$default_value = $extra_info = '';
					
					$field_title = sanitize_text_field(get_post_meta(get_the_ID(), 'field-title', true));
					$field_id = absint(get_post_meta(get_the_ID(), 'field-id', true));
					$field_placeholder = esc_attr(get_post_meta(get_the_ID(), 'field-placeholder', true));
					$field_default = esc_attr(get_post_meta(get_the_ID(), 'field-default', true));
					$field_required = esc_attr(get_post_meta(get_the_ID(), 'field-required', true));
					$field_pattern = esc_attr(get_post_meta(get_the_ID(), 'field-pattern', true));
					$field_get = sanitize_text_field(get_post_meta(get_the_ID(), 'field-get', true));
					$extra_info = wp_kses(get_post_meta(get_the_ID(), 'field-extra', true), $zrf_allowedtags);
						 
					if (empty($field_title) && ($field_type != 'hidden')) {
						return 'Error: There is a custom field without a "Title / Label"';
					}
					if (empty($field_id)) {
						return 'Error: There is a custom field without an "ID"';
					}
					if (empty($field_placeholder)) {
						$field_placeholder = '';
					}
					if (empty($field_type)) {
						$field_type = 'text';
					}
					if (empty($field_required)) {
						$field_required = '';
					} else {
						$field_required = 'required';
					}
					if (!empty($field_pattern)) {
						$field_pattern = ' pattern="'.$field_pattern.'"';
					}
					if (!empty($field_default)) {
						$default_value = $field_default;
					}
					if (!empty($extra_info)) {
						$extra_info = ' <span style="font-size:80%">('.wp_kses(get_post_meta(get_the_ID(), 'field-extra', true), $zrf_allowedtags).')</span>';
					}
					if (!empty($field_get)) { // or we retrieve value from a GET query
						if (isset($_GET[$field_get])) {
							$default_value = sanitize_text_field($_GET[$field_get]);
						}
					}
					
					$output .= '<p id="zendesk_field_'.$field_id.'">';
					
						if ($field_type == 'checkbox') { // checkbox needs it's own styling
						
							$output .= '<input type="'.$field_type.'" name="'.$field_id.'" id="'.$field_id.'" '.$field_required.'>';
							$output .= '  <span class="zrf_field_title"><label for="'.$field_id.'">'.$field_title.'</span>';
							$output .= '</label>'.$extra_info;
							
						} elseif ($field_type == 'dropdown') { // dropdown needs it's own markup
						
							$field_options = strip_tags(get_post_meta(get_the_ID(), 'field-options', true));
							
							$output .= '<span class="zrf_field_title"><label for="'.$field_id.'">'.$field_title.'</span>'.$extra_info.'<br />';
							$output .= '<select class="form-control" name="'.$field_id.'" id="'.$field_id.'" '.$field_required.'>';
							$output .= '<option value="">'.__('Select an option', 'zendesk-request-form').'</option>';
							$field_options_array = explode("\r\n", $field_options);
							if (!empty($field_options_array[0])) {
								foreach ($field_options_array as $field_option_line) {
									$field_option_line_item = explode("|", $field_option_line);
									if (!empty($field_option_line_item[0]) && !empty($field_option_line_item[1])) {
										//$output .= $field_option_line_item[0]."<br />";
										$output .= '<option value="'.esc_attr($field_option_line_item[0]).'">'.strip_tags($field_option_line_item[1]).'</option>';
									} else {
										$output .= '<option value="">Invalid options set for this field. Please check settings.</option>';
									}
								}
							} else {
								$output .= '<option value="">Invalid options set for this field. Please check settings.</option>';
							}
							
							$output .= '</select>';
							
						} else {
							
							if ($field_type != 'hidden') {
								$output .= '<span class="zrf_field_title"><label for="'.$field_id.'">'.$field_title.'</span>'.$extra_info.'<br />';
							}
							$output .= '  <input class="form-control" autocomplete="off" autocorrect="off" autocapitalize="off" type="'.$field_type.'" name="'.$field_id.'" id="'.$field_id.'" placeholder="'.$field_placeholder.'" value="'.$default_value.'" '.$field_pattern.' '.$field_required.'>';
							if ($field_type != 'hidden') {
								$output .= '</label>';
							}
							
						}
					
					$output .= '</p>';
					
					
				} else { // it's not actually a field, so let's display the html/text from the description
					global $zrf_allowedtags;
					$output .= wp_kses(get_post_meta(get_the_ID(), 'field-description', true), $zrf_allowedtags);
				}
				
			endwhile;
		
		}
			
		if ($subject == 'no') { // no subject required
			$output .= '<input type="hidden" name="zen_subject" value="" readonly>';
		} elseif ($subject != '') { // subject pre-filled with shortcode attribute
			$output .= '<input type="hidden" name="zen_subject" value="'.esc_attr($subject).'" readonly>';
		} else { // standard subject field
			$output .= '<p id="zendesk_field_zen_subject"><label for="zen_subject"><span class="zrf_field_title">'.__('Subject', 'zendesk-request-form').'</span><br />';
			$output .= '  <inpu class="form-control"  type="text" name="zen_subject" value="" required>';
			$output .= '</label></p>';
		}
		
		// prefix and suffix send to action
		$output .= '<input type="hidden" name="zen_subject_prefix" value="'.esc_attr($subject_prefix).'" readonly>';
		$output .= '<input type="hidden" name="zen_subject_suffix" value="'.esc_attr($subject_suffix).'" readonly>';
		
		if ($assignee) {
			$output .= '<input type="hidden" name="zen_assignee" value="'.esc_attr($assignee).'" readonly>';
		}
		
		if (!empty($cf_geo)) {
			$output .= '<input type="hidden" name="zen_cf_geo" value="'.absint($cf_geo).'" readonly>';
		}
		
		if ($description == 'no') { // no description required
			$output .= '<input type="hidden" name="zen_desc" value="'.__('No description set in ticket', 'zendesk-request-form').'" readonly>';
		} elseif ($description != '') { // description pre-filled with shortcode attribute
			$output .= '<input type="hidden" name="zen_desc" value="'.esc_attr($description).'" readonly>';
		} else { // standard description field
			$output .= '<p id="zendesk_field_zen_desc"><label for="zen_desc"><span class="zrf_field_title">'.__('Your Message', 'zendesk-request-form').'</span><br />';
			$output .= '  <textarea name="zen_desc" id="zen_desc" class="form-control" rows="'.absint($size).'" required></textarea>';
			$output .= '</label></p>';
		}
		
		// send user-agent (enabled by default, but can override via shortcode if needed)
		if ($useragent != 'no') {
			$output .= '<input type="hidden" name="zen_user_agent" value="'.esc_attr($_SERVER['HTTP_USER_AGENT']).'">';
		}
		
		// GA tracking
		$google_analytics_tracking = 'onClick=\'ga( "send", "event", { eventCategory: "Zendesk Request Form", eventAction: "Form Submitted" } );\'';
		if ($group) {
			// get form group name for GA tracking
			$group_data = get_term_by('slug', $group, 'zrf_field_group');
			$group_name = $group_data->name;
			$google_analytics_tracking = 'onClick=\'ga( "send", "event", { eventCategory: "Zendesk Request Form", eventAction: "Form Submitted", eventLabel: "'.esc_attr($group_name).'" } );\'';
		}
		
		$output .= '<input type="hidden" name="action" value="zrf_form_action">'; // form action
		
		$output .= '<p id="zendesk_field_zen_submit" class="">';
		$output .= '  <input type="submit" id="zrf_submit" class="" value="'.esc_attr__('Submit', 'zendesk-request-form').'" '.$google_analytics_tracking.' >';
		$output .= '</p>';
		$output .= '</form>';
		$output .= '</div>';
		
		// double click protection to stop duplicate submissions
		$output .= '
			<script>
			jQuery(document).ready(function($) {
				
				$("#zrf_submit").removeAttr("disabled");
				
				$("#zrf-form").bind("submit", function(e) {
					
					// disable submit button
					$(this).find("input:submit").attr("disabled", "disabled");
										
					// after 3 seconds, re-nable, should give enough time to submit as normal
					setTimeout( function() {
						$("form").find("input:submit").removeAttr("disabled");
					}, 3000);
					
				});
			});
			</script>';
	}
	return $output;
}
add_shortcode( 'zendesk_request_form', 'zendesk_request_form_shortcode' );



// [zrf_ticket_num]
// shortcode to retreive ticket number on custom redirect page
function zendesk_request_retrieve_ticket_num_shortcode( $atts, $content = null ) {
	$output = '';
	if (isset($_GET['zrf_ticket']) && isset($_GET['zx'])) {
		$output = esc_attr($_GET["zrf_ticket"]);
	}
	return $output;
}
add_shortcode( 'zrf_ticket_num', 'zendesk_request_retrieve_ticket_num_shortcode' );




// Add settings link to plugins page
function zendesk_request_plugin_action_links($links) {
	$links[] = '<a href="'.get_admin_url(null, 'options-general.php?page=zendesk-request-form').'">Settings</a>';
	return $links;
}
add_filter( 'plugin_action_links_'.plugin_basename(__FILE__), 'zendesk_request_plugin_action_links' );







// convert CF country code to name
function zrf_code_to_country($code){

	$code = strtoupper($code);

	$countryList = array(
		'AF' => 'Afghanistan',
		'AX' => 'Aland Islands',
		'AL' => 'Albania',
		'DZ' => 'Algeria',
		'AS' => 'American Samoa',
		'AD' => 'Andorra',
		'AO' => 'Angola',
		'AI' => 'Anguilla',
		'AQ' => 'Antarctica',
		'AG' => 'Antigua and Barbuda',
		'AR' => 'Argentina',
		'AM' => 'Armenia',
		'AW' => 'Aruba',
		'AU' => 'Australia',
		'AT' => 'Austria',
		'AZ' => 'Azerbaijan',
		'BS' => 'Bahamas',
		'BH' => 'Bahrain',
		'BD' => 'Bangladesh',
		'BB' => 'Barbados',
		'BY' => 'Belarus',
		'BE' => 'Belgium',
		'BZ' => 'Belize',
		'BJ' => 'Benin',
		'BM' => 'Bermuda',
		'BT' => 'Bhutan',
		'BO' => 'Bolivia',
		'BQ' => 'Bonaire, Saint Eustatius and Saba',
		'BA' => 'Bosnia and Herzegovina',
		'BW' => 'Botswana',
		'BV' => 'Bouvet Island',
		'BR' => 'Brazil',
		'IO' => 'British Indian Ocean Territory',
		'VG' => 'British Virgin Islands',
		'BN' => 'Brunei',
		'BG' => 'Bulgaria',
		'BF' => 'Burkina Faso',
		'BI' => 'Burundi',
		'KH' => 'Cambodia',
		'CM' => 'Cameroon',
		'CA' => 'Canada',
		'CV' => 'Cape Verde',
		'KY' => 'Cayman Islands',
		'CF' => 'Central African Republic',
		'TD' => 'Chad',
		'CL' => 'Chile',
		'CN' => 'China',
		'CX' => 'Christmas Island',
		'CC' => 'Cocos Islands',
		'CO' => 'Colombia',
		'KM' => 'Comoros',
		'CK' => 'Cook Islands',
		'CR' => 'Costa Rica',
		'HR' => 'Croatia',
		'CU' => 'Cuba',
		'CW' => 'Curacao',
		'CY' => 'Cyprus',
		'CZ' => 'Czech Republic',
		'CD' => 'Democratic Republic of the Congo',
		'DK' => 'Denmark',
		'DJ' => 'Djibouti',
		'DM' => 'Dominica',
		'DO' => 'Dominican Republic',
		'TL' => 'East Timor',
		'EC' => 'Ecuador',
		'EG' => 'Egypt',
		'SV' => 'El Salvador',
		'GQ' => 'Equatorial Guinea',
		'ER' => 'Eritrea',
		'EE' => 'Estonia',
		'ET' => 'Ethiopia',
		'FK' => 'Falkland Islands',
		'FO' => 'Faroe Islands',
		'FJ' => 'Fiji',
		'FI' => 'Finland',
		'FR' => 'France',
		'GF' => 'French Guiana',
		'PF' => 'French Polynesia',
		'TF' => 'French Southern Territories',
		'GA' => 'Gabon',
		'GM' => 'Gambia',
		'GE' => 'Georgia',
		'DE' => 'Germany',
		'GH' => 'Ghana',
		'GI' => 'Gibraltar',
		'GR' => 'Greece',
		'GL' => 'Greenland',
		'GD' => 'Grenada',
		'GP' => 'Guadeloupe',
		'GU' => 'Guam',
		'GT' => 'Guatemala',
		'GG' => 'Guernsey',
		'GN' => 'Guinea',
		'GW' => 'Guinea-Bissau',
		'GY' => 'Guyana',
		'HT' => 'Haiti',
		'HM' => 'Heard Island and McDonald Islands',
		'HN' => 'Honduras',
		'HK' => 'Hong Kong',
		'HU' => 'Hungary',
		'IS' => 'Iceland',
		'IN' => 'India',
		'ID' => 'Indonesia',
		'IR' => 'Iran',
		'IQ' => 'Iraq',
		'IE' => 'Ireland',
		'IM' => 'Isle of Man',
		'IL' => 'Israel',
		'IT' => 'Italy',
		'CI' => 'Ivory Coast',
		'JM' => 'Jamaica',
		'JP' => 'Japan',
		'JE' => 'Jersey',
		'JO' => 'Jordan',
		'KZ' => 'Kazakhstan',
		'KE' => 'Kenya',
		'KI' => 'Kiribati',
		'XK' => 'Kosovo',
		'KW' => 'Kuwait',
		'KG' => 'Kyrgyzstan',
		'LA' => 'Laos',
		'LV' => 'Latvia',
		'LB' => 'Lebanon',
		'LS' => 'Lesotho',
		'LR' => 'Liberia',
		'LY' => 'Libya',
		'LI' => 'Liechtenstein',
		'LT' => 'Lithuania',
		'LU' => 'Luxembourg',
		'MO' => 'Macao',
		'MK' => 'Macedonia',
		'MG' => 'Madagascar',
		'MW' => 'Malawi',
		'MY' => 'Malaysia',
		'MV' => 'Maldives',
		'ML' => 'Mali',
		'MT' => 'Malta',
		'MH' => 'Marshall Islands',
		'MQ' => 'Martinique',
		'MR' => 'Mauritania',
		'MU' => 'Mauritius',
		'YT' => 'Mayotte',
		'MX' => 'Mexico',
		'FM' => 'Micronesia',
		'MD' => 'Moldova',
		'MC' => 'Monaco',
		'MN' => 'Mongolia',
		'ME' => 'Montenegro',
		'MS' => 'Montserrat',
		'MA' => 'Morocco',
		'MZ' => 'Mozambique',
		'MM' => 'Myanmar',
		'NA' => 'Namibia',
		'NR' => 'Nauru',
		'NP' => 'Nepal',
		'NL' => 'Netherlands',
		'NC' => 'New Caledonia',
		'NZ' => 'New Zealand',
		'NI' => 'Nicaragua',
		'NE' => 'Niger',
		'NG' => 'Nigeria',
		'NU' => 'Niue',
		'NF' => 'Norfolk Island',
		'KP' => 'North Korea',
		'MP' => 'Northern Mariana Islands',
		'NO' => 'Norway',
		'OM' => 'Oman',
		'PK' => 'Pakistan',
		'PW' => 'Palau',
		'PS' => 'Palestinian Territory',
		'PA' => 'Panama',
		'PG' => 'Papua New Guinea',
		'PY' => 'Paraguay',
		'PE' => 'Peru',
		'PH' => 'Philippines',
		'PN' => 'Pitcairn',
		'PL' => 'Poland',
		'PT' => 'Portugal',
		'PR' => 'Puerto Rico',
		'QA' => 'Qatar',
		'CG' => 'Republic of the Congo',
		'RE' => 'Reunion',
		'RO' => 'Romania',
		'RU' => 'Russia',
		'RW' => 'Rwanda',
		'BL' => 'Saint Barthelemy',
		'SH' => 'Saint Helena',
		'KN' => 'Saint Kitts and Nevis',
		'LC' => 'Saint Lucia',
		'MF' => 'Saint Martin',
		'PM' => 'Saint Pierre and Miquelon',
		'VC' => 'Saint Vincent and the Grenadines',
		'WS' => 'Samoa',
		'SM' => 'San Marino',
		'ST' => 'Sao Tome and Principe',
		'SA' => 'Saudi Arabia',
		'SN' => 'Senegal',
		'RS' => 'Serbia',
		'SC' => 'Seychelles',
		'SL' => 'Sierra Leone',
		'SG' => 'Singapore',
		'SX' => 'Sint Maarten',
		'SK' => 'Slovakia',
		'SI' => 'Slovenia',
		'SB' => 'Solomon Islands',
		'SO' => 'Somalia',
		'ZA' => 'South Africa',
		'GS' => 'South Georgia and the South Sandwich Islands',
		'KR' => 'South Korea',
		'SS' => 'South Sudan',
		'ES' => 'Spain',
		'LK' => 'Sri Lanka',
		'SD' => 'Sudan',
		'SR' => 'Suriname',
		'SJ' => 'Svalbard and Jan Mayen',
		'SZ' => 'Swaziland',
		'SE' => 'Sweden',
		'CH' => 'Switzerland',
		'SY' => 'Syria',
		'TW' => 'Taiwan',
		'TJ' => 'Tajikistan',
		'TZ' => 'Tanzania',
		'TH' => 'Thailand',
		'TG' => 'Togo',
		'TK' => 'Tokelau',
		'TO' => 'Tonga',
		'TT' => 'Trinidad and Tobago',
		'TN' => 'Tunisia',
		'TR' => 'Turkey',
		'TM' => 'Turkmenistan',
		'TC' => 'Turks and Caicos Islands',
		'TV' => 'Tuvalu',
		'VI' => 'U.S. Virgin Islands',
		'UG' => 'Uganda',
		'UA' => 'Ukraine',
		'AE' => 'United Arab Emirates',
		'GB' => 'United Kingdom',
		'US' => 'United States',
		'UM' => 'United States Minor Outlying Islands',
		'UY' => 'Uruguay',
		'UZ' => 'Uzbekistan',
		'VU' => 'Vanuatu',
		'VA' => 'Vatican',
		'VE' => 'Venezuela',
		'VN' => 'Vietnam',
		'WF' => 'Wallis and Futuna',
		'EH' => 'Western Sahara',
		'YE' => 'Yemen',
		'ZM' => 'Zambia',
		'ZW' => 'Zimbabwe',
	);

	if(!$countryList[$code]) return $code;
	else return $countryList[$code];
}
