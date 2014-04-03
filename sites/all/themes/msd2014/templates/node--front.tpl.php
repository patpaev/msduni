<div id="newsbanner-wrapper">
<?php
$block = block_load('views', 'home_slider-block');
print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
?>
</div>

<div class="main-module-wrap">
<?php
$block = block_load('views', 'home_features_display-block');
print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
?>
</div>

<div class="right-column-wrap">
<div class="news-wrap">
<h2>MSD Latest News</h2>

<ul>
<li>
<a href="#"><span>Wed, 20 Feb 2014</span>
Lorem ipsum dolor sit ipsum <br>
amet consectetur adipisicing more</a></li>

<li>
<a href="#"><span>Fri, 2 Mar 2014</span>
Lorem ipsum dolor sit amet<br>
consectetur adipisicing more</a></li>

<li>
<a href="#"><span>Wed, 20 Feb 2014</span>
Lorem ipsum dolor sit amet ipsum<br>
consec tetur adipisicing more</a></li></ul>

</div>




<div class="upcoming-events-wrap">
<h2>Upcoming Events</h2>
<ul>

<li><a href="#">
<span class="spleft">
<span class="nmbr">20</span>
<span class="date">FEB</span>
</span>
<span class="spright">Lorem ipsum dolor sit consectetur adipisicing</span>
</a></li>

<li><a href="#">
<span class="spleft">
<span class="nmbr">05</span>
<span class="date">MAR</span>
</span>
<span class="spright">Lorem ipsum dolor sit consectetur adipisicing</span>
</a></li>

<li><a href="#">
<span class="spleft">
<span class="nmbr">15</span>
<span class="date">MAR</span>
</span>
<span class="spright">Lorem ipsum dolor sit consectetur adipisicing</span>
</a></li>

<li><a href="#">
<span class="spleft">
<span class="nmbr">25</span>
<span class="date">APR</span>
</span>
<span class="spright">Lorem ipsum dolor sit consectetur adipisicing</span>
</a></li>

</ul>

</div>
    
  </div>
  
  <div style="clear:both"></div>
  

