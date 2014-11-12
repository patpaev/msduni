<?php
/**
 * @file
 * our_people.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function our_people_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'our_people';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'users';
  $view->human_name = 'Our People';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['css_class'] = 't-wrapper';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'none';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'none';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'default';
  $handler->display->display_options['style_options']['default_row_class'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['row_options']['default_field_elements'] = FALSE;
  /* Field: User: Uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'users';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['label'] = '';
  $handler->display->display_options['fields']['uid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['uid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['uid']['link_to_user'] = FALSE;
  /* Field: User: Profile portrait image */
  $handler->display->display_options['fields']['field_profile_portrait_image']['id'] = 'field_profile_portrait_image';
  $handler->display->display_options['fields']['field_profile_portrait_image']['table'] = 'field_data_field_profile_portrait_image';
  $handler->display->display_options['fields']['field_profile_portrait_image']['field'] = 'field_profile_portrait_image';
  $handler->display->display_options['fields']['field_profile_portrait_image']['label'] = '';
  $handler->display->display_options['fields']['field_profile_portrait_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_profile_portrait_image']['element_wrapper_type'] = 'div';
  $handler->display->display_options['fields']['field_profile_portrait_image']['element_wrapper_class'] = 't-r1-r2-c1';
  $handler->display->display_options['fields']['field_profile_portrait_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_profile_portrait_image']['settings'] = array(
    'image_style' => 'profile_portrait_listing_image',
    'image_link' => '',
  );
  /* Field: User: Title */
  $handler->display->display_options['fields']['field_title']['id'] = 'field_title';
  $handler->display->display_options['fields']['field_title']['table'] = 'field_data_field_title';
  $handler->display->display_options['fields']['field_title']['field'] = 'field_title';
  $handler->display->display_options['fields']['field_title']['label'] = '';
  $handler->display->display_options['fields']['field_title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_title']['element_label_colon'] = FALSE;
  /* Field: User: First Name */
  $handler->display->display_options['fields']['field_first_name']['id'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['table'] = 'field_data_field_first_name';
  $handler->display->display_options['fields']['field_first_name']['field'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['label'] = '';
  $handler->display->display_options['fields']['field_first_name']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_first_name']['element_label_colon'] = FALSE;
  /* Field: User: Last Name */
  $handler->display->display_options['fields']['field_last_name']['id'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['table'] = 'field_data_field_last_name';
  $handler->display->display_options['fields']['field_last_name']['field'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['label'] = '';
  $handler->display->display_options['fields']['field_last_name']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_last_name']['alter']['text'] = '[field_title] [field_first_name] [field_last_name]';
  $handler->display->display_options['fields']['field_last_name']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_last_name']['alter']['path'] = 'user/[uid]';
  $handler->display->display_options['fields']['field_last_name']['alter']['absolute'] = TRUE;
  $handler->display->display_options['fields']['field_last_name']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_last_name']['element_wrapper_type'] = 'div';
  $handler->display->display_options['fields']['field_last_name']['element_wrapper_class'] = 't-r1-c2';
  /* Field: User: Position Title */
  $handler->display->display_options['fields']['field_position_title']['id'] = 'field_position_title';
  $handler->display->display_options['fields']['field_position_title']['table'] = 'field_data_field_position_title';
  $handler->display->display_options['fields']['field_position_title']['field'] = 'field_position_title';
  $handler->display->display_options['fields']['field_position_title']['label'] = '';
  $handler->display->display_options['fields']['field_position_title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_position_title']['element_wrapper_type'] = 'div';
  $handler->display->display_options['fields']['field_position_title']['element_wrapper_class'] = 't-r1-c3';
  /* Field: User: Research Direction */
  $handler->display->display_options['fields']['field_research_direction']['id'] = 'field_research_direction';
  $handler->display->display_options['fields']['field_research_direction']['table'] = 'field_data_field_research_direction';
  $handler->display->display_options['fields']['field_research_direction']['field'] = 'field_research_direction';
  $handler->display->display_options['fields']['field_research_direction']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_research_direction']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_research_direction']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_research_direction']['delta_offset'] = '0';
  /* Field: User: Discipline */
  $handler->display->display_options['fields']['field_discipline']['id'] = 'field_discipline';
  $handler->display->display_options['fields']['field_discipline']['table'] = 'field_data_field_discipline';
  $handler->display->display_options['fields']['field_discipline']['field'] = 'field_discipline';
  $handler->display->display_options['fields']['field_discipline']['label'] = '';
  $handler->display->display_options['fields']['field_discipline']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_discipline']['element_wrapper_type'] = 'div';
  $handler->display->display_options['fields']['field_discipline']['element_wrapper_class'] = 't-r1-c4';
  $handler->display->display_options['fields']['field_discipline']['delta_offset'] = '0';
  /* Field: User: Telephone */
  $handler->display->display_options['fields']['field_telephone']['id'] = 'field_telephone';
  $handler->display->display_options['fields']['field_telephone']['table'] = 'field_data_field_telephone';
  $handler->display->display_options['fields']['field_telephone']['field'] = 'field_telephone';
  $handler->display->display_options['fields']['field_telephone']['label'] = '';
  $handler->display->display_options['fields']['field_telephone']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_telephone']['element_label_colon'] = FALSE;
  /* Field: User: Email */
  $handler->display->display_options['fields']['field_email']['id'] = 'field_email';
  $handler->display->display_options['fields']['field_email']['table'] = 'field_data_field_email';
  $handler->display->display_options['fields']['field_email']['field'] = 'field_email';
  $handler->display->display_options['fields']['field_email']['label'] = '';
  $handler->display->display_options['fields']['field_email']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_email']['element_label_colon'] = FALSE;
  /* Field: User: Building */
  $handler->display->display_options['fields']['field_building']['id'] = 'field_building';
  $handler->display->display_options['fields']['field_building']['table'] = 'field_data_field_building';
  $handler->display->display_options['fields']['field_building']['field'] = 'field_building';
  $handler->display->display_options['fields']['field_building']['label'] = '';
  $handler->display->display_options['fields']['field_building']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_building']['element_label_colon'] = FALSE;
  /* Field: User: Room */
  $handler->display->display_options['fields']['field_room']['id'] = 'field_room';
  $handler->display->display_options['fields']['field_room']['table'] = 'field_data_field_room';
  $handler->display->display_options['fields']['field_room']['field'] = 'field_room';
  $handler->display->display_options['fields']['field_room']['label'] = '';
  $handler->display->display_options['fields']['field_room']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_room']['alter']['text'] = '[field_telephone]<br/>
[field_email]<br/>
Room: [field_room], [field_building]';
  $handler->display->display_options['fields']['field_room']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_room']['element_wrapper_type'] = 'div';
  $handler->display->display_options['fields']['field_room']['element_wrapper_class'] = 't-r1-c5';
  /* Sort criterion: User: Last Name (field_last_name) */
  $handler->display->display_options['sorts']['field_last_name_value']['id'] = 'field_last_name_value';
  $handler->display->display_options['sorts']['field_last_name_value']['table'] = 'field_data_field_last_name';
  $handler->display->display_options['sorts']['field_last_name_value']['field'] = 'field_last_name_value';
  $handler->display->display_options['sorts']['field_last_name_value']['expose']['label'] = 'Last Name (field_last_name)';
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: User: Roles */
  $handler->display->display_options['filters']['rid']['id'] = 'rid';
  $handler->display->display_options['filters']['rid']['table'] = 'users_roles';
  $handler->display->display_options['filters']['rid']['field'] = 'rid';
  $handler->display->display_options['filters']['rid']['value'] = array(
    5 => '5',
  );
  /* Filter criterion: User: Staff type (field_staff_type) */
  $handler->display->display_options['filters']['field_staff_type_tid']['id'] = 'field_staff_type_tid';
  $handler->display->display_options['filters']['field_staff_type_tid']['table'] = 'field_data_field_staff_type';
  $handler->display->display_options['filters']['field_staff_type_tid']['field'] = 'field_staff_type_tid';
  
  $academic_term = taxonomy_get_term_by_name("Academic", "staff_type");
  $values = array_values($academic_term);
  $academic_term = array_shift($values);
  
  if(is_object($academic_term)) {
         $handler->display->display_options['filters']['field_staff_type_tid']['value'] = array(
           0 => $academic_term->tid,
         );
  }
  
  $handler->display->display_options['filters']['field_staff_type_tid']['vocabulary'] = 'staff_type';

  /* Display: Academic Staff */
  $handler = $view->new_display('block', 'Academic Staff', 'academic_staff');
  $handler->display->display_options['defaults']['header'] = FALSE;
  /* Header: Global: Unfiltered text */
  $handler->display->display_options['header']['area_text_custom']['id'] = 'area_text_custom';
  $handler->display->display_options['header']['area_text_custom']['table'] = 'views';
  $handler->display->display_options['header']['area_text_custom']['field'] = 'area_text_custom';
  $handler->display->display_options['header']['area_text_custom']['empty'] = TRUE;
  $handler->display->display_options['header']['area_text_custom']['content'] = '  <div class="t-heading-c1 "></div>
  <div class="t-heading-c2-c3">Name</div>
  <div class="t-heading-c2-c3">Title</div>
  <div class="t-heading-c4">Discipline</div>
  <div class="t-heading-c5">Contact</div>';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: User: Research Direction (field_research_direction) */
  $handler->display->display_options['arguments']['field_research_direction_tid']['id'] = 'field_research_direction_tid';
  $handler->display->display_options['arguments']['field_research_direction_tid']['table'] = 'field_data_field_research_direction';
  $handler->display->display_options['arguments']['field_research_direction_tid']['field'] = 'field_research_direction_tid';
  $handler->display->display_options['arguments']['field_research_direction_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_research_direction_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_research_direction_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_research_direction_tid']['summary_options']['items_per_page'] = '25';
  /* Contextual filter: User: Discipline (field_discipline) */
  $handler->display->display_options['arguments']['field_discipline_tid']['id'] = 'field_discipline_tid';
  $handler->display->display_options['arguments']['field_discipline_tid']['table'] = 'field_data_field_discipline';
  $handler->display->display_options['arguments']['field_discipline_tid']['field'] = 'field_discipline_tid';
  $handler->display->display_options['arguments']['field_discipline_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_discipline_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_discipline_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_discipline_tid']['summary_options']['items_per_page'] = '25';

  /* Display: Professional Staff */
  $handler = $view->new_display('block', 'Professional Staff', 'professional_staff');
  $handler->display->display_options['defaults']['header'] = FALSE;
  /* Header: Global: Unfiltered text */
  $handler->display->display_options['header']['area_text_custom']['id'] = 'area_text_custom';
  $handler->display->display_options['header']['area_text_custom']['table'] = 'views';
  $handler->display->display_options['header']['area_text_custom']['field'] = 'area_text_custom';
  $handler->display->display_options['header']['area_text_custom']['empty'] = TRUE;
  $handler->display->display_options['header']['area_text_custom']['content'] = '  <div class="t-heading-c2-c3">Name</div>
  <div class="t-heading-c2-c3">Title</div>
  <div class="t-heading-c4">Discipline</div>
  <div class="t-heading-c5">Contact</div>';
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Field: User: Uid */
  $handler->display->display_options['fields']['uid']['id'] = 'uid';
  $handler->display->display_options['fields']['uid']['table'] = 'users';
  $handler->display->display_options['fields']['uid']['field'] = 'uid';
  $handler->display->display_options['fields']['uid']['label'] = '';
  $handler->display->display_options['fields']['uid']['exclude'] = TRUE;
  $handler->display->display_options['fields']['uid']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['uid']['link_to_user'] = FALSE;
  /* Field: User: Title */
  $handler->display->display_options['fields']['field_title']['id'] = 'field_title';
  $handler->display->display_options['fields']['field_title']['table'] = 'field_data_field_title';
  $handler->display->display_options['fields']['field_title']['field'] = 'field_title';
  $handler->display->display_options['fields']['field_title']['label'] = '';
  $handler->display->display_options['fields']['field_title']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_title']['element_label_colon'] = FALSE;
  /* Field: User: First Name */
  $handler->display->display_options['fields']['field_first_name']['id'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['table'] = 'field_data_field_first_name';
  $handler->display->display_options['fields']['field_first_name']['field'] = 'field_first_name';
  $handler->display->display_options['fields']['field_first_name']['label'] = '';
  $handler->display->display_options['fields']['field_first_name']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_first_name']['element_label_colon'] = FALSE;
  /* Field: User: Last Name */
  $handler->display->display_options['fields']['field_last_name']['id'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['table'] = 'field_data_field_last_name';
  $handler->display->display_options['fields']['field_last_name']['field'] = 'field_last_name';
  $handler->display->display_options['fields']['field_last_name']['label'] = '';
  $handler->display->display_options['fields']['field_last_name']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_last_name']['alter']['text'] = '[field_title] [field_first_name] [field_last_name]';
  $handler->display->display_options['fields']['field_last_name']['alter']['path'] = 'user/[uid]';
  $handler->display->display_options['fields']['field_last_name']['alter']['absolute'] = TRUE;
  $handler->display->display_options['fields']['field_last_name']['element_type'] = 'div';
  $handler->display->display_options['fields']['field_last_name']['element_class'] = 't-r1-c2';
  $handler->display->display_options['fields']['field_last_name']['element_label_colon'] = FALSE;
  /* Field: User: Position Title */
  $handler->display->display_options['fields']['field_position_title']['id'] = 'field_position_title';
  $handler->display->display_options['fields']['field_position_title']['table'] = 'field_data_field_position_title';
  $handler->display->display_options['fields']['field_position_title']['field'] = 'field_position_title';
  $handler->display->display_options['fields']['field_position_title']['label'] = '';
  $handler->display->display_options['fields']['field_position_title']['element_type'] = 'div';
  $handler->display->display_options['fields']['field_position_title']['element_class'] = 't-r1-c3';
  $handler->display->display_options['fields']['field_position_title']['element_label_colon'] = FALSE;
  /* Field: User: Staff Team */
  $handler->display->display_options['fields']['field_staff_team']['id'] = 'field_staff_team';
  $handler->display->display_options['fields']['field_staff_team']['table'] = 'field_data_field_staff_team';
  $handler->display->display_options['fields']['field_staff_team']['field'] = 'field_staff_team';
  $handler->display->display_options['fields']['field_staff_team']['label'] = '';
  $handler->display->display_options['fields']['field_staff_team']['element_type'] = 'div';
  $handler->display->display_options['fields']['field_staff_team']['element_class'] = 't-r1-c4';
  $handler->display->display_options['fields']['field_staff_team']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_staff_team']['type'] = 'taxonomy_term_reference_plain';
  /* Field: User: Telephone */
  $handler->display->display_options['fields']['field_telephone']['id'] = 'field_telephone';
  $handler->display->display_options['fields']['field_telephone']['table'] = 'field_data_field_telephone';
  $handler->display->display_options['fields']['field_telephone']['field'] = 'field_telephone';
  $handler->display->display_options['fields']['field_telephone']['label'] = '';
  $handler->display->display_options['fields']['field_telephone']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_telephone']['element_label_colon'] = FALSE;
  /* Field: User: Email */
  $handler->display->display_options['fields']['field_email']['id'] = 'field_email';
  $handler->display->display_options['fields']['field_email']['table'] = 'field_data_field_email';
  $handler->display->display_options['fields']['field_email']['field'] = 'field_email';
  $handler->display->display_options['fields']['field_email']['label'] = '';
  $handler->display->display_options['fields']['field_email']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_email']['alter']['text'] = '[field_telephone]<br/>
[field_email]';
  $handler->display->display_options['fields']['field_email']['element_type'] = 'div';
  $handler->display->display_options['fields']['field_email']['element_class'] = 't-r1-c5';
  $handler->display->display_options['fields']['field_email']['element_label_colon'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: User: Staff Team (field_staff_team) */
  $handler->display->display_options['arguments']['field_staff_team_tid']['id'] = 'field_staff_team_tid';
  $handler->display->display_options['arguments']['field_staff_team_tid']['table'] = 'field_data_field_staff_team';
  $handler->display->display_options['arguments']['field_staff_team_tid']['field'] = 'field_staff_team_tid';
  $handler->display->display_options['arguments']['field_staff_team_tid']['default_argument_type'] = 'fixed';
  $handler->display->display_options['arguments']['field_staff_team_tid']['summary']['number_of_records'] = '0';
  $handler->display->display_options['arguments']['field_staff_team_tid']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['field_staff_team_tid']['summary_options']['items_per_page'] = '25';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: User: Active */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'users';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = '1';
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: User: Roles */
  $handler->display->display_options['filters']['rid']['id'] = 'rid';
  $handler->display->display_options['filters']['rid']['table'] = 'users_roles';
  $handler->display->display_options['filters']['rid']['field'] = 'rid';
  $handler->display->display_options['filters']['rid']['value'] = array(
    5 => '5',
  );
  /* Filter criterion: User: Staff type (field_staff_type) */
  $handler->display->display_options['filters']['field_staff_type_tid']['id'] = 'field_staff_type_tid';
  $handler->display->display_options['filters']['field_staff_type_tid']['table'] = 'field_data_field_staff_type';
  $handler->display->display_options['filters']['field_staff_type_tid']['field'] = 'field_staff_type_tid';
  
  $professional_term = taxonomy_get_term_by_name("Professional", "staff_type");
  $values = array_values($professional_term);
  $professional_term = array_shift($values);
  
  if(is_object($professional_term)) {
       $handler->display->display_options['filters']['field_staff_type_tid']['value'] = array(
               0 => $professional_term->tid,
       );
  }
  
  $handler->display->display_options['filters']['field_staff_type_tid']['vocabulary'] = 'staff_type';
  $export['our_people'] = $view;

  return $export;
}
