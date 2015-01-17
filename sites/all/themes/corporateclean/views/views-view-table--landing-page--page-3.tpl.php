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
<h1>Albums</h1>
<div class="school-potos">
<?php foreach ($rows as $row_count => $row): //pr($row); ?>
	<div class="image-wrapper">
		<?php print $row['field_status_image'];?>
		<div class="clearer"></div>
	</div>
	<div class="clearer"></div>
	<div class="body"><?php print _phonetic_apply_filter($row['body']);?> - <span class="liveTime"><em class="placeholder"><?php print $row['created'];?></span></div>
<?php endforeach; ?>
</div>

<h1>Photos</h1>
<?php print views_embed_view('landing_page', 'block_2', arg(1)); ?>