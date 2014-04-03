
<script type="text/javascript">
jQuery(function($){
	$.supersized({
		slides : [ {image : '/<? echo path_to_theme(); ?>/images/bg1.jpg', title : ''} ]
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
  
  <div class="main-header"><a href="/">
  <img src="/<? echo path_to_theme(); ?>/images/msd-logo.png" width="440" height="110" alt="msd logo" /></a>
  
    <div class="navigation">
	    <div id='cssmenu'>
		<? print render($main_menu_expanded); ?>
  	    </div>
    </div>
  
    <div style="clear:both"></div>
  </div>
  
  	<?php if ($logged_in) : ?>		
     	<?php print $messages; ?>
	<?php endif; ?>
 
  <?php print render($page['content']); ?>
  
  </div>
  <div style="clear:both"></div>

<?php print render($page['footer']); ?>