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
	<?php 
  	$school_detail = _get_school_node_id_for_school_admin_user($row['uid']);
  	print views_embed_view('landing_page', 'block_1', $school_detail['nid']); 
	?>
    <div class="posts">
<?php if($row['field_post_type'] == 'youtube_video') { ?>
<iframe width="560" height="315" src="//www.youtube.com/embed/<?php print $row['field_youtube_video_url']; ?>" frameborder="0" allowfullscreen></iframe>
<?php } else {?>


    	<div><?php print $row['field_status_image'];?></div>
    	<div><?php print _phonetic_apply_filter($row['body']);?></div>
        <div class="likeShare"><?php print $row['sharethis'];?><p><?php print $row['ops'];?></p></div>
        <!-- <p class="totalLike">Parents of <a href="#">Ankur Yagnik</a>, <a href="#">Ritesh Agarwal</a>, <a href="#">Krishn Sharma</a> and 12 other like this</p> -->
        <?php
          global $user;
          if($user->uid != 0) {
            $block = module_invoke('classbellsu', 'block_view', 'classbellsu_comment_form', $row['nid']);
            print '<div class="postComment">';
            print render($block['content']);
            print '</div>';
          }
        ?> 
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
        <span class="load-more"><?php print l('Load More', 'status-post/' . $row['nid'], array('attributes' => array('rel' => array('lightframe')))); ?></span>
        <?php }?>                   


<?php } ?>
    </div>
</div>
<?php endforeach; ?>
