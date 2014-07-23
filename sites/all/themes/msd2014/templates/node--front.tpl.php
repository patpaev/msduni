<div id="newsbanner-wrapper">
<?php
$block = block_load('views', 'home_slider-block');
$build = _block_get_renderable_array(_block_render_blocks(array($block)));
print drupal_render($build);
?>
</div>

<div class="main-module-wrap">
<?php
$block = block_load('views', 'home_features_display-block');
$build = _block_get_renderable_array(_block_render_blocks(array($block)));
print drupal_render($build);
?>
</div>

<div class="right-column-wrap">

<div class="news-wrap">
<?php
$block = block_load('views', 'news-block');
$build = _block_get_renderable_array(_block_render_blocks(array($block)));
print drupal_render($build);
?>
</div>

<div class="upcoming-events-wrap">
<?php
$block = block_load('views', 'events-home_events');
$build = _block_get_renderable_array(_block_render_blocks(array($block)));
print drupal_render($build);
?>
</div>
    
  </div>
  
  <div style="clear:both"></div>
  

