<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html lang="en">
<head>

<?php print $head; ?>

<title><?php print $head_title; ?></title>

<?php 

if(drupal_get_title() != '') { 
	$page_title = drupal_get_title(); } else { $page_title = ''; 
}

$site_name = variable_get('site_name', '');

?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php print $site_name . ' | ' . $page_title; ?></title>  

<!-- SEO relevant meta data to describe content of page -->
	<meta name="DC.Title" content="<?php print $site_name . ' | ' . $page_title; ?>">
	<meta name="keywords" content="<?php if(variable_get('unimelb_settings_meta-keywords')) { print variable_get('unimelb_settings_meta-keywords') . ', ' . $page_title . ', ' . $site_name; } ?>">
	<meta name="description" content="<?php print $site_name . ': ' . $page_title; if($is_front && variable_get('unimelb_settings_ht-right')) { print ' - ' . variable_get('unimelb_settings_ht-right'); } ?>">
	<meta name="DC.Description" content="<?php print $site_name . ': ' . $page_title; if($is_front && variable_get('unimelb_settings_ht-right')) { print ' - ' . variable_get('unimelb_settings_ht-right'); } ?>">
<!-- End SEO relevant meta data -->

<!-- Authoriser and maintainer related meta data - developers, don't forget humans.txt -->
	<meta name="DC.Creator" content="<?php if(variable_get('unimelb_settings_maint-name')) { print variable_get('unimelb_settings_maint-name') . ', '; } print $site_name; ?>">
	<meta name="DC.Contributor" content="<?php if(variable_get('unimelb_settings_maint-name')) { print variable_get('unimelb_settings_maint-name') . ', '; }  print $site_name; ?>">
	<meta name="author" content="<?php if(variable_get('unimelb_settings_maint-name')) { print variable_get('unimelb_settings_maint-name') . ', '; }  print $site_name; ?>">
	<meta name="UM.Authoriser.Name" content="<?php if(variable_get('unimelb_settings_auth-name')) { print variable_get('unimelb_settings_auth-name'); } ?>">
	<meta name="UM.Authoriser.Title" content="<?php if(variable_get('unimelb_settings_auth-name')) { print variable_get('unimelb_settings_auth-name'); } ?>">
	<meta name="UM.Maintainer.Name" content="<?php if(variable_get('unimelb_settings_maint-name')) { print variable_get('unimelb_settings_maint-name'); } ?>">
	<meta name="UM.Maintainer.Department" content="<?php if(variable_get('unimelb_settings_maint-name')) { print variable_get('unimelb_settings_maint-name'); } ?>">
	<meta name="UM.Maintainer.Email" content="<?php if(variable_get('unimelb_settings_ad-email')) { print variable_get('unimelb_settings_ad-email'); } ?>">
<!-- End authoriser and maintainer meta data -->

<!-- Static meta data   -->
	<meta name="DC.Rights" content="http://www.unimelb.edu.au/disclaimer">
	<meta name="DC.Publisher" content="The University of Melbourne">
	<meta name="DC.Format" content="text/html">
	<meta name="DC.Language" content="en">
	<meta name="DC.Identifier" content="http://www.unimelb.edu.au/">
<!-- End static meta data -->

<!-- Meta data to be autofilled -->
	<meta name="DC.Date" content="DATE">
	<meta name="DC.Date.Modified" content="DATE">
<!-- End meta data to be autofilled -->



	<meta content="width=device-width; initial-scale=1.0;" name="viewport">

  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
