<?php // Template Name: Home ?>
<?php get_header(); ?>

	<?php /* The loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="home-bg">
			<div class="container">
				<h1 class="home-heading"><?php echo __('Welcome to Open IT GRC', 'eramba'); ?></h1>
				<h2 class="home-subheading"><?php echo __('eramba is the leading, open enterprise class IT Governance, Risk & Compliance application', 'eramba'); ?></h2>

				<div class="home-showcase">
					<img src="<?php echo THEME_IMG . 'macbook-preview.png'; ?>" class="macbook-preview" />

					<div class="showcase-iconbox showcase-iconbox-right showcase-icon-1">
						<div class="showcase-label"><?php _e('Stop spreadsheeting', 'eramba'); ?></div>
						<div class="showcase-icon"></div>
					</div>
					<div class="showcase-iconbox showcase-iconbox-right showcase-icon-2">
						<div class="showcase-label"><?php _e('Work with facts<br>& dashboards', 'eramba'); ?></div>
						<div class="showcase-icon"></div>
					</div>
					<div class="showcase-iconbox showcase-iconbox-right showcase-icon-3">
						<div class="showcase-label"><?php _e('Increase<br>collaboration', 'eramba'); ?></div>
						<div class="showcase-icon"></div>
					</div>

					<div class="showcase-iconbox showcase-iconbox-left showcase-icon-4">
						<div class="showcase-icon"></div>
						<div class="showcase-label"><?php _e('Simplify & centralize<br>security governance', 'eramba'); ?></div>
					</div>
					<div class="showcase-iconbox showcase-iconbox-left showcase-icon-5">
						<div class="showcase-icon"></div>
						<div class="showcase-label"><?php _e('Save time', 'eramba'); ?></div>
					</div>
					<div class="showcase-iconbox showcase-iconbox-left showcase-icon-6">
						<div class="showcase-icon"></div>
						<div class="showcase-label"><?php _e('Open & affordable<br>GRC', 'eramba'); ?></div>
					</div>

					<ul class="list-unstyled friendly-items">
						<li><img src="<?php echo THEME_IMG . 'nist.png'; ?>"/></li>
						<li><img src="<?php echo THEME_IMG . 'iso.png'; ?>"/></li>
						<li><img src="<?php echo THEME_IMG . 'sox.png'; ?>"/></li>
						<li><span><?php _e('friendly', 'eramba'); ?></span></li>
					</ul>
				</div>

				<div class="home-showcase-btns">
					<div class="showcase-btn">
						<a href="<?php echo get_page_link(FEATURES_PAGE_ID); ?>" class="btn btn-default btn-lg-extra"><?php _e('Features', 'eramba'); ?></a>
					</div>
					<div class="showcase-btn">
						<a href="<?php echo get_page_link(DEMO_PAGE_ID); ?>" class="btn btn-primary btn-lg-extra"><?php _e('Try online demo now!', 'eramba'); ?></a>
					</div>
					<div class="showcase-btn">
						<a href="<?php echo get_page_link(BENEFITS_PAGE_ID); ?>" class="btn btn-default btn-lg-extra"><?php _e('Benefits', 'eramba'); ?></a>
					</div>
				</div>
			</div>
		</div>

		<div class="home-bg-bottom">
			<div class="container">
				<h3><?php _e('These group of people are enjoying eramba', 'eramba'); ?></h3>

				<div class="row eramba-users-wrapper">
					<div class="col-xs-3">
						<div class="eramba-users security-professionals">
							<h4><?php _e('Security Professionals', 'eramba'); ?></h4>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="eramba-users auditors">
							<h4><?php _e('Auditors', 'eramba'); ?></h4>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="eramba-users compliance-managers">
							<h4><?php _e('Compliance Managers', 'eramba'); ?></h4>
						</div>
					</div>
					<div class="col-xs-3">
						<div class="eramba-users nist-professionals">
							<h4><?php _e('NIST & ISO Professionals', 'eramba'); ?></h4>
						</div>
					</div>
				</div>

				<div class="text-center">
					<a href="<?php echo get_page_link(BENEFITS_PAGE_ID); ?>" class="btn btn-default btn-lg"><?php _e('Find out why', 'eramba'); ?></a>
				</div>
			</div>
		</div>

	<?php endwhile; ?>

<?php get_footer(); ?>
