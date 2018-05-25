<?php
/**
 * The template for displaying the footer.
 */
?>
	
	</div>

	<div class="footer-top-wrapper">
		<div class="container">
			<div class="footer-top-widgets-row row">
				<div class="sidebar footer-sidebar col-xs-3">
					<?php
					if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
						dynamic_sidebar( 'footer-sidebar-1' );
					}
					?>
				</div>
				<div class="sidebar footer-sidebar col-xs-3">
					<?php
					if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
						dynamic_sidebar( 'footer-sidebar-2' );
					}
					?>
				</div>
				<div class="sidebar footer-sidebar col-xs-3">
					<?php
					if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
						dynamic_sidebar( 'footer-sidebar-3' );
					}
					?>
				</div>
				<div class="sidebar footer-sidebar col-xs-3">
					<?php
					if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
						dynamic_sidebar( 'footer-sidebar-4' );
					}
					?>
<!-- 					<aside class="widget">
						<h3 class="widgettitle"><?php _e('Get in touch', 'eramba'); ?></h3>
						<div class="contact-info">
							<p>
								<i class="fa fa-map-marker"></i> Little Lonsdale St, Talay
							</p>
							<p>
								<i class="fa fa-phone"></i> +1 (800) 888 5260 52 63
							</p>
							<p>
								<i class="fa fa-envelope"></i> <a href="mailto:hello@eramba.org">hello@eramba.org</a>
							</p>
						</div>
					</aside>

					<aside class="widget">
						<ul class="list-unstyled social-icons">
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						</ul>
					</aside> -->
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom-wrapper">
		<div class="container">
			<p>&copy; <?php echo date('Y'); ?> eramba.org</p>
		</div>
	</div>
	
	<?php wp_footer(); ?>
</body>
</html>