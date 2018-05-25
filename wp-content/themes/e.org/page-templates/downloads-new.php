<?php // Template Name: Downloads New ?>
<?php
if (!session_id()) {
	session_start();
}
get_header();

if (empty($_SESSION['download-form-submitted']) || ($_SESSION['download-form-submitted'] !== session_id())) : ?>

	<div class="container">
		<div class="row">
			<div class="col-xs-8">

				<?php while ( have_posts() ) : the_post(); ?>
					<div>
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>

				<?php
				//echo do_shortcode('[contact-form-7 id="' . CONTACT_FORM_DOWNLOAD_ID .  '" title="Download"]');
				?>

			</div>
			<div class="col-xs-4">
				<?php get_template_part( 'element', 'content-sidebar' ); ?>
			</div>
		</div>
	</div>

<?php else : ?>

	<?php
	$url = get_permalink( $post->ID );
	?>

	<div class="white-color-wrapper">
		<div class="container">

			<div class="download-items">
				<div class="row">
					<div class="col-xs-4 col-sm-4">
						<div class="item">
							<div class="img-wrapper">
								<div class="valign-wrapper">
									<div class="valign-inner">
										<img src="<?php echo THEME_IMG; ?>/icons/download-circle.png" alt="" />
									</div>
								</div>
							</div>
							<div class="text-wrapper">
								<h4>Download TGZ</h4>
								<div class="text">
									For the brave that can handle Apache, MySQL and PHP - download eramba and install it on premise.
								</div>
							</div>
							<a href="<?php echo add_query_arg(array('download-package' => 'tgz'), $url); ?>" class="btn custom red">Download now</a>
						</div>
					</div>

					<div class="col-xs-4 col-sm-4">
						<div class="item">
							<div class="img-wrapper">
								<div class="valign-wrapper">
									<div class="valign-inner">
										<img src="<?php echo THEME_IMG; ?>/icons/download-computer.png" alt="" />
									</div>
								</div>
							</div>
							<div class="text-wrapper">
								<h4>Virtual Image</h4>
								<div class="text">
									No time to install? Windows User? Download our ready to use Virtual Box Image. 
								</div>
							</div>
							<a href="<?php echo add_query_arg(array('download-package' => 'virtual-image'), $url); ?>" class="btn custom red">Download now</a>
						</div>
					</div>

					<div class="col-xs-4 col-sm-4">
						<div class="item">
							<div class="img-wrapper">
								<div class="valign-wrapper">
									<div class="valign-inner">
										<img src="<?php echo THEME_IMG; ?>/icons/download-cloud.png" alt="" />
									</div>
								</div>
							</div>
							<div class="text-wrapper">
								<h4>Amazon AMI</h4>
								<div class="text">
									Get help (traiing, support, Etc) from the core team and enjoy our always updated enterprise release! 
								</div>
							</div>
							<!-- <a href="<?php echo add_query_arg(array('download-package' => 'cloud'), $url); ?>" class="btn custom red">Learn More!</a> -->
							<a href="<?php echo get_page_link(ENTERPRISE_SERVICES_PAGE_ID); ?>" class="btn custom red">Learn More!</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="video-documentation clearfix">
						<div class="img-wrapper">
							<div class="valign-wrapper">
								<div class="valign-inner">
									<img src="<?php echo THEME_IMG; ?>/icons/play.png" alt="" />
								</div>
							</div>
						</div>
						<div class="text-wrapper">
							<strong>Check out our documentation</strong><br />
							Install, update and get GRC tasks done with eramba!
						</div>
						<div class="btn-wrapper">
							<div class="valign-wrapper">
								<div class="valign-inner">
									<a href="<?php echo get_page_link(DOC_PAGE_ID); ?>" class="btn custom grey"><?php _e('Documentation', 'eramba'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>	
			<div class="row">
				<div class="col-xs-12">
					<div class="video-documentation clearfix">
						<div class="img-wrapper">
							<div class="valign-wrapper">
								<div class="valign-inner">
									<img src="<?php echo THEME_IMG; ?>/icons/play.png" alt="" />
								</div>
							</div>
						</div>
						<div class="text-wrapper">
							<strong>Online Trainings</strong><br />
							Dizzy with our documentation? Try our online trainings!
						</div>
						<div class="btn-wrapper">
							<div class="valign-wrapper">
								<div class="valign-inner">
									<a href="http://www.eramba.org/online-training/" class="btn custom grey"><?php _e('Trainings', 'eramba'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<br>	
			<div class="row">
				<div class="col-xs-12">
					<div class="video-documentation clearfix">
						<div class="img-wrapper">
							<div class="valign-wrapper">
								<div class="valign-inner">
									<img src="<?php echo THEME_IMG; ?>/icons/play.png" alt="" />
								</div>
							</div>
						</div>
						<div class="text-wrapper">
							<strong>Installing help?</strong><br />
							Do you need help to get eramba installed in the cloud or your onprem facilities?
						</div>
						<div class="btn-wrapper">
							<div class="valign-wrapper">
								<div class="valign-inner">
									<a href="http://www.eramba.org/consulting-services/" class="btn custom grey"><?php _e('Consulting', 'eramba'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>
