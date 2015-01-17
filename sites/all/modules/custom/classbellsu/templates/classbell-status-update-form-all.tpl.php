<?php global $user;
$logged_in_user_school_id = _get_school_node_id_for_school_admin_user();
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