<?php
// $Id$
/**
 * Theme for social updates.
 * $updates is an enumetrated array which contains 6 latest
 * updates from twitter and facebook and each update contains status, user and source. 
 */
?>
<div class="col buzz">
  <h4>The Buzz</h4>
  <ul>
    <?php 
    foreach($updates as $update) { 
      $status = (strlen($update['status'])>250)?substr($update['status'], 0, 250).'...' : $update['status'];
       if($update['source'] == 'facebook') {
    ?>
      <li class="facebook">
        <?php print l($status, variable_get('jstor_social_updates_facebook_page_link'), array('attributes' => array('target' => '_blank')));?>
      </li>
    <?php 
    }
    else {
    ?>
      <li class="twitt">
        <?php print $status . "<br/>@"; print l($update['user'], variable_get('jstor_social_updates_twitter_page_link'), array('attributes' => array('target' => '_blank')));?>
      </li>
    <?php	  
    }
    }
    ?>
  </ul>
</div>