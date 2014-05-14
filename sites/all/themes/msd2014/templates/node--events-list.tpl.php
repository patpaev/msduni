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
  	Events
  	</blockquote>
  
</div>


<div class="content-right-wrap">
	<?php
	$block = module_invoke('sharethis_extras', 'block_view', 'sharethis_extras_block');
	print render($block['content']);
	?>
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
	<?
  	$item = field_get_items('node', $node, 'field_right_column');
  	$body = field_view_value('node', $node, 'field_right_column', $item[0]);
  	echo render($body);
  	?>
</div>
  
  <div style="clear:both"></div>
 
 <?
// Load the news items
$news_items = array();
?>
 
<? foreach($news_items as $key => $item) { 

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
        
		<div class='read-more-wrapper'>
        <?
	  	$item = field_get_items('node', $node, 'field_link');
	  	$link = field_view_value('node', $node, 'field_link', $item[0]);
	  	echo render($link);
	  	?>
		</div>
	  	
    </div>
    
 <? } ?>
 
  <div style="clear:both"></div>
  
</div>

<script type="text/javascript">
jQuery(function($) {
    $('.programs-content-left, .programs-content-right').matchHeight();
    $('.programs-module').matchHeight();
});
</script>