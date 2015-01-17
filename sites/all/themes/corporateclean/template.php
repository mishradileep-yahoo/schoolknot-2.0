<?php

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return
 *   A string containing the breadcrumb output.
 */

function corporateclean_breadcrumb($variables){
  $breadcrumb = $variables['breadcrumb'];
  $breadcrumb_separator=theme_get_setting('breadcrumb_separator','corporateclean');
  
  $show_breadcrumb_home = theme_get_setting('breadcrumb_home');
  if (!$show_breadcrumb_home) {
  array_shift($breadcrumb);
  }
  
  if (!empty($breadcrumb)) {
    $breadcrumb[] = drupal_get_title();
    return '<div class="breadcrumb">' . implode(' <span class="breadcrumb-separator">' . $breadcrumb_separator . '</span>', $breadcrumb) . '</div>';
  }
}

function corporateclean_page_alter($page) {

	if (theme_get_setting('responsive_meta','corporateclean')):
	$mobileoptimized = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'MobileOptimized',
		'content' =>  'width'
		)
	);

	$handheldfriendly = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'HandheldFriendly',
		'content' =>  'true'
		)
	);

	$viewport = array(
		'#type' => 'html_tag',
		'#tag' => 'meta',
		'#attributes' => array(
		'name' =>  'viewport',
		'content' =>  'initial-scale=1.0,width=device-width,user-scalable=no,maximum-scale=1.0,'
		)
	);
	
	drupal_add_html_head($mobileoptimized, 'MobileOptimized');
	drupal_add_html_head($handheldfriendly, 'HandheldFriendly');
	drupal_add_html_head($viewport, 'viewport');
	endif;
	
}

function corporateclean_preprocess_html(&$variables) {
  //pr($variables);
	if (!theme_get_setting('responsive_respond','corporateclean')):
	drupal_add_css(path_to_theme() . '/css/basic-layout.css', array('group' => CSS_THEME, 'browsers' => array('IE' => '(lte IE 8)&(!IEMobile)', '!IE' => FALSE), 'preprocess' => FALSE));
	endif;
	
	drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => '(lte IE 8)&(!IEMobile)', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the html template.
 */

function corporateclean_process_html(&$vars) {
	// Hook into color.module
	if (module_exists('color')) {
	_color_html_alter($vars);
	}

}

/**
 * Override or insert variables into the page template.
 */

function corporateclean_process_page(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  
  

  
}

function corporateclean_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
  	unset($form['search_block_form']['#title']);
  	$form['search_block_form']['#title_display'] = 'invisible';
		$form_default = t('Search school name...');
		$form['search_block_form']['#size'] = 40;
  	$form['search_block_form']['#attributes']['placeholder'] = $form_default;
    $form['actions']['submit'] = array('#type' => 'image_button', '#src' => base_path() . path_to_theme() . '/images/searchbtn.png');
  }
}

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */

function corporateclean_preprocess_page(&$variables, $hook) {
  $alias = drupal_get_path_alias();
  if (isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }
  
  $args = arg();
  if($args[0] == 'group' && $args[1] == 'node' && $args[3] == 'subscribe' && $args[4] == 'og_user_node') {
    $variables['theme_hook_suggestions'][] = 'page__school_group';
  }
  
  if ($alias == 'site_landing_page') {
	  //$variables['theme_hook_suggestions'][] = 'page__site-landing-page';
  }
  
  if($alias == 'contact-us') {
  	$variables['theme_hook_suggestions'][] = 'page__contact';
  }
  
  $page_args = arg();
  if($page_args[0] == 'compare' || $page_args[0] == 'school-research' || $page_args[0] == 'parentmessage' || $page_args[0] == 'browse_by_city' || $page_args[0] == 'compare-schools' ||$page_args[0] == 'browse-schools-by-city' || $page_args[0] == 'account_merge' || $page_args[0] == 'school-homework') {
  	$variables['theme_hook_suggestions'][] = 'page__compare';
  }
    
  if($page_args[0] == 'node' && $page_args[1] != '') {
    $current_node = $variables['page']['content']['system_main']['nodes'][$page_args[1]]['body']['#object'];
    if($current_node->type == 'school') {
      $variables['theme_hook_suggestions'][] = 'page__school';
    }
  }
  if($page_args[0] == 'status-post' && !isset($page_args[2])) {
   $variables['theme_hook_suggestions'][] = 'page__status_post';
  }
  if($page_args[0] == 'user' && isset($page_args[2])) {
    $profile_user = user_load($page_args[1]);
    //drupal_set_title('Student Progress Sheet', PASS_THROUGH);
  }
  
  if($page_args[0] == 'browse-schools-by-city' && isset($page_args[1])) {
    $term = taxonomy_term_load($page_args[1]);
    drupal_set_title('All Schools in ' . $term->name, PASS_THROUGH);
  }
  
  if($page_args[0] == 'school-events-day' && isset($page_args[1]) && isset($page_args[2])) {
    $date = format_date(strtotime($page_args[2]), 'custom', t('jS F Y', array(), array('context' => 'php date format')));
    drupal_set_title('Events on ' . $date);
  }
  
  // Student Tracker Tab Menu Handling
  $variables['notificationTabClass'] = $variables['progressTabClass'] = $variables['attendenceTabClass'] = $variables['addAnotherTabClass'] = '';
  if($page_args[0] == 'student-tracker') {
    $variables['theme_hook_suggestions'][] = 'page__student-tracker';
    $variables['progressTabClass'] = 'active';
  }
  if($page_args[0] == 'messages') {
    $variables['theme_hook_suggestions'][] = 'page__student-tracker';
    $variables['notificationTabClass'] = 'active';
  }
  
  // Redirect to Create School First on each request if School Not created
  global $user;
  if(in_array('School Administrator', $user->roles)) {
    $user_school = _get_school_node_id_for_school_admin_user($user->uid);
    if($user_school == '' && drupal_get_path_alias(current_path()) != 'create-school') {
    	//drupal_goto('create-school');
    }
  }
  
}

function corporateclean_menu_tree($variables){
 
  $content = '<div class="round-box leftMenu">
            <h2> School Main Menu</h2>
            	<ul>
                	' . $variables['tree'] . '
                </ul>
        </div>';
  return $content;
}

function compare_school_print_list($filed) {
  $output = '';
  if(count($filed['und']) > 0) {
    foreach($filed['und'] as $value) {
      $output .= convert_mcname_to_readable($value['value']) . "\n";
    }
  }
  return $output;
}

function compare_school_print_boolean($filed) {
  $output = FALSE;

  if(isset($filed['und'])) {
	  if($filed['und'][0]['value'])
	    return '<span class="compare-school-tick yes">Yes</span>';
	  else
	    return '<span class="compare-school-tick no">No</span>';
  }
  else {
  	return '<span class="">N/A</span>';
  	
  }
  
}


function ConvertOneTimezoneToAnotherTimezone($time,$currentTimezone,$timezoneRequired)
{
    $system_timezone = date_default_timezone_get();
    $local_timezone = $currentTimezone;
    date_default_timezone_set($local_timezone);
    $local = date("Y-m-d h:i:s A");
 
    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d h:i:s A");
 
    $require_timezone = $timezoneRequired;
    date_default_timezone_set($require_timezone);
    $required = date("Y-m-d h:i:s A");
 
    date_default_timezone_set($system_timezone);

    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    $date = new DateTime($time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");
    $timestamp = $date->format("m-d-Y H:i:s");
    return $timestamp;
}

function compare_school_print_school_timings($filed) {
  $output = '';
  $timezone = $filed['und'][0]['timezone_db'];
  $timezoneRequired = $filed['und'][0]['timezone'];
  $time_value1 = ConvertOneTimezoneToAnotherTimezone($filed['und'][0]['value'],$timezone,$timezoneRequired);
  $time_value2 = ConvertOneTimezoneToAnotherTimezone($filed['und'][0]['value2'],$timezone,$timezoneRequired);
  if(isset($filed['und'][0]['value']) && isset($filed['und'][0]['value2'])){
    $output .= date('h:i A', strtotime($time_value1)) . ' - ' . date('h:i A', strtotime($time_value2));
  }
  return $output;
}


function compare_school_print_school_age($filed) {
  $output = '';
  if(isset($filed['und'][0]['value'])){
    $time_difference = time() - strtotime($filed['und'][0]['value']);
  }
  return format_interval($time_difference, 2);
}

function compare_school_print_text($filed) {
  if(isset($filed['und'][0]['value'])) {
    return $filed['und'][0]['value'];
  }
}

function compare_school_print_fee($filed) {
  if(isset($filed['und'][0]['value'])) {
    return 'Rs. ' . $filed['und'][0]['value'] . '/- Per Year';
  }
}

function convert_mcname_to_readable($str = '') {
  $output = '';
  $output = str_replace('_', ' ', $str);
  $output = ucwords($output);
  
  return $output;
}

function compare_school_print_school_address($school_node) {
	if(!is_object($school_node)) return '';
	//pr($school_node);
	$school_add1 = $school_node->field_address_line_1['und'][0]['value'];
	$school_add2 = $school_node->field_address_line_2['und'][0]['value'];
	
	$school_dist = taxonomy_term_load($school_node->field_city_district['und'][0]['tid']);
	$school_state = taxonomy_term_load($school_node->field_state['und'][0]['tid']);

	$school_pincode = $school_node->field_pincode['und'][0]['value'];
	
	$school_telephone = $school_node->field_telephone['und'][0]['value'];
	$school_mobile = $school_node->field_mobile['und'][0]['value'];
	
	$school_address = $school_add1 . ', ' . $school_add2 . ', <br>' . $school_dist->name . ', ' . $school_state->name . ', ' .$school_pincode;
	
	return $school_address;
	
}

function print_star_spans($rating = 1) {
	if($rating == 0) return '';
	$spans = '';
	$point_part = number_format($rating - floor($rating), 2);
	$rating_floor = floor($rating);
	$class = 'none';
	for($i=0; $i < 5; $i++) {
		if($rating_floor > $i) {
			$class = 'full';
		}
		else if($point_part == 0 && $rating_floor == $i){
			$class = 'full';
		}
		else if($point_part == 0.5 && $rating_floor == $i){
			$class = 'half';
		}
		else {
			$class = 'none';
		}
		$spans .= '<span class="rated-'.$class.'"></span>';
	}
	$spans .= '<div class="declaration" style="float: left;"> (Parents Rating)</div>';
	return $spans;
}

/*
 * Formatting start date and end date
 */

function format_start_end_date_comma_sepearted_new($startdate, $endDate, $monthFormat = 'F') {
	
	$startYear 	= date('Y', strtotime($startdate));
	$startMonth = date('n', strtotime($startdate));
	$startDay 	= date('j', strtotime($startdate));
	
	$endYear 	= date('Y', strtotime($endDate));
	$endMonth 	= date('n', strtotime($endDate));
	$endDay 	= date('j', strtotime($endDate));
	
	
	if($startYear != $endYear) {
		return date("$monthFormat d,Y H:i A", strtotime($startdate)) . ' - ' . date("$monthFormat d,Y H:i A", strtotime($endDate));
	}
	
	if($startMonth != $endMonth) {
		return date("$monthFormat d H:i A", strtotime($startdate)) . ' - ' . date("$monthFormat d H:i A", strtotime($endDate)) . ', '.date('Y', strtotime($endDate));
	}
	
	if($startDay != $endDay) {
		return date("$monthFormat d H:i A", strtotime($startdate)) . ' - ' . date('d, Y', strtotime($endDate));
	}
	
	return date("$monthFormat d, Y", strtotime($startdate)) . date(" h:i A", strtotime($startdate)) . ' TO ' . date(" h:i A", strtotime($endDate));
}
?>