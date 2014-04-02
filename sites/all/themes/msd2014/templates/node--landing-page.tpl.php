<div class="content-black-wrap"><!--black wrap start-->

<div class="content-banner"></div>

<div class="content-left-wrap">

	<?php 
	$breadcrumb = drupal_get_breadcrumb();
	if ($breadcrumb): ?>
		<div class="thecrumb">
			<div id="breadcrumb"><?php print theme('breadcrumb', array('breadcrumb'=>$breadcrumb)); ?></div>
		</div>
	<?php endif; ?>
	  
  	<h1><? echo $title; ?></h1>
  
  	<blockquote>
  	<?
  	$item = field_get_items('node', $node, 'field_header');
  	$body = field_view_value('node', $node, 'field_header', $item[0]);
  	echo render($body);
  	?>
  	</blockquote>
  
</div>


<div class="content-right-wrap">

	<div class="share">
	
		<a href="#"><img src="/<?php echo drupal_get_path('theme', 'msd2014'); ?>/images/fb-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo drupal_get_path('theme', 'msd2014'); ?>/images/tw-sm.gif" width="26" height="26" alt="twitter"></a><a href="#"><img src="/<? echo drupal_get_path('theme', 'msd2014'); ?>/images/prnt-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo drupal_get_path('theme', 'msd2014'); ?>/images/email-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo drupal_get_path('theme', 'msd2014'); ?>/images/plus-sm.gif" width="26" height="26" alt="email"></a>
    
    	<p>Share this page</p>
    	
    </div>
    
</div>

<div style="clear:both"></div>

<div class="programs-content-left">
	<?
  	$item = field_get_items('node', $node, 'body');
  	$body = field_view_value('node', $node, 'body', $item[0]);
  	echo render($body);
  	?>
</div>
  
<div class="programs-content-right">
  
	<img src="images/katelin-butler239.jpg" width="239" height="218" alt="Katelin Butler">
  
	<blockquote><p>"I have a bird's eye view of what’s happening around Australia in all sorts of practices"</p></blockquote>

	<div>

		<h4>MASTER ARCHITECTURE</h4>
		<h5>Katelin Butler</h5>
		
		<p>Architecture 2007 Editor of Houses Magazine and key contributor to contemporary Architectural discourse</p>
		
	</div>

</div>
  
  <div style="clear:both"></div>
 
 <?
// Load the related items
$related_items = $content["field_related_items"]["#items"];
?>
 
<? foreach($related_items as $key => $item) { 

	$node = $item["entity"];
	?>
	<div class="programs-module">
		
		<?
		$item = field_get_items('node', $node, 'field_image');
		$image = field_view_value('node', $node, 'field_image', $item[0],
			array(
				'type' => 'image',
				'settings' => array(
					'image_style' => 'landing_page_item_image'
				)
			)
		);
		?>
		
		<? print render($image); ?>
		
		<h2><? echo strtoupper($node->title); ?></h2>
		
	    <p>
		<?
	  	$item = field_get_items('node', $node, 'body');
	  	$body = field_view_value('node', $node, 'body', $item[0]);
	  	echo render($body);
	  	?>
	    </p>
        
        <?
	  	$item = field_get_items('node', $node, 'field_link');
	  	$link = field_view_value('node', $node, 'field_link', $item[0]);
	  	echo render($link);
	  	?>
	  	
    </div>
    
 <? } ?>
 
  <div style="clear:both"></div>
  
</div>
  