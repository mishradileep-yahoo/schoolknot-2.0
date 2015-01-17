<div id="mainWrapper">
<?php include('includes/header.php'); ?>
<!-- #content -->
<div id="contentWrap">
	<!-- #content-inside -->
    <div id="content-inside" class="clearfix">
    	<?php include('includes/rwd-admin-menu-button.php'); ?>
        
        		<?php include('includes/left-panel.php'); ?>

            <div id="main" class="rightContainer"> 
            <?php if (theme_get_setting('breadcrumb_display','corporateclean')): print $breadcrumb; endif; ?>
            
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
            
            <?php if ($action_links): ?>
            <ul class="action-links">
            <?php print render($action_links); ?>
            </ul>
            <?php endif; ?>
            
			<?php print render($title_prefix); ?>
            <?php if ($title): ?>
            <h1><?php print $title ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            
            <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
            
            <?php global $user;
            if (in_array('School Administrator', $user->roles) && isset($user)) { 
            ?>
						
						<div class="status-update-form">
      				<ul class="tabs">
      					<li class="text" data-warpper="text-status"><span></span>Update Status</li>
      					<li class="image" data-warpper="image-status"><span></span>Image / Album Upload</li>
      					<li class="video" data-warpper="video-status"><span></span>Videos</li>
      				</ul>
      				<div class="clearer"></div>
      				<div id="text-status" class="status-form-wrapper">
      				
      				<?php
                //$block = module_invoke('classbellsu', 'block_view', 'classbellsu_form');
                //print render ($block);

      				  $block = block_load('classbellsu', 'classbellsu_form');
                $render_array = _block_get_renderable_array( _block_render_blocks( array($block) ));
                print render($render_array);
              ?>
      				</div>
      				<div class="clearer"></div>
      				<div id="image-status"  class="status-form-wrapper">
      					
      					
      					<?php
                  $block = block_load('classbellsu', 'classbellsu_image_form');
                  $render_array = _block_get_renderable_array( _block_render_blocks( array($block) ));
                  print render($render_array);
                ?>
      				
      					

      				</div>
      				<div class="clearer"></div>
      				<div id="video-status"  class="status-form-wrapper">
      					<?php
                  $block = block_load('classbellsu', 'classbellsu_youtube_form');
                  $render_array = _block_get_renderable_array( _block_render_blocks( array($block) ));
                  print render($render_array);
                ?>
      				</div>
      			</div>
        		<?php } ?>
						
						
            <?php print render($page['content']); ?>
            
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


<?php drupal_add_js(base_path() . path_to_theme() . '/js/jquery.nicefileinput.js'); ?>
<?php drupal_add_js(base_path() . path_to_theme() . '/js/jquery.minimalect.js'); ?>
<?php drupal_add_css(base_path() . path_to_theme() . '/css/jquery.minimalect.css'); ?>
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