<?php // Template Name: Partnerships ?>
<?php
get_header();

// remove_filter('the_content', 'wpautop');
// remove_filter('the_content', 'wpautop', 12);
?>

<div class="jumbo-box">
	<div class="container">
		<div class="row align-row">
			<div class="col-sm-7">
				<h3 class="margin-top-10">
					<strong>Get help from the core team</strong>
				</h3>
				<p class="partnerships-text">
					We offer a packaged yearly support service that includes installation, training,
					immediate patch resolutions and features not necessarily published on the community
					version at extremely affordable prices. With the help of our global partners, we also
					provide customisation and consulting services.
				</p>

				<p class="partnerships-text">
					<strong>
						The income generated from these services is what keeps this project alive. We re-invest
						%100 into the project and we have no intention to become  yet another GRC company.
					</strong>
				</p>
			</div>
			<div class="col-sm-5 text-center">
				<img src="<?php echo do_shortcode('[img]'); ?>hand-shake.png" alt="">
			</div>
		</div>
	</div>
</div>

<div class="container padding-top-30">
	<div class="row align-row">
		<div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>thumbs-up.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Discounts</h4>
					<p>As partner you’ll access to discounts for new and renewed licenses.</p>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/training.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Trainings</h4>
					<p>You and your colleagues can access our enterprise trainings at no cost.</p>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/support.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Sales Support</h4>
					<p>We can remotely help you at your sales meetings with product demos and insights.</p>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/upgrades.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Publicity</h4>
					<p>Over 35 thousand people visits eramba every year - a partner portal will show your company logo and website.</p>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>skies.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Demo Sites</h4>
					<p>At a discounted fee - you’ll have your own eramba instance in the cloud so you can always demo and test eramba.</p>
				</div>
			</div>
		</div>

		<div class="col-sm-4">
			<div class="doc-box doc-box-alt doc-box-partnerships align-col">
				<div class="doc-box-img">
					<img src="<?php echo do_shortcode('[img]'); ?>enterprise-icons/installation.png" alt="">
				</div>
				<div class="doc-box-content">
					<h4>Tech Support</h4>
					<p>We’ll support you with our standard enterprise technical support all along.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<hr>
<div class="container text-center">
	<div class="partnerships-select-wrapper margin-top-10 clearfix">
		<!-- <div class="col-sm-8"> -->
			<div class="form-group pull-left">
				<span class="wpcf7-form-control-wrap">
					<select name="search-partners" class="form-control" id="search-partners" aria-required="true" aria-invalid="false">
						<option value="">Select a country</option>
						<?php
							$countries = getListOfPartnersCountries();
						?>
						<?php foreach ($countries as $key => $value): ?>
							<option value="<?= $key ?>"><?= $value ?></option>
						<?php endforeach; ?>
						<option value="new">Become a Partner in new Country</option>
					</select>
				</span>
			</div>
		<!-- </div> -->
		<!-- <div class="col-sm-4"> -->
			<button id="search-partners-button" type="button" name="button" class="btn btn-lg btn-wide btn-default pull-left">Search Partners</button>
		<!-- </div> -->
	</div>

	<div id="partners-list" class="margin-top-40">
		<?php
		wp_reset_query();
		$args = array(
			'posts_per_page' => -1,
			'post_type' => 'eramba_partners',
			'post_status' => 'publish'
		);
		?>

		<?php $loop = new WP_Query($args); ?>
		<?php if ($loop->have_posts()): ?>
			<div class="row align-row row-centered">
				<?php while($loop->have_posts()) : $loop->the_post(); ?>
					<?php
					$logo = rwmb_meta('ERAMBA_logo', 'type=file', get_the_ID());
					$url = rwmb_meta('ERAMBA_url', array(), get_the_ID());
					if (!empty($logo)) {
						$logoInfo = current($logo);
						$logoUrl = $logoInfo['url'];
					}

					$countries = rwmb_meta('ERAMBA_countries', 'type=file', get_the_ID());
					$countriesList = '';
					if (!empty($countries)) {
						foreach ($countries as $country) {
							$countriesList .= $country['ID'].',';
						}
					}
					?>
					<div class="partner col-sm-4" data-countries="<?php echo substr($countriesList, 0, -1) ?>">
						<?php if (!empty($url)): ?>
							<a class="no-text-effect" href="<?php echo rwmb_meta('ERAMBA_url', array(), get_the_ID()); ?>" target="_blank">
						<?php endif; ?>
							<div class="doc-box doc-box-alt doc-box-partnerships align-col">
								<div class="doc-box-img">

									<?php if (!empty($logoUrl)): ?>
										<img src="<?php echo $logoUrl ?>" alt="<?php echo $post->post_name ?>">
									<?php endif; ?>

								</div>
								<div class="doc-box-content">
									<?php echo rwmb_meta('ERAMBA_description', array(), get_the_ID()); ?>
								</div>
							</div>
						<?php if (!empty($url)): ?>
							</a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="text-center margin-top-10 margin-bottom-60">
		<a id="contact-redirect" href="<?php echo get_page_link(BUGS_PAGE_ID); ?>" class="btn btn-success btn-lg btn-wide">Become a Partner</a>
	</div>
</div>

<script type="text/javascript">
	$(function(){
		var partners = $('#partners-list .partner');

		function alignCols() {
			var r = $.Deferred();

			$('.align-row').each(function() {
				var height = 0;
				$(this).find('.align-col').each(function() {
					if ($(this).height() > height) {
						height = $(this).height();
					}
				});
				$(this).find('.align-col').height(height);
			});
			r.resolve();
		}

		$(window).on("load", function() {
			alignCols();
			partners.hide();
		});

		$('#search-partners-button').on('click', function() {
			var selectedCountry = $('#search-partners').val();
			if (selectedCountry == 'new') {
				jQuery('#contact-redirect')[0].click();
				return;
			}
			// var partners = $('#partners-list .partner');
			partners.fadeOut(350);
			partners.promise().done(function() {
				$.each(partners, function () {
					countries = $(this).data('countries');
					if (selectedCountry.length > 0 && countries.toString().indexOf(selectedCountry) != -1) {
						$(this).fadeIn(350);
					}
				});
			});
		});
	});
</script>


<?php get_footer(); ?>
