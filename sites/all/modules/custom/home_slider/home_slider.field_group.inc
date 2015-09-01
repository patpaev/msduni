<?php
/**
 * @file
 * home_slider.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function home_slider_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_video|node|home_slider_item|default';
  $field_group->group_name = 'group_video';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'home_slider_item';
  $field_group->mode = 'default';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Video',
    'weight' => '0',
    'children' => array(
      0 => 'field_mp4',
      1 => 'field_ogv',
      2 => 'field_webm',
    ),
    'format_type' => 'html-element',
    'format_settings' => array(
      'formatter' => '',
      'instance_settings' => array(
        'element' => 'div',
        'classes' => '',
        'attributes' => '',
        'required_fields' => 1,
      ),
    ),
  );
  $export['group_video|node|home_slider_item|default'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_video|node|home_slider_item|form';
  $field_group->group_name = 'group_video';
  $field_group->entity_type = 'node';
  $field_group->bundle = 'home_slider_item';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Video',
    'weight' => '7',
    'children' => array(
      0 => 'field_mp4',
      1 => 'field_ogv',
      2 => 'field_webm',
      3 => 'field_placeholder',
    ),
    'format_type' => 'html-element',
    'format_settings' => array(
      'label' => 'Video',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'element' => 'div',
        'attributes' => 'autoplay="true" loop="true" preload="auto"',
      ),
    ),
  );
  $export['group_video|node|home_slider_item|form'] = $field_group;

  return $export;
}
