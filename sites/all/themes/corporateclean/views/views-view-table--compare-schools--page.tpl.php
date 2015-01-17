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

$school_comp_array = array();
$collSplit = count($rows);
foreach($rows as $index => $school) {
	
  $school_comp_array[$index] = node_load($school['nid']);
}
//pr($school_comp_array);
$compare_parameters = array(

	'school_address' => array('title' => 'Location', 'type' => 'school_address'),
	'field_telephone' => array('title' => 'Telephone', 'type' => 'text'),
	'field_mobile' => array('title' => 'Mobile', 'type' => 'text'),

	'field_number_of_students' => array('title' => 'Number of Students', 'type' => 'text'),

	'field_awards_and_recognition' => array('title' => 'Awards and Recognition', 'type' => 'text'),

	'field_students_age_group' => array('title' => 'Students Age Group', 'type' => 'list'),
	'field_board_affiliation' => array('title' => 'Board Affiliation', 'type' => 'list'),
	'field_date_of_incorporation' => array('title' => 'School Age', 'type' => 'school_age'),

	'field_type_of_school' => array('title' => 'Type Of School', 'type' => 'list'),
	'field_part_of_a_chain_school' => array('title' => 'Part of a chain school', 'type' => 'boolean'),
	'field_sports_facilities' => array('title' => 'Sports Facilities', 'type' => 'boolean'),
	'field_student_exchange_program' => array('title' => 'Student Exchange program', 'type' => 'boolean'),
	
	'field_in_school_dining' => array('title' => 'In School Dining', 'type' => 'boolean'),
	'field_laboratory' => array('title' => 'Laboratory', 'type' => 'boolean'),
	'field_library' => array('title' => 'Library', 'type' => 'boolean'),
	'field_auditorium_hall' => array('title' => 'Auditorium/Hall', 'type' => 'boolean'),
	'field_music_classes' => array('title' => 'Music classes', 'type' => 'boolean'),

	'field_foreign_languages' => array('title' => 'Foreign Languages', 'type' => 'boolean'),
	
	'field_school_timings' => array('title' => 'School Timings', 'type' => 'school_timings'),
	'field_pick_up_and_drop_facility' => array('title' => 'Pick-up and Drop Facility', 'type' => 'boolean'),
	'field_student_teacher_ratio' => array('title' => 'Teacher:Student ratio', 'type' => 'text'),

	'field_contact_person' => array('title' => 'Contact Person', 'type' => 'text'),
	'field_contact_no' => array('title' => 'Contact Number', 'type' => 'text'),
	'field_email_id' => array('title' => 'Contact Email ID', 'type' => 'text'),
	'field_address' => array('title' => 'Contact Address', 'type' => 'text'),


	'field_average_fees_per_year' => array('title' => 'Average Fees per year', 'type' => 'fee'),
	'field_general_guidelines' => array('title' => 'General Guidelines', 'type' => 'text'),
	'field_enrolment_process' => array('title' => 'Enrolment Process', 'type' => 'text'),
	'field_student_bodies' => array('title' => 'Student Bodies', 'type' => 'text'),
	'field_special_highlights' => array('title' => 'Special Highlights', 'type' => 'text'),
	'field_from_the_principal_s_desk' => array('title' => 'From the principal\'s desk', 'type' => 'text'),

	'field_cricket_ground' 		=> array('title' => 'Cricket Ground', 'type' => 'boolean'),
	'field_playground' 			=> array('title' => 'Playground', 'type' => 'boolean'),
	'field_athletics' 			=> array('title' => 'Athletics', 'type' => 'boolean'),
	'field_skating' 			=> array('title' => 'Skating', 'type' => 'boolean'),
	'field_horse_riding' 		=> array('title' => 'Horse Riding', 'type' => 'boolean'),
	'field_basketball' 			=> array('title' => 'Basketball', 'type' => 'boolean'),
	'field_archery' 			=> array('title' => 'Archery', 'type' => 'boolean'),
	'field_badminton' 			=> array('title' => 'Badminton', 'type' => 'boolean'),
	'field_football' 			=> array('title' => 'Football', 'type' => 'boolean'),
	'field_indoor_games' 		=> array('title' => 'Indoor games', 'type' => 'boolean'),
	'field_swimming_pool' 		=> array('title' => 'Swimming Pool', 'type' => 'boolean'),
	'field_martial_arts' 		=> array('title' => 'Martial arts', 'type' => 'boolean'),
	'field_yoga' 				=> array('title' => 'Yoga', 'type' => 'boolean'),

	'field_language_classes_offered' => array('title' => 'Language Classes Offered', 'type' => 'text'),
	'field_extra_curricular_activitie' => array('title' => 'Extra-Curricular Activities', 'type' => 'text'),
	'field_air_conditioned_classes' => array('title' => 'Air Conditioned Classes', 'type' => 'boolean'),
	'field_school_team' => array('title' => 'School Team', 'type' => 'text'),
	'field_managing_committee' => array('title' => 'Managing Committee', 'type' => 'text'),
);

drupal_add_js(base_path() . path_to_theme() . '/js/jquery.balloon.js');
?>


<div class="compare-school-wrapper">
	<div class="cs-row cs-row-dsk">
		<div class="label">&nbsp;</div>
		<?php for($i = 0; $i <= 4; $i++) {
			if(isset($school_comp_array[$i])) {
		?>
			<div class="cell cell-1of<?php print $collSplit;?>"><?php print l($school_comp_array[$i]->title, 'node/' . $school_comp_array[$i]->nid); ?></div>
		<?php 
			}
		} 
		?>
	</div>
	
	<div class="cs-row cs-row-logo">
		<div class="label label-logo-dsk">&nbsp;</div>
		<div class="label label-logo-mlb">Logo</div>
    	<?php for($i = 0; $i <= 4; $i++) {
    	  if(isset($school_comp_array[$i])) {
    	?>
    	<div class="cell cs-logo-sch cell-1of<?php print $collSplit;?>"><?php print l($school_comp_array[$i]->title, 'node/' . $school_comp_array[$i]->nid); ?></div>
    	<div class="cell cell-1of<?php print $collSplit;?> cs-logo">
      	<?php
      	  if(isset($school_comp_array[$i]->field_logo['und'][0]['uri'])) {
            $school_logo_image = array(
              'style_name' => '68x68_resize',
              'path' => $school_comp_array[$i]->field_logo['und'][0]['uri'],
							'getsize' => TRUE,
              'attributes' => array('class' => 'compare-school-page-school-logo'),
              );
            print theme('image_style',$school_logo_image);
      	  }
        ?>
    	<?php //print $school_comp_array[$i]->nid; ?></div>
    	<div class="cs-hr" style="" class=""></div>
    	<?php 
    	  }
    	} 
    	?>
    </div>
    
    <?php foreach($compare_parameters as $parameters => $compare_parameter) {
  	      $print_func = 'compare_school_print_' . $compare_parameter['type'];
  	  ?>
    	<div class="cs-row cs-row-dsk">
      	<div class="label"><b><?php print $compare_parameter['title']; ?></b></div>
      	<?php for($i = 0; $i <= 4; $i++) {
      	  if(isset($school_comp_array[$i])) {
      	  	if('compare_school_print_school_address' == $print_func) { 
      	?>
      	<div class="cell cell-1of<?php print $collSplit;?>"><?php print nl2br($print_func($school_comp_array[$i])); ?></div>
      	<?php } else {?>
      	<div class="cell cell-1of<?php print $collSplit;?>">
      		<div class="text-teaser"><?php print nl2br(substr($print_func($school_comp_array[$i]->$parameters), 0, 120)); ?></div>
      		<?php if('text' == $compare_parameter['type']) { ?>
      		<div class="text-full"><?php print nl2br($print_func($school_comp_array[$i]->$parameters)); ?></div>
      		<?php } ?>
      		
      	</div>
      	<?php 
      		}
      	  }
      	} 
      	?>
      </div>
      
      <div class="cs-row cs-row-mbl">
      	<div class="label"><b><?php print $compare_parameter['title']; ?></b></div>
      	<?php for($i = 0; $i <= 4; $i++) {
          if(isset($school_comp_array[$i])) {?>
          	<div class="cell cell-1of<?php print $collSplit;?>"><?php print l($school_comp_array[$i]->title, 'node/' . $school_comp_array[$i]->nid); ?></div>
          	<div class="text-full"><?php print nl2br($print_func($school_comp_array[$i]->$parameters)); ?></div>
          	<div class="" style="clear:both; border-top: 1px dotted #E5F4FE; margin-top: 10px"></div>
          <?php 
          }
        } 
        ?>
      </div>
      
    <?php } ?>
</div>

<script>
(function($) {
	$(document).ready(function(){
		$('.cs-row .cell').each(function(){
			var thisCell = $(this);
			thisCell.find('.text-teaser').balloon(
				{
					contents: thisCell.find('.text-full').html(),
					tipSize: 24,
					position: "left",
					opacity: '1',
					css: {
					    border: 'solid 4px #2E79B2',
					    width: '300px',
					  }
				}
			);
		});
	});
})(jQuery);
</script>