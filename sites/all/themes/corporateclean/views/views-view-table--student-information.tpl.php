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
<div class="tabContainer">
  <div class="profileDetail">
  	<?php foreach ($rows as $row_count => $row){ 
  	    $school = _get_school_node_id_for_school_admin_user($row['uid']); 
  	    $class = node_load($row['field_class']);
  	    ?>
      <div class="section">
        <p>
          <span class="lbl">Student Name</span> 
          <span class="dtl"><?php print $row['field_student_first_name']; ?> <?php print $row['field_student_last_name']; ?> <?php print $row['field_student_middle_name']; ?></span>
        </p>
        <p>
          <span class="lbl">Registration Number</span> 
          <span class="dtl"><?php print $row['field_student_registration_id']; ?></span>
        </p>
        <p>
          <span class="lbl">Date of Birth</span> 
          <span class="dtl"><?php print $row['field_student_date_of_birth']; ?></span>
        </p>
        <p>
          <span class="lbl">School</span> 
          <span class="dtl"><?php print l($school['title'], 'node/' . $school['nid']); ?></span>
        </p>
        <p>
          <span class="lbl">Class</span> 
          <span class="dtl"><?php print $class->title; ?></span>
        </p>
      </div>
    <?php } ?>
  </div>
</div>