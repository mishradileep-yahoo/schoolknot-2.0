<?php
// $Id$

/**
 *
 * Form builder for the system settings form.
 */
function jstor_paypal_system_settings() {
  $settings = variable_get('jstor_paypal_settings', array());


  $form['settings'] = array(
    '#type'	        => 'fieldset',
    '#collapsible'	=> (count($settings) < 1),
    '#title'	      => t("Paypal API settings"),
    'email' => array(
      '#type'		        => 'textfield',
      '#title'	        => t("Your Paypal account email"),
      '#description'	  => t("Enter your default Paypal account email address, if you plan on having Paypal API create buttons on the fly for purchase transactions.  You may override this account for individual content types or nodes.  Leave blank if you will only use buttons you create through your account control panel on Paypal."),
      '#default_value'	=> (isset($settings['email']))? $settings['email'] : ''
    ),
		
		'success_url'	=> array(
      '#type'		        => 'textfield',
      '#title'	        => t("Success Page URL"),
      '#description'	  => t("Enter Success Page URL. Eg: /paypal/success"),
      '#default_value'	=> (isset($settings['success_url']))? $settings['success_url'] : ''
    ),
		
		'success_page_message'	=> array(
      '#type'		        => 'textarea',
      '#title'	        => t("Success Page Message"),
      '#description'	  => t("Enter Text for the Success Page"),
      '#default_value'	=> (isset($settings['success_page_message']))? $settings['success_page_message'] : ''
    ),

		'notify_email' => array(
      '#type'		        => 'textfield',
      '#title'	        => t("Email to send notifications"),
      '#description'	  => t("Enter your email address to send any notification from the JSTOR PayPal API"),
      '#default_value'	=> (isset($settings['notify_email']))? $settings['notify_email'] : ''
    ),
		
		'success_txn_mail_subject' => array(
      '#type'		        => 'textfield',
      '#title'	        => t("Subject of the Success Transaction Mail"),
      '#default_value'	=> (isset($settings['success_txn_mail_subject']))? $settings['success_txn_mail_subject'] : ''
    ),
		
		'failure_txn_mail_subject' => array(
      '#type'		        => 'textfield',
      '#title'	        => t("Subject of the Failure Transaction Mail"),
      '#default_value'	=> (isset($settings['failure_txn_mail_subject']))? $settings['failure_txn_mail_subject'] : ''
    ),
		
		'incomplete_txn_mail_subject' => array(
      '#type'		        => 'textfield',
      '#title'	        => t("Subject of the Incomplete Transaction Mail"),
      '#default_value'	=> (isset($settings['incomplete_txn_mail_subject']))? $settings['incomplete_txn_mail_subject'] : ''
    ),
		
    'developer_settings' => array(
      '#type'		      => 'fieldset',
      '#title'	      => t("Developer settings"),
      '#collapsible'	=> TRUE,
      '#collapsed'    => TRUE,

      'sandbox'	=> array(
        '#type'		        => 'checkbox',
        '#title'	        => t("Use the Paypal sandbox"),
        '#default_value'	=> (isset($settings['sandbox']))? $settings['sandbox'] : '',
        '#description'	=> "
          <p>" . t("Use the Paypal sandbox to test the system.  This requires that you create a developer account and use buttons you've created inside the sandbox for testing.") . "</p>
        "
      ),
      'domain'	=> array(
        '#type'		        => 'textfield',
        '#title'	        => t("Local domain name"),
        '#default_value'	=> (isset($settings['domain']))? $settings['domain'] : '',
        '#description'	=> "
          <p>" . t("Specify the domain name to use for IPN callbacks, success and cancellation pages.  Leave this blank to use your server's domain '!server_name'.  You should only need to set this if you are behind a firewall or have port forwarding set up to a test machine.", array('!server_name' => $_SERVER['SERVER_NAME'])) . "</p>
        "
      ),
			'paypal_form_node'	=> array(
        '#type'		        => 'textfield',
        '#title'	        => t("PayPal WeForm Node ID"),
        '#default_value'	=> (isset($settings['paypal_form_node']))? $settings['paypal_form_node'] : '',
        '#description'	=> "
          <p>" . t("Specify the Node ID of the PayPal WebForm Content") . "</p>
        "
      ),
    )
  );

  $form['submit'] = array(
    '#type'		=> 'submit',
    '#value'	=> t("Save these settings")
  );

  return $form;
}

/**
 *
 * Submit handler for the system settings form
 *
 * @param $form
 * @param $form_values
 */
function jstor_paypal_system_settings_submit($form, &$form_values) {
  $settings = variable_get('jstor_paypal_settings', array());

  foreach (array('email', 'notify_email', 'sandbox', 'domain', 'paypal_form_node', 'success_url', 'success_page_message', 'success_txn_mail_subject', 'failure_txn_mail_subject', 'incomplete_txn_mail_subject') as $field) {
    $settings[$field] = $form_values['values'][$field];
  }
  variable_set('jstor_paypal_settings', $settings);

  drupal_set_message(t("Paypal API settings have been updated."), 'status');
}
