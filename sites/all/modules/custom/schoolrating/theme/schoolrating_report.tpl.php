<?php
//pr($variables['data']['rating_data']);
?>
<div class="profile">
	<div class="block">
	<h4>Overall rating</h4>
	<div class="yellow-stars">
			<?php 
			$rating = _get_school_rating($variables['data']['school_data']['nid']);
			print print_star_spans($rating); ?>
		</div>
	</div>
	
	<div class="block">
	<h4>Question wise rating report</h4>
		
			<table class="views-table cols-3">
				<thead>
				<tr>
					<th class="views-field views-field-body">Rating Criteria</th>
					<th class="views-field views-field-edit-node">Avg. Rating</th>
					<th class="views-field views-field-edit-node">Max Rate</th>
					<th class="views-field views-field-edit-node">Min. Rate</th>
					<th class="views-field views-field-edit-node">Total Vote</th>
				</tr>
				</thead>
			<tbody>
			<?php foreach ($variables['data']['rating_data'] as $rating_data) { ?>
				<tr class="odd views-row-first">
					<td class="views-field views-field-title"><?php print $rating_data['title']; ?></td>
					<td class="views-field views-field-title">
						<div class="blue-stars"><?php print print_star_spans($rating_data['avg']); ?> (<?php print $rating_data['avg']; ?>)</div>
					</td>
					<td class="views-field views-field-title"><?php print $rating_data['max']; ?></td>
					<td class="views-field views-field-title"><?php print $rating_data['min']; ?></td>
					<td class="views-field views-field-title"><?php print $rating_data['total']; ?></td>
				</tr>
			<?php } ?>
			</tbody>
			</table>
	</div>
</div>