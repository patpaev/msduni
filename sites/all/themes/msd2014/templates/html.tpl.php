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
	<meta name="DC.Title" content="<?php print trim($site_name . ' | ' . $page_title); ?>">
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

<!-- FB OG Tags... more inserted from node template -->
<meta property="og:site_name" content="Melbourne School of Design" />

<!-- favicons -->
<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="icon" type="image/png" href="/favicon-196x196.png" sizes="196x196">
<link rel="icon" type="image/png" href="/favicon-160x160.png" sizes="160x160">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<meta name="msapplication-TileColor" content="#00457c">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	
	<meta content="width=device-width, initial-scale=0.9" name="viewport">
	<meta name="viewport" content="width=device-width">
	
	<?php print $styles; ?>
	<?php print $scripts; ?>
	
	<script type="text/javascript" src="//use.typekit.net/iws4gen.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	  
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?> style="overflow: visible;">
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5554VT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5554VT');</script>
<!-- End Google Tag Manager -->
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
