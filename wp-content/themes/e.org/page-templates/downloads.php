<?php // Template Name: Downloads ?>
<?php get_header(); ?>

<?php
$sections = get_terms('eramba_download_sections', array(
	'hide_empty' => 0
));
?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">

			<?php while ( have_posts() ) : the_post(); ?>
				<div>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>

			<?php if (!empty($sections)) : ?>
				<?php foreach ($sections as $section) : ?>
					<?php
					wp_reset_query();
					$args = array(
						'posts_per_page' => -1,
						'post_type' => 'eramba_downloads',
						'post_status' => 'publish',
						'tax_query' => array(
							array(
								'taxonomy' => 'eramba_download_sections',
								'field' => 'slug',
								'terms' => $section->slug,
							)
						)
					);
					?>
					
					<div class="boxed-section">
						<h2 class="boxed-section-title"><?php echo $section->name; ?></h2>

						<?php
						$loop = new WP_Query($args);
						if ($loop->have_posts()) : ?>
							<div class="panel-group" id="accordion-<?php echo $section->slug; ?>" role="tablist" aria-multiselectable="true">

								<?php while($loop->have_posts()) : $loop->the_post(); ?>
									<div class="panel panel-default">
										<div class="panel-heading" role="tab" id="heading-<?php echo $post->post_name; ?>">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordion-<?php echo $section->slug; ?>" href="#collapse-<?php echo $post->post_name; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $post->post_name; ?>">
													<?php echo get_the_title(); ?>
												</a>
											</h4>
										</div>
										<div id="collapse-<?php echo $post->post_name; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php echo $post->post_name; ?>">
											<div class="panel-body">
												<?php if (rwmb_meta('ERAMBA_version', array(), get_the_ID())) : ?>
													<p>
														<strong><?php _e('Release version:', 'eramba'); ?></strong><br />
														<?php echo rwmb_meta('ERAMBA_version', array(), get_the_ID()); ?>
													</p>
												<?php endif; ?>

												<?php if (rwmb_meta('ERAMBA_release_date', array(), get_the_ID())) : ?>
													<p>
														<strong><?php _e('Release date:', 'eramba'); ?></strong><br />
														<?php echo rwmb_meta('ERAMBA_release_date', array(), get_the_ID()); ?>
													</p>
												<?php endif; ?>
												
												<?php if (rwmb_meta('ERAMBA_fixes', array(), get_the_ID())) : ?>
													<div>
														<strong><?php _e('Fixes:', 'eramba'); ?></strong><br />
														<?php echo rwmb_meta('ERAMBA_fixes', array(), get_the_ID()); ?>
													</div>
												<?php endif; ?>

												<?php if (rwmb_meta('ERAMBA_features', array(), get_the_ID())) : ?>
													<div>
														<strong><?php _e('Features:', 'eramba'); ?></strong><br />
														<?php echo rwmb_meta('ERAMBA_features', array(), get_the_ID()); ?>
													</div>
												<?php endif; ?>

												<hr>

												<?php
												$file = rwmb_meta('ERAMBA_file', 'type=file', get_the_ID());
												$url = rwmb_meta('ERAMBA_file_url', array(), get_the_ID());
												$formId = rwmb_meta('ERAMBA_download_form', array(), get_the_ID());
												if (!empty($file)) {
													$fileInfo = current($file);
													$fileUrl = $fileInfo['url'];
												}
												elseif (!empty($url)) {
													$fileUrl = $url;
												}
												else {
													$fileUrl = false;
												}
												?>

												<?php if ($fileUrl && empty($formId)) : ?>
													<br>
													<div class="text-center">
														<a href="<?php echo $fileUrl; ?>" target="_blank" class="btn btn-primary btn-lg btn-wide"><?php _e('Download', 'eramba'); ?></a>
													</div>
												<?php elseif (!empty($formId)) : ?>
													<?php
													$form = do_shortcode('[contact-form-7 id="'.$formId.'" title="Download"]');
													$form = str_replace('[download_post_id]', '<input type="hidden" name="download_post_id" class="hidden" value="' . get_the_ID() . '" />', $form);
													echo $form;
													?>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endwhile; ?>

							</div>
						<?php else : ?>
							<?php echo e_alert(__('There are no files in this section.', 'eramba')); ?>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php else : ?>
				<?php echo e_alert(__('We have nothing for you to download yet.', 'eramba')); ?>
			<?php endif; ?>
		</div>
		<div class="col-xs-4">
			<?php get_template_part( 'element', 'content-sidebar' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>