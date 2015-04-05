<?php drupal_add_js(base_path() . path_to_theme() . '/js/custom.js'); ?>
<?php drupal_add_js(base_path() . path_to_theme() . '/js/mobile.js'); ?>
<!-- #header -->
<div id="header">
	<div class="logo">
		<a href="<?php print base_path(); ?>" class="logo">
			<img src="<?php print base_path() . drupal_get_path('theme', 'corporateclean') ;?>/images/logo.png"  />
		</a>
	</div>
	<div class="logo-home-icon">
		
			<div class="home-img">
			<a href="<?php print base_path(); ?>">
			<img src="<?php print base_path() . drupal_get_path('theme', 'corporateclean') ;?>/images/logo-home-icon.png"  />
			</a>
			</div>
		
	</div>
	<ul class="navList">
		<li>
			<a href="#" class="list-icon"><img src="<?php print base_path() . drupal_get_path('theme', 'corporateclean') ;?>/images/rwd_drpdwn.png"></a>
			<!--  <a href="javascript: void(0);" class="rwd-menu-hide-show hide"></a>  -->
			<?php print render($page['sidebar_first']); ?>
		</li>
	</ul>
	<div class="hdrRight">
		<div id="user-menu">
			<?php if($user->uid == 0){ ?>
			<ul>
				<li><?php print l('Register your school', 'user/register')?></li>
				<li class="login">Login
					<ul id="login-submenu">
						<li><?php print l('School Admin Login', 'user/login')?></li>
						<li><?php print l('Parent or Teacher Login', 'schoolknot_user_login/step1'); ?></li>
						<li><?php print l('Re-Authenticate Account', 'schoolknot/auth-account'); ?></li>
					</ul>
				</li>
			</ul>
			<?php } else { ?>
			<ul>
			<?php 
				$loged_in_as = _logged_in_as_block();
				if($loged_in_as['as'] == 'Parent') {
				?>
					<li class="user">You are logged-in as Parent of <?php print _user_full_name_by_user_obj($loged_in_as['user']); ?> <span class="user"></span> <?php //print l() . ' <span class="user"></span>', 'student-tracker/progress-sheet', array('html' => true)); ?>
						<ul id="user-submenu">
							<li><?php print l('Student Progress Sheet', 'student-tracker/progress-sheet' ); ?></li>
							<li><?php print l('Notifications', 'messages' ); ?></li>
							<li><?php print l('Reset Password', 'schoolknot/reset/password'); ?></li>
						</ul>
					</li>
				<?php } else if($loged_in_as['as'] == 'School Administrator') { 
				$admin_school = _get_school_node_id_for_school_admin_user();
					?>
					<li class="user">You are logged-in as Admin of <?php print $loged_in_as['school']['title']; ?> <span class="user"></span> <?php //print l($loged_in_as['school']['title'] . ' <span class="user"></span>', 'node/' . $loged_in_as['school']['nid'], array('html' => true)); ?>
						<ul id="user-submenu">
							<li><?php print l('School Profile', 'node/' . $admin_school['nid'] ); ?></li>
							<li><?php print l('Edit School', 'node/' . $admin_school['nid'] . '/edit'); ?></li>
							<li><?php print l('Reset Password', 'schoolknot/reset/password'); ?></li>
						</ul>
					
					
				<?php } else if($loged_in_as['as'] == 'Teacher') { 
				$admin_school = _get_school_node_id_for_school_admin_user();
					?>
					<li class="user">You are logged-in as Teacher of <?php print $loged_in_as['school']['title']; ?> <span class="user"></span> <?php //print l($loged_in_as['school']['title'] . ' <span class="user"></span>', 'node/' . $loged_in_as['school']['nid'], array('html' => true)); ?>
						<ul id="user-submenu">
							<li><?php print l('Reset Password', 'schoolknot/reset/password'); ?></li>
						</ul>
				<?php } ?>
				
				<li class="logout"><?php print l('Logout <span class="logout"></span>', 'user/logout', array('html' => true)); ?></li>
				</ul>
				
				
				
			<?php } ?>
		</div>
		<div class="clearer"></div>
		<?php print render($page['search_area']); ?>
		<div class="clearer"></div>
		<div class="advance-search-link"><?php print l('Advance Search', 'advance-search');?></div>
		<div class="clearer"></div>
	</div>
</div>

<div class="rwd-menu-show-wrapper">
<a href="javascript: void(0);" class="rwd-menu-hide-show show"></a>
</div>

<!-- EOF: #header -->