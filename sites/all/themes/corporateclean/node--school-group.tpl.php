<?php //pr($node); ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> blockWrap"<?php print $attributes; ?> >

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted"><?php //print $submitted ?></div>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <div class="school-groups school-groups-details">
      <div class="group-item group-item-detail">
    		<div class="logo">
          <?php
            $image = array(
            	'style_name' => '158X158_resize',
            	'path' => $node->field_logo['und'][0]['uri'],
            	'alt' => $node->title,
            	'title' => $node->title,
            );
            print theme('image_style', $image);
         ?>
    		</div>
    		<div class="details">
    			<p><?php print $node->body['und'][0]['safe_value'];?></p>
    		</div>
    	</div>
	</div>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      //print render($content);
    ?>
  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>

</div>