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
	<?php
	$block = module_invoke('sharethis_extras', 'block_view', 'sharethis_extras_block');
	print render($block['content']);
	?>
</div>

<div style="clear:both"></div>

<?
$item_body = field_get_items('node', $node, 'body');
$body = field_view_value('node', $node, 'body', $item_body[0]);

$item_right_column = field_get_items('node', $node, 'field_right_column');
$right_column = field_view_value('node', $node, 'field_right_column', $item_right_column[0]);
?>

<? if(
	strlen(trim($body["#markup"])) > 0 &&
	strlen(trim($right_column["#markup"])) == 0
) { ?>

	<div class="programs-content-left full-width">
		<? echo render($body); ?>
	</div>

<? } else if(strlen(trim($body["#markup"])) > 0) { ?>

	<div class="programs-content-left">
		<? echo render($body); ?>
	</div>
	  
	<div class="programs-content-right">
		<? echo render($right_column); ?>
	</div>

<? } ?>

<div style="clear:both"></div>
 
<?
// Load the related items
$related_items = array();
if(array_key_exists("field_related_items", $content)) {
	$related_items = $content["field_related_items"]["#items"];
}

foreach($related_items as $key => $item) { 

	$node = $item["entity"];
	
	if($node->type == "landing_page_item") {
		
		$item = field_get_items('node', $node, 'field_link');
		$link = field_view_value('node', $node, 'field_link', $item[0]);
		$url = $link["#element"]["url"];
		
	} else if(
		$node->type == "page" ||
		$node->type == "event" ||
		$node->type == "news" ||
		$node->type == "tabbed_page"

	) {
		
		$url = url('node/' . $node->nid, array('absolute' => TRUE));
		$options = array(
			'attributes' => array(
				'class' => array('proj-more'),
			),
		);
		$link = l("Read More", $url, $options);
		
	} 
	?>
	<div class="programs-module">
		
		<?
		if($node->type == "landing_page_item") {	
			$item = field_get_items('node', $node, 'field_image');

			if ($item == NULL) {
				$image = NULL;
			} else {
				$image = field_view_value('node', $node, 'field_image', $item[0],	
					array(
						'type' => 'image',
						'settings' => array(
							'image_style' => 'landing_page_item_image'
						)
					)
				);
			}
		} else if(
			$node->type == "page" ||
			$node->type == "event" ||
			$node->type == "news" ||
			$node->type == "tabbed_page"
		) {
			$item = field_get_items('node', $node, 'field_listing_image');
			$image = field_view_value('node', $node, 'field_listing_image', $item[0],
				array(
					'type' => 'image',
					'settings' => array(
						'image_style' => 'landing_page_item_image'
					)
				)
			);
		}
		?>
		
		<? if($image): ?> <a href='<? echo $url; ?>'><? print render($image); endif; ?></a>
		
		<h2><a href='<? echo $url; ?>'><? echo strtoupper($node->title); ?></a></h2>
		
	    <p>
		<?
		if($node->type == "landing_page_item") {
		  	$item = field_get_items('node', $node, 'body');
		  	$body = field_view_value('node', $node, 'body', $item[0]);
		  	echo render($body);
	  	} else if(
			$node->type == "page" ||
			$node->type == "event" ||
			$node->type == "news" ||
			$node->type == "tabbed_page"
		) {
		  	$item = field_get_items('node', $node, 'body');
		  	$teaser = field_view_value('node', $node, 'body', $item[0], 'teaser');
		  	echo render($teaser);
	  	}
	  	?>
	    </p>
        
		<div class='read-more-wrapper'>
        <? echo render($link); ?>
		</div>
	  	
    </div>
    
 <? } ?>
 
  <div style="clear:both"></div>
  
</div>

<script type="text/javascript">
jQuery(function($) {
    $('.programs-content-left, .programs-content-right').matchHeight();
    $('.programs-module').matchHeight();
    $('.programs-module h2').matchHeight();
});
</script>