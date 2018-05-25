<ul class="article-meta clearfix">
	<li><?php printf(__('By %s', 'eramba'), get_the_author()); ?></li>
	<li><?php the_date('j. F, Y'); ?></li>
	<?php if ( get_the_category_list() ) : ?>
		<li><?php echo get_the_category_list(', '); ?></li>
	<?php endif; ?>
	<?php /*if ( get_the_tag_list('',', ','') ) : ?>
		<li><?php echo get_the_tag_list('',', ',''); ?></li>
	<?php endif;*/ ?>
</ul>