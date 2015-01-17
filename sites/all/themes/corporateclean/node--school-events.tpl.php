<?php //pr($node);
$schoolId = _get_school_node_id_for_school_admin_user(); ?>
<?php $loged_in_as = _logged_in_as_block();
		if($loged_in_as['as'] == 'Parent') {
		//pr($loged_in_as);
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
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> event-detail"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      //print render($content);
    ?>
    <h5 class="event-date"><?php print format_start_end_date_comma_sepearted_new($node->field_event_date['und'][0]['value'], $node->field_event_date['und'][0]['value2']);?></h5>
    <?php
  	  if(isset($node->field_event_image['und'][0])) {
        $event_image = array(
          'path' => $node->field_event_image['und'][0]['uri'],
        	'alt' => 'school event image',
          );
        print theme('image',$event_image);
  	  }
    ?>
   	<div class="profileDetail">

      
      <div class="section">
          <span class="lbl">Time</span> 
          <span class="dtl"><?php print format_start_end_date_comma_sepearted_new($node->field_event_date['und'][0]['value'], $node->field_event_date['und'][0]['value2']);?></span>
      		<div class="clearer"></div>
      </div>
      
      
      <div class="section">
          <span class="lbl">Description</span> 
          <span class="dtl"><?php nl2br(print $node->body['und'][0]['value']);?></span>
        <div class="clearer"></div>
        <div class="clearer"></div>
      </div>
      
      
      <?php if(isset($node->field_event_agenda['und'][0])) {?>
      <div class="section">
          <span class="lbl">Agenda for Event</span> 
          <span class="dtl"><?php print nl2br($node->field_event_agenda['und'][0]['value']);?></span>
     <div class="clearer"></div>
      </div>
      
      <?php } ?>
      <?php if(isset($node->field_guests['und'][0])) {?>
      <div class="section">
          <span class="lbl">Guests Invited</span> 
          <span class="dtl"><?php print nl2br($node->field_guests['und'][0]['value']);?></span>
          <div class="clearer"></div>
      </div>
      <?php } ?>
      <?php if(isset($node->field_center_of_attraction['und'][0])) {?>
      <div class="section">
          <span class="lbl">Center of Attraction</span> 
          <span class="dtl"><?php print nl2br($node->field_center_of_attraction['und'][0]['value']);?></span>
        	<div class="clearer"></div>
      </div>
      <?php } ?>
      
      
    </div>
    
    <?php //pr($node); ?>
    
    
  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>

</div>