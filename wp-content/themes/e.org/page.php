<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<?php if ( have_posts() ) : ?>

				<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php the_content(); ?>

				<?php endwhile; ?>

			<?php endif; ?>
		</div>
		<div class="col-xs-4">
			<?php get_template_part( 'element', 'content-sidebar' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>