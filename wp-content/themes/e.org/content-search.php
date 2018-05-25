<?php
$extra_class = 'search-entry';
if ( ! has_post_thumbnail() ) {
	$extra_class .= ' no-thumb';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_class ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="search-entry-thumb">
		<a href="<?php the_permalink(); ?>" class="search-entry-img-link">
			<?php the_post_thumbnail( 'widget-thumb' ); ?>
		</a>
	</div>
	<?php endif; ?>

	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<div class="entry-content">
		<?php the_excerpt( '', false ); ?>
	</div>

	<?php if ( get_theme_mod( 'readmore-button', true ) ) : ?>
		<div class="entry-button-wrap">
			<a href="<?php the_permalink(); ?>" class="btn-primary"><?php _e( 'Read More', 'cease' ); ?><i class="fa fa-angle-right"></i></a>
		</div>
	<?php endif; ?>
</article>