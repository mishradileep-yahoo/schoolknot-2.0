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
<?php foreach ($rows as $row_count => $row): ?>
<div class="blockWrap">
  <div class="posts single-status-post">
  
  <div class="post-content">
  	<?php if($row['field_post_type'] == 'youtube_video') { ?>
      <iframe width="300" height="300" 
      src="//www.youtube.com/embed/<?php print $row['field_youtube_video_url']; ?>" 
      frameborder="0" 
      allowfullscreen></iframe>
    <?php } else {?>
    <div><?php print $row['field_status_image'];?></div>
    <div class="postBody">
      <?php print _phonetic_apply_filter($row['body']);?>
      <span class="liveTime"><em class="placeholder"><?php print $row['created'];?></em></span>
    </div>
  <?php } ?>
   </div>
   <div class="post-comments">
   <div class="likeShare"><?php print $row['sharethis'];?><p><?php print $row['ops'];?></p></div>
   	<?php
      global $user;
      if($user->uid != 0) {
        $block = module_invoke('classbellsu', 'block_view', 'classbellsu_comment_form', $row['nid']);
        print '<div class="postComment">';
        print render($block['content']);
        print '</div>';
      }
    ?>
    <div id="post-comments-<?php print $row['nid']?>">
      <?php print views_embed_view('classbell_status_updates', 'block_2', $row['nid']); ?>
    </div>
   </div>
  </div>
</div>
<?php endforeach; ?>