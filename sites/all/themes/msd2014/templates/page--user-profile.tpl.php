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
 
  <div class="content-white-wrap"><!--white wrap start-->

<div class="content-left-wrap">

<?php 
$breadcrumb = drupal_get_breadcrumb();
if ($breadcrumb): ?>
	<div class="thecrumb">
		<div id="breadcrumb"><?php print theme('breadcrumb', array('breadcrumb'=>$breadcrumb)); ?></div>
	</div>
<?php endif; ?>
  
  <?php if ($title): ?>
      <h1><?php print $title; ?></h1>
  <?php endif; ?>

  <?php 
  $user_profile = $page['content']['system_main'];
  ?>
  
  <?php print render($user_profile["field_image"]); ?>
  
  <?php print render($user_profile["field_biography"]); ?>
  
  <?php print render($user_profile["field_related_web_pages"]); ?>
  
  <?php print render($user_profile["field_featured_media_releases"]); ?>
  
  <?php if(array_key_exists("field_find_an_expert", $user_profile)) { ?>
  	<br/>
    For more details visit their <a href='<? print render($user_profile["field_find_an_expert"]); ?>' target='_blank'>Find An Expert profile</a>
  <?php } ?>
  
</div>

<div class="content-right-wrap">
	
	<div class='right-column user-profile'>
       <div class="side-module">
			<h2><?php print $title; ?></h2>
			<div>
               <p>
               <?php
               if(array_key_exists("field_profile_portrait_image", $user_profile)) {
                 print render($user_profile["field_profile_portrait_image"]);
               } else { ?>
			     <img src='/sites/default/files/silhouette-150x141px.jpg' />
			   <?php } ?>
               </p>
               
               <p><strong>Position Title</strong>:<br />
               <?php print render($user_profile["field_position_title"]); ?></p>
               
               <? if(array_key_exists("field_discipline", $user_profile)) { ?>
                 <p>
	             	<strong>Discipline:</strong><br/>
	             	<? print render($user_profile["field_discipline"]); ?>
                 </p>
               <? } ?>
               
               <? if(array_key_exists("field_institute_center", $user_profile)) { ?>
                 <p>
               	 	<strong>Research Centre/Institute:</strong><br />
               	 	<? print render($user_profile["field_institute_center"]); ?>
                 </p>
			   <? } ?>
			   
               <? if(array_key_exists("field_research_direction", $user_profile)) { ?>
               	 <p>
               	 	<strong>Research Direction:</strong><br />
               	 	<? print render($user_profile["field_research_direction"]); ?>
               	 </p>
               <? } ?>
               
               <p><strong>Contact Details:</strong></p>
               <p><img alt="email icon" class="icon-email middle" src="/sites/default/files/emailIcon.gif" /> <?php print render($user_profile["field_email"]); ?></p>
               <p><img alt="phone icon" class="icon-phone middle" src="/sites/default/files/phoneIcon.gif" /> +61 3 <?php print render($user_profile["field_telephone"]); ?></p>
               <p><strong>Location</strong>:<br />
               Level: <?php print render($user_profile["field_level"]); ?>, Room: <?php print render($user_profile["field_room"]); ?><br />
               <?php print render($user_profile["field_building"]); ?></p>
			</div>
       </div>
	</div>

</div>
<div style="clear:both"></div>
  
  <div class="backtop"><a href="#">Back to top</a></div>
  
  </div><!--white wrap end-->
  
  </div>
  <div style="clear:both"></div>

<?php print render($page['footer']); ?>