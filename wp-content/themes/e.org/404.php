<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">
			<h4><?php _e( 'It looks like nothing was found at this location.', 'eramba' ); ?></h4>
			<br />
			<p>
				<a href="<?php echo home_url( '/' ); ?>" class="btn btn-default"><?php _e( 'Home', 'eramba' ); ?></a>
				<a href="#" class="btn btn-default" onclick="javascript:window.history.back(); return false;"><?php _e( 'Go back', 'eramba' ); ?></a>
			</p>
		</div>
		<div class="col-xs-4">
			<?php get_template_part( 'element', 'content-sidebar' ); ?>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>