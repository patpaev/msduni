<?php
/**
 * @file
 * home_slider.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function home_slider_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function home_slider_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function home_slider_node_info() {
  $items = array(
    'home_slider_item' => array(
      'name' => t('Home Slider Item'),
      'base' => 'node_content',
      'description' => t('A slider to appear on the homepage.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
