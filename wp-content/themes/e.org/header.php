<?php
/**
 * The Header for our theme.
 */
?><!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<title><?php eramba_title(); ?></title>

	<link rel="icon" href="<?php echo THEME_IMG . 'favicon.png'; ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link href='//fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,700,400' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>

	<link rel="stylesheet" id="eramba-main-css" href="//<?= $_SERVER['HTTP_HOST'] ?>/wp-content/themes/e.org/css/styles.css?ver=<?= (new \DateTime())->getTimestamp() ?>" type="text/css" media="all">

	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	  (adsbygoogle = window.adsbygoogle || []).push({
	    google_ad_client: "ca-pub-8949612246244461",
	    enable_page_level_ads: true
	  });
	</script>
</head>

<body <?php body_class(); ?>>

	<div class="header-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-3">
					<a class="logo-link" href="<?php echo home_url( '/' ); ?>" title="<?php _e( 'Home', 'eramba' ); ?>">
						<img src="<?php echo THEME_IMG . 'logo.png'; ?>" class="img-responsive" />
					</a>
				</div>
				<div class="col-xs-9">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'primary',
						'depth' => 2,
						'container' => 'div',
						'container_class' => 'collapse navbar-collapse pull-right',
						'container_id' => 'bs-example-navbar-collapse-1',
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
						'walker' => new wp_bootstrap_navwalker()
					));
					?>
				</div>
			</div>
		</div>
	</div>

	<?php echo get_template_part('element', 'page-heading'); ?>

	<div class="main-content">
