<?php

/**
* @file
* Template to display a view as a table.
*
* - $title : The title of this group of rows.  May be empty.
* - $header: An array of header labels keyed by field id.
* - $caption: The caption for this table. May be empty.
* - $header_classes: An array of header classes keyed by field id.
* - $fields: An array of CSS IDs to use for each field id.
* - $classes: A class or classes to apply to the table, based on settings.
* - $row_classes: An array of classes to apply to each row, indexed by row
*   number. This matches the index in $rows.
* - $rows: An array of row items. Each row is an array of content.
*   $rows are keyed by row number, fields within rows are keyed by field ID.
* - $field_classes: An array of classes to apply to each field, indexed by
*   field id, then row number. This matches the index in $rows.
* @ingroup views_templates
*/
?>
<?php foreach ($rows as $row_count => $row): //pr($row); ?>
<div class="blockWrap">
<?php print views_embed_view('landing_page', 'block_1', $row['field_school_id']); ?>
<div class="posts">
	<?php if($row['field_post_type'] == 'youtube_video') { ?>
		<iframe width="470" height="315" src="//www.youtube.com/embed/<?php print $row['field_youtube_video_url']; ?>" frameborder="0" allowfullscreen></iframe>
		<div class="likeShare"><?php print $row['sharethis'];?><p><?php print $row['ops'];?></p></div>
		<?php if($row['delete_node'] != '') { ?>
			<p class="post-edit-delete"><?php print l('Edit', 'node/' . $row['nid'] . '/edit', array('query' => array('destination' => ''))); ?> 
			<?php print l('Delete', 'node/' . $row['nid'] . '/delete', array('query' => array('destination' => ''))); ?></p>
		<?php } ?>
	<?php } else {?>


	<div><?php print $row['field_status_image'];?></div>
	<div>
		<?php print _phonetic_apply_filter($row['body']);?>
		<span class="liveTime"><em class="placeholder"><?php print $row['created'];?></em></span>
	</div>
	<div class="likeShare"><?php print $row['sharethis'];?><p><?php print $row['ops'];?></p></div>

	<?php print views_embed_view('post_liked_users', 'block', $row['nid']); ?>
	<?php if($row['delete_node'] != '') { ?>
		<p class="post-edit-delete"><?php print l('Edit', 'node/' . $row['nid'] . '/edit', array('query' => array('destination' => ''))); ?> 
		<?php print l('Delete', 'node/' . $row['nid'] . '/delete', array('query' => array('destination' => ''))); ?></p>
	<?php } ?>
	
	<!-- <p class="totalLike">Parents of <a href="#">Ankur Yagnik</a>, <a href="#">Ritesh Agarwal</a>, <a href="#">Krishn Sharma</a> and 12 other like this</p> -->
	<?php } ?>
	<?php
	global $user;
	if($user->uid != 0) {
	$block = module_invoke('classbellsu', 'block_view', 'classbellsu_comment_form', $row['nid']);
	print '<div class="postComment">';
	print render($block['content']);
	print '</div>';
	}
	?>
	<?php print views_embed_view('classbell_status_updates', 'block_2', $row['nid']); ?>
</div>
</div>
<?php endforeach; ?>
</div>
