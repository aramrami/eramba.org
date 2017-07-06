<?php // Template Name: Online demo ?>
<?php get_header(); ?>

<div class="container">

	<div class="row">
		<div class="col-xs-12 text-center">
			<h2>What you want to demo?</h2>
		</div>
	</div>
	<br>
	<div id="info-box">
		<div class="row margin-11">
			<div class="col-xs-6 padding-11">
				<a href="https://demo.eramba.org/" target="_blank" class="item first text-center">
					<h3>Community Edition</h3>
					<div class="desc">
						<div class="image-wrapper">
						</div>
						<div class="text-wrapper">
							<div class="title">
								Try online demo!
							</div>
							<div class="data clearfix">
								<div class="my-col">
									<span class="bold">Username:</span> admin
								</div>
								<div class="my-col">
									<span class="bold">Password:</span> admin
								</div>
							</div>
						</div>
						<div class="bottom-text">
							Our community edition is based on our enterprise release and updated once a year.
						</div>
					</div>
				</a>
			</div>

			<div class="col-xs-6 padding-11">
				<a href="https://demo-e.eramba.org/" target="_blank" class="item second text-center">
					<div class="text-center">
						<h3>Subscriptors Edition</h3>
						<div class="desc">
							<div class="image-wrapper">
							</div>
							<div class="text-wrapper">
								<div class="title">
									Try online demo!
								</div>
								<div class="data clearfix">
									<div class="my-col">
										<span class="bold">Username:</span> admin
									</div>
									<div class="my-col">
										<span class="bold">Password:</span> eramba
									</div>
								</div>
							</div>
							<div class="bottom-text">
								Our enterprise release (or subscriptors edition) is updated every week and has the latest patches and features. Once a year we pass (most) of this to the community release.
							</div>
						</div>
					</div>
				</a>
			</div>

			<!-- <div class="col-md-offset-6 col-md-6 padding-11">
				<div class="item other text-center">
					<div class="title-wrapper awareness-portal">
						<div class="title-inner clearfix">
							<div class="image"></div>
							<h4>Awareness portal</h4>
						</div>
					</div>
					<div class="desc">
						<div class="top-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur egestas nisl posuere orci lacinia vehicula. Aliquam erat volutpat. Cras a nulla dolor.
						</div>
						<div class="text-wrapper">
							<div class="data clearfix">
								<div class="my-col">
									<span class="bold">Username:</span> admin
								</div>
								<div class="my-col">
									<span class="bold">Password:</span> admin
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->

			<!-- <div class="col-md-offset-6 col-md-6 padding-11">
				<div class="item other text-center">
					<div class="title-wrapper policies">
						<div class="title-inner clearfix">
							<div class="image"></div>
							<h4>Policies</h4>
						</div>
					</div>
					<div class="desc">
						<div class="top-text">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur egestas nisl posuere orci lacinia vehicula. Aliquam erat volutpat. Cras a nulla dolor.
						</div>
						<div class="text-wrapper">
							<div class="data clearfix">
								<div class="my-col">
									<span class="bold">Username:</span> admin
								</div>
								<div class="my-col">
									<span class="bold">Password:</span> admin
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>

	<div class="more-info">
		<div class="row">
			<div class="col-xs-12 text-center">
				<p>We keep an updated list of diffferences in between releases</p>
				<a href="<?php echo get_page_link(ENTERPRISE_PAGE_ID); ?>" class="btn btn-default"><?php _e('See the comparison', 'eramba'); ?></a>
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>
