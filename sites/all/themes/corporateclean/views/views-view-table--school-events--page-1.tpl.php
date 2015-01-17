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
<?php $loged_in_as = _logged_in_as_block();
$schoolId = _get_school_node_id_for_school_admin_user();

						if($loged_in_as['as'] == 'Parent') {
						//pr($loged_in_as);
							?>
<div class="tabLists student-progress-tabs">
	<ul>
		<li><?php print l(t('<span>Notifications</span>'), 'messages', array('attributes' => array('class' => array('notification')), 'html' => TRUE));?></li>
		<li><?php print l(t('<span>Progress Sheet</span>'), 'student-tracker/progress-sheet', array('attributes' => array('class' => array('progress')), 'html' => TRUE));?></li>
		<!-- <li><?php // print l(t('<span>Attendance</span>'), '/', array('attributes' => array('class' => array('attendance')), 'html' => TRUE));?></li> -->
		<li><?php print l(t('<span>Add Another Student</span>'), '/account_merge/merge', array('attributes' => array('class' => array('add-another')), 'html' => TRUE));?></li>
		<li><?php print l(t('<span>School Showcase</span>'), 'schoolknot-showcase/'.$schoolId['nid'], array('attributes' => array('class' => array('showcase')), 'html' => TRUE));?></li>
	</ul>
</div>
<?php } ?>
<div class="events-day">
	<?php foreach ($rows as $row_count => $row){ //pr($row); ?>
  	<div class="events-item-img events-item">
  		<div class="img"><?php print $row['field_event_image']; ?></div>
  		<div class="content">
  			<h4><?php print _phonetic_apply_filter($row['title_1']); ?></h4>
  			<h5><?php print $row['field_event_date']; ?></h5>
  			<?php print strip_tags($row['body']); ?>
  		</div>
  	</div>
  	<div class="clearer"></div>
	<?php } ?>	
</div>



<style>
.content div.view-header {display: none}
</style>