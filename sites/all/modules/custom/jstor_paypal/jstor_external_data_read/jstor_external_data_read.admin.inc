<?php
function jstor_external_data_read_form(){
  $form['reader_settings'] = array(
    '#type' => 'fieldset', 
    '#title' => t('Reader settings'), 
    '#collapsible' => TRUE, 
    '#collapsed' => TRUE,
    '#weight' => 1,  
  );
  $priodic_import_options = array(
    'everyday' => 'Every Day',
    'everyweek' => 'Every Week',
    'everymonth' => 'Every Month'
  );
  $form['reader_settings']['reader_settings_periodic_import'] = array(
    '#type' => 'select',
    '#title' => 'Periodic import',
    '#options' => $priodic_import_options,
    '#required' => TRUE,
    '#field_suffix' => t('Last executed on ') . date("Y-M-d h:i:s",variable_get('external_data_read_last_update', '')),
    '#default_value' => variable_get('reader_settings_periodic_import', ''),
  );
  $form['reader_settings']['proxy_url'] = array(
    '#type' => 'textfield',
    '#title' => 'proxy URL',
    '#required' => false,
    '#default_value' => variable_get('proxy_url', ''),
  );
  $form['reader_settings']['proxy_port'] = array(
    '#type' => 'textfield',
    '#title' => 'proxy URL',
    '#required' => false,
    '#default_value' => variable_get('proxy_port', ''),
  );
  
  $form['title_list_source_files'] = array(
    '#type' => 'fieldset', 
    '#title' => t('Title List Source Files'), 
    '#collapsible' => TRUE, 
    '#collapsed' => TRUE,
    '#weight' => 2,
  );
  $form['title_list_source_files']['archival_journal_title_list_source_url'] = array(
    '#type' => 'textfield',
    '#title' => 'Archival Journal title list source URL',
    '#description' => 'Archival Journal title list source URL',
    '#required' => TRUE,
    '#default_value' => variable_get('archival_journal_title_list_source_url', ''),
  );
  $form['title_list_source_files']['archival_journal_title_list_dest_file_path'] = array(
    '#type' => 'textfield',
    '#title' => 'Archival Journal title list destination file',
    '#description' => 'Archival Journal title list destination file path (reletive to files directory)',
    '#required' => TRUE,
    '#default_value' => variable_get('archival_journal_title_list_dest_file_path', ''),
  );
  $form['title_list_source_files']['archival_journal_title_list_dest_file_name'] = array(
    '#type' => 'textfield',
    '#title' => 'Archival Journal title list destination file',
    '#required' => TRUE,
    '#default_value' => variable_get('archival_journal_title_list_dest_file_name', ''),
  );
  

  $form['title_list_source_files']['csp_title_list_source_url'] = array(
    '#type' => 'textfield',
    '#title' => 'CSP Journal title list source URL',
    '#description' => 'CSP Journal title list source URL',
    '#required' => TRUE,
    '#default_value' => variable_get('csp_title_list_source_url', ''),
  );
  $form['title_list_source_files']['csp_title_list_dest_file_path'] = array(
    '#type' => 'textfield',
    '#title' => 'CSP Journal title list destination file path',
    '#description' => 'CSP Journal title list destination file complete path (reletive to files directory)',
    '#required' => TRUE,
    '#default_value' => variable_get('csp_title_list_dest_file_path', ''),
  );
  $form['title_list_source_files']['csp_title_list_dest_file_name'] = array(
    '#type' => 'textfield',
    '#title' => 'CSP Journal title list destination file name',
    '#required' => TRUE,
    '#default_value' => variable_get('csp_title_list_dest_file_name', ''),
  );
  
  
  $form['current_participants_xml_file'] = array(
    '#type' => 'fieldset', 
    '#title' => t('Current Participants XML file'), 
    '#collapsible' => TRUE, 
    '#collapsed' => TRUE,
    '#weight' => 2,
  );
  
  $form['current_participants_xml_file']['current_participants_xml_file_source'] = array(
    '#type' => 'textfield',
    '#maxlength' => 250,
    '#title' => 'Archival Journal Current Participants XML file source',
    '#description' => '(format: http://username:password@domain/path; eg. http://user1:pass1@about.ithaka.org/titlelist)',
    '#required' => TRUE,
    '#default_value' => variable_get('current_participants_xml_file_source', ''),
  );
  $form['current_participants_xml_file']['current_participants_xml_file_dest_path'] = array(
    '#type' => 'textfield',
    '#title' => 'Archival Journal Current Participants XML file destination file path',
    '#description' => '(reletive to files directory)',
    '#required' => TRUE,
    '#default_value' => variable_get('current_participants_xml_file_dest_path', ''),
  );
  $form['current_participants_xml_file']['current_participants_xml_file_dest_name'] = array(
    '#type' => 'textfield',
    '#title' => 'Archival Journal Current Participants XML file destination file name',
    '#required' => TRUE,
    '#default_value' => variable_get('current_participants_xml_file_dest_name', ''),
  );
  
  
  
  
  
  
  $form['current_participants_xml_file']['csp_current_participants_xml_file_source'] = array(
    '#type' => 'textfield',
    '#maxlength' => 250,
    '#title' => 'CSP Current Participants XML file source',
    '#description' => '(format: http://username:password@domain/path; eg. http://user1:pass1@about.ithaka.org/titlelist)',
    '#required' => TRUE,
    '#default_value' => variable_get('csp_current_participants_xml_file_source', ''),
  );
  $form['current_participants_xml_file']['csp_current_participants_xml_file_dest_path'] = array(
    '#type' => 'textfield',
    '#title' => 'CSP Current Participants XML file destination file',
    '#description' => '(reletive to files directory)',
    '#required' => TRUE,
    '#default_value' => variable_get('csp_current_participants_xml_file_dest_path', ''),
  );
  $form['current_participants_xml_file']['csp_current_participants_xml_file_dest_name'] = array(
    '#type' => 'textfield',
    '#title' => 'CSP Current Participants XML file destination file name',
    '#required' => TRUE,
    '#default_value' => variable_get('csp_current_participants_xml_file_dest_name', ''),
  );
  
  //parse_external_files();
  
  return system_settings_form($form); 
}


function jstor_external_data_read_form_submit($form, &$form_state) {
  $archival_journal_title_list_source_url        = $form_state['values']['archival_journal_title_list_source_url'];
  $archival_journal_title_list_dest_file_path    = $form_state['values']['archival_journal_title_list_dest_file_path'];
  $archival_journal_title_list_dest_file_name    = $form_state['values']['archival_journal_title_list_dest_file_name'];
  
  $csp_title_list_source_url                     = $form_state['values']['csp_title_list_source_url'];
  $csp_title_list_dest_file_path                 = $form_state['values']['csp_title_list_dest_file_path'];
  $csp_title_list_dest_file_name                 = $form_state['values']['csp_title_list_dest_file_name'];
  
  $current_participants_xml_file_source          = $form_state['values']['current_participants_xml_file_source'];
  $current_participants_xml_file_dest_path       = $form_state['values']['current_participants_xml_file_dest_path'];
  $current_participants_xml_file_dest_name       = $form_state['values']['current_participants_xml_file_dest_name'];
  
  
  $csp_current_participants_xml_file_source      = $form_state['values']['csp_current_participants_xml_file_source'];
  $csp_current_participants_xml_file_dest_path   = $form_state['values']['csp_current_participants_xml_file_dest_path'];
  $csp_current_participants_xml_file_dest_name   = $form_state['values']['csp_current_participants_xml_file_dest_name'];
  
  $reader_settings_periodic_import               = $form_state['values']['reader_settings_periodic_import'];
  $proxy_url                                     = $form_state['values']['proxy_url'];
  $proxy_port                                    = $form_state['values']['proxy_port'];
  
  variable_set('archival_journal_title_list_source_url', $archival_journal_title_list_source_url);
  variable_set('archival_journal_title_list_dest_file_path', $archival_journal_title_list_dest_file_path);
  variable_set('archival_journal_title_list_dest_file_name', $archival_journal_title_list_dest_file_name);
  
  variable_set('csp_title_list_source_url', $csp_title_list_source_url);
  variable_set('csp_title_list_dest_file_path', $csp_title_list_dest_file_path);
  variable_set('csp_title_list_dest_file_name', $csp_title_list_dest_file_name);
  
  
  variable_set('current_participants_xml_file_source', $current_participants_xml_file_source);
  variable_set('current_participants_xml_file_dest_path', $current_participants_xml_file_dest_path);
  variable_set('current_participants_xml_file_dest_name', $current_participants_xml_file_dest_name);
  
  variable_set('csp_current_participants_xml_file_source', $csp_current_participants_xml_file_source);
  variable_set('csp_current_participants_xml_file_dest_path', $csp_current_participants_xml_file_dest_path);
  variable_set('csp_current_participants_xml_file_dest_name', $csp_current_participants_xml_file_dest_name);
  
  variable_set('reader_settings_periodic_import', $reader_settings_periodic_import);
  variable_set('proxy_url', $proxy_url);
  variable_set('proxy_port', $proxy_port);
  
  drupal_set_message(t('Variables have been saved'));
}



