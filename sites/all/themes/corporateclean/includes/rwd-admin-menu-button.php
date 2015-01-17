<?php 
  $loged_in_as = _logged_in_as_block();
  if($loged_in_as['as'] == 'School Administrator') {
?>
<div id="admin-menu-show" class="rwd-admin-menu-toggle">Show Admin Menu</div>
<div id="admin-menu-hide" class="rwd-admin-menu-toggle">Hide Admin Menu</div>
<?php } ?>