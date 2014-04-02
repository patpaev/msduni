
<script type="text/javascript">
jQuery(function($){
	$.supersized({
		slides : [ {image : '/<? echo path_to_theme(); ?>/images/bg1.jpg', title : ''} ]
	});
});
</script>

	<div class="bg-pattern-rpt"></div>


  <div class="wrapper-main">

	
  <div class="main-header">
  
  <a href="/"><img src="/<? echo path_to_theme(); ?>/images/msd-logo.png" width="440" height="110" alt="msd logo" /></a>
  
  <div class="navigation">
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="#">SHOWCASE</a></li>
        <li><a href="#">PROGRAMS</a></li>
        <li><a href="#">RESEARCH</a></li>
        <li><a href="#">PARTNERSHIPS</a></li>
        <li><a href="#">NEW BUILDING</a></li>
        <li><a href="#">EVENTS</a></li>
        <li><a href="#">LIBRARY</a></li>
        <li><a href="#">OUR PEOPLE</a></li>
      </ul>
    </div>
    
    <div style="clear:both"></div>
  </div>
  
<div id="newsbanner-wrapper">
<?php
$block = block_load('views', 'home_slider-block');
print drupal_render(_block_get_renderable_array(_block_render_blocks(array($block))));
?>
</div>

<div class="main-module-wrap">


  <div class="module-wrap">
    <img src="images/home-thmb1.png" width="238" height="160" alt="thmb1">
    <h2>SHOWCASE</h2>
    <ul>
    <li><a href="#">Staff</a></li>
    <li><a href="#">Students</a></li>
    <li><a href="#">Alumni</a></li>
    <li><a href="#">Studios</a></li>
    </ul>
    </div>
    
    <div class="module-wrap">
    <img src="images/home-thmb2.png" width="238" height="160" alt="thmb1">
    <h2>PROGRAMS</h2>
    <ul>
    <li><a href="#">Undergraduate</a></li>
    <li><a href="#">Graduate</a></li>
    <li><a href="#">Research</a></li>
    </ul>
    </div>
    
    <div class="module-wrap">
    <img src="images/home-thmb3.png" width="238" height="160" alt="thmb1">
    <h2>RESEARCH</h2>
    <ul>
    <li><a href="#">Our Research Strengths</a></li>
    <li><a href="#">Collaborative Research</a></li>
    <li><a href="#">Funded Projects</a></li>
    </ul>
    </div>
    
    
    <div class="module-wrap">
    <img src="images/home-thmb4.png" width="238" height="160" alt="thmb1">
    <h2>PARTNERSHIP</h2>
    <ul>
    <li><a href="#">Connect with MSD</a></li>
    <li><a href="#">Support Us</a></li>
    </ul>
    </div>
    
    <div class="module-wrap">
    <img src="images/home-thmb5.png" width="238" height="160" alt="thmb1">
    <h2>EXHIBITIONS</h2>
    <ul>
    <li><a href="#">Exhibition One</a></li>
    <li><a href="#">Exhibition Two</a></li>
    <li><a href="#">Exhibition Three</a></li>
    </ul>
    </div>
    
    <div class="module-wrap">
    <img src="images/home-thmb6.png" width="238" height="160" alt="thmb1">
    <h2>NEW BUILDING</h2>
    <ul>
    <li><a href="#">Our Research Strengths</a></li>
    <li><a href="#">Collaborative Research</a></li>
    <li><a href="#">Funded Projects</a></li>
    </ul>
    </div>
    
    
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
  
  
  </div>
  
  <div style="clear:both"></div>

  <?php print render($page['footer']); ?>