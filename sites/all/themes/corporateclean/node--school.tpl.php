<?php //pr($node); ?>
<div class="profileWrap">
  <?php
  	  if(isset($node->field_school_profile_image['und'][0]['uri'])) {
        $school_profile_image = array(
          'style_name' => '776x287_resize',
          'path' => $node->field_school_profile_image['und'][0]['uri'],
          );
        print theme('image_style',$school_profile_image);
  	  }
  	  else {
  	  	
  	  }
    ?>
  <div class="profileThumb">
  	<?php
  	  if(isset($node->field_logo['und'][0]['uri'])) {
        $school_logo_image = array(
          'style_name' => '158x158_resize',
          'path' => $node->field_logo['und'][0]['uri'],
          );
        print theme('image_style',$school_logo_image);
  	  }
    ?>
  </div>
  <div class="schDetailWrap">
  
  <h2>
  	<?php print $node->title?><br>
  	<span class="addr">
			<?php print $node->field_address_line_1['und'][0]['value']; ?>, <?php print $node->field_address_line_2['und'][0]['value']; ?><br>
		</span>
		<span>
			<?php $parents_for_school = _get_all_active_parents_for_school($node->nid);
			print 'Active School Members: ' . $parent_count = count($parents_for_school); ?>
		 </span>
		<div class="yellow-stars">
			<?php 
			$rating = _get_school_rating($node->nid);
			print print_star_spans($rating); ?>
		</div>
		
  </h2>
  <!-- 
  <a href="#" class="following">889 Parents Following</a>
  <div class="rating">
    <span class="star rated"></span>
    <span class="star rated"></span>
    <span class="star rated"></span>
    <span class="star"></span>
    <span class="star"></span>
  </div>
     -->
  </div>

</div>

 
	<div class="tabLists">
		<ul>
			<li><?php print l('About', 'node/' . $node->nid); ?></li>
			<li><?php print l('Showcase', 'schoolknot-timeline/' . $node->nid); ?></li>
			<li><?php print l('Photos', 'school-album/' . $node->nid); ?></li>
		</ul>
	</div>
<div class="tabContainer">
	<div class="section">
		<h2>About</h2>
      <?php print $node->field_school_profile['und'][0]['value']; ?>
		</div>
    <div class="section">
    	<h2 class="icon addrIcon">Address</h2>
      <ul class="addrDtl">
        <li>
        	<p class="left">Address</p>
        	<p class="right"><?php print $node->field_address_line_1['und'][0]['value']; ?></p>
        </li>
        <li>
        	<p class="left">Address Line 2</p>
        	<p class="right"><?php print $node->field_address_line_2['und'][0]['value']; ?></p>
        </li>
        <li>
        	<p class="left">City/District</p>
        	<p class="right"><?php print $node->field_city_district['und'][0]['taxonomy_term']->name; ?></p>
        </li>
        <li>
        	<p class="left">State</p>
        	<p class="right"><?php print $node->field_state['und'][0]['taxonomy_term']->name; ?></p>
        </li>
        <li>
        	<p class="left">Pin</p>
        	<p class="right"><?php print $node->field_pincode['und'][0]['value']; ?></p>
        </li>
        <li>
        	<p class="left">Telephone</p>
        	<p class="right"><?php print $node->field_telephone['und'][0]['value']; ?></p>
        </li>
        <li>
        	<p class="left">Mobile</p>
        	<p class="right"><?php print $node->field_mobile['und'][0]['value']; ?></p>
        </li>
      </ul>
    </div>
  <div class="section">
    <h2 class="icon awardIcon">Awards and Recognition</h2>
    <?php print $node->field_awards_and_recognition['und'][0]['value']; ?>
  </div>
  <div class="section">
  <h2 class="icon profileIcon">Profile</h2>
    <div class="profileDetail">
      <div class="section">
      <p>
      	<span class="lbl">Students age Group</span> 
      	<span class="dtl">
      		<?php
      		  $info = field_info_field('field_students_age_group'); 
            $values = $info['settings']['allowed_values'];
            foreach($node->field_students_age_group['und'] as $student_age_group) { ?>
              <span><?php print $values[$student_age_group['value']];?></span>
          <?php } ?>
      	</span>
      </p>
      </div>
      <div class="section">
        <p>
        	<span class="lbl">Board Affiliation</span> 
        	<span class="dtl"> 
          	<?php
        		  $info = field_info_field('field_board_affiliation'); 
              $values = $info['settings']['allowed_values'];
              foreach($node->field_board_affiliation['und'] as $student_age_group) { ?>
                <span><?php print $values[$student_age_group['value']];?></span>
            <?php } ?>
        	</span>
        </p>
      </div>
      <div class="section">
        <p>
        	<span class="lbl">Type Of School</span> 
        	<span class="dtl">
  				  <?php print ucfirst($node->field_type_of_school['und'][0]['value']); ?>
  				</span>
        </p>
      </div>
      <div class="section">
        <p>
        	<span class="lbl">Date of Incorporation</span> 
        	<span class="dtl"> 
          	<?php print ucfirst($node->field_date_of_incorporation['und'][0]['value']); ?>
        	</span>
        </p>
      </div>
      
      <div class="section">
        <p>
          <span class="lbl">Part of a chain school</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_part_of_a_chain_school); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Sports Facilities</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_sports_facilities); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Student Exchange program</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_student_exchange_program); ?>
					</span>
        </p>
        <p>
          <span class="lbl">In School Dining</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_in_school_dining); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Laboratory</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_laboratory); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Library</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_library); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Auditorium/Hall</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_auditorium_hall); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Music Classes</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_music_classes); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Foreign Languages</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_foreign_languages); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Pick-up and Drop Facility</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_pick_up_and_drop_facility); ?>
					</span>
        </p>
      </div>	
      <div class="section">
        <p>
        	<span class="lbl">Contact Person</span> 
        	<span class="dtl"><?php print $node->field_contact_person['und'][0]['value']; ?></span>
        </p>
        <p>
        	<span class="lbl">Contact No</span> 
        	<span class="dtl"><?php print $node->field_contact_no['und'][0]['value']; ?></span>
        </p>
        <p>
          <span class="lbl">Email ID</span> <span class="dtl"><a
          href="mailto:<?php print $node->field_email_id['und'][0]['value']; ?>"><?php print $node->field_email_id['und'][0]['value']; ?></a>
          </span>
        </p>
        <p>
        	<span class="lbl">Address</span> 
        	<span class="dtl"><?php print $node->field_address['und'][0]['value']; ?></span>
        </p>
      </div>
    <div class="section">
    <p>
    <span class="lbl">Average Fees per year</span> <span class="dtl"><?php print compare_school_print_fee($node->field_average_fees_per_year)?></span>
    </p>
    </div>
    
    	<div class="section">
      	<h2>Other Details</h2>
      	
      	<?php if(isset($node->field_general_guidelines['und'])) { ?>
      	<h3>General Guidelines</h3>
      	<p><?php print $node->field_general_guidelines['und'][0]['value']; ?></p>
      	<?php } ?>
      	
      	<?php if(isset($node->field_enrolment_process['und'])) { ?>
      	<h3>Enrolment Process</h3>
      	<p><?php print $node->field_enrolment_process['und'][0]['value']; ?></p>
      	<?php } ?>
      	
      	<?php if(isset($node->field_school_culture['und'])) { ?>
      	<h3>School Culture</h3>
      	<p><?php print $node->field_school_culture['und'][0]['value']; ?></p>
      	<?php } ?>
      	
      	<?php if(isset($node->field_school_motto_['und'])) { ?>
      	<h3>School Motto</h3>
      	<p><?php print $node->field_school_motto_['und'][0]['value']; ?></p>
      	<?php } ?>
      	
      	<?php if(isset($node->field_school_vision['und'])) { ?>
      	<h3>School Vision</h3>
      	<p><?php print $node->field_school_vision['und'][0]['value']; ?></p>
      	<?php } ?>
      	
      	<?php if(isset($node->field_student_bodies['und'])) { ?>
      	<h3>Student Bodies</h3>
      	<p><?php print $node->field_student_bodies['und'][0]['value']; ?></p>
      	<?php } ?>
      	
      	<?php if(isset($node->field_special_highlights['und'])) { ?>
      	<h3>Special Highlights</h3>
      	<p><?php print $node->field_special_highlights['und'][0]['value']; ?></p>
      	<?php } ?>
      	
      	<?php if(isset($node->field_from_the_principal_s_desk['und'])) { ?>
      	<h3>From the Principal's Desk</h3>
      	<p><?php print $node->field_from_the_principal_s_desk['und'][0]['value']; ?></p>
    	</div>
    	<?php } ?>
    	
    	<div class="section">
    		<h2>Sports Facilities</h2>
        <p>
          <span class="lbl">Cricket Ground</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_cricket_ground); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Playground</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_playground); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Athletics</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_athletics); ?>
					</span>
        </p>
        <p>
          <span class="lbl">Skating</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_skating); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Horse Riding</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_horse_riding); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Basketball</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_basketball); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Archery</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_archery); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Badminton</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_badminton); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Football</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_football); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Indoor Games</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_indoor_games); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Swimming Pool</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_swimming_pool); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Martial Arts</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_martial_arts); ?>
					</span>
        </p>
        
        <p>
          <span class="lbl">Yoga</span> 
          <span class="dtl">
						<?php print compare_school_print_boolean($node->field_yoga); ?>
					</span>
        </p>
      </div>
      
      <div class="section">
    	<h2>Other Facilities</h2> 
    	   
		<?php if(isset($node->field_language_classes_offered['und'])) { ?>	
    	<h3>Language Classes Offered</h3>
      	<p><?php print $node->field_language_classes_offered['und'][0]['value']; ?></p>
      	<?php } ?>
      	
      	<?php if(isset($node->field_extra_curricular_activitie['und'])) { ?>	
      <h3>Extra-Curricular Activities</h3>
      <p><?php print $node->field_extra_curricular_activitie['und'][0]['value']; ?></p>
      <?php } ?>
      
      <?php if(isset($node->field_school_team['und'])) { ?>
      <h3>School Team</h3>
      <p><?php print $node->field_school_team['und'][0]['value']; ?></p>
      <?php } ?>
      
			<?php if(isset($node->field_school_team['und'])) { ?>
      <h3>School Managing committee</h3>
      <p><?php print $node->field_managing_committee['und'][0]['value']; ?></p>
      <?php } ?>
			
      <p>
        <span class="lbl">Air Conditioned Classes</span> 
        <span class="dtl">
					<?php print compare_school_print_boolean($node->field_air_conditioned_classes); ?>
				</span>
      </p>
      <p>
        <span class="lbl">Smart Classroom Aids</span> 
        <span class="dtl">
					<?php print compare_school_print_boolean($node->field_smart_classroom_aids); ?>
				</span>
      </p>
    	</div>
    </div>
  </div>
</div>



<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

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
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      //print render($content);
    ?>
  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php //print render($content['links']); ?></div>
    <?php endif; ?>

    <?php //print render($content['comments']); ?>
  </div>

</div>