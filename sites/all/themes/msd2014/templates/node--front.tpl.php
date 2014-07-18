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

<div id='enews-subscribe'>

<h4>Subscribe to e-news</h4>

<form action="http://architecturebuildingandplanning.createsend.com/t/j/s/thijuk/" id="subForm" method="post">
<table>
	<tbody>
		<tr>
			<td><label for="name" style="float: left;">Name:</label></td>
			<td><input id="name" name="cm-name" type="text" /></td>
		</tr>
		<tr>
			<td><label for="thijuk-thijuk">Email:</label></td>
			<td><input id="thijuk-thijuk" name="cm-thijuk-thijuk" type="text" /></td>
		</tr>
	</tbody>
</table>

<div><input type="submit" value="Subscribe" /></div>
</form>

</div>

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
  

