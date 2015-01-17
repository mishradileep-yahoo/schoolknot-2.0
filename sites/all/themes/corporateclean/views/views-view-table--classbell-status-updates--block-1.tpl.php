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
<?php foreach ($rows as $row_count => $row): //pr($row);?>
<div class="commennts">
    <div class="comment">
        <p>
        <span class="parent-name">
        <?php if($row['field_student_first_name'] != '') {?>
        Parent of  <?php print $row['field_student_first_name'] . ' ' . $row['field_student_last_name'];?> 
        <?php } else {?>
        <?php $commenting_school = _get_school_node_id_for_school_admin_user($row['uid']); 
              print l($commenting_school['title'], 'node/' . $commenting_school['nid']);
        ?>
        <?php } ?>
        
        : </span><?php print _phonetic_apply_filter($row['comment_body'])?> </p>
    	<span class="liveTime"><?php print $row['created']?></span>
    	
    </div>
</div>
<?php endforeach; ?>
