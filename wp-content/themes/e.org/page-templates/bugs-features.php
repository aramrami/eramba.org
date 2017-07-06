<?php // Template Name: Bugs & Features ?>
<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="boxed-section">
						<h2 class="boxed-section-title"><?php _e('Contact Us', 'eramba'); ?></h2>
						<div class="highlight-box">
							<?php the_content(); ?>
						</div>
					</div>
				</article>

			<?php endwhile; ?>
		</div>
		<div class="col-xs-4">
			<?php
			if ( is_active_sidebar( 'sidebar-bugs-features' ) ) {
				dynamic_sidebar( 'sidebar-bugs-features' );
			}
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>