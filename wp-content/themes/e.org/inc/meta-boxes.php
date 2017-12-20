<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'ERAMBA_';

global $meta_boxes;

$meta_boxes = array();

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'custom_settings',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Custom Settings', 'eramba' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'page' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => false,

	'fields' => array(
		array(
			'name' => __( 'Subtitle', 'eramba' ),
			'desc' => __( 'Choose custom subtitle for this post.', 'eramba' ),
			'id'   => "{$prefix}page_subtitle",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 3,
		),
		array(
			'name' => __( 'Disable content top padding', 'eramba' ),
			'id'   => "{$prefix}disable_content_top_padding",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
		)
	)
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'custom_downloads',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Additional Settings', 'eramba' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'eramba_downloads' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => false,

	'fields' => array(
		array(
			// Field name - Will be used as label
			'name'  => __( 'Version', 'eramba' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}version",
			'type'  => 'text'
		),
		array(
			'name' => __( 'Release date', 'eramba' ),
			'id'   => "{$prefix}release_date",
			'type' => 'date',

			// jQuery date picker options. See here http://api.jqueryui.com/datepicker
			'js_options' => array(
				'dateFormat'      => 'yy-mm-dd',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		array(
			'name' => __( 'Fixes', 'eramba' ),
			'id'   => "{$prefix}fixes",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		array(
			'name' => __( 'Features', 'eramba' ),
			'id'   => "{$prefix}features",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		array(
			'name' => __( 'File Upload', 'eramba' ),
			'id'   => "{$prefix}file",
			'type' => 'file_advanced',
			'max_file_uploads' => 1,
			'mime_type' => 'application/zip, application/octet-stream, application/x-rar-compressed, application/octet-stream, application/x-gtar, application/x-tar, application/tgz, application/x-compressed-tar' // Leave blank for all file types
		),
		array(
			'name'  => __( 'File URL', 'eramba' ),
			'id'    => "{$prefix}file_url",
			'desc'  => __( '(Optional) In case the file is hosted somewhere', 'eramba' ),
			'type'  => 'url',
			'size' => 75
		),
		array(
			'name'  => __( 'Contact Form 7 ID', 'eramba' ),
			'id'    => "{$prefix}download_form",
			'desc'  => __( '(Optional) If a form submission is required before download', 'eramba' ),
			'type'  => 'number',
			'size' => 30
		),
	)
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'custom_timeline',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Additional Settings', 'eramba' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'eramba_timeline' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => false,

	'fields' => array(
		array(
			'name' => __('Event date', 'eramba'),
			'id'   => "{$prefix}event_date",
			'type' => 'date',
			'desc'  => __('Select a date about when this event happened', 'eramba'),
			'js_options' => array(
				'dateFormat'      => 'yy-mm-dd',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		array(
			'name'     => __('Event type', 'eramba'),
			'id'       => "{$prefix}event_type",
			'type'     => 'select',
			'desc'  => __('Select a type of this event', 'eramba'),
			'options'  => getTimelineTypes(),
			'multiple'    => false,
			'placeholder' => __('Select a type', 'eramba'),
		),
		array(
			'name' => __('Summary', 'eramba'),
			'id'   => "{$prefix}event_summary",
			'type' => 'wysiwyg',
			'raw'  => false,
			'desc'  => __('Enter a short summary about this event', 'eramba'),
			'options' => array(
				'textarea_rows' => 5,
				'teeny'         => true,
				'media_buttons' => false,
			)
		)
	),
	'validation' => array(
		'rules' => array(
			"{$prefix}event_date" => array(
				'required'  => true
			),
			"{$prefix}event_type" => array(
				'required'  => true
			),
			"{$prefix}event_summary" => array(
				'required'  => true
			)
		),
		'messages' => array(
			"{$prefix}event_date" => array(
				'required'  => __('Event date is required', 'eramba'),
			),
			"{$prefix}event_type" => array(
				'required'  => __('Event type is required', 'eramba'),
			),
			"{$prefix}event_summary" => array(
				'required'  => __('Event summary is required', 'eramba'),
			)
		)
	)
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'custom_list_ahead',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Additional Settings', 'eramba' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'eramba_lists_ahead' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => false,

	'fields' => array(
		array(
			// Field name - Will be used as label
			'name'  => __( 'Section', 'eramba' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}list_section",
			'desc'  => __('Section of this item (eg Risk, Security Service...)', 'eramba'),
			'type'  => 'text'
		),
		array(
			'name' => __('Date', 'eramba'),
			'id'   => "{$prefix}list_date",
			'type' => 'date',
			'desc'  => __('Select a date about when this happened', 'eramba'),
			'js_options' => array(
				'dateFormat'      => 'yy-mm-dd',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		array(
			'name'     => __('Type', 'eramba'),
			'id'       => "{$prefix}list_type",
			'type'     => 'select',
			'desc'  => __('Select a type', 'eramba'),
			'options'  => getListsAheadType(),
			'multiple'    => false,
			'placeholder' => __('Select a type', 'eramba'),
		),
		// POST
		array(
			'name'    => __( 'Read more (post)', 'eramba' ),
			'id'      => "{$prefix}list_post",
			'type'    => 'post',

			// Post type
			'post_type' => 'post',
			// Field type, either 'select' or 'select_advanced' (default)
			'field_type' => 'select_advanced',
			'placeholder' => __('Choose a post', 'eramba'),
			// Query arguments (optional). No settings means get all published posts
			'query_args' => array(
				'post_status' => 'publish',
				'posts_per_page' => '-1',
			)
		),
		// Documentation
		array(
			'name'    => __( 'Read more (documentation page)', 'eramba' ),
			'id'      => "{$prefix}list_post_doc",
			'type'    => 'post',
			'desc'  => __('Choose a post or a documentation page for a read more link', 'eramba'),
			// Post type
			'post_type' => 'eramba_documentation',
			// Field type, either 'select' or 'select_advanced' (default)
			'field_type' => 'select_advanced',
			'placeholder' => __('Choose a documentation page', 'eramba'),
			// Query arguments (optional). No settings means get all published posts
			'query_args' => array(
				'post_status' => 'publish',
				'posts_per_page' => '-1',
			)
		),
	),
	'validation' => array(
		'rules' => array(
			"{$prefix}list_date" => array(
				'required'  => true
			),
			"{$prefix}list_type" => array(
				'required'  => true
			),
			/*"{$prefix}event_summary" => array(
				'required'  => true
			)*/
		),
		'messages' => array(
			"{$prefix}list_date" => array(
				'required'  => __('Date is required', 'eramba'),
			),
			"{$prefix}list_type" => array(
				'required'  => __('Type is required', 'eramba'),
			),
			/*"{$prefix}event_summary" => array(
				'required'  => __('Event summary is required', 'eramba'),
			)*/
		)
	)
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'custom_partners',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Additional Settings', 'eramba' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'eramba_partners' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => false,

	'fields' => array(
		array(
			'name' => __( 'Description', 'eramba' ),
			'id'   => "{$prefix}description",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		array(
			// Field name - Will be used as label
			'name'  => __( 'URL', 'eramba' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}url",
			'type'  => 'text'
		),
		array(
			'name' => __( 'Logo', 'eramba' ),
			'id'   => "{$prefix}logo",
			'type' => 'file_advanced',
			'max_file_uploads' => 1,
			'mime_type' => 'image/jpg, image/jpeg, image/png' // Leave blank for all file types
		),
		array(
			'name'     => __( 'Countries', 'eramba'),
			'id'       => "{$prefix}countries",
			'type'     => 'select_advanced',
			'desc'  => __('Select partner\'s country', 'eramba'),
			'options'  => getListOfCountries(),
			'multiple'    => true,
			'placeholder' => __('Select a country', 'eramba'),
		),
	)
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'custom_trainings',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Additional Settings', 'eramba' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'eramba_trainings' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => false,

	'fields' => array(
		array(
			'name'  => __( 'URL', 'eramba' ),
			'id'    => "{$prefix}url",
			'desc'  => __('ID for training without #, etc. "training-1"'),
			'type'  => 'text'
		),
		array(
			'name'  => __( 'Price', 'eramba' ),
			'id'    => "{$prefix}price",
			'type'  => 'text'
		),
		array(
			'name' => __( 'Date', 'eramba' ),
			'id'   => "{$prefix}date",
			'type' => 'date',

			// jQuery date picker options. See here http://api.jqueryui.com/datepicker
			'js_options' => array(
				'dateFormat'      => 'dd/mm/yy',
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		array(
			'name'  => __( 'Slots', 'eramba' ),
			'id'    => "{$prefix}slots",
			'desc'  => __('Number of remaining slots'),
			'type'  => 'number'
		),
	)
);
// 1st meta box
/*$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'standard1111',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Standard Fields', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'post', 'page' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Text', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}text",
			// Field description (optional)
			'desc'  => __( 'Text description', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( 'Default text value', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
		),
		// CHECKBOX
		array(
			'name' => __( 'Checkbox', 'rwmb' ),
			'id'   => "{$prefix}checkbox",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 1,
		),
		// RADIO BUTTONS
		array(
			'name'    => __( 'Radio', 'rwmb' ),
			'id'      => "{$prefix}radio",
			'type'    => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'value1' => __( 'Label1', 'rwmb' ),
				'value2' => __( 'Label2', 'rwmb' ),
			),
		),
		// SELECT BOX
		array(
			'name'     => __( 'Select', 'rwmb' ),
			'id'       => "{$prefix}select",
			'type'     => 'select',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'value1' => __( 'Label1', 'rwmb' ),
				'value2' => __( 'Label2', 'rwmb' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			'std'         => 'value2',
			'placeholder' => __( 'Select an Item', 'rwmb' ),
		),
		// HIDDEN
		array(
			'id'   => "{$prefix}hidden",
			'type' => 'hidden',
			// Hidden field must have predefined value
			'std'  => __( 'Hidden value', 'rwmb' ),
		),
		// PASSWORD
		array(
			'name' => __( 'Password', 'rwmb' ),
			'id'   => "{$prefix}password",
			'type' => 'password',
		),
		// TEXTAREA
		array(
			'name' => __( 'Textarea', 'rwmb' ),
			'desc' => __( 'Textarea description', 'rwmb' ),
			'id'   => "{$prefix}textarea",
			'type' => 'textarea',
			'cols' => 20,
			'rows' => 3,
		),
	),
	'validation' => array(
		'rules' => array(
			"{$prefix}password" => array(
				'required'  => true,
				'minlength' => 7,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			"{$prefix}password" => array(
				'required'  => __( 'Password is required', 'rwmb' ),
				'minlength' => __( 'Password must be at least 7 characters', 'rwmb' ),
			),
		)
	)
);

// 2nd meta box
$meta_boxes[] = array(
	'title' => __( 'Advanced Fields', 'rwmb' ),
	'pages' => array( 'post', 'page' ),

	'fields' => array(
		// HEADING
		array(
			'type' => 'heading',
			'name' => __( 'Heading', 'rwmb' ),
			'id'   => 'fake_id', // Not used but needed for plugin
		),
		// SLIDER
		array(
			'name' => __( 'Slider', 'rwmb' ),
			'id'   => "{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after value
			'prefix' => __( '$', 'rwmb' ),
			'suffix' => __( ' USD', 'rwmb' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 10,
				'max'   => 255,
				'step'  => 5,
			),
		),
		// NUMBER
		array(
			'name' => __( 'Number', 'rwmb' ),
			'id'   => "{$prefix}number",
			'type' => 'number',

			'min'  => 0,
			'step' => 5,
		),
		// DATE
		array(
			'name' => __( 'Date picker', 'rwmb' ),
			'id'   => "{$prefix}date",
			'type' => 'date',

			// jQuery date picker options. See here http://api.jqueryui.com/datepicker
			'js_options' => array(
				'appendText'      => __( '(yyyy-mm-dd)', 'rwmb' ),
				'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		// DATETIME
		array(
			'name' => __( 'Datetime picker', 'rwmb' ),
			'id'   => $prefix . 'datetime',
			'type' => 'datetime',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'stepMinute'     => 15,
				'showTimepicker' => true,
			),
		),
		// TIME
		array(
			'name' => __( 'Time picker', 'rwmb' ),
			'id'   => $prefix . 'time',
			'type' => 'time',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'stepMinute' => 5,
				'showSecond' => true,
				'stepSecond' => 10,
			),
		),
		// COLOR
		array(
			'name' => __( 'Color picker', 'rwmb' ),
			'id'   => "{$prefix}color",
			'type' => 'color',
		),
		// CHECKBOX LIST
		array(
			'name' => __( 'Checkbox list', 'rwmb' ),
			'id'   => "{$prefix}checkbox_list",
			'type' => 'checkbox_list',
			// Options of checkboxes, in format 'value' => 'Label'
			'options' => array(
				'value1' => __( 'Label1', 'rwmb' ),
				'value2' => __( 'Label2', 'rwmb' ),
			),
		),
		// EMAIL
		array(
			'name'  => __( 'Email', 'rwmb' ),
			'id'    => "{$prefix}email",
			'desc'  => __( 'Email description', 'rwmb' ),
			'type'  => 'email',
			'std'   => 'name@email.com',
		),
		// RANGE
		array(
			'name'  => __( 'Range', 'rwmb' ),
			'id'    => "{$prefix}range",
			'desc'  => __( 'Range description', 'rwmb' ),
			'type'  => 'range',
			'min'   => 0,
			'max'   => 100,
			'step'  => 5,
			'std'   => 0,
		),
		// URL
		array(
			'name'  => __( 'URL', 'rwmb' ),
			'id'    => "{$prefix}url",
			'desc'  => __( 'URL description', 'rwmb' ),
			'type'  => 'url',
			'std'   => 'http://google.com',
		),
		// OEMBED
		array(
			'name'  => __( 'oEmbed', 'rwmb' ),
			'id'    => "{$prefix}oembed",
			'desc'  => __( 'oEmbed description', 'rwmb' ),
			'type'  => 'oembed',
		),
		// SELECT ADVANCED BOX
		array(
			'name'     => __( 'Select', 'rwmb' ),
			'id'       => "{$prefix}select_advanced",
			'type'     => 'select_advanced',
			// Array of 'value' => 'Label' pairs for select box
			'options'  => array(
				'value1' => __( 'Label1', 'rwmb' ),
				'value2' => __( 'Label2', 'rwmb' ),
			),
			// Select multiple values, optional. Default is false.
			'multiple'    => false,
			// 'std'         => 'value2', // Default value, optional
			'placeholder' => __( 'Select an Item', 'rwmb' ),
		),
		// TAXONOMY
		array(
			'name'    => __( 'Taxonomy', 'rwmb' ),
			'id'      => "{$prefix}taxonomy",
			'type'    => 'taxonomy',
			'options' => array(
				// Taxonomy name
				'taxonomy' => 'category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'type' => 'checkbox_list',
				// Additional arguments for get_terms() function. Optional
				'args' => array()
			),
		),
		// POST
		array(
			'name'    => __( 'Posts (Pages)', 'rwmb' ),
			'id'      => "{$prefix}pages",
			'type'    => 'post',

			// Post type
			'post_type' => 'page',
			// Field type, either 'select' or 'select_advanced' (default)
			'field_type' => 'select_advanced',
			// Query arguments (optional). No settings means get all published posts
			'query_args' => array(
				'post_status' => 'publish',
				'posts_per_page' => '-1',
			)
		),
		// WYSIWYG/RICH TEXT EDITOR
		array(
			'name' => __( 'WYSIWYG / Rich Text Editor', 'rwmb' ),
			'id'   => "{$prefix}wysiwyg",
			'type' => 'wysiwyg',
			// Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
			'raw'  => false,
			'std'  => __( 'WYSIWYG default value', 'rwmb' ),

			// Editor settings, see wp_editor() function: look4wp.com/wp_editor
			'options' => array(
				'textarea_rows' => 4,
				'teeny'         => true,
				'media_buttons' => false,
			),
		),
		// DIVIDER
		array(
			'type' => 'divider',
			'id'   => 'fake_divider_id', // Not used, but needed
		),
		// FILE UPLOAD
		array(
			'name' => __( 'File Upload', 'rwmb' ),
			'id'   => "{$prefix}file",
			'type' => 'file',
		),
		// FILE ADVANCED (WP 3.5+)
		array(
			'name' => __( 'File Advanced Upload', 'rwmb' ),
			'id'   => "{$prefix}file_advanced",
			'type' => 'file_advanced',
			'max_file_uploads' => 4,
			'mime_type' => 'application,audio,video', // Leave blank for all file types
		),
		// IMAGE UPLOAD
		array(
			'name' => __( 'Image Upload', 'rwmb' ),
			'id'   => "{$prefix}image",
			'type' => 'image',
		),
		// THICKBOX IMAGE UPLOAD (WP 3.3+)
		array(
			'name' => __( 'Thickbox Image Upload', 'rwmb' ),
			'id'   => "{$prefix}thickbox",
			'type' => 'thickbox_image',
		),
		// PLUPLOAD IMAGE UPLOAD (WP 3.3+)
		array(
			'name'             => __( 'Plupload Image Upload', 'rwmb' ),
			'id'               => "{$prefix}plupload",
			'type'             => 'plupload_image',
			'max_file_uploads' => 4,
		),
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'name'             => __( 'Image Advanced Upload', 'rwmb' ),
			'id'               => "{$prefix}imgadv",
			'type'             => 'image_advanced',
			'max_file_uploads' => 4,
		),
		// BUTTON
		array(
			'id'   => "{$prefix}button",
			'type' => 'button',
			'name' => ' ', // Empty name will "align" the button to all field inputs
		),

	)
);*/

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function ERAMBA_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'ERAMBA_register_meta_boxes' );
