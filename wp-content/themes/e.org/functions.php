<?php
// TEMPORARY STUFF
// add_action('template_redirect', 'hooker');
// function hooker() {
// 	if (!is_user_logged_in()) {
// 		echo 'Please login at /wp-admin to access the website';
// 		exit;
// 	}
// }

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );
define( 'THEME_JS', THEME_URI . '/js/' );
define( 'THEME_CSS', THEME_URI . '/css/' );
define( 'THEME_IMG', THEME_URI . '/img/' );
define( 'THEME_INC', THEME_DIR . '/inc/' );

// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( THEME_URI . '/inc/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( THEME_DIR . '/inc/meta-box' ) );

require_once('constants.php');

// Theme Customizer Options
require_once( THEME_INC . 'customizer.php' );

// Register Custom Navigation Walker
require_once( THEME_INC . 'wp_bootstrap_navwalker.php');

// Meta box scripts
require_once( RWMB_DIR . 'meta-box.php' );
require_once( THEME_INC . 'meta-boxes.php' );

// Custom shortcodes for this theme
require_once( THEME_INC . 'shortcodes.php' );

// Contact form 7 custom downloads
require_once( THEME_INC . 'eramba-cf7.class.php' );

$ErambaContactForm7 = new ErambaContactForm7();

/**
 * Sets up the content width value based on the theme's design.
 */
if ( ! isset( $content_width ) )
	$content_width = 970;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * eramba supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 */
function eramba_setup() {
	/*
	 * Makes eramba available for translation.
	 *
	 * Translations can be added to the /lang/ directory.
	 * If you're building a theme based on eramba, use a find and
	 * replace to change 'eramba' to the name of your theme in all
	 * template files.
	 */
	load_theme_textdomain( 'eramba', THEME_DIR . '/lang' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'html5', array(
		'comment-form', 'comment-list'
	) );

	/*
	 * This theme supports all available post formats by default.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image', 'link') );
	/*add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
		'gallery', 'image'
	) );*/

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menu( 'primary', __( 'Primary Menu', 'eramba' ) );

	/*
	 * This theme uses a custom image size for featured images
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 601, 361, true );
	add_image_size( 'post-thumb', 617, 300, true );
	add_image_size( 'post-longer-thumb', 617, 350, true );
	/*add_image_size( 'post-single', 691, 361, true );
	add_image_size( 'team-member', 300, 220, true );
	add_image_size( 'portfolio-3-columns', 300, 225, true );
	add_image_size( 'portfolio-item', 600, 450, true );
	add_image_size( 'portfolio-single', 465, 350, true );
	add_image_size( 'widget-thumb', 100, 100, true );*/
	add_image_size( 'widget-thumb', 64, 64, true );
}
add_action( 'after_setup_theme', 'eramba_setup' );

remove_action('wp_head', 'wp_generator');

/**
 * Enqueue scripts and styles for front end.
 */
function eramba_scripts_styles() {
	// Loads our main stylesheet.
	wp_enqueue_style( 'eramba-style', get_stylesheet_uri() ) ;

	wp_enqueue_style( 'bootstrap', THEME_CSS . 'bootstrap.min.css');
	wp_enqueue_style( 'fontawesome', THEME_CSS . 'font-awesome.min.css');
	wp_enqueue_style( 'jquery-fancybox', THEME_CSS . 'jquery.fancybox.css');
	wp_enqueue_style( 'jquery-nanoscroller', THEME_CSS . 'nanoscroller.css');
	wp_enqueue_style( 'eramba-main', THEME_CSS . 'styles.css', array(), '20112016' );

	wp_deregister_script( 'jquery' );
	wp_register_script('jquery', THEME_JS . 'jquery-1.11.2.min.js');
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap', THEME_JS . 'bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'jquery-fancybox', THEME_JS . 'jquery.fancybox.js', array( 'jquery' ) );
	wp_enqueue_script( 'jquery-fancybox-media', THEME_JS . 'jquery.fancybox-media.js', array( 'jquery', 'jquery-fancybox' ) );
	wp_enqueue_script( 'jquery-nanoscroller', THEME_JS . 'jquery.nanoscroller.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'eramba-custom', THEME_JS . 'custom.js', array( 'jquery' ), '01112016' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'eramba_scripts_styles' );


/**
 * Create custom post types.
 */
function eramba_custom_post_types() {
	//features
	$labels = array(
		'name' => _x('Features', 'post type general name', 'eramba'),
		'singular_name' => _x('Feature', 'post type singular name', 'eramba'),
		'add_new' => _x('Add New', 'Feature', 'eramba'),
		'add_new_item' => __('Add New Feature', 'eramba'),
		'edit_item' => __('Edit Feature', 'eramba'),
		'new_item' => __('New Feature', 'eramba'),
		'view_item' => __('View Feature', 'eramba'),
		'search_items' => __('Search Feature', 'eramba'),
		'not_found' =>  __('Nothing found', 'eramba'),
		'not_found_in_trash' => __('Nothing found in Trash', 'eramba')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'capability_type' => 'post',
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'features'),
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
	);
	register_post_type('eramba_features', $args);

	//benefits
	$labels = array(
		'name' => _x('Benefits', 'post type general name', 'eramba'),
		'singular_name' => _x('Benefit', 'post type singular name', 'eramba'),
		'add_new' => _x('Add New', 'Benefit', 'eramba'),
		'add_new_item' => __('Add New Benefit', 'eramba'),
		'edit_item' => __('Edit Benefit', 'eramba'),
		'new_item' => __('New Benefit', 'eramba'),
		'view_item' => __('View Benefit', 'eramba'),
		'search_items' => __('Search Benefit', 'eramba'),
		'not_found' =>  __('Nothing found', 'eramba'),
		'not_found_in_trash' => __('Nothing found in Trash', 'eramba')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'capability_type' => 'post',
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'benefits'),
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
	);
	register_post_type('eramba_benefits', $args);

	//enterprise services
	$labels = array(
		'name' => _x('Enterprise services', 'post type general name', 'eramba'),
		'singular_name' => _x('Enterprise service', 'post type singular name', 'eramba'),
		'add_new' => _x('Add New', 'Enterprise service', 'eramba'),
		'add_new_item' => __('Add New Enterprise service', 'eramba'),
		'edit_item' => __('Edit Enterprise service', 'eramba'),
		'new_item' => __('New Enterprise service', 'eramba'),
		'view_item' => __('View Enterprise service', 'eramba'),
		'search_items' => __('Search Enterprise service', 'eramba'),
		'not_found' =>  __('Nothing found', 'eramba'),
		'not_found_in_trash' => __('Nothing found in Trash', 'eramba')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'capability_type' => 'post',
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'enterprise-service'),
		'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
	);
	register_post_type('eramba_enterprise', $args);

	//documentation
	$labels = array(
		'name' => _x('Documentation', 'post type general name', 'eramba'),
		'singular_name' => _x('Documentation', 'post type singular name', 'eramba'),
		'add_new' => _x('Add New', 'Documentation', 'eramba'),
		'add_new_item' => __('Add New Documentation', 'eramba'),
		'edit_item' => __('Edit Documentation', 'eramba'),
		'new_item' => __('New Documentation', 'eramba'),
		'view_item' => __('View Documentation', 'eramba'),
		'search_items' => __('Search Documentation', 'eramba'),
		'not_found' =>  __('Nothing found', 'eramba'),
		'not_found_in_trash' => __('Nothing found in Trash', 'eramba')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'capability_type' => 'post',
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'documentation'),
		'supports' => array('title', 'editor', 'revisions', 'page-attributes', 'post-formats'),
	);
	register_post_type('eramba_documentation', $args);

	$labels = array(
		'name'              => _x( 'Sections', 'taxonomy general name', 'eramba' ),
		'singular_name'     => _x( 'Section', 'taxonomy singular name', 'eramba' ),
		'search_items'      => __( 'Search Sections', 'eramba' ),
		'all_items'         => __( 'All Sections', 'eramba' ),
		'parent_item'       => __( 'Parent Section', 'eramba' ),
		'parent_item_colon' => __( 'Parent Section:', 'eramba' ),
		'edit_item'         => __( 'Edit Section', 'eramba' ),
		'update_item'       => __( 'Update Section', 'eramba' ),
		'add_new_item'      => __( 'Add New Section', 'eramba' ),
		'new_item_name'     => __( 'New Section Name', 'eramba' ),
		'menu_name'         => __( 'Section', 'eramba' ),
	);

	$documentation_section_args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'documentation-section' ),
		'show_admin_column' => true
	);
	register_taxonomy( 'eramba_documentation_section', 'eramba_documentation', $documentation_section_args );

	//downloads
	$labels = array(
		'name' => _x('Downloads', 'post type general name', 'eramba'),
		'singular_name' => _x('Download', 'post type singular name', 'eramba'),
		'add_new' => _x('Add New', 'Download', 'eramba'),
		'add_new_item' => __('Add New Download', 'eramba'),
		'edit_item' => __('Edit Download', 'eramba'),
		'new_item' => __('New Download', 'eramba'),
		'view_item' => __('View Download', 'eramba'),
		'search_items' => __('Search Download', 'eramba'),
		'not_found' =>  __('Nothing found', 'eramba'),
		'not_found_in_trash' => __('Nothing found in Trash', 'eramba')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'capability_type' => 'post',
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'download'),
		'supports' => array('title', 'revisions', 'custom-fields'),
	);
	register_post_type('eramba_downloads', $args);

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'eramba' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'eramba' ),
		'search_items'      => __( 'Search Categories', 'eramba' ),
		'all_items'         => __( 'All Categories', 'eramba' ),
		'parent_item'       => __( 'Parent Category', 'eramba' ),
		'parent_item_colon' => __( 'Parent Category:', 'eramba' ),
		'edit_item'         => __( 'Edit Category', 'eramba' ),
		'update_item'       => __( 'Update Category', 'eramba' ),
		'add_new_item'      => __( 'Add New Category', 'eramba' ),
		'new_item_name'     => __( 'New Category Name', 'eramba' ),
		'menu_name'         => __( 'Categories', 'eramba' ),
	);

	$download_section_args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'download-section' ),
		'show_admin_column' => true
	);
	register_taxonomy( 'eramba_download_sections', 'eramba_downloads', $download_section_args );

	//timeline
	$labels = array(
		'name' => _x('Timeline', 'post type general name', 'eramba'),
		'singular_name' => _x('Timeline', 'post type singular name', 'eramba'),
		'add_new' => _x('Add New', 'Timeline item', 'eramba'),
		'add_new_item' => __('Add New Timeline item', 'eramba'),
		'edit_item' => __('Edit Timeline item', 'eramba'),
		'new_item' => __('New Timeline item', 'eramba'),
		'view_item' => __('View Timeline item', 'eramba'),
		'search_items' => __('Search Timeline', 'eramba'),
		'not_found' =>  __('Nothing found', 'eramba'),
		'not_found_in_trash' => __('Nothing found in Trash', 'eramba')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'capability_type' => 'post',
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'timeline'),
		'supports' => array('title', 'editor', 'comments'),
	);
	register_post_type('eramba_timeline', $args);

	//downloads
	$labels = array(
		'name' => _x('Lists Ahead', 'post type general name', 'eramba'),
		'singular_name' => _x('List Ahead', 'post type singular name', 'eramba'),
		'add_new' => _x('Add New', 'List Ahead', 'eramba'),
		'add_new_item' => __('Add New List Ahead', 'eramba'),
		'edit_item' => __('Edit List Ahead', 'eramba'),
		'new_item' => __('New List Ahead', 'eramba'),
		'view_item' => __('View List Ahead', 'eramba'),
		'search_items' => __('Search List Ahead', 'eramba'),
		'not_found' =>  __('Nothing found', 'eramba'),
		'not_found_in_trash' => __('Nothing found in Trash', 'eramba')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'capability_type' => 'post',
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'list-ahead'),
		'supports' => array('title', 'revisions', 'custom-fields'),
	);
	register_post_type('eramba_lists_ahead', $args);

	//trainings
	$labels = array(
		'name' => _x('Trainings', 'post type general name', 'eramba'),
		'singular_name' => _x('Training', 'post type singular name', 'eramba'),
		'add_new' => _x('Add Training', 'Timeline item', 'eramba'),
		'add_new_item' => __('Add New Training', 'eramba'),
		'edit_item' => __('Edit Training', 'eramba'),
		'new_item' => __('New Training item', 'eramba'),
		'view_item' => __('View Training item', 'eramba'),
		'search_items' => __('Search Training', 'eramba'),
		'not_found' =>  __('Nothing found', 'eramba'),
		'not_found_in_trash' => __('Nothing found in Trash', 'eramba')
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'hierarchical' => false,
		'capability_type' => 'post',
		'has_archive' => 'true',
		'rewrite' => array('slug' => 'training'),
		'supports' => array('title', 'editor'),
	);
	register_post_type('eramba_trainings', $args);

/*	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'eramba' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'eramba' ),
		'search_items'      => __( 'Search Categories', 'eramba' ),
		'all_items'         => __( 'All Categories', 'eramba' ),
		'parent_item'       => __( 'Parent Category', 'eramba' ),
		'parent_item_colon' => __( 'Parent Category:', 'eramba' ),
		'edit_item'         => __( 'Edit Category', 'eramba' ),
		'update_item'       => __( 'Update Category', 'eramba' ),
		'add_new_item'      => __( 'Add New Category', 'eramba' ),
		'new_item_name'     => __( 'New Category Name', 'eramba' ),
		'menu_name'         => __( 'Categories', 'eramba' ),
	);

	$list_ahead_args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'list-ahead-category' ),
		'show_admin_column' => true
	);
	register_taxonomy( 'eramba_list_ahead_categories', 'eramba_lists_ahead', $list_ahead_args );*/
}
add_action( 'init', 'eramba_custom_post_types' );

function getTimelineTypes() {
	return array(
		'news' => __('General News', 'eramba'),
		'patch' => __('Patch', 'eramba'),
		'feature' => __('Feature', 'eramba'),
		'release' => __('Release', 'eramba')
	);
}

function getListsAheadType() {
	return array(
		'patch' => __('Patch', 'eramba'),
		'feature' => __('Feature', 'eramba')
	);
}

/**
* add order column to admin listing screen for header text
*/
function add_new_eramba_enterprise_column($eramba_enterprise_columns) {
	$date = $eramba_enterprise_columns['date'];
	unset($eramba_enterprise_columns['date']);

	$eramba_enterprise_columns['menu_order'] = __('Order', 'eramba');
	$eramba_enterprise_columns['date'] = $date;

	return $eramba_enterprise_columns;
}
add_action('manage_edit-eramba_enterprise_columns', 'add_new_eramba_enterprise_column');

/**
* show custom order column values
*/
function show_order_column($name){
  global $post;

  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
   default:
      break;
   }
}
add_action('manage_eramba_enterprise_posts_custom_column','show_order_column');

/**
* make column sortable
*/
function order_column_register_sortable($columns){
  $columns['menu_order'] = 'menu_order';
  return $columns;
}
add_filter('manage_edit-eramba_enterprise_sortable_columns','order_column_register_sortable');


function eramba_columns_head_only_downloads($defaults) {
	$date = $defaults['date'];
	unset($defaults['date']);

	$defaults['download_count'] = __('Downloads', 'eramba');
	$defaults['date'] = $date;

	return $defaults;
}
function eramba_columns_content_only_downloads($column_name, $post_ID) {
	global $ErambaContactForm7;

	if ($column_name == 'download_count') {
		$meta = get_post_meta($post_ID, $ErambaContactForm7->downloadCountMetaKey, true);
		if (empty($meta)) {
			echo '-';
		}
		else {
			echo $meta;
		}
	}
}
add_filter('manage_eramba_downloads_posts_columns', 'eramba_columns_head_only_downloads', 10);
add_action('manage_eramba_downloads_posts_custom_column', 'eramba_columns_content_only_downloads', 10, 2);

/**
 * Registers widget areas.
 */
function eramba_widgets_init() {
	register_sidebar(array(
		'name'          => __('Main Sidebar', 'eramba'),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears in the sidebar section of the site.', 'eramba' ),
		'before_widget' => '<aside id="%1$s" class="content-sidebar-item %2$s">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h3 class="sidebar-title"><i class="fa"></i>',
		'after_title'   => '</h3><div class="sidebar-inner">',
	));

	register_sidebar(array(
		'name'          => __('Bugs & Features Sidebar', 'eramba'),
		'id'            => 'sidebar-bugs-features',
		'description'   => __( 'Bugs features sidebar.', 'eramba' ),
		'before_widget' => '<aside id="%1$s" class="content-sidebar-item %2$s">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h3 class="sidebar-title"><i class="fa"></i>',
		'after_title'   => '</h3><div class="sidebar-inner">',
	));

	register_sidebar(array(
		'name'          => __( 'Documentation Sidebar', 'eramba' ),
		'id'            => 'doc-sidebar',
		'description'   => __( 'Appears in the Documentation sidebar.', 'eramba' ),
		'before_widget' => '<aside id="%1$s" class="content-sidebar-item %2$s">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h3 class="sidebar-title"><i class="fa"></i>',
		'after_title'   => '</h3><div class="sidebar-inner">',
	));

	for ($i = 1; $i < 5; $i++) {
		register_sidebar(array(
			'name'          => sprintf( __( 'Footer Sidebar %s', 'eramba' ), '#' . $i ),
			'id'            => 'footer-sidebar-' . $i,
			'description'   => __( 'Appears in the footer section of the site.', 'eramba' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		));
	}

	// include custom theme widgets
	require_once ( THEME_INC . 'widgets.php' );

	// register custom widgets
	register_widget( 'Eramba_Widget_Latest_News' );
	register_widget('Eramba_Widget_Table_Of_Contents');
	register_widget('WP_Widget_Video');
}
add_action( 'widgets_init', 'eramba_widgets_init' );


/**
 * Flush rewrite rules upon theme activation.
 */
function my_rewrite_flush() {
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );


/**
 * Custom theme title.
 */
function eramba_title() {
	wp_title('');
	if(wp_title('', false)) {
		echo ' - ';
	}

	bloginfo('name');
	if(is_home() || is_front_page()) {
		echo ' - '; bloginfo('description');
	}
}

function twentyfifteen_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'twentyfifteen' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'twentyfifteen' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'twentyfifteen' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

function eramba_pagination( $pages = '', $range = 2 ) {
	$showitems = ($range * 2) + 1;

	global $paged;
	if ( empty( $paged ) ) $paged = 1;

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}

	echo "<div class='pagination'>";
	if ( 1 != $pages ) {

		if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) {
			echo "<a href='".get_pagenum_link(1)."' title='" . __( 'First Page', 'eramba' ) . "' class=''><i class='fa fa-angle-double-left'></i></a>";
		}
		/*if ( $paged > 1 && $showitems < $pages ) {
			echo "<a href='".get_pagenum_link($paged - 1)."' title='" . __( 'Previous Page', 'eramba' ) . "' class=''><i class='fa fa-angle-left'></i></a>";
		}*/

		for ( $i=1; $i <= $pages; $i++ ) {
			if ( 1 != $pages && ( ! ( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) ) {
				echo ($paged == $i) ? "<span class='current ' disabled>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
			}


		}

		/*if ( $paged < $pages && $showitems < $pages ) {
			echo "<a href='".get_pagenum_link($paged + 1)."' title='" . __( 'Next Page', 'eramba' ) . "' class=''>".($paged + 1)."</a>";
		}*/
		if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) {
			echo "<a href='".get_pagenum_link($pages)."' title='" . __( 'Last Page', 'eramba' ) . "' class=''><i class='fa fa-angle-double-right'></i></a>";
		}

	} else {
		echo "<span class='current'>".$pages."</span>";
	}
	echo "</div>\n";
}

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


/**
 * Newsletter ajax form handler.
 */
function ajax_newsletter_form_handler() {
	// get IP
	$ip_addr = $_SERVER['REMOTE_ADDR'];
	$email = $_POST['uemail'];

	if ( ! filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		echo json_encode( array( "status" => "error" ) );
		die();
	}

	// use mail adress from WP Admin if there is none set in theme options panel
	$email_to = ( get_theme_mod( 'contact-email' ) != '' ) ? get_theme_mod( 'contact-email' ) : get_option( 'admin_email' );

	$subject  = __( 'Newsletter Form Submission', 'eramba' );
	$body     = sprintf( __( 'A user wants to subscribe to %1$s newsletter.', 'eramba' ), get_bloginfo( 'name' ) ) . "\n\n" .
	            __( 'E-mail:', 'eramba' ) . ' ' . $email . "\n" .
	            __( 'IP:', 'eramba' ) . ' ' . $ip_addr . "\n";

	$headers  = 'From: ' . $email . "\r\n";

	// send mail via wp mail function
	$mail = wp_mail( $email_to, $subject, $body, $headers );

	if ( $mail )
		echo json_encode( array( "status" => "success" ) );
	else
		echo json_encode( array( "status" => "error" ) );

	die();
}
add_action( 'wp_ajax_newsletter_form_handler', 'ajax_newsletter_form_handler' );
add_action( 'wp_ajax_nopriv_newsletter_form_handler', 'ajax_newsletter_form_handler' );


function makeAnchor($text) {
	// The Regular Expression filter
	$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

	// The Text you want to filter for urls
	//$text = "The text you want to filter goes here. http://google.com";

	// Check if there is a url in the text
	if(preg_match($reg_exUrl, $text, $url)) {

	       // make the urls hyper links
	       return preg_replace($reg_exUrl, '<a href="'.$url[0].'">'.$url[0].'</a> ', $text);

	} else {

	       // if no urls in the text just return the text
	       return $text;

	}
}



/**
 * Adds SEO meta tags to header if any.
 */
function seo_meta_tags() { ?>
	<?php if ( get_theme_mod( 'meta-author', false ) ) : ?>
		<meta name="author" content="<?php echo get_theme_mod( 'meta-author' ); ?>" />
	<?php endif; ?>

	<?php if ( get_theme_mod( 'meta-description', false ) ) : ?>
		<meta name="description" content="<?php echo get_theme_mod( 'meta-description' ); ?>" />
	<?php endif; ?>

	<?php if ( get_theme_mod( 'meta-keywords', false ) ) : ?>
		<meta name="keywords" content="<?php echo get_theme_mod( 'meta-keywords' ); ?>" />
	<?php endif; ?>
<?php }
add_action( 'wp_head', 'seo_meta_tags' );

/**
 * Adds tracking code to header if any.
 */
function tracking_code() { ?>
	<?php if ( get_theme_mod( 'tracking_code', false ) ) : ?>
		<script type="text/javascript">
			<?php echo get_theme_mod( 'tracking_code' ); ?>
		</script>
	<?php endif; ?>
<?php }
add_action( 'wp_head', 'tracking_code' );

/**
 * Adds custom javascript to header if any.
 */
function custom_js() { ?>
	<?php if ( get_theme_mod( 'custom_js', false ) ) : ?>
		<script type="text/javascript">
			<?php echo get_theme_mod( 'custom_js' ); ?>
		</script>
	<?php endif; ?>
<?php }
add_action( 'wp_head', 'custom_js' );

/**
 * Adds custom styles to header if any.
 */
function custom_css() { ?>
	<?php if ( get_theme_mod( 'custom_css', false ) ) : ?>
		<style type="text/css">
			<?php echo get_theme_mod( 'custom_css' ); ?>
		</style>
	<?php endif; ?>
<?php }
add_action( 'wp_head', 'custom_css' );


function tag_cloud_custom($args = array()) {
	$args['number'] = 10;
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'tag_cloud_custom' );


add_filter( 'widget_text', 'do_shortcode');

/////////

function e_alert($content, $type = 'info') {
	return do_shortcode('[bs_notification type="' . $type . '"]' . $content . '[/bs_notification]');
}

function my_myme_types($mime_types){
    $mime_types['tgz'] = 'application/tgz'; //Adding avi extension
    //unset($mime_types['pdf']); //Removing the pdf extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);


/**
 * Track external access to special link.
 */
function track_external_links() {
	$params = explode('/', $_SERVER["REQUEST_URI"]);
	$params = array_reverse($params);
	foreach ($params as $key => $param) {
		if ($param == 'enterprise-services' && $params[$key+1] != 'resources') {
			$postUrl = get_permalink(1741);

			if (!empty($postUrl)) {
				wp_redirect($postUrl);
				exit;
			}
		}
	}

	$params = explode('/', $_SERVER["REQUEST_URI"]);
	if ($params[count($params)-1] == 'post' || (isset($params[count($params)-2]) && $params[count($params)-2] == 'post')) {
		$postUrl = get_permalink(2002);

		if (!empty($postUrl)) {
			wp_redirect($postUrl);
			exit;
		}
	}
}
add_action('after_setup_theme', 'track_external_links');


function handle_download_routes() {
	if (!session_id()) {
		session_start();
	}

	if (empty($_SESSION['download-form-submitted']) || ($_SESSION['download-form-submitted'] !== session_id())) {
		return false;
	}

	$path = WP_CONTENT_DIR . DIRECTORY_SEPARATOR . 'uploads'.DIRECTORY_SEPARATOR.'download-packages'.DIRECTORY_SEPARATOR;
	$downloads = array(
		// 'virtual-image' => $path . 'virtual-image.iso',
		// 'virtual-image' => 'https://s3-eu-west-1.amazonaws.com/downloadseramba/eramba_community_106000.ova',
		'virtual-image' => $path . 'eramba_community_106000-version2.ova',
		'tgz' => $path . 'eramba_community_106000.tgz',
		// 'cloud' => $path . 'cloud.zip'
	);

	$downloads = array(
		'virtual-image' => array(
			'path' => $path . 'eramba_community_106000-version2.ova',
			// 'path' => 'https://s3-eu-west-1.amazonaws.com/downloadseramba/eramba_community_106000.ova',
			'contentType' => 'application/vmware'
		),
		'tgz' => array(
			'path' => $path . 'eramba_community-release-c1.0.6.000.zip',
			'contentType' => 'application/zip'
		)
	);

	$parse = (parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));//exit;
	if (!empty($parse['query'])) {
		$args = wp_parse_args($parse['query']);

		$e = explode('&', $parse['query']);
		$e = explode('=', $parse['query']);
		if (isset($args['download-package'])) {
			$package = $args['download-package'];
			$downloadItem = isset($downloads[$package]) ? $downloads[$package] : false;

			if ($downloadItem) {
				header("Content-type: " . $downloadItem['contentType'],true,200);
			    header("Content-Disposition: attachment; filename=\"".basename($downloadItem['path'])."\"");
			    header("Content-Length: ".filesize($downloadItem['path']));
			    header("Pragma: no-cache");
			    header("Expires: 0");
			    ob_clean();
				ob_end_flush();
			    echo readfile($downloadItem['path']);
			    exit();
			}
			else {
				wp_redirect(home_url());exit;
			}
		}
	}

}
add_action('after_setup_theme', 'handle_download_routes');

/**
 * custom redirects.
 */
function custom_url_redirects() {
	$customRedirects = array(
		'license' => 'https://docs.google.com/document/d/1-3vbjQx9h2yupox3FVMbWuS7W07GE5CC1wa70hI-sJM/',
		'tc' => 'https://docs.google.com/document/d/1DzJWu9kH5gllFlFV9LLstuI4eGbhBwhXHhZ4KqGAI70/',
		'payments' => 'https://docs.google.com/document/d/1VkTCCD2hh3l9sgk-5VIrbuAbCEtl3BSXSG2uiJEgeP8/',
		'tc_saas_enterprise' => 'https://docs.google.com/document/d/1OwimW4_coRaFMQFmYU2Xy23uZ4qlwHdVMCg8Dpl7zws/'
	);

	$params = explode('/', $_SERVER["REQUEST_URI"]);
	$params = array_reverse($params);

	if (in_array($params[0], array_keys($customRedirects))) {
		wp_redirect($customRedirects[$params[0]]);
		exit;
	}
}
add_action('after_setup_theme', 'custom_url_redirects');

if ( !function_exists('wpex_fix_shortcodes') ) {
    function wpex_fix_shortcodes($content){
        $array = array (
            '<p>[' => '[',
            ']</p>' => ']',
            ']<br />' => ']'
        );
        $content = strtr($content, $array);
        return $content;
    }
    // add_filter('the_content', 'wpex_fix_shortcodes');
}

// fix theme's "autop" functionality that breaks wpforo
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$foroStyleFixCond = is_plugin_active('wpforo/wpforo.php');
$foroStyleFixCond &= function_exists('is_wpforo_page') && is_wpforo_page();

if ($foroStyleFixCond) {
	remove_filter('the_content', 'wpautop', 12);
}
