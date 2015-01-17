<?php
//pr($data['most_member']);
?>
<div class="profile">
	<div class="block">
	<h4>Highly Rated Schools</h4>
		<table class="views-table cols-3">
			<thead>
			<tr>
				<th class="views-field views-field-body">School</th>
				<th class="views-field views-field-edit-node">Rating</th>
			</tr>
			</thead>
		<tbody>
		<?php foreach($data['most_rated'] as $most_rated) { ?>
			<tr class="odd views-row-first">
				<td class="views-field views-field-title"><?php print l($most_rated->title, 'node/' . $most_rated->field_school_id_target_id); ?></td>
				<td class="views-field views-field-title">
				<div class="yellow-stars">
					<?php 
						$rating = average_specific_formating($most_rated->rating);
						print print_star_spans($rating); 
					?>
				</div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
	<div class="block">
	<h4>Most Active Schools</h4>
		<table class="views-table cols-3">
			<thead>
			<tr>
				<th class="views-field views-field-body">School</th>
				<th class="views-field views-field-edit-node">Total Posts</th>
			</tr>
			</thead>
		<tbody>
		<?php foreach($data['most_active'] as $most_active) { ?>
			<tr class="odd views-row-first">
				<td class="views-field views-field-title"><?php print l($most_active->title, 'node/' . $most_active->schools_nid); ?></td>
				<td class="views-field views-field-title">
				<div class="yellow-stars"><?php print $most_active->total_post; ?></div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
	<div class="block">
	<h4>Most Membered Schools</h4>
		<table class="views-table cols-3">
			<thead>
			<tr>
				<th class="views-field views-field-body">School</th>
				<th class="views-field views-field-edit-node">Total Members</th>
			</tr>
			</thead>
		<tbody>
		<?php foreach($data['most_member'] as $most_member) { ?>
			<tr class="odd views-row-first">
				<td class="views-field views-field-title"><?php print l($most_member->title, 'node/' . $most_member->nid); ?></td>
				<td class="views-field views-field-title">
				<div class="yellow-stars"><?php print $most_member->total_memebers; ?></div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
	<div class="block">
	<h4>Optimal Teacher Students Ratio</h4>
		<table class="views-table cols-3">
			<thead>
			<tr>
				<th class="views-field views-field-body">School</th>
				<th class="views-field views-field-edit-node">Teacher : Students Ratio</th>
			</tr>
			</thead>
		<tbody>
		<?php foreach($data['teacher_parent'] as $parent_ratio) { ?>
			<tr class="odd views-row-first">
				<td class="views-field views-field-title"><?php print l($parent_ratio->title, 'node/' . $parent_ratio->nid); ?></td>
				<td class="views-field views-field-title">
				<div class="yellow-stars"><?php print $parent_ratio->field_student_teacher_ratio_value; ?></div>
				</td>
			</tr>
		<?php } ?>
		</tbody>
		</table>
	</div>
</div>