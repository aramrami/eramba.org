<article id="post-<?php the_ID(); ?>" <?php post_class('blog-article'); ?>>

	<?php get_template_part( 'element', 'article-media' ); ?>

	<div class="blog-article-inner">
		<h2 class="article-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

		<?php get_template_part('element', 'post-meta'); ?>

		<div class="article-content">
			<?php the_excerpt(); ?>
		</div>

		<div class="article-bottom">
			<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-lg"><?php _e( 'Read More', 'eramba' ); ?></a>
			<div class="pull-right">
				<ul class="article-bottom-icons list-unstyled">
					<li>
						<a href="<?php echo get_comments_link(); ?>">
							<i class="fa fa-comment"></i> <?php echo get_comments_number(); ?>
						</a>
					</li>
				</ul>
				
			</div>
		</div>
	</div>

</article><!-- #post -->