<?php // Template Name: Enterprise Services ?>
<?php get_header(); ?>

<div class="blue-color-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-xs-7">
				<h2>Get help from the core team</h2>
				<p>
					<span class="larger-text">
						We offer a yearly, packaged, support services that includes installation, training, immediate patch resolutions and features not necessarily published on the community version at extremely affordable prices. With the help of our global partners, we also provide customization and consulting services.<br>
					</span>
				</p>
				<p>
					<strong>The income generated from these services is what keeps this project alive. We re-invest %100 into the project and we have no intention to become yet another GRC company.</strong> 
				</p>
			</div>
			<div class="col-xs-5 static">
				<p><img class="enterprise-services-img alignnone wp-image-1547 size-full" src="<?php echo THEME_IMG . 'enterprise-services.png'; ?>" alt="" width="346" height="283"></p>
			</div>
		</div>
	</div>
</div>

<div class="blue-color-wrapper enterprise-vs-community-wrapper">
	<div class="container">
		<h2>Enterprise vs. community</h2>
		<p>
			The diagram below shows the differences in between our community and enterprise users. Among other things such support, installation and training - Enterprise users get patches and new features as needed. Our enterprise release is always ahead of the community release and is the perfect, affordable solution for enterprises.
		</p>
	</div>
</div>

<div class="diagram-wrapper">
	<div class="container">
		<img src="<?php echo THEME_IMG . 'diagram.png'; ?>" />
	</div>
</div>

<div class="yearly-wrapper">
	<div class="container">
		<h2>Our yearly package</h2>
		<p>
			We offer a fixed price, yearly package that includes the following services:
		</p>
	</div>
</div>

<div class="enterprise-border">
	<div class="container">

		<?php
		$args = array(
			'post_type' => 'eramba_enterprise',
			'orderby' => 'menu_order',
			//'order' => 'ASC',
			'post_status' => 'publish',
			'posts_per_page' => -1
		);
		
		$wp_query = new WP_Query($args);
		$index = 1;
		if ($wp_query->have_posts()) : ?>

			<div id="feature-list">
				<div class="row">
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

						<div class="col-xs-4 enterprise-block">
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
			</div>

		<?php else : ?>

			<?php echo e_alert(__('We are currently working on the content.', 'eramba')); ?>

		<?php endif; ?>

	</div>
</div>

<br><br>
<div class="container">

	<h2>Questions &amp; Answers</h2>
	<br />
	<div class="row">
		<div class="col-xs-6">
			<p><strong>We are a consulting company, do you have partnerships?</strong></p>
			<p>Oh yes, and very successfully in particular with consulting companies. In cooperation with our partners, we have run joint training, workshops and marketing events together in Europe, US and Latin America. We provide partners detailed support, product roadmap visibility and of course access to our enterprise services at a discounted rate.</p>
		</div>
		<div class="col-xs-6">
			<p><strong>How expensive is your license?</strong></p>
			<p>First of all - we dont sell licenses. We sell services to ensure customers that they are supported at all times. Our fees are a (tiny) fraction of what other GRC software costs.</p>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-xs-6">
			<p><strong>Where are you based?</strong></p>
			<p>Our team is spread across Europe. Esteban in Spain, our developers in Croatia, our Security advisors in the UK. We provide support services in English and Spanish.</p>
		</div>
		<div class="col-xs-6">
			<p><strong>What happens if you disappear or the project "Dies"?</strong></p>
			<p>We have a pretty solid team and customers base to ensure budget over years to come. In the worst case, our community and enterprise customers have the source code so if we disappear they are still able to maintain the software by themselves (anyway, is pretty sure that someone else will pick up from where we left).</p>
		</div>
	</div>
	<br /><br /><br />
	<div class="text-center">
		<a href="<?php echo get_page_link(BUGS_PAGE_ID); ?>" class="btn btn-primary btn-lg btn-wide"><?php _e('Contact us', 'eramba'); ?></a>
	</div>
	
</div>

<?php get_footer(); ?>