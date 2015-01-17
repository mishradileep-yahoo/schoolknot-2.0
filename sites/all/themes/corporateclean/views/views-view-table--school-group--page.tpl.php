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
<div class="school-groups">
<?php foreach ($rows as $row_count => $row){ ?>
	<div class="group-item">
		<div class="logo"><?php print $row['field_logo']; ?></div>
		<div class="details">
			<p><?php print $row['title']; ?></p>
			<p><i>Memeber Since : <?php print $row['created']; ?></i></p>
			<p><?php print $row['body']; ?></p>
		</div>
	</div>
<?php } ?>
</div>