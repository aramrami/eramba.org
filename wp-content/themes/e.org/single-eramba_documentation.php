<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<?php if ( have_posts() ) : ?>

				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('documentation-article'); ?>>

						<?php the_content(); ?>

					</article><!-- #post -->

				<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
		</div>

		<div class="col-xs-4">
			<?php
			if ( is_active_sidebar( 'doc-sidebar' ) ) {
				dynamic_sidebar( 'doc-sidebar' );
			}
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>