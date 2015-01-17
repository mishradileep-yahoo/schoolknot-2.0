<div class="round-box leftMenu">
	<h2> Navigation </h2>
	<ul>
		<li><?php print l('Compare School<span></span>', 'compare/compare_schools', array('html' => TRUE,)); ?></li>
		<li><?php print l('Research School<span></span>', 'school-research', array('html'=>TRUE, 'class' =>'active')); ?></li>
		<li><?php print l('Browse schools by city<span></span>', 'browse_by_city', array('html'=>TRUE, 'class' =>'active')); ?>
			<ul>
				<?php foreach ($rows as $row_count => $row) { ?>
					<li><?php print l($row['name'], 'browse-schools-by-city/'.$row['tid'])?></li>
				<?php } ?>
			</ul>
		</li>
		<?php $loged_in_as = _logged_in_as_block();

		if($loged_in_as['as'] == 'Parent') {
		?>
			<li><?php print l('School Holidays', 'school-holidays/'.$loged_in_as['school']['nid'], array('html' => TRUE,)); ?></li>
			<li><?php print l('View Homework', 'school-homework/'.$loged_in_as['school']['nid'], array('html' => TRUE,)); ?></li>
      <li><?php print l('Create Notification', 'parentmessage/message', array('html' => TRUE,)); ?></li>
			<li><?php print _get_download_timetable();?></li>
		<?php } // End Schol?>
		
		<?php print _get_school_rating_link_for_parent(); ?>
		<?php if($loged_in_as['as'] == 'Teacher') {
		?>
			<li><?php print l('Notifications', 'messages', array('html' => TRUE,)); ?></li>
      <li><?php print l('Create Notification', 'teachermessage/message', array('html' => TRUE,)); ?></li>
		<?php } ?>
	</ul>
</div>

<?php 
  $loged_in_as = _logged_in_as_block(); 
  if($loged_in_as['as'] == 'School Administrator') {
  $file =  file_create_url('public://SchoolKnot-School-Admin-User-Manual.pdf');
  $link_options = array('attributes' => array('target' => array('_blank')), 'html' => TRUE);
  $link = l('<img src="' . base_path() . path_to_theme() . '/images/download-banner.png">', $file, $link_options);
?>
<div class="round-box leftMenu">
	<?php print $link; ?>
</div>
<?php } ?>

	<ul class="mobileMenu">
		<li>
			<ul class="mobileMenu">
				<li><?php print l('Compare School<span></span>', 'compare/compare_schools', array('html' => TRUE,)); ?></li>
				<li><?php print l('Research School<span></span>', 'school-research', array('html'=>TRUE, 'class' =>'active')); ?></li>
				<li>	<a href="#" class="sub-icon"><img src="<?php print base_path() . drupal_get_path('theme', 'corporateclean') ;?>/images/mob_drpdwn.png"></a>
				<?php print l('Browse schools by city<span></span>', 'browse_by_city', array('html'=>TRUE, 'class' =>'active')); ?>
				
					<ul class="subMenu">
						<?php foreach ($rows as $row_count => $row) { ?>
							<li><?php print l($row['name'], 'browse-schools-by-city/'.$row['tid'])?></li>
						<?php } ?>
					</ul>
				</li>
				<?php $loged_in_as = _logged_in_as_block();
		
				if($loged_in_as['as'] == 'Parent') {
				?>
					<li><?php print l('School Holidays', 'school-holidays/'.$loged_in_as['school']['nid'], array('html' => TRUE,)); ?></li>
					<li><?php print l('View Homework', 'school-homework/'.$loged_in_as['school']['nid'], array('html' => TRUE,)); ?></li>
					<li><?php print _get_download_timetable();?></li>
				<?php } // End Schol?>
				
				<?php print _get_school_rating_link_for_parent(); ?>
				<li><?php print l('Search', 'search/node'); ?></li>
				<li><?php print l('Advance Search', 'advance-search'); ?></li>
				
				<?php if($user->uid == 0){ ?>
				<li><?php print l('Register your school', 'user/register')?></li>
				<li><?php print l('School Admin Login', 'user/login')?></li>
				<li><?php print l('Parent or Teacher Login', 'schoolknot_user_login/step1'); ?></li>
				<li><?php print l('Re-Authenticate Account', 'schoolknot/auth-account'); ?></li>
			<?php } else { ?>
			
        <?php 
        	$loged_in_as = _logged_in_as_block();
        	if($loged_in_as['as'] == 'Parent') {
        	?>
        <li><?php print l('Student Progress Sheet', 'student-tracker/progress-sheet' ); ?></li>
        <li><?php print l('Notifications', 'messages' ); ?></li>
        <li><?php print l('Reset Password', 'schoolknot/reset/password'); ?></li>
        
        
        <?php } ?>
        <li><?php print l('Logout', 'user/logout'); ?></li>
			<?php } ?>
			
			
			</ul>
		</li>
	</ul>