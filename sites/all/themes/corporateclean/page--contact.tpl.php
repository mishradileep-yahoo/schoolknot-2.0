<?php drupal_add_js(base_path() . path_to_theme() . '/js/jquery.minimalect.min.js'); ?>
<div id="mainWrapper">
<?php include('includes/header.php'); 
$schoolId = _get_school_node_id_for_school_admin_user(); ?>
<!-- #content -->
<div id="contentWrap">
	<!-- #content-inside -->
    <div id="content-inside" class="clearfix">
    	<?php include('includes/rwd-admin-menu-button.php'); ?>
        <?php include('includes/left-panel.php'); ?>
        

            <div id="main" class="rightContainer"> 
            <?php //if (theme_get_setting('breadcrumb_display','corporateclean')): print $breadcrumb; endif; ?>
            
            <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
       
            <?php if ($messages): ?>
            <div id="console" class="clearfix">
            <?php print $messages; ?>
            </div>
            <?php endif; ?>
     
            <?php if ($page['help']): ?>
            <div id="help">
            <?php print render($page['help']); ?>
            </div>
            <?php endif; ?>
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
            <?php if ($action_links): ?>
            <ul class="action-links">
            <?php print render($action_links); ?>
            </ul>
            <?php endif; ?>
            
			<?php print render($title_prefix); ?>
            <?php if ($title): ?>
            <h1><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            
            <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
            
            
            <div class="tabContainer">
            <?php 
            if($loged_in_as['as'] == 'Parent') { 
              $stuent_school = node_load($loged_in_as['school']['nid']);
              ?>
                <div class="profileDetail contact-us">
                <p> Please contact you school administrator on below details or go to <?php print l(t($stuent_school->title), 'node/'.$schoolId['nid'], array('attributes' => array('class' => array('showcase', $variables['addAnotherTabClass'])), 'html' => TRUE));?> detail page.</p>
                  <div class="section">
                    <p>
                    	<span class="lbl">Contact Person</span> 
                    	<span class="dtl"><?php print $stuent_school->field_contact_person['und'][0]['value']; ?></span>
                    </p>
                    <p>
                    	<span class="lbl">Contact No</span> 
                    	<span class="dtl"><?php print $stuent_school->field_contact_no['und'][0]['value']; ?></span>
                    </p>
                    <p>
                      <span class="lbl">Email ID</span> <span class="dtl"><a
                      href="mailto:<?php print $stuent_school->field_email_id['und'][0]['value']; ?>"><?php print $stuent_school->field_email_id['und'][0]['value']; ?></a>
                      </span>
                    </p>
                    <p>
                    	<span class="lbl">Address</span> 
                    	<span class="dtl"><?php print $stuent_school->field_address['und'][0]['value']; ?></span>
                    </p>
                  </div>
                </div>
              
              
              <?php } else {  print render($page['content']); } ?>
              </div>
            <?php ?>
            
            <?php print $feed_icons; ?>
            
        </div><!-- EOF: #main -->
        
        <?php if ($page['sidebar_second']) :?>
        <!-- #sidebar-second -->
        <div id="sidebar-second" class="grid_4">
        	<?php print render($page['sidebar_second']); ?>
        </div><!-- EOF: #sidebar-second -->
        <?php endif; ?>  

    </div><!-- EOF: #content-inside -->

</div><!-- EOF: #content -->


</div>
<?php drupal_add_js(base_path() . path_to_theme() . '/js/custom.js'); ?>
<script type="text/javascript">
<!--
	function toggle_visibility(id) {
	var e = document.getElementById(id);
	if(e.style.display == 'block')
		e.style.display = 'none';
	else
		e.style.display = 'block';
	}
//-->
</script>