<?php

/**
 * @file
 * Important administration functions for the jstor social updates module.
 */

/**
 * Implements of jstor_social_updates_form()
 */
function jstor_social_updates_form() {
  $form['facebook'] = array(
    '#type' => 'fieldset',
    '#title' => 'Facebook',
    '#collapsible' => FALSE,
  );
  $form['facebook']['jstor_social_updates_facebook_page_link'] = array(
    '#type' => 'textfield',
    '#title' => 'Facebook fan page',
    '#description' => 'Enter your facebook fan page link.',
    '#required' => TRUE,
    '#default_value' => variable_get('jstor_social_updates_facebook_page_link', 'http://www.facebook.com/JstorMarketing'),
  );
  $form['facebook']['jstor_social_updates_no_facebook_updates'] = array(
    '#type' => 'textfield',
    '#title' => 'No. of facebook updates',
    '#required' => TRUE,
    '#description' => 'No. of facbook updates required.',
    '#default_value' => variable_get('jstor_social_updates_no_facebook_updates', 3),
  );
  $form['facebook']['jstor_social_updates_facebook_app_id'] = array(
    '#type' => 'textfield',
    '#title' => 'Facebook App Id',
    '#required' => TRUE,
    '#description' => 'Enter your facebook app id.',
    '#default_value' => variable_get('jstor_social_updates_facebook_app_id', '303538389744535'),
  );
  $form['facebook']['jstor_social_updates_facebook_app_secret_id'] = array(
    '#type' => 'textfield',
    '#title' => 'Facebook app secret id',
    '#required' => TRUE,
    '#description' => 'Enter your facebook app secret id.',
    '#default_value' => variable_get('jstor_social_updates_facebook_app_secret_id', '9a9ad1434ae689a5dc166e48b3b082ca'),
  );
  $form['facebook']['jstor_social_updates_facebook_id'] = array(
    '#type' => 'textfield',
    '#title' => 'Facebook Id',
    '#required' => TRUE,
    '#description' => 'Enter your facebook id.',
    '#default_value' => variable_get('jstor_social_updates_facebook_id', '333902196698558'),
  );
  $form['twitter'] = array(
    '#type' => 'fieldset',
    '#title' => 'Twitter',
    '#collapsible' => FALSE,
  );
  $form['twitter']['jstor_social_updates_twitter_page_link'] = array(
    '#type' => 'textfield',
    '#title' => 'Twitter page link',
    '#required' => TRUE,
    '#description' => 'Enter twitter page link.',
    '#default_value' => variable_get('jstor_social_updates_twitter_page_link', 'http://www.yoursite.com'),
  );
  $form['twitter']['jstor_social_updates_no_twitter_updates'] = array(
    '#type' => 'textfield',
    '#title' => 'No. of twitter updates',
    '#required' => TRUE,
    '#description' => 'No. of twitter updates required.',
    '#default_value' => variable_get('jstor_social_updates_no_twitter_updates', 3),
  );
  $form['twitter']['jstor_social_updates_twitter_user_id'] = array(
    '#type' => 'textfield',
    '#title' => 'Twitter user Id',
    '#required' => TRUE,
    '#description' => 'Enter twitter user Id.',
    '#default_value' => variable_get('jstor_social_updates_twitter_user_id', 814641),
  );
  $form['total_updates'] = array(
    '#type' => 'fieldset',
    '#title' => 'Total no of updates',
    '#collapsible' => FALSE,
  );
  $form['total_updates']['jstor_social_updates_total'] = array(
    '#type' => 'textfield',
    '#title' => 'Total no of updates',
    '#required' => TRUE,
    '#description' => 'Enter total no updates you want to display in a block.',
    '#default_value' => variable_get('jstor_social_updates_total', 3),
  );
  return system_settings_form($form); 
}

/**
 * Implementation of jstor_social_updates_form_validate($form, &$form_state)
 */
function jstor_social_updates_form_validate($form, &$form_state) {
  if (!valid_url($form_state['values']['jstor_social_updates_facebook_page_link'], TRUE)) {
    form_set_error('jstor_social_updates_facebook_page_link', 'Please enter valid link.');
  }
  elseif ($form_state['values']['jstor_social_updates_no_facebook_updates'] < 1) {
    form_set_error('jstor_social_updates_no_facebook_updates', 'Please enter greater than 0 value.');
  }
  elseif (!valid_url($form_state['values']['jstor_social_updates_twitter_page_link'])) {
    form_set_error('jstor_social_updates_twitter_page_link', 'Please enter valid link.');
  }
  elseif ($form_state['values']['jstor_social_updates_no_twitter_updates'] < 1) {
    form_set_error('jstor_social_updates_no_twitter_updates', 'Please enter greater than 0 value.');
  }
}

/**
 * Implementation of jstor_social_updates_form_submit($form, &$form_state)
 */
function jstor_social_updates_form_submit($form, &$form_state) {
  $jstor_social_updates_facebook_page_link = $form_state['values']['jstor_social_updates_facebook_page_link'];
  $jstor_social_updates_no_facebook_updates = $form_state['values']['jstor_social_updates_no_facebook_updates'];
  $jstor_social_updates_facebook_app_id = $form_state['values']['jstor_social_updates_facebook_app_id'];
  $jstor_social_updates_facebook_app_secret_id = $form_state['values']['jstor_social_updates_facebook_app_secret_id'];
  $jstor_social_updates_facebook_id = $form_state['values']['jstor_social_updates_facebook_id'];
  $jstor_social_updates_twitter_page_link = $form_state['values']['jstor_social_updates_twitter_page_link'];
  $jstor_social_updates_no_twitter_updates = $form_state['values']['jstor_social_updates_no_twitter_updates'];
  $jstor_social_updates_twitter_user_id = $form_state['values']['jstor_social_updates_twitter_user_id'];
  // Save variables in variable table.
  variable_set('jstor_social_updates_facebook_page_link', $jstor_social_updates_facebook_page_link);
  variable_set('jstor_social_updates_no_facebook_updates', $jstor_social_updates_no_facebook_updates);
  variable_set('jstor_social_updates_facebook_app_id', $jstor_social_updates_facebook_app_id);
  variable_set('jstor_social_updates_facebook_app_secret_id', $jstor_social_updates_facebook_app_secret_id);
  variable_set('jstor_social_updates_facebook_id', $jstor_social_updates_facebook_id);
  variable_set('jstor_social_updates_twitter_page_link', $jstor_social_updates_twitter_page_link);
  variable_get('jstor_social_updates_no_twitter_updates', $jstor_social_updates_no_twitter_updates);
  variable_get('jstor_social_updates_twitter_user_id', $jstor_social_updates_twitter_user_id);
  drupal_set_message(t('You link has been submitted successfully.'), 'status');
}
