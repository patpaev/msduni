<?php
// save fields to local variables

// get an image's URL 
$item_placeholder = field_get_items('node', $node, 'field_placeholder');
$placeholder = $item_placeholder[0]['uri'];
$placeholder_url = file_create_url($placeholder);

$item_mp4 = field_get_items('node', $node, 'field_mp4');
$mp4 = $item_mp4[0]['uri'];
$mp4_url = file_create_url($mp4);

$item_ogv = field_get_items('node', $node, 'field_ogv');
$ogv = $item_ogv[0]['uri'];
$ogv_url = file_create_url($ogv);

$item_webm = field_get_items('node', $node, 'field_webm');
$webm = $item_webm[0]['uri'];
$webm_url = file_create_url($webm);

?>

<video autoplay loop preload="auto" poster="<?php if($item_placeholder) print($placeholder_url) ?>">
  <?php if($item_mp4): ?> 
    <source src="<?php print($mp4_url) ?>" type="video/mp4" />
  <?php endif; ?>
  <?php if($item_webm): ?> 
    <source src="<?php print($webm_url) ?>" type="video/webm" /> 
  <?php endif; ?>
  <?php if($item_ogv): ?> 
    <source src="<?php print($ogv_url) ?>" type="video/ogg" />
  <?php endif; ?>
</video>