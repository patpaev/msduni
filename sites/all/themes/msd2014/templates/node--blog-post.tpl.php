<div class="content-white-wrap"><!--white wrap start-->

<div class="content-left-wrap">

<?php 
$breadcrumb = drupal_get_breadcrumb();
if ($breadcrumb): ?>
	<div class="thecrumb">
		<div id="breadcrumb"><?php print theme('breadcrumb', array('breadcrumb'=>$breadcrumb)); ?></div>
	</div>
<?php endif; ?>
  
  <div class='date-wrapper'>
  	<?php print format_date($node->created, 'blog_post'); ?>
  </div>
  
  <?php if ($title): ?>
      <h2 class='title'><?php print $title; ?></h2>
  <?php endif; ?>

  <?php print render($content['body']); ?>
  
  <?php print render($content['field_blog_tags']); ?>
  
</div>

<div class="content-right-wrap">
	
	<?php
	$block = module_invoke('sharethis_extras', 'block_view', 'sharethis_extras_block');
	print render($block['content']);
	?>
	
	<?
	$item = field_get_items('node', $node, 'field_right_column');
	if(is_array($item)) {
	
		$field_right_column = field_view_value('node', $node, 'field_right_column', $item[0]);
		if($field_right_column && is_array($field_right_column)) { ?>
			<div class='right-column'>
				<? print render($field_right_column); ?>
			</div>
	    <? } ?>
    
    <? } ?>
    
	<? if(isset($rightcolumn) && is_array($rightcolumn)) { ?>
	    <div class='right-column'>
	    <? print render($rightcolumn); ?>
	    </div>
    <? } ?>
	
</div>
<div style="clear:both"></div>
  
  <div class="backtop"><a href="#">Back to top</a></div>
  
  
  </div><!--white wrap end-->
