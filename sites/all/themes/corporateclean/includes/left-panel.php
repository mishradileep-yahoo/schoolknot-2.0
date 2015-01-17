<?php if ($page['sidebar_first']) :?>
<!-- #sidebar-first -->
<div id="sidebar-first" class="leftMenuWrap">

<?php $loged_in_as = _logged_in_as_block();

if($loged_in_as['as'] == 'Parent') {
//pr($loged_in_as);
	?>
<?php } // End Schol?> <?php print render($page['sidebar_first']); ?>
<div class="clearer"></div>
<?php if(isset($loged_in_as['school'])) { ?>
	<div class="right-event-calendar-block">
	<h3>Events</h3>
		<?php print views_embed_view('school_events', 'block_1', $loged_in_as['school']['nid']); ?>
	</div>
<?php } ?>

<div id="footer" class="footer">
  <div class="footer-links">
    <?php print l('Contact Us', 'contact-us');?>
  </div>
  <div class="footer-copyright">
  	&copy; Copyright 2014 SchoolKnot.com. All rights reserved.<br>
  	Various trademarks and logos held by their respective owners.
  </div>
</div>

</div>
<!-- EOF: #sidebar-first -->
<?php endif; ?>