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
<div class="holiday">
	<div class="round-box leftMenu">
		<h2 class="holidyheadng">Holidays List</h2>
		<ul>
			<?php foreach ($rows as $row_count => $row):?> 
				<li><?php print $row['title'];?></li>
			<?php endforeach;  ?>
			<li><?php print l(t('View All'), 'list-of-holidays');?></li>
		</ul>
	</div>
</div>
