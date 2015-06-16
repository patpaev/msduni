<?
// Use a custom background image for homepage or node type
$uri = "";
if($is_front) {
	$uri = "public://images/backgrounds/home.jpg";
} else if(isset($node)) {
	$uri = "public://images/backgrounds/" . $node->type . ".jpg";
}

// Fallback to using homepage background if a custom one doesn't exists
// for this content type
if (!file_exists($uri)) {
	$uri = "public://images/backgrounds/home.jpg";
}
?>

<script type="text/javascript">
jQuery(function($){
	$.supersized({
		slides : [ {image : '<? echo file_create_url($uri); ?>', title : ''} ]
	});
});
</script>
  	
	<?php if ($logged_in) : ?>
		<div class="tabs">
			<?php print "<ul>" . drupal_render($tabs['#primary']) . "</ul>"; ?>
			<?php print "<ul>" . drupal_render($tabs['#secondary']) . "</ul>"; ?>
 		</div>
	<?php endif; ?>

<div class="bg-pattern-rpt"></div>


  <div class="wrapper-main">
  
  <div class="main-header">
    <a href="/">
      <svg width="528" height="150" viewBox="0 0 528 150" aria-labelledby="aria-uom-title" role="img">
        <title id="aria-uom-title">The Melbourne School of Design co-branded with the University of Melbourne Logo</title>
        <image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/<? echo path_to_theme(); ?>/images/msd-full-co-brand-opt-comp.svg" src="<? echo path_to_theme(); ?>/images/msd-full-co-brand.png" width="528" height="150" alt="Melbourne School of Design" preserveAspectRatio="xMaxYMin meet"></image>
      </svg>
    </a>
  
    <div class="navigation">
	    <div id='cssmenu'>
		<? print render($main_menu_expanded); ?>
  	    </div>
    </div>
  
    <div style="clear:both"></div>
  </div>
  
   <div id="mobile-toggle" style="display:none"> 
  <a href="#" id="toggle-menu">
    <img id="changer" src="/sites/all/themes/msd2014/images/mob-toggle.png" width="85" height="85" onclick="changeImage(this)" />  
  </a>
  </div>
  
  	<?php if ($logged_in) : ?>		
     	<?php print $messages; ?>
	<?php endif; ?>
 
  <?php print render($page['content']); ?>
  
  </div>
  <div style="clear:both"></div>

<?php print render($page['footer']); ?>