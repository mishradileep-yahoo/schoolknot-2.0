<div class="status-update-form">
  <ul class="tabs">
    <li class="text" data-warpper="text-status"><span></span>Update Status</li>
    <li class="image" data-warpper="image-status"><span></span>Image / Album Upload</li>
    <li class="video" data-warpper="video-status"><span></span>Videos</li>
  </ul>
	<div class="clearer"></div>
	<div id="text-status" class="status-form-wrapper">
    <?php print $data['text_form']; ?>
	</div>
	<div class="clearer"></div>
	<div id="image-status"  class="status-form-wrapper">
    <?php print $data['image_form']; ?>
  </div>
  <div class="clearer"></div>
  <div id="video-status"  class="status-form-wrapper">
   <?php print $data['video_form']; ?>
  </div>
</div>