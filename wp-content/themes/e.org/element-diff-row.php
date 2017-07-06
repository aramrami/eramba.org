<?php
$eventTimestamp = strtotime(rwmb_meta('ERAMBA_list_date', array(), get_the_ID()));
$date = strtolower(date('F jS Y', $eventTimestamp));
$customPost = rwmb_meta('ERAMBA_list_post', array(), get_the_ID());
$customPostDoc = rwmb_meta('ERAMBA_list_post_doc', array(), get_the_ID());
$section = rwmb_meta('ERAMBA_list_section', array(), get_the_ID());

$readMode = false;
if ($customPost) {
	$readMode = $customPost;
}
elseif ($customPostDoc) {
	$readMode = $customPostDoc;
}
?>
<tr class="active">
	<td><?php echo $section ?></td>
	<td>
		<?php the_title(); ?> 

		<?php if (!empty($readMode)) : ?>
			<a href="<?php echo get_permalink($readMode); ?>"><strong>(Read more)</strong></a>
		<?php endif; ?>
	</td>
	<td><?php echo $date; ?></td>
</tr>