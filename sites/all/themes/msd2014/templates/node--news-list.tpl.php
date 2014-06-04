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
  	
    <? 
    $item = field_get_items('node', $node, 'field_header'); 
    if(is_array($item)) { ?>
	  	<blockquote>
	  	<?
	  	$body = field_view_value('node', $node, 'field_header', $item[0]);
	  	echo render($body);
	  	?>
	  	</blockquote>
  	<? } ?>

</div>


<div class="content-right-wrap news">
	<?php
	$block = module_invoke('sharethis_extras', 'block_view', 'sharethis_extras_block');
	print render($block['content']);
	?>
</div>
  
<div style="clear:both"></div>
 
<div class="news-promoted-header">
	<?
  	$item = field_get_items('node', $node, 'body');
  	$body = field_view_value('node', $node, 'body', $item[0]);
  	echo render($body);
  	?>
</div>
  
<div style="clear:both"></div>

<?php
$block = block_load('views', 'news-block_1');
$build = _block_get_renderable_array(_block_render_blocks(array($block)));
print drupal_render($build);
?>
 
<div style="clear:both"></div>
  
</div>

<script type="text/javascript">
jQuery(function($) {
    $('.programs-content-left, .programs-content-right').matchHeight();
    $('.programs-module').matchHeight();
    $('.programs-module h2').matchHeight();
});
</script>