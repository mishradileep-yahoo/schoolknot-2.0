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
<div class="infinite-scroll-view-wrapper">
<?php foreach ($rows as $row_count => $row): //pr($row);?>
<div class="commennts blockWrap">
    <div class="comment">
        <p>
        Parent of  <?php print l($row['field_student_first_name'] . ' ' . $row['field_student_last_name'], 'user/' . $row['uid']);?> : <?php print _phonetic_apply_filter($row['comment_body'])?> </p>
    	<span class="liveTime"><?php print $row['created']?></span>
    	
    </div>
</div>
<?php endforeach; ?>
</div>
<div id="views_infinite_scroll-ajax-loader"><img src="<?php print base_path() . drupal_get_path('module', 'views_infinite_scroll')?>/images/ajax-loader.gif" alt="loading..."/></div>
