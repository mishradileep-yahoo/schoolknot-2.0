<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */

// School Node
$node_id = arg(1);
$node = node_load($node_id);
//pr($node);
$field_city_district = taxonomy_term_load($node->field_city_district[$node->language][0]['tid']);
$field_state = taxonomy_term_load($node->field_state[$node->language][0]['tid']);
?>
<?php $loged_in_as = _logged_in_as_block();
if($loged_in_as['as'] == 'Parent') {
  $schoolId = _get_school_node_id_for_school_admin_user();
?>
   	<div class="tabLists student-progress-tabs">
     	<ul>
     		<li><?php print l(t('<span>Notifications</span>'), 'messages', array('attributes' => array('class' => array('notification', $variables['notificationTabClass'])), 'html' => TRUE));?></li>
       	<li><?php print l(t('<span>Progress Sheet</span>'), 'student-tracker/progress-sheet', array('attributes' => array('class' => array('progress', $variables['progressTabClass'])), 'html' => TRUE));?></li>
       	<!-- <li><?php // print l(t('<span>Attendance</span>'), '/', array('attributes' => array('class' => array('attendance', $variables['attendenceTabClass'])), 'html' => TRUE));?></li> -->
       	<li><?php print l(t('<span>Add Another Student</span>'), 'account_merge/merge', array('attributes' => array('class' => array('add-another', $variables['addAnotherTabClass'])), 'html' => TRUE));?></li>
     	<li><?php print l(t('<span>School Showcase</span>'), 'schoolknot-showcase/'.$schoolId['nid'], array('attributes' => array('class' => array('showcase', $variables['addAnotherTabClass'])), 'html' => TRUE));?></li>
   	</ul>
 	</div>
<?php } ?>
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
  	<?php print $node->title?><br>
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
			<li><?php print l('Showcase', 'schoolknot-timeline/' . $node->nid); ?></li>
			<li><?php print l('Photos', 'school-album/' . $node->nid); ?></li>
			<li><?php // print l('Groups', 'my-groups/' . $node->uid); ?></li>
		</ul>
	</div>

  <?php
      $block = block_load('classbellsu', 'classbellsu_complete_status_form');
      $render_array = _block_get_renderable_array( _block_render_blocks( array($block) ));
      print render($render_array);
    ?>
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>