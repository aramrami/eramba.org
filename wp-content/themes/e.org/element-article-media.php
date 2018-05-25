<?php
global $post;
$post_format = get_post_format();
?>

<?php if ( $post_format == 'image' ) : ?>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="article-image">
			<?php
			$img_id = get_post_thumbnail_id( get_the_ID() );
			$url = wp_get_attachment_url( $img_id );
			$img_caption = get_post_field( 'post_excerpt', $img_id );
			?>
			<a href="<?php the_permalink(); ?>" class="" title="<?php echo $img_caption; ?>">
				<?php the_post_thumbnail( 'post-thumb', array( 'class' => 'img-responsive' ) ); ?>
			</a>
		</div>
	<?php endif; ?>

<?php endif; ?>

<?php /*if ( $post_format == 'gallery' ) : ?>

	<?php $gallery = rwmb_meta( '_CEASE_gallery', array( 'type' => 'image', 'size' => $image_size ), get_the_ID() ); ?>
	<div class="entry-media gallery">
		<ul class="bxslider">
			<?php foreach ( $gallery as $image ) : ?>
				<li><img src="<?php echo $image['url']; ?>" class="border-radius" /></li>
			<?php endforeach; ?>
		</ul>
	</div>

<?php endif; ?>

<?php if ( $post_format == 'video' ) : ?>

	<?php $video = rwmb_meta( '_CEASE_video' ); ?>
	<div class="entry-media">
		<?php echo wp_oembed_get( $video, array( 'height' => 315 ) ); ?>
	</div>

<?php endif; ?>

<?php if ( $post_format == 'audio' ) : ?>

	<?php 
	$audio_files = rwmb_meta( '_CEASE_audio', 'type=file' );

	if ( ! empty( $audio_files ) ) : ?>
		<div class="entry-media">
			<?php $file = end( $audio_files ); ?>
			<?php $attr = array(
				'src' => $file['url']
			); ?>
			<?php echo wp_audio_shortcode( $attr ); ?>
		</div>
	<?php endif; ?>

<?php endif;*/ ?>