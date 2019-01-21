<?php // Template Name: Home Video
// wp_enqueue_script( 'iframe_api', 'https://www.youtube.com/iframe_api', array( 'jquery' ) );
$hidePageTitle = true;
get_header(); 

// Changing excerpt length
function new_excerpt_length($length) {
	return 18;
}
add_filter('excerpt_length', 'new_excerpt_length');

?>
	<div id="main" class="home">

		<div class="page-heading-wrapper dark">
			<div class="container">
				<div class="page-heading-inner">
					<h1 class="page-title-heading">
						Welcome to Open IT GRC
					</h1>
					<h2 class="page-subtitle">
						eramba is the leading, open enterprise class IT Governance, Risk & Compliance application
					</h2> 
				</div>
			</div>
		</div>

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

		<div id="main-boxes">
			<div class="container">
				<div class="row">

					

					<?php
					$cat1 = 'home-column-1';
					$cat1Data = get_category_by_slug($cat1);
					$cat1Url = get_category_link($cat1Data->term_id);
					?>

					<div class="col-xs-4">
						<div class="main-box">
							<div class="main-box-header">
								<h2><strong><?php echo $cat1Data->name; ?></strong></h2>
								<hr>
							</div>
							<div class="main-box-inner nano">
								<div class="nano-content">
									<ul class="updates-list">

										<?php
										$args_query = array(
											'post_type' => 'post',
											'posts_per_page' => 5,
											'post_status' => 'publish',
											'orderby' => 'date',
											'category_name' => $cat1
										);
										$inner_query = new WP_Query( $args_query );
										?>
										<?php if ( $inner_query->have_posts() ) : ?>
											
											<?php while ( $inner_query->have_posts() ) : $inner_query->the_post(); ?>

												<li>
													<time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time>
													<h4>
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h4>
													<p>
														<?php the_excerpt(); ?>
													</p>
												</li>
												
											<?php endwhile; ?>

										<?php else : ?>
											<li>
												<p>
													<?php _e( 'No posts found.', 'eramba' ); ?>
												</p>
											</li>
										<?php endif; ?>

										<!-- <li>
											<time datetime="2008-02-14 20:00">14th April 2016</time>
											<h4>
												<a href="#">Lorem ipsum dolor</a>
											</h4>
											<p>
												Update: published our yearly update
											</p>
										</li> -->
									
									</ul>
								</div>
							</div>
							<div class="main-box-bottom">
								<span class="link"><a href="<?php echo $cat1Url; ?>"><?php _e( 'See all updates', 'eramba' ); ?></a></span>
							</div>
						</div>
					</div>

					<?php
					$cat2 = 'home-column-2';
					$cat2Data = get_category_by_slug($cat2);
					$cat2Url = get_category_link($cat2Data->term_id);
					?>
					<div class="col-xs-4">
						<div class="main-box">
							<div class="main-box-header">
								<h2><strong><?php echo $cat2Data->name; ?></strong></h2>
								<hr>
							</div>
							<div class="main-box-inner nano">
								<div class="nano-content">
									<ul class="updates-list">
										<?php
										$args_query = array(
											'post_type' => 'post',
											'posts_per_page' => 5,
											'post_status' => 'publish',
											'orderby' => 'date',
											'category_name' => $cat2
										);
										$inner_query = new WP_Query( $args_query );
										?>
										<?php if ( $inner_query->have_posts() ) : ?>
											
											<?php while ( $inner_query->have_posts() ) : $inner_query->the_post(); ?>

												<li>
													<time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date( 'F j, Y' ); ?></time>
													<h4>
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</h4>
													<p>
														<?php the_excerpt(); ?>
													</p>
												</li>
												
											<?php endwhile; ?>

										<?php else : ?>
											<li>
												<p>
													<?php _e( 'No posts found.', 'eramba' ); ?>
												</p>
											</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
							<div class="main-box-bottom">
								<span class="link"><a href="<?php echo $cat2Url; ?>"><?php _e( 'See all updates', 'eramba' ); ?></a></span>
							</div>
						</div>
					</div>
					<div class="col-xs-4">
						<a class="fancybox-media" href="#home-video">
							<div class="main-box video">
								<div class="main-box-header">
									<h2 class="text-center"><strong>Watch our video</strong><br>and find out more!</h2>
									<img class="play-icon" src="<?php echo THEME_IMG . 'icons/play-video.png'; ?>" alt="">
								</div>
							</div>
						</a>
					</div>

					<div class="col-xs-12">
						<div class="metrics">
							<div class="main-box-header">
								<h2><strong>Project Metrics</strong></h2>
								<hr>
							</div>
							<div class="metrics-content">
								<div class="row">
									<div class="col-sm-3">
										<h4>
											<strong>Downloads</strong>
										</h4>
										<span class="metrics-value">
											<?php
											$date1 = strtotime(date('Y', strtotime('-1 year')) . '-01-01');
											$date2 = strtotime(date('Y', strtotime('+0 year')) . '-01-01');
											$date3 = strtotime(date('Y', strtotime('+1 year')) . '-01-01');
											
											$communityPrevYear = $wpdb->get_results("SELECT count(*) as count FROM {$wpdb->prefix}cf7dbplugin_submits WHERE form_name IN ('2018 Community Download', 'Download new') AND field_name LIKE 'Submitted From' AND submit_time > {$date1} AND submit_time < {$date2}", object);

											$communityThisYear = $wpdb->get_results("SELECT count(*) as count FROM {$wpdb->prefix}cf7dbplugin_submits WHERE form_name IN ('2018 Community Download', 'Download new') AND field_name LIKE 'Submitted From' AND submit_time > {$date2} AND submit_time < {$date3}", object);

											if (!empty($communityPrevYear) && !empty($communityPrevYear[0]->count)) {
												echo $communityPrevYear[0]->count . ' (' . date('Y', strtotime('-1 year')) . ')';
											}
											if (!empty($communityThisYear) && !empty($communityThisYear[0]->count)) {
												echo ' - ' . $communityThisYear[0]->count . ' (' . date('Y') . ')';
											}
											?>
										</span>
									</div>
									<div class="col-sm-3">
										<h4>
											<strong>Enterprise Customers</strong>
										</h4>
										<span class="metrics-value">
											185	
										</span>
									</div>
									<div class="col-sm-3">
										<h4>
											<strong>Last Enterprise Release</strong>
										</h4>
										<span class="metrics-value">
											<a href="https://www.eramba.org/enterprise-update-69/">4th Jan 2019</a>
										</span>
									</div>
									<div class="col-sm-3">
										<h4>
											<strong>Last Community Release</strong>
										</h4>
										<span class="metrics-value">
											<a href="http://www.eramba.org/2018-community-made-public/">20th March 2018</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		
		<div class="hidden">
			<div id="home-video">
				<div class="video-wrapper" style=""><div id="player"></div></div>
				<script type="text/javascript">
				var tag = document.createElement('script');
					tag.src = "https://www.youtube.com/iframe_api";
					var firstScriptTag = document.getElementsByTagName('script')[0];
					firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

					var player;
					var videoReady = false;

					function onYouTubeIframeAPIReady() {
						player = new YT.Player('player', {
							width: 853,
							height: 480,
							videoId: 'GUPdMW99Gow',
							title: "eramba &#8211; open-source IT GRC - Welcome to open-source IT GRC",
							events: {
							  'onReady': onPlayerReady
							}
						});
					}

					function onPlayerReady(event) {
						videoReady = true;

						$(".video-wrapper").addClass("video-ready");

						event.target.setVolume(50);
						event.target.setPlaybackQuality('hd720');
					}

					$(function() {
						$('.fancybox-media').fancybox({
							afterShow: function() {
								if (videoReady) {
									setTimeout(function() {
										player.playVideo();
									}, 500);
								}
							},
							tpl: {
								closeBtn: '<a href="#" class="fancybox-custom-close"><i class="fa fa-times" aria-hidden="true"></i></a>'
							},
							padding: 0
						});
					});
				</script>
			</div>
		</div>


		<?php endwhile; ?>

	</div>

	<div class="white-color-wrapper">
		<div class="container">
			<div class="logos-wrapper">
				<table class="table-5-col">
					<tr class="text-center">
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/plansee-group.png" alt="plansee-group"/></td>
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/globant.png" alt="globant"/></td>
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/simacan.png" alt="simacan"/></td>
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/kognitio.png" alt="kognitio"/></td>
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/baufest.png" alt="baufest"/></td>
						<!-- <td class=""><img src="<?php echo THEME_IMG; ?>/logos/altran.png" alt="altran"/></td> -->
					</tr>
				</table>

				<table class="table-5-col">
					<tr class="text-center">
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/smartvault.png" alt="smartvault"/></td>
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/virginia-gov.png" alt="virginia-gov"/></td>
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/sportradar.png" alt="sportradar"/></td>
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/govern-balears.png" alt="govern-balears"/></td>
						<td class=""><img src="<?php echo THEME_IMG; ?>/logos/idaho.png" alt="idaho"/></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<!-- <div class="gray-color-wrapper dark">
		<div class="container">

			<div class="row">
				<div class="col-xs-12">
					<div class="newsletter">
						<div class="text">
							<span class="highlighted">Subscribe to newsletter</span>
							Don’t miss any important news and updates
						</div>

						<div class="form">
							<?php
							// echo (do_shortcode('[contact-form-7 id="'.CONTACT_FORM_SUBSCRIBE_ID.'" title="asd"]'));
							?>

						</div>

						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			
		</div>
	</div> -->

<?php 
remove_filter('excerpt_length', 'new_excerpt_length');

get_footer(); ?>
