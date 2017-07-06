<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				$timelineTypes = getTimelineTypes();
				$type = rwmb_meta('ERAMBA_event_type', array(), get_the_ID());


				$eventDate = rwmb_meta('ERAMBA_event_date', array(), get_the_ID());
				$date = date('j. F, Y', strtotime($eventDate));
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('blog-article'); ?>>

					<div class="blog-article-inner">
						<ul class="article-meta clearfix">
							<li><?php echo $timelineTypes[$type]; ?></li>
							<li><?php echo $date; ?></li>
						</ul>

						<div class="article-content">
							<?php the_content(); ?>
						</div>
					</div>
				</article><!-- #post -->

			<?php endwhile; ?>

			<?php if ( comments_open() || get_comments_number() ) : ?>
				<div class="light-box">
					<?php comments_template(); ?>
				</div>
			<?php endif; ?>

		</div>
		<div class="col-xs-4">
			<?php get_template_part( 'element', 'content-sidebar' ); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>