<?php
/**
 * @file
 * home_features_display.features.inc
 */

/**
 * Implements hook_views_api().
 */
function home_features_display_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function home_features_display_node_info() {
  $items = array(
    'home_feature_item' => array(
      'name' => t('Home Feature Item'),
      'base' => 'node_content',
      'description' => t('This items can be displayed in the 3 column display below the homepage slider.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
