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

<?php endforeach; ?>
<div class="schoolInfo">
<div class="schLogoWrap"><?php print $row['field_logo'];?></div>
<div class="schDtl">
<h4><?php print $row['title']; ?></h4>
<div class="blue-stars">
	<?php 
	$rating = _get_school_rating($row['nid']);
	print print_star_spans($rating); ?>
</div>
<p><?php print $row['field_address_line_1']; ?>, <?php print $row['field_address_line_2']; ?></p>
<p><?php print $row['field_city_district']; ?>, <?php print $row['field_state']; ?></p>
</div>
</div>