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

<?
// Load the subpage nodes, limit to maximum of 3 subpages.
$subpage_items = $content["field_subpages"]["#items"];
$num_tabs = sizeof($subpage_items);
$tab_class = '';

if($num_tabs > 3) {
	$subpage_items = array_slice($subpage_items, 0, 4);	
	$tab_class = 'ui-4-tabs';
}

?>

<div id="tabs">

<ul class="<?= $tab_class ?>"><!--
<? foreach($subpage_items as $key => $subpage) { ?>

	<?
	$subpage_node = $subpage["entity"];

	$item = field_get_items('node', $subpage_node, 'field_listing_image');
	$image = field_view_value('node', $subpage_node, 'field_listing_image', $item[0],
		array(
        	'type' => 'image',
	        'settings' => array(
	          'image_style' => 'tabbed_page_image'
	        )
		)
	);
?>

	--><li>    
		<a href="#tabs-<? echo ($key+1); ?>">
			<? print render($image); ?>
			<span><? echo check_plain($subpage["entity"]->title); ?></span>
		</a>
	</li><!--
<? } ?>
--></ul>

<? foreach($subpage_items as $key => $subpage) {

	$subpage_node = $subpage["entity"];
	?>

<div id="tabs-<? echo ($key+1); ?>">

	<table class='tab-content-wrapper'>
	<tr>
	<td class='tabbed-content-left-wrap'>

	<div>

	<?php if ($logged_in) : ?>

	<div class="tabs">
		<?php print "<ul><li><a href='/node/".$subpage_node->nid."/edit'>Edit</a></li></ul>"; ?>
	</div>

	<?php endif; ?>

	<?
	$item = field_get_items('node', $subpage_node, 'body');
	$body = field_view_value('node', $subpage_node, 'body', $item[0]);
	echo render($body);
	?>

	</div>

	</td>

	<?
	$right_column = "";

	// First determine if these is a right column on this specific subpage node
	$item = field_get_items('node', $subpage_node, 'field_right_column');
	if($item) {
		$right_column = field_view_value('node', $subpage_node, 'field_right_column', $item[0]);
	} else {

		// Otherwise use the global right column for this tabbed page if one exists
		$item = field_get_items('node', $node, 'field_right_column');
		if($item) {
			$right_column = field_view_value('node', $node, 'field_right_column', $item[0]);
		}

	}

	if(is_array($right_column)) {
	?>
	<td>
		<div class='tabbed-content-right-wrap'>
			<? echo render($right_column); ?>
		</div>
	</td>
	<? } ?>

	</tr>
	</table>

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
