<?php
function eramba_box_section($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output = '<div class="boxed-section">';
	$output .= remove_autop($content);
	$output .= '</div>';

	return $output;
}
add_shortcode('box_section', 'eramba_box_section');

function eramba_highlight_section($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output = '<div class="highlight-box">';
	$output .= remove_autop($content);
	$output .= '</div>';

	return $output;
}
add_shortcode('highlight_section', 'eramba_highlight_section');

function eramba_highlight_inner_box($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output = '<div class="highlight-box-inner">';
	$output .= remove_autop($content);
	$output .= '</div>';

	return $output;
}
add_shortcode('highlight_inner_box', 'eramba_highlight_inner_box');

function eramba_red_container($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output = '<div class="red-color-wrapper">';
	$output .= '<div class="container">';
	$output .= remove_autop($content);
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode('red_container', 'eramba_red_container');

function eramba_blue_container($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output = '<div class="blue-color-wrapper">';
	$output .= '<div class="container">';
	$output .= remove_autop($content);
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode('blue_container', 'eramba_blue_container');

function eramba_white_container($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output = '<div class="white-color-wrapper">';
	$output .= '<div class="container">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode('white_container', 'eramba_white_container');

function eramba_larger_text($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output = '<span class="larger-text">';
	$output .= remove_autop($content);
	$output .= '</span>';

	return $output;
}
add_shortcode('larger_text', 'eramba_larger_text');

function eramba_icon_box($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => 'Title',
		'icon' => 'bolt',
		'icontype' => 'fontawesome'
	), $atts));
	
	$output = '<div class="iconbox iconbox-' . $icontype . '">';
	if ($icontype == 'theme') {
		$iconOutput = '<img src="' . THEME_IMG . 'icons/' . $icon . '" alt="' . $title . '" />';
	}
	elseif ($icontype == 'fontawesome') {
		$iconOutput = '<i class="fa fa-' . $icon . '"></i>';
	}

		$output .= '<div class="iconbox-icon">' . $iconOutput . '</div>';
		$output .= '<div class="iconbox-content">';
			$output .= '<h3>' . $title . '</h3>';
			$output .= '<div class="iconbox-content-inner">' . remove_autop($content) . '</div>';
		$output .= '</div>';
	$output .= '</div>';

	return $output;
}
add_shortcode('icon_box', 'eramba_icon_box');

function eramba_list($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output = '<div class="eramba-list">';
	$output .= remove_autop($content);
	$output .= '</div>';

	return $output;
}
add_shortcode('list', 'eramba_list');

function eramba_page_link($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => null
	), $atts));

	if (!$id) return false;
	
	return get_page_link($id);
}
add_shortcode('page_link', 'eramba_page_link');

function eramba_theme_img_doc($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => null
	), $atts));

	return THEME_IMG . 'doc/';
}
add_shortcode('img_doc', 'eramba_theme_img_doc');

function eramba_theme_img($atts, $content = null) {
	extract(shortcode_atts(array(
		'id' => null
	), $atts));

	return THEME_IMG;
}
add_shortcode('img', 'eramba_theme_img');


function remove_autop($content) {
	$content = do_shortcode( shortcode_unautop( $content ) ); 
	$content = preg_replace('#^<\/p>|^<br\s?\/?>|<p>$|<p>\s*(&nbsp;)?\s*<\/p>#', '', $content);
	return $content;
}

remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);