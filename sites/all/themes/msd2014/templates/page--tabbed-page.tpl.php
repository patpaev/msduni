
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
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="#">SHOWCASE</a></li>
        <li><a href="#">PROGRAMS</a></li>
        <li><a href="#">RESEARCH</a></li>
        <li><a href="#">PARTNERSHIPS</a></li>
        <li><a href="#">NEW BUILDING</a></li>
        <li><a href="#">EVENTS</a></li>
        <li><a href="#">LIBRARY</a></li>
        <li><a href="#">OUR PEOPLE</a></li>
      </ul>
    </div>
    
    <div style="clear:both"></div>
  </div> 
  
  
<div class="content-black-wrap"><!--black wrap start-->

<div class="content-banner"></div> 
  
<?php if ($logged_in) : ?>
	<?php echo $messages; ?>
<?php endif; ?>
  
<?php print render($page['content']); ?>


   <div style="clear:both"></div>
  
  </div>
  
  </div>

  
  <div style="clear:both"></div>
  
<script type="text/javascript">
jQuery(function($) {
	$( "#tabs" ).tabs();
});
</script>

<?php print render($page['footer']); ?>