<?php // Template Name: Documentation ?>
<?php get_header(); ?>

<?php
$sections = get_terms('eramba_documentation_section', array(
	'hide_empty' => 0,
	'slug' => array('introduction', 'enteprise-subscription', 'screenshots-videos', 'compliance-packages', 'compliance-mappings', 'policies')
));
?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<?php if (!empty($sections)) : ?>
				<?php foreach ($sections as $section) : ?>
					<?php
					wp_reset_query();
					$args = array(
						'posts_per_page' => -1,
						'post_type' => 'eramba_documentation',
						'post_status' => 'publish',
						'orderby' => 'menu_order',
						//'order' => ''
						'tax_query' => array(
							array(
								'taxonomy' => 'eramba_documentation_section',
								'field' => 'slug',
								'terms' => $section->slug
							)
						)
					);
					?>
					
					<div class="boxed-section">
						<h2 class="boxed-section-title doc-section-title doc-<?php echo $section->slug; ?>"><?php echo $section->name; ?></h2>

						<p class="doc-section-desc"><?php echo $section->description; ?></p>

						<?php
						$loop = new WP_Query($args);
						if ($loop->have_posts()) : ?>
							<ul class="doc-list">

								<?php while($loop->have_posts()) : $loop->the_post(); ?>
									<li>
										<?php
										$href = get_permalink();
										$attrs = '';
										if (get_post_format() == 'link') {
											$href = get_post()->post_content;
											$attrs = 'target="_blank"';
										}
										?>
										<a href="<?php echo $href; ?>" <?php echo $attrs; ?>>
											<?php echo get_the_title(); ?>
										</a>
									</li>
								<?php endwhile; ?>

							</ul>
						<?php else : ?>
							<?php echo e_alert(__('No articles in this section yet.', 'eramba')); ?>
						<?php endif; ?>

					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<?php echo e_alert(__('Documentation is missing.', 'eramba')); ?>
			<?php endif; ?>
		</div>
		<div class="col-xs-4">
			<?php get_template_part( 'element', 'content-sidebar' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>