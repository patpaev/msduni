<div class="content-white-wrap"><!--white wrap start-->

<?
if (isset($node) && is_object($node)) {

	$node = node_load($node->nid);
		
	$item = field_get_items('node', $node, 'field_image');
	
	if(is_array($item)) {
	
		$image = field_view_value('node', $node, 'field_image', $item[0], 
			array(
		        'type' => 'image',
		        'settings' => array(
		          //'image_style' => ''
		        )
			)
		);
?>
		<div class="content-banner">
	  		<? print render($image); ?>
	  	</div>  
<? 	
	}
} 
?>

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

  <?php print render($content['body']); ?>
  
</div>

<div class="content-right-wrap">
  <div class="share"> <a href="#"><img src="/<? echo path_to_theme(); ?>/images/fb-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo path_to_theme(); ?>/images/tw-sm.gif" width="26" height="26" alt="twitter"></a><a href="#"><img src="/<? echo path_to_theme(); ?>/images/prnt-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo path_to_theme(); ?>/images/email-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo path_to_theme(); ?>/images/plus-sm.gif" width="26" height="26" alt="email"></a>
    
    <p>Share this page</p>
    </div>
    
    <div class="side-module">
    <h2>MASTER OF<br>ARCHITECTURE</h2>
    <img src="images/katelin-butler.jpg" width="215" height="196" alt="Katelin Butler">
<blockquote>
  <p>“I have a bird’s eye view of what’s happening around Australia in all sorts of practices”</p></blockquote>


<div><h5>Katelin Butler</h5>

<p>Architecture 2007<br>
Editor of Houses Magazine<br>
and key contributor to<br>
contemporary<br>
Architectural discourse</p></div>

    </div>
     
</div>
<div style="clear:both"></div>
  
  <div class="backtop"><a href="#">Back to top</a></div>
  
  
  </div><!--white wrap end-->
