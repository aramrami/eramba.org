<?php // Template Name: Benefits ?>
<?php get_header(); ?>

<div class="container">
	
	<?php
	$args = array(
		'post_type' => 'eramba_benefits',
		'orderby' => 'date',
		'order' => 'ASC',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	
	$wp_query = new WP_Query($args);
	$index = 1;
	if ($wp_query->have_posts()) : ?>

		<div id="feature-list" class="row">

		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

			<div class="col-xs-5 <?php if ($index % 2) echo 'col-xs-offset-1'; ?> feature-block">
				<?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
					<div class="feature-icon">
						<div class="feature-icon-align">
							<?php the_post_thumbnail('full'); ?>
						</div>
					</div>
				<?php endif; ?>
				
				<div class="feature-information">
					<h4 class="feature-title"><?php the_title(); ?></h4>
					<div class="feature-content"><?php the_content(); ?></div>
				</div>
			</div>

			<?php $index++; ?>
		<?php endwhile; ?>

		</div>

	<?php else : ?>
	
		<?php echo e_alert(__('We are currently working on the content.', 'eramba')); ?>

	<?php endif; ?>
	
</div>

<?php get_footer(); ?>