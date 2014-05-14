<?php

/**
 * Implements hook_preprocess_html
 */
function msd2014_preprocess_html(&$vars) {
	
    drupal_add_css('http://brand.unimelb.edu.au/web-templates/1-1-0/css/complete.css', 'external');
    drupal_add_css(path_to_theme() . '/css/msd2014.css');
    drupal_add_css(path_to_theme() . '/css/nav-style.css');
    drupal_add_css(path_to_theme() . '/css/msd2014-extra.css');
    drupal_add_css(path_to_theme() . '/css/supersized.core.css');
    drupal_add_css(path_to_theme() . '/css/jquery-ui.css');
    
    drupal_add_js('http://brand.unimelb.edu.au/global-header/js/injection.js', 'external');
    drupal_add_js(path_to_theme() . '/js/supersized.core.3.2.1.min.js');
    drupal_add_js(path_to_theme() . '/js/jquery-ui.js');
    drupal_add_js(path_to_theme() . '/js/jquery.matchHeight-min.js');
    
    drupal_add_js(path_to_theme() . '/js/navigation.js');
    drupal_add_js(path_to_theme() . '/js/newsbanner.js');
    
    switch (theme_get_setting('unimelb_banner_type')) {
        case 'newsbanner':
            drupal_add_js(path_to_theme() . '/js/newsbanner.js');
            break;
        case 'homebanner':
            drupal_add_js(path_to_theme() . '/js/homebanner.js');
            drupal_add_css(path_to_theme() . '/css/homebanner.css');
            break;
    }

    $background = theme_get_setting('background');
    $background_class = !empty($background) ? $background : "blue";

    if ($vars['is_front'] && $background_class != "clouds") {
        $background_class .= "-home";
    }

    $background = theme_get_setting('background');
    $background_class = !empty($background) ? $background : "blue";

    if ($vars['is_front'] && $background_class != "clouds") {
        $background_class .= "-home";
    }

    $vars['classes_array'][] = $background_class;
    $vars['classes_array'][] = "home";
    $vars['classes_array'][] = "heading-block";
}

/**
 * Preprocessor for node.tpl.php template file.
 */
function msd2014_preprocess_node(&$vars) {
	if ($vars["is_front"]) {
		$vars["theme_hook_suggestions"][] = "node__front";
	}
	if ($blocks = block_get_blocks_by_region('rightcolumn')) {
		$vars['rightcolumn'] = $blocks;
	}
	// Use custom node template for news
	if(request_path() == "news") {
		$vars['theme_hook_suggestions'][] = 'node__news_list';
	}
	if(request_path() == "events") {
		$vars['theme_hook_suggestions'][] = 'node__events_list';
	}
	if(request_path() == "past-events") {
		$vars['theme_hook_suggestions'][] = 'node__past_events_list';
	}
}

/**
 * Preprocessor for page.tpl.php template file.
 */
function msd2014_preprocess_page(&$vars, $hook) {
    // Retrieve site settings from theme and set vars accordingly
    $parent_site_name = theme_get_setting('parent_site_name');
    $parent_site_link = theme_get_setting('parent_site_link');

    $vars['linked_parent_site_name'] = "";
    if (!empty($parent_site_name)) {
        $vars['linked_parent_site_name'] = l($parent_site_name, $parent_site_link, array(
            'attributes' => array(
                'title' => t($parent_site_name),
            )
                ));
    }

    $vars['linked_site_name'] = '';
    if (!empty($vars['site_name'])) {
        $vars['linked_site_name'] = l($vars['site_name'], '<front>', array(
            'attributes' => array(
                'rel' => 'home',
                'title' => t('Home'),
            ),
                ));
    }

    $vars['address'] = theme_get_setting('address');
    $vars['phone'] = theme_get_setting('phone');
    $vars['fax'] = theme_get_setting('fax');
    $vars['email'] = theme_get_setting('email');
    $vars['facebook_url'] = theme_get_setting('facebook_url');
    $vars['twitter_url'] = theme_get_setting('twitter_url');
    $vars['authoriser'] = theme_get_setting('authoriser');
    $vars['maintainer'] = theme_get_setting('maintainer');
    $vars['show_grid'] = theme_get_setting('show_grid');
    $vars['date_created'] = "";
    $vars['date_modified'] = "";

    // Set node specific variables if this is a node
    $node = !empty($vars['node']) ? $vars['node'] : null;

    if (!is_null($node)) {
        $vars['date_created'] = date('j F Y', $node->created);
        $vars['date_modified'] = date('j F Y', $node->changed);
    }

    /* Set up top menu */
    // Always get the top menu if its set
    $vars['header_menu'] = theme_get_setting('header_menu') == 'none' ? null : _unimelb_menu_tree('header', theme_get_setting('header_menu'), theme_get_setting('header_menu_max_depth'));

    /* Set up navigation menu */
    // Only retrieve the navigation menu if it's to be displayed on this page   
    $navigation_visibility = theme_get_setting('navigation_menu_visibility');
    $navigation_pages = theme_get_setting('navigation_menu_pages');
    $navigation_menu_on = theme_get_setting('navigation_menu') == 'none' ? false : true;

    if ($navigation_menu_on) {
        if ($navigation_visibility == 1 && empty($navigation_pages)) {
            // If the menu is set to display only on certain pages AND there are 
            // none entered
            $page_match = FALSE;
        } else {
            // If the menu is set to display exclusive or inclusive of pages and 
            // there are pages set
            if ($navigation_pages) {
                // If there are pages set, this case could be either inclusive or 
                // exclusive
                $pages = drupal_strtolower($navigation_pages);
                $path = drupal_strtolower(drupal_get_path_alias($_GET['q']));
                $page_match = drupal_match_path($path, $pages);
                
                // Something for if clean URLs is on or off ???
                if ($path != $_GET['q']) {
                    $page_match = $page_match || drupal_match_path($_GET['q'], $pages);
                }

                $page_match = !($navigation_visibility xor $page_match);
            } else {
                // There are no pages set, this is only possible for inclusive at 
                // this point, display everything
                $page_match = TRUE;
            }
        }
    } else {
        $page_match = FALSE;
    }

    $vars['navigation_menu'] = $navigation_menu_on && $page_match ? _unimelb_menu_tree('navigation', theme_get_setting('navigation_menu'), theme_get_setting('navigation_menu_max_depth')) : null;

    if (!$vars['navigation_menu']) {
        $vars['asideIsFirst'] = true;
    } else {
        $vars['asideIsFirst'] = false;
    }
    
    if (isset($vars['node']->type)) { 
    	$vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type; 
    }
    
    // For pages which aren't a node (except for the front page),
    // use a page template with a white wrap.
    if(
    	!$vars['is_front'] && 
    	(!isset($vars['node']) || !is_object($vars['node']))
    ) {
    	$vars['theme_hook_suggestions'][] = 'page__white_wrap';
    }
    
    // Get the entire main menu tree
    $main_menu_tree = menu_tree_all_data('main-menu');
    
    // Add the rendered output to the $main_menu_expanded variable
    $vars['main_menu_expanded'] = menu_tree_output($main_menu_tree);
}

function msd2014_menu_link__main_menu(array $variables) {
	$element = $variables['element'];
	$sub_menu = '';

	if ($element['#below']) {
		$sub_menu = drupal_render($element['#below']);
		$element['#attributes']['class'][] = "has-sub";
	}
	$output = l($element['#title'], $element['#href'], $element['#localized_options']);
	return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function _unimelb_menu_tree($region, $menu_name, $max_depth = null) {
    $menu_output = &drupal_static(__FUNCTION__, array());

    if (!isset($menu_output[$region])) {
        if ($max_depth == 0) {
            $max_depth = null;
        }
        
        $tree = menu_tree_page_data($menu_name, $max_depth);        
        $menu_output[$region] = menu_tree_output($tree);
    }
    
    return $menu_output[$region];
}