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
global $user;
$logedInUser = user_load($user->uid);
$userBlocked = $logedInUser->field_schooladmin_blocked['und'][0]['value'];

//$linkUser = user_load(1507);
$timestamp = REQUEST_TIME;
//print url("schoolknot/reset/$linkUser->uid/$timestamp/" . user_pass_rehash($linkUser->pass, $timestamp, $linkUser->login), array('absolute' => TRUE));
?>
<div class="infinite-scroll-view-wrapper">
	<?php foreach ($rows as $row_count => $row): //pr($row); 
		// Skip for Protected Post
		if(0 == $row['status'] && $row['uid'] != $user->uid) continue;
	?>
	<div class="blockWrap">
		<?php print views_embed_view('landing_page', 'block_1', $row['gid']); // School Info Block ?>
		<div class="posts">
			<?php if($row['field_post_type'] == 'youtube_video') { ?>
				<iframe width="470" height="315" 
						src="//www.youtube.com/embed/<?php print $row['field_youtube_video_url']; ?>" 
						frameborder="0" 
						allowfullscreen></iframe>
			<?php } else {?>
				<div><?php print $row['field_status_image'];?></div>
				<div class="postBody">
					<?php print _phonetic_apply_filter($row['body']);?>
				</div>
			<?php } ?>
			<span class="liveTime"><em class="placeholder"><?php print $row['created'];?></em></span>
      <div class="likeShare">
        <?php if(_check_able_to_share($logedInUser, $row['uid'], $row['gid'])) { ?>
        <div class="load-more mbl">
          <?php print l('Comments', 'status-post/' . $row['nid'], array('attributes' => array('rel' => array('lightframe')))); ?>
        </div>
        <div class=""><?php print $row['ops'];?></div>
        <div class=""><?php print $row['sharethis'];?></div>
        <?php } ?>
      </div>
			<?php print views_embed_view('post_liked_users', 'block', $row['nid']); ?>
			<?php if($row['uid'] == $user->uid && $row['delete_node'] != '') { ?>
					<p class="post-edit-delete"><?php print l('Edit', 'node/' . $row['nid'] . '/edit', array('query' => array('destination' => ''))); ?> 
					<?php print l('Delete', 'node/' . $row['nid'] . '/delete', array('query' => array('destination' => ''))); ?></p>
				<?php } ?>
				
				
			
			<?php
				global $user;
				if($user->uid != 0 && (_check_able_to_share($logedInUser, $row['uid'], $row['gid']))) {
				$block = module_invoke('classbellsu', 'block_view', 'classbellsu_comment_form', $row['nid']);
				print '<div class="postComment dsk">';
				print render($block['content']);
				print '</div>';
			}
			?>
			<div id="comment-small" class="dsk">
				<div id="post-comments-<?php print $row['nid']?>">
					<?php print views_embed_view('classbell_status_updates', 'block_1', $row['nid']); ?>
				</div>
			<?php 
			$view = views_get_view('classbell_status_updates');
			$view->set_display('block_2');
			$view->set_arguments(array($row['nid']));
			// change the amount of items to show
			$view->pre_execute();
			$view->execute();
			$count = count( $view->result );
			if ($count > 3 ) { ?>
			<span class="load-more"><?php print l('Load More', 'status-post/' . $row['nid'], array('attributes' => array('rel' => array('lightframe')))); ?></span>
			<?php }?>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
</div>
<div id="views_infinite_scroll-ajax-loader"><img src="<?php print base_path() . drupal_get_path('module', 'views_infinite_scroll')?>/images/ajax-loader.gif" alt="loading..."/></div>

