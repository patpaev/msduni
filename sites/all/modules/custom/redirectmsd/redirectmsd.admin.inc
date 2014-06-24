<?php
function redirectmsd_admin_form($form_state) {
	
	global $base_url;
	
	$query = db_select('redirectmsd', 'r')->fields('r');
	$query->orderBy('id', 'DESC');
	$result = $query->execute();
	
	$header = array(
		'id' => t('id'),
		'name' => t('name'),
		'redirects' => t('redirect status'),
		'options' => "Options",
	);
	
	$options = array();
	while($record = $result->fetchObject()) {
		
		// Determine the redirect choices display
		if(
			strlen($record->option2) > 0 ||
			strlen($record->redirect2) > 0
		) {
			$redirect_choices = "Multiple choice";
		} else {
			$redirect_choices = "Single redirect";
		}
		
		$options[$record->id] = array(
			'id' => $record->id,
			'name' => $record->name,
			'redirects' => $redirect_choices,
			'options' => "<a href='/admin/redirectmsd/edit/" . $record->id . "'>Edit</a> | <a href='/admin/redirectmsd/delete/" . $record->id . "'>Delete</a>",
		);
	}
	
	$form['content'] =  array(
		'#markup' => "
			<p>The url to use these redirects is <b>" . $base_url . "/redirect/1</b> where 1 is the ID number shown below.</p>
			<p><a href='/admin/redirectmsd/add'>Create New Lightbox Redirect</a></p>
		"
	);
	
	$form['table'] = array(
		'#theme' => 'table',
		'#header' => $header,
		'#rows' => $options,
		'#empty' => t('No redirects found'),
	);
	
	return $form;
	
}

function redirectmsd_delete($redirectid) {
	
	db_delete('redirectmsd')->condition('id', $redirectid)->execute();
	
	drupal_goto('admin/redirectmsd');
	
}

function redirectmsd_edit($form, &$form_state, $redirectid=NULL) {
	
	$mode = "create";
	
	if(is_numeric($redirectid)) {
		
		$result = db_query('SELECT n.id, n.name, n.caption, n.option1, n.option2, n.redirect1, n.redirect2 FROM {redirectmsd} n WHERE n.id = :id', array(':id' => $redirectid));
		$record = $result->fetchObject();
		
		if(is_object($record)) {
			$mode = "edit";
		}
		
	}
	
	$form['mode'] = array(
		'#type' => 'hidden',
		'#value' => $mode,
	);
	
	if($mode == "edit") {
		$form['id'] = array(
			'#type' => 'textfield',
			'#title' => t('Redirect ID'),
			'#value' => $redirectid,
			'#disabled' => TRUE,
		);
	}
		
	$form['name'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Name - Used in the Administration view only'),
	  '#default_value' => ($mode == 'edit') ? $record->name : "",
	  '#size' => 60,
	  '#maxlength' => 64,
	  '#required' => TRUE,
	);
	$form['caption'] = array(
	  '#type' => 'text_format',
	  '#title' => t('Caption for the redirects'),
	  '#default_value' => ($mode == 'edit') ? $record->caption : "",
	  '#size' => 60,
	  '#maxlength' => 1000,
	  '#description' => t('This is only needed if there are two redirects and there needs to be explainatory text. Only one option means the redirect happens automatically without any confirmation screens'),
	);
	$form['option1'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Option 1 Caption'),
	  '#default_value' => ($mode == 'edit') ? $record->option1 : "",
	  '#size' => 60,
	  '#maxlength' => 64,
	  '#required' => TRUE,
	);
	$form['option2'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Option 2 Caption'),
	  '#default_value' => ($mode == 'edit') ? $record->option2 : "",
	  '#size' => 60,
	  '#maxlength' => 64,
	);
	$form['redirect1'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Url to redirect to if Option 1 is selected'),
	  '#default_value' => ($mode == 'edit') ? $record->redirect1 : "",
	  '#size' => 255,
	  '#maxlength' => 500,
	  '#description' => t('Also used as the automatic redirect if there are no options'),
	  '#required' => TRUE,
	);
	$form['redirect2'] = array(
	  '#type' => 'textfield',
	  '#title' => t('Url to redirect to if Option 2 is selected'),
	  '#default_value' => ($mode == 'edit') ? $record->redirect2 : "",
	  '#size' => 255,
	  '#maxlength' => 500,
	);
	
	$form['buttons']['submit'] = array(
	   '#type' => 'submit',
	   '#value' => ($mode == "create") ? t('Create') : t('Save'),
	);
	
	$form['buttons']['cancel'] = array(
		'#type' => 'submit',
		'#value' => t('Cancel'),
	);
	
	return $form;

}

function redirectmsd_edit_validate($form, &$form_state) {

	// Allow user to cancel creating/editing a redirect
	if($form_state["input"]["op"] == "Cancel") {
		drupal_goto('admin/redirectmsd');
	}
	
	if($form_state['values']['name']==null || !isset($form_state['values']['name'])) {
		form_set_error('name', 'Please enter a name for this Entry');
	}
	
	if($form_state['values']['redirect1']==null || !isset($form_state['values']['redirect1'])) {
		form_set_error('redirect1', 'Please enter a URL for Option 1');
	}
 
}

function redirectmsd_edit_submit($form, $form_state) {
	
	$mode = $form_state['values']['mode'];
	
	if($mode == 'edit') {
		
		db_update('redirectmsd')->fields(
			array(
				'name' => $form_state['values']['name'],
				'caption' => $form_state['values']['caption']['value'],
				'option1' => $form_state['values']['option1'],
				'option2' => $form_state['values']['option2'],
				'redirect1' => $form_state['values']['redirect1'],
				'redirect2' => $form_state['values']['redirect2'],
			)
		)
		->condition('id', $form_state["values"]["id"])
		->execute();
		
		drupal_set_message(t('Redirect saved.'), 'status');
		
	} else {
	
		db_insert('redirectmsd')->fields(
			array(
			    'name' => $form_state['values']['name'],
			    'caption' => $form_state['values']['caption']['value'],
			    'option1' => $form_state['values']['option1'],
			    'option2' => $form_state['values']['option2'],
			    'redirect1' => $form_state['values']['redirect1'],
			    'redirect2' => $form_state['values']['redirect2'],
			)
		)->execute();
		
		drupal_set_message(t('Redirect created.'), 'status');
	
	}
	
	drupal_goto('admin/redirectmsd');
	
}
