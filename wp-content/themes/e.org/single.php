<?php
/**
 * The Template for displaying all single posts.
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-xs-8">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('blog-article'); ?>>

					<?php get_template_part( 'element', 'article-media' ); ?>

					<div class="blog-article-inner">
						<?php get_template_part('element', 'post-meta'); ?>

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