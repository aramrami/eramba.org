<?php // Template Name: Full-width ?>
<?php get_header(); ?>

<div class="container">
	<?php if ( have_posts() ) : ?>

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php the_content(); ?>

		<?php endwhile; ?>

	<?php endif; ?>
</div>

<?php get_footer(); ?>