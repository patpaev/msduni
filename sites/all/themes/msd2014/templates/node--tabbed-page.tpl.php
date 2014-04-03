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
	$item = field_get_items('node', $node, 'body');
	$body = field_view_value('node', $node, 'body', $item[0]);
	echo render($body);
	?>
	</blockquote>
  
</div>



<div class="content-right-wrap">

  <div class="share"> <a href="#"><img src="/<?php echo path_to_theme(); ?>/images/fb-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo path_to_theme(); ?>/images/tw-sm.gif" width="26" height="26" alt="twitter"></a><a href="#"><img src="/<? echo path_to_theme(); ?>/images/prnt-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo path_to_theme(); ?>/images/email-sm.gif" width="26" height="26" alt="email"></a><a href="#"><img src="/<? echo path_to_theme(); ?>/images/plus-sm.gif" width="26" height="26" alt="email"></a>
    
    <p>Share this page</p>
    </div>
</div>
<div style="clear:both"></div>
  
<?
// Load the subpage nodes, limit to maximum of 3 subpages.
$subpage_items = $content["field_subpages"]["#items"];
$subpage_items = array_slice($subpage_items, 0, 3);
?>
 
<div id="tabs">

<ul>
<? foreach($subpage_items as $key => $subpage) { ?>

	<?
	$node = $subpage["entity"];
	
	$item = field_get_items('node', $node, 'field_image');
	$image = field_view_value('node', $node, 'field_image', $item[0], 
		array(
        	'type' => 'image',
	        'settings' => array(
	          'image_style' => 'tabbed_page_image'
	        )
		)
	);
	?>

	<li>
		<a href="#tabs-<? echo ($key+1); ?>">
			<? print render($image); ?>
			<span><? echo check_plain($subpage["entity"]->title); ?></span>
		</a>
	</li>
<? } ?>
</ul>

<? foreach($subpage_items as $key => $subpage) { 

	$node = $subpage["entity"];
	?>

<div id="tabs-<? echo ($key+1); ?>">
	
	<?php if ($logged_in) : ?>
	
	<div class="tabs">
		<?php print "<ul><li><a href='/node/".$node->nid."/edit'>Edit</a></li></ul>"; ?>
	</div>
	
	<?php endif; ?>
	
	<?
	$item = field_get_items('node', $node, 'body');
	$body = field_view_value('node', $node, 'body', $item[0]);
	echo render($body);
	?>

</div>

<? } ?>

</div>

   <div style="clear:both"></div>
  
  </div>

<script type="text/javascript">
jQuery(function($) {
	$( "#tabs" ).tabs();
});
</script>
