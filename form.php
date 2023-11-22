<?php
/**
 * Implements hook_form_FORM_ID_alter() for your form.
 */
function yourmodule_form_FORM_ID_alter(&$form, &$form_state) {
  // Add an age field for the user to input their age.
  $form['age'] = array(
    '#type' => 'textfield',
    '#title' => t('Age'),
    '#required' => TRUE,
  );

  // Add a gender field for the user to select their gender.
  $form['gender'] = array(
    '#type' => 'radios',
    '#title' => t('Gender'),
    '#options' => array(
      'male' => t('Male'),
      'female' => t('Female'),
    ),
    '#required' => TRUE,
  );

  // Add a submit button to the form.
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
  );

  // Define a custom submission handler for the form.
  $form['#submit'][] = 'yourmodule_custom_submit_handler';
}

/**
 * Custom submit handler for your form.
 */
function yourmodule_custom_submit_handler($form, &$form_state) {
  $age = (int) $form_state['values']['age'];
  $gender = $form_state['values']['gender'];

  if (($gender == 'female' && $age > 18) || ($gender == 'male' && $age > 20)) {
    drupal_set_message(t('Eligible for Marriage'));
  }
  else {
    drupal_set_message(t('Not Eligible for Marriage'));
  }
}









/**
 * Custom submit handler for your Drupal 10 form.
 */
function yourmodule_custom_submit_handler($form, &$form_state) {
    // Retrieve values from $form_state.
    $age = (int) $form_state->getValue('age');
    $gender = $form_state->getValue('gender');
  
    // Now you can use $age and $gender as needed.
    if (($gender == 'female' && $age > 18) || ($gender == 'male' && $age > 20)) {
      drupal_set_message(t('Eligible for Marriage'));
    }
    else {
      drupal_set_message(t('Not Eligible for Marriage'));
    }
  }
  
?>