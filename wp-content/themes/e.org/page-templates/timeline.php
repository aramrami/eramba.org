<?php // Template Name: Timeline

get_header(); ?>

<div class="container">

	<?php
	$args = array(
		'post_type' => 'eramba_timeline',
		'orderby' => 'meta_value',
		'meta_key'  => 'ERAMBA_event_date',
		'meta_type' => 'DATE',
		'order' => 'DESC',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	
	$wp_query = new WP_Query($args);
	if ($wp_query->have_posts()) : ?>

		<div class="timeline">

			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<?php
				$type = rwmb_meta('ERAMBA_event_type', array(), get_the_ID());
				$summary = rwmb_meta('ERAMBA_event_summary', array(), get_the_ID());

				$eventTimestamp = strtotime(rwmb_meta('ERAMBA_event_date', array(), get_the_ID()));
				$date = strtolower(date('jS F', $eventTimestamp));
				$year = date('Y', $eventTimestamp);
				?>
				<div class="timeline-item timeline-item-<?php echo $type; ?>">
					<div class="row">
						<div class="col-xs-3 timeline-date-col">
							<div class="timeline-date-wrapper">
								<div class="timeline-date">
									<?php echo $date; ?><br />
									<span class="timeline-year"><?php echo $year; ?></span>
								</div>
							</div>
						</div>
						<div class="col-xs-8 col-xs-offset-4">
							<div class="timeline-content-wrapper">
								<div class="timeline-content-container">
									<div class="timeline-content">
										<h2><?php the_title(); ?></h2>
										<div class="timeline-summary">
											<?php echo $summary; ?>
										</div>

										<a href="<?php echo get_permalink(); ?>" class="read-more">
											<?php _e('Read more', 'eramba'); ?> <i class="fa fa-chevron-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>

		</div>

	<?php else : ?>
	
		<?php echo e_alert(__('We are currently working on the content.', 'eramba')); ?>

	<?php endif; ?>
	
</div>

<?php get_footer(); ?>