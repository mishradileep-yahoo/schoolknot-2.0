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
<?php foreach ($rows as $row_count => $row): 
?>
<?php if($row['field_post_type'] == 'youtube_video') { ?>
<iframe width="560" height="315" src="//www.youtube.com/embed/<?php print $row['field_youtube_video_url']; ?>" frameborder="0" allowfullscreen></iframe>
<?php } else {?>
<?php print $row['field_status_image'];?>
<?php print _phonetic_apply_filter($row['body']);?>
<?php print $row['created'];?>
<?php } ?>
<div style="margin:10px 10px 10px 20px; background-color:#CCCCCC; padding:10px;">
<?php
  //$block = module_invoke('classbellsu', 'block', 'classbellsu_comment_form');
  $block = module_invoke('classbellsu', 'block_view', 'classbellsu_comment_form', $row['nid']);
  print render($block['content']);
  //print render ($block);
?>
  <?php print views_embed_view('classbell_status_updates', 'block_1', $row['nid']); ?>
</div>
<?php endforeach; ?>
