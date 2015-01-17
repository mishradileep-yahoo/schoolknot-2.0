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

global $user;
$results = '';
$result = db_select('node')
      ->fields('node', array('nid'))
      ->condition('type', 'school', '=')
      ->condition('uid', $user->uid, '=')
      ->range(0, 10)
      ->execute();
      foreach ($result as $node) {
      $results = check_plain($node->nid);
    }
$node = node_load($results);
//pr($node);
?>
<div class="profileWrap">
  <?php
  	  if(isset($node->field_school_profile_image['und'][0]['uri'])) {
        $school_profile_image = array(
          'style_name' => '776x287_resize',
          'path' => $node->field_school_profile_image['und'][0]['uri'],
          );
        print theme('image_style',$school_profile_image);
  	  }
    ?>
  <div class="profileThumb">
  	<?php
  	  if(isset($node->field_logo['und'][0]['uri'])) {
        $school_logo_image = array(
          'style_name' => '158x158_resize',
          'path' => $node->field_logo['und'][0]['uri'],
          );
        print theme('image_style',$school_logo_image);
  	  }
    ?>
  </div>
  <div class="schDetailWrap">
  
  <h2>
  	<?php print $node->title;?><br>
  	<span class="addr">
			<?php print $node->field_address_line_1['und'][0]['value']; ?>, <?php print $node->field_address_line_2['und'][0]['value']; ?><br>
		</span>
		<span>
			<?php $parents_for_school = _get_all_active_parents_for_school($node->nid);
			print 'Active School Members: ' . $parent_count = count($parents_for_school); ?>
		 </span>
		<div class="yellow-stars">
			<?php 
			$rating = _get_school_rating($node->nid);
			print print_star_spans($rating); ?>
		</div>
  </h2>
  <!-- 
  <a href="#" class="following">889 Parents Following</a>
  <div class="rating">
    <span class="star rated"></span>
    <span class="star rated"></span>
    <span class="star rated"></span>
    <span class="star"></span>
    <span class="star"></span>
  </div>
     -->
  </div>

</div>

<div class="tabLists">
	<ul>
		<li><?php print l('About', 'node/' . $node->nid); ?></li>
		<li><?php print l('Showcase', 'school-timeline/' . $node->nid); ?></li>
		<li><?php print l('Photos', 'school-album/' . $node->nid); ?></li>
		<li><?php // print l('Groups', 'my-groups/' . $node->uid); ?></li>
	</ul>
</div>
<div class="tabContainer">
<div class="groupCntr">
 <ul>
		<?php foreach ($rows as $row_count => $row):
		 ?>
		<li>
		<p class="groupName">
			<?php print $row['field_logo'];?>
			<?php $school_name = _phonetic_apply_filter($row['title']);  
			print l($school_name, 'group-content/'.$row['gid']); ?>
		</p>
		  <?php 
		  $view = views_get_view('og_members');
		  $view->set_display('block_1');
		  $view->set_arguments(array($row['gid']));
		  $view->execute();
		  $reviewCount = count($view->result);
		  print 'Members: '. $reviewCount .'</br>';?>
		  </li>
		<?php endforeach; ?>
		
	</ul>
</div>
</div>