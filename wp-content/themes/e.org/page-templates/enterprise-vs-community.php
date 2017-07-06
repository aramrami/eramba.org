<?php // Template Name: Enterprise vs community

get_header(); ?>

<div class="gray-color-wrapper padding-bottom-15">
	<div class="container">
		<div class="row">
			<div class="col-xs-7">
				<h3>Weekly Vs. Yearly Updates</h3>
				<p>
					<span class="larger-text">While our community version gets revised once a year our enterprise release gets weekly updates released every month. This gives our enterprise subscriptors the latest patches and features!</span>
				</p>
				<p>
					<strong>Use this page to see what are the current differences in between releases. Once a year many of these updates will be passed to our community release.</strong>
				</p>
			</div>
			<div class="col-xs-5 static">
				<p>
					<img class="about-us-img2 center-block" src="<?php echo THEME_IMG . 'enterprise.png'; ?>" alt="" draggable="false" width="120%"> <!-- width="574" -->
				</p>
			</div>
		</div>
	</div>
</div>
<?php
$PatchesArgs = array(
	'post_type' => 'eramba_lists_ahead',
	'orderby' => 'meta_value',
	'meta_key'  => 'ERAMBA_list_section',
	// 'meta_type' => 'DATE',
	'order' => 'ASC',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'meta_query' => array(
		array(
			'key'     => 'ERAMBA_list_type',
			'value'   => 'patch'
		),
	),
);



$FeaturesArgs = array(
	'post_type' => 'eramba_lists_ahead',
	'orderby' => 'meta_value',
	'meta_key'  => 'ERAMBA_list_section',
	// 'meta_type' => 'DATE',
	'order' => 'ASC',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'meta_query' => array(
		array(
			'key'     => 'ERAMBA_list_type',
			'value'   => 'feature'
		),
	),
);

?>
<div class="white-color-wrapper">
	<div class="container text-center">
		<div class="col-xs-6">
			<div class="blue-color-border margin-left--15">
				<?php
				$patches_query = new WP_Query($PatchesArgs);
				?>
				<p class="h1 number"><?php echo count($patches_query->posts); ?></p>
				<p>
					<span class="larger-text">Number of patches that enterprise customers got since the last community release.</span>
				</p>
				<!-- <a>
					<strong>See details here</strong>
				</a> -->
			</div>
		</div>
		<div class="col-xs-6">
			<div class="blue-color-border margin-right--15">
				<?php
				$features_query = new WP_Query($FeaturesArgs);
				?>
				<p class="h1 number"><?php echo count($features_query->posts); ?></p>
				<p>
					<span class="larger-text">Number of new features that enterprise customers got since the last community release.</span>
				</p>
				<!-- <a>
					<strong>See details here</strong>
				</a> -->
			</div>
		</div>
	</div>
</div>
<div class="white-color-wrapper">
	<div class="container">
		<?php
		wp_reset_query();
		wp_reset_postdata();
		$features_query = new WP_Query($FeaturesArgs);
		if ($features_query->have_posts()) : ?>

			<h4 class="margin-bottom-15">List of features ahead of Community</h4>
			<table class="table table-diff margin-bottom-60" style="">
				<thead>
					<tr class="info">
						<th>Section</th>
						<th>Feature name</th>
						<th>Release Date</th>
					</tr>
				</thead>
				<tbody>
					<?php while ( $features_query->have_posts() ) : $features_query->the_post(); ?>
						<?php get_template_part( 'element', 'diff-row' ); ?>
					<?php endwhile; ?>
				</tbody>
			</table>

		<?php endif; ?>

		<?php
		wp_reset_query();
		wp_reset_postdata();

		$patches_query = new WP_Query($PatchesArgs);
		if ($patches_query->have_posts()) : ?>

			<h4 class="margin-bottom-15">List of patches ahead of Community</h4>
			<table class="table table-diff margin-bottom-60"  style="">
				<thead>
					<tr class="info">
						<th>Section</th>
						<th>Patch name</th>
						<th>Release Date</th>
					</tr>
				</thead>
				<tbody>
					<?php while ( $patches_query->have_posts() ) : $patches_query->the_post(); ?>
						<?php get_template_part( 'element', 'diff-row' ); ?>
					<?php endwhile; ?>
				</tbody>
			</table>

		<?php endif; ?>

	</div>
</div>

<div class="container">

	<?php
	/*$args = array(
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

	<?php endif;*/ ?>
	
</div>

<?php get_footer(); ?>
