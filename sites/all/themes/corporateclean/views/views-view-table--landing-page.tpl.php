<?php global $user; ?>
<div class="infinite-scroll-view-wrapper">
<?php foreach ($rows as $row_count => $row){ //pr($row); 
// Skip for Protected Post
if(0 == $row['status'] && $row['uid'] != $user->uid) continue;
?>
	<div class="blockWrap">
	<?php print views_embed_view('landing_page', 'block_1', $row['field_school_id']); // School Info Block ?>
		<div class="posts">
		<?php if($row['field_post_type'] == 'youtube_video') { ?>
			<iframe 
				width="470" 
				height="315" 
				src="//www.youtube.com/embed/<?php print $row['field_youtube_video_url']; ?>" 
				frameborder="0" 
				allowfullscreen>
			</iframe>
		<?php } else { ?>
			<div><?php print $row['field_status_image'];?></div>
			<div class="postBody">
				<?php print _phonetic_apply_filter($row['body']);?>
				
			</div>
		<?php } ?>
		<span class="liveTime"><em class="placeholder"><?php print $row['created'];?></em></span><br>
		<div class="likeShare">
			<div class="load-more mbl">
				<?php print l('Comments', 'status-post/' . $row['nid'], array('attributes' => array('rel' => array('lightframe')))); ?>
			</div>
			<div class=""><?php print $row['ops'];?></div>
			<div class=""><?php print $row['sharethis'];?></div>
		</div>
		
		<?php print views_embed_view('post_liked_users', 'block', $row['nid']); ?>
		**<?php pr($row['delete_node']); ?>**
		<?php if($row['delete_node'] != '') { ?>
			<p class="post-edit-delete">
				<?php print l('Edit', 'node/' . $row['nid'] . '/edit', array('query' => array('destination' => ''))); ?> 
				<?php print l('Delete', 'node/' . $row['nid'] . '/delete', array('query' => array('destination' => ''))); ?>
			</p>
		<?php } ?>
		
		
			<!-- Comment Form -->
			<?php
				global $user;
				if($user->uid != 0) {
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
				<?php } ?>
		</div>
	</div>
<?php } ?>
</div>

<div id="views_infinite_scroll-ajax-loader">
	<img src="<?php print base_path() . drupal_get_path('module', 'views_infinite_scroll')?>/images/ajax-loader.gif" alt="loading..."/>
</div>

