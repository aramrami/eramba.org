<?php

// seo settings
function eramba_customizer_seo( $wp_customize ) {
	$wp_customize->add_section(
		'section_seo',
		array(
			'title' => __( 'SEO', 'eramba' ),
			'description' => __( 'If you are not using custom plugin for SEO, you can set your basic SEO settings here.', 'eramba' ),
			'priority' => 210,
		)
	);
	
	// meta author
	$wp_customize->add_setting(
		'meta-author',
		array(
			'sanitize_callback' => 'sanitize_text',
			'title' => 'nehehe'
		)
	);
	$wp_customize->add_control(
		'meta-author',
		array(
			'label' => __( 'Meta Author', 'eramba' ),
			'section' => 'section_seo',
			'type' => 'text',
		)
	);

	// meta description
	$wp_customize->add_setting(
		'meta-description',
		array(
			'sanitize_callback' => 'sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Customize_Textarea_Control(
			$wp_customize,
			'meta-description',
			array(
				'label' => __( 'Meta Description', 'eramba' ),
				'section' => 'section_seo',
				'settings' => 'meta-description',
			)
		)
	);

	// meta author
	$wp_customize->add_setting(
		'meta-keywords',
		array(
			'sanitize_callback' => 'sanitize_text'
		)
	);
	$wp_customize->add_control(
		new Customize_Textarea_Control(
			$wp_customize,
			'meta-keywords',
			array(
				'label' => __( 'Meta Keywords', 'eramba' ),
				'section' => 'section_seo',
				'settings' => 'meta-keywords',
			)
		)
	);
}
add_action( 'customize_register', 'eramba_customizer_seo' );

// other settings
function eramba_customizer_other( $wp_customize ) {
	$wp_customize->add_section(
		'section_other',
		array(
			'title' => __( 'Other', 'eramba' ),
			'description' => __( 'This section is used for un-categorized settings for the theme.', 'eramba' ),
			'priority' => 220,
		)
	);

	// archive page title
	$wp_customize->add_setting(
		'archive-title',
		array(
			'sanitize_callback' => 'sanitize_text'
		)
	);
	$wp_customize->add_control(
		'archive-title',
		array(
			'label' => __( 'Archive Title', 'eramba' ),
			'section' => 'section_other',
			'type' => 'text',
		)
	);

	// tracking code
	$wp_customize->add_setting(
		'tracking_code',
		array(
			'sanitize_callback' => 'sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Customize_Textarea_Control(
			$wp_customize,
			'tracking_code',
			array(
				'label' => __( 'Tracking Code', 'eramba' ),
				'section' => 'section_other',
				'settings' => 'tracking_code',
			)
		)
	);

	// custom js
	$wp_customize->add_setting(
		'custom_js',
		array(
			'sanitize_callback' => 'sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Customize_Textarea_Control(
			$wp_customize,
			'custom_js',
			array(
				'label' => __( 'Custom JavaScript', 'eramba' ),
				'section' => 'section_other',
				'settings' => 'custom_js',
			)
		)
	);

	// custom css
	$wp_customize->add_setting(
		'custom_css',
		array(
			'sanitize_callback' => 'sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Customize_Textarea_Control(
			$wp_customize,
			'custom_css',
			array(
				'label' => __( 'Custom CSS', 'eramba' ),
				'section' => 'section_other',
				'settings' => 'custom_css',
			)
		)
	);
}
add_action( 'customize_register', 'eramba_customizer_other' );

function eramba_customizer_widgets( $wp_customize ) {
	$wp_customize->add_section(
		'section_widgets',
		array(
			'title' => __( 'Widgets', 'eramba' ),
			'priority' => 220,
		)
	);

	// tracking code
	/*$wp_customize->add_setting(
		'about_us',
		array(
			'sanitize_callback' => 'sanitize_text'
		)
	);

	$wp_customize->add_control(
		new Customize_Textarea_Control(
			$wp_customize,
			'about_us',
			array(
				'label' => __( 'About us', 'eramba' ),
				'section' => 'section_widgets',
				'settings' => 'about_us',
			)
		)
	);*/
}
add_action( 'customize_register', 'eramba_customizer_widgets' );

/**
 * Sanitize text and strip any html tags.
 * @param  string $input Input string.
 * @return string        Filtered string.
 */
function sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Sanitize URL.
 * @param  string $input Input url.
 * @return string        Filtered url.
 */
function sanitize_link( $input ) {
	return filter_var( $input, FILTER_SANITIZE_URL );
}

if( class_exists( 'WP_Customize_Control' ) ):
	/**
	 * Adds textarea support to the theme customizer
	 */
	class Customize_Textarea_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
			?>
				<label>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				</label>
			<?php
		}
	}
endif;

?>