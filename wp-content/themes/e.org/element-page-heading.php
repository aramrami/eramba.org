<?php //if (basename(get_page_template(), '.php') != 'home') : ?>
<?php global $hidePageTitle; //var_dump($hidePageTitle); ?>
<?php if (!is_front_page() && empty($hidePageTitle)) : ?>
	<?php
	$extraClass = 'margin-bottom';
	if (rwmb_meta('ERAMBA_disable_content_top_padding', array(), get_the_ID())) {
		$extraClass = '';
	}
	?>
	<div class="page-heading-wrapper <?php echo $extraClass; ?>">
		<div class="container">
			<div class="page-heading-inner">
				<h1 class="page-title-heading">
					<?php
					$page_id = get_the_ID();
					if ( is_home() ) {
						$page_id = get_option('page_for_posts');
						$the_title = get_the_title($page_id);
					}
					elseif (is_archive()) {
						//_e('Archive', 'eramba');
						$the_title = get_theme_mod('archive-title', __('Archive', 'eramba'));
					}
					elseif (is_404()) {
						$the_title = '404';
					}
					else {
						$the_title = get_the_title(get_the_ID());
					}

					echo $the_title;
					?>

				</h1>
				<?php if (is_404()) : ?>
					<h2 class="page-subtitle"><?php _e('The page you are looking for cannot be found.', 'eramba'); ?></h2>
				<?php elseif (rwmb_meta('ERAMBA_page_subtitle', array(), $page_id)) : ?>
					<h2 class="page-subtitle"><?php echo rwmb_meta('ERAMBA_page_subtitle', array(), $page_id); ?></h2>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>