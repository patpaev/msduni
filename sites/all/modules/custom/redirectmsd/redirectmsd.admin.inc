<?php
function redirectmsd_admin_form($form_state) {


		$result = db_query('SELECT * FROM {redirectmsd}');

		foreach ($result as $record) { //Strip down the results and grab the data. Should only ever return one row.
        // Make results into an array (to feed into table) 
        
        $results[$record->id]['id'] = $record->id;
        $results[$record->id]['name'] = $record->name;
        $results[$record->id]['caption'] = $record->caption;
        $results[$record->id]['option1'] = $record->option1;
        $results[$record->id]['option2'] = $record->option2;
        $results[$record->id]['redirect1'] = $record->redirect1;
        $results[$record->id]['redirect2'] = $record->redirect2;
}
 
  $header = array(
    'id' => t('id'),
    'name' => t('name'),
    'caption' => t('caption'),
    'option1' => t('Option 1'),
    'option2' => t('Option 2'),
    'redirect1' => t('Redirect 1'),
    'redirect2' => t('Redirect 2'),
  );
  $options = array();
  foreach ($results as $result) {
  $id = $result['id'];
    $options[$result['id']] =array(
      'id' => $result['id'],
      'name' => $result['name'],
      'caption' => $result['caption'],
      'option1' => $result['option1'],
      'option2' => $result['option2'],
      'redirect1' => $result['redirect1'],
      'redirect2' => $result['redirect2']
    );
  }
  $form['table'] = array(
    '#type' => 'tableselect',
    '#header' => $header,
    '#options' => $options,
    '#multiple' => FALSE,
    '#empty' => t('No users found'),
  );

  $form['buttons']['submit'] = array(
    '#type' => 'submit',
    '#submit' => array('redirectmsd_create_goto'),
    '#value' => t('Create Lightbox Redirect'),
  );

  $form['buttons']['reset'] = array(
    '#type' => 'submit',
    '#value' => t('Delete Lightbox Redirect'),
  );
  return $form;
}


 function redirectmsd_admin_form_validate($form, &$form_state) {
 // Add in Validation code, and confirmation of deletion.
 
   if($form_state['values']['op'] == "Delete Lightbox Redirect") {
	 
	 $id = $form_state['values']['table'];	  
	 
	 $delete_row = db_delete('redirectmsd')
	 ->condition('id', $id)
	 ->execute();

	drupal_goto('admin/redirectmsd'); 
 }
  
}

function redirectmsd_create_goto() { 
drupal_goto('admin/redirectmsd/create');	
}


function redirectmsd_create() {

 $form['content'] =  array(
   '#markup' => '<h2>Lightbox / Nexus Redirect Entry</h2>
   <p>To create a entry in the Lightbox / Nexus Redirect module, please fill in the required fields below.</br >
   USAGE: When your entry is saved, it will have a ID number, this ID number is added to a specific url to manage the redirect logic.
   The url is &quot;http://msdsandbox.net/redirect?id=100&quot; where 100 is the ID number </p> 
   '
   );

$form['name'] = array(
  '#type' => 'textfield',
  '#title' => t('Name - Used in the Administration view only *'),
  '#default_value' => t(''),
  '#size' => 60,
  '#maxlength' => 64,
  '#description' => t(''),
);

$form['caption'] = array(
  '#type' => 'textarea',
  '#title' => t('Caption for the redirects'),
  '#default_value' => t(''),
  '#size' => 60,
  '#maxlength' => 1000,
  '#description' => t('This is only needed if there are two redirects and there needs to be explainatory text. Only one option means the redirect happens automatically without any confirmation screens'),
);

$form['option1'] = array(
  '#type' => 'textfield',
  '#title' => t('Option 1 Caption'),
  '#default_value' => t(''),
  '#size' => 60,
  '#maxlength' => 64,
  '#description' => t(''),
);
$form['option2'] = array(
  '#type' => 'textfield',
  '#title' => t('Option 2 Caption'),
  '#default_value' => t(''),
  '#size' => 60,
  '#maxlength' => 64,
  '#description' => t(''),
);
$form['redirect1'] = array(
  '#type' => 'textfield',
  '#title' => t('Url to redirect to if Option 1 is selected *'),
  '#default_value' => t(''),
  '#size' => 255,
  '#maxlength' => 500,
  '#description' => t('Also used as the automatic redirect if there are no options'),
);

$form['redirect2'] = array(
  '#type' => 'textfield',
  '#title' => t('Url to redirect to if Option 2 is selected'),
  '#default_value' => t(''),
  '#size' => 255,
  '#maxlength' => 500,
  '#description' => t(''),
);

 $form['content2'] =  array(
   '#markup' => '<p>* denotes a required field</p>'
   );


 $form['buttons']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
  );

return $form;
}

function redirectmsd_create_validate($form, &$form_state) {

if($form_state['values']['name']==null||!isset($form_state['values']['name'])) {
 form_set_error('name', 'Please enter a name for this Entry');
}

if($form_state['values']['redirect1']==null||!isset($form_state['values']['redirect1'])) {
 form_set_error('redirect1', 'Please enter a URL for Option 1');
}
 
}

function redirectmsd_create_submit($form, $form_state) {

//Validation has passed, insert item into DB.

$redirect = db_insert('redirectmsd') // Table name no longer needs {}
->fields(array(
  'name' => $form_state['values']['name'],
  'caption' => $form_state['values']['caption'],
  'option1' => $form_state['values']['option1'],
  'option2' => $form_state['values']['option2'],
  'redirect1' => $form_state['values']['redirect1'],
  'redirect2' => $form_state['values']['redirect2'],
))
->execute();


  drupal_goto('admin/redirectmsd');
}
