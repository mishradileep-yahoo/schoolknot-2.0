

<div class="infinite-scroll-view-wrapper">
<div class="blockWrap">
<?php print views_embed_view('landing_page', 'block_1', $node->field_school_id['und'][0]['target_id']); ?>
<div class="posts">
	<?php if($node->field_post_type['und'][0]['value'] == 'youtube_video') { ?>
		<iframe width="470" height="315" src="//www.youtube.com/embed/<?php print $node->field_youtube_video_url['und'][0]['value']; ?>" frameborder="0" allowfullscreen></iframe>
		<span class="liveTime"><em class="placeholder"><?php print format_interval(time() - $node->created, 1) . ' ' . t('ago');?></em></span>
		<div class="likeShare"><?php print $row['sharethis'];?><p><?php print $row['ops'];?></p></div>
		<?php if($row['delete_node'] != '') { ?>
			<p class="post-edit-delete"><?php print l('Edit', 'node/' . $row['nid'] . '/edit', array('query' => array('destination' => ''))); ?> 
			<?php print l('Delete', 'node/' . $row['nid'] . '/delete', array('query' => array('destination' => ''))); ?></p>
		<?php } ?>
	<?php } else {?>


	<div><?php print $row['field_status_image'];?></div>
	<div>
		<?php print _phonetic_apply_filter($node->body['und'][0]['value']);?>
		<span class="liveTime"><em class="placeholder"><?php print format_interval(time() - $node->created, 1) . ' ' . t('ago');?></em></span>
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
	<div id="comment-small">
		<?php print views_embed_view('classbell_status_updates', 'block_1', $row['nid']); ?>
		<?php 
			$view = views_get_view('classbell_status_updates');
			$view->set_display('block_2');
			$view->set_arguments(array($row['nid']));
			// change the amount of items to show
			$view->pre_execute();
			$view->execute();
			$count = count( $view->result );
			if ($count > 3 ) { ?>
		<span class="load-more"><?php print l('Load More', 'node/' . $row['nid']); ?></span>
	</div>
	<div id="comment-full">
		<?php print views_embed_view('classbell_status_updates', 'block_2', $row['nid']); ?>
		<?php }?>
	</div>
</div>
</div>
</div>
<?php pr($node); ?>

