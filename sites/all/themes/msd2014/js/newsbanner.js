/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function(b,c){var $=b.jQuery||b.Cowboy||(b.Cowboy={}),a;$.throttle=a=function(e,f,j,i){var h,d=0;if(typeof f!=="boolean"){i=j;j=f;f=c}function g(){var o=this,m=+new Date()-d,n=arguments;function l(){d=+new Date();j.apply(o,n)}function k(){h=c}if(i&&!h){l()}h&&clearTimeout(h);if(i===c&&m>e){l()}else{if(f!==true){h=setTimeout(i?k:l,i===c?e-m:e)}}}if($.guid){g.guid=j.guid=j.guid||$.guid++}return g};$.debounce=function(d,e,f){return f===c?a(d,e,false):a(d,f,e!==false)}})(this);

/*
  jQuery hotfix
  Addresses a bug in jQuery which causes an error when animating
  negative percentages in IE8
*/
var oldcur = jQuery.fx.prototype.cur;
jQuery.fx.prototype.cur = function() {
  var cur = oldcur.apply(this, arguments);
  return (cur || 1);
}

// MEDIA INSIGHTS 24 Feb 2012
// jQuery opening (below) hacked for Drupal compatibility 
// from this: $(function() {
// to this: jQuery(function($) {

jQuery(function($) {

  var ratio = 0,
      newsbanner = $('#newsbanner'),
      wrapper = $('#banner-wrapper'),
      banners = $('.banner', wrapper),
      links = $('ol a', newsbanner);
  
  var resizeBanners = function() {
    $('#newsbanner').css('font-size', '213%').css('height', '320px');
    banners.css('height', '320px');
    wrapper.css('height', '320px');
    return

    // don't need all of the calcs below because we have a fixed banner height

    var bannerHeight = $('#newsbanner .banner img:visible').height();
    // The dimensions for all of the banner sub-elements are defined in ems,
    // so we can resize everything in scale by setting the font-size property
    // on #newsbanner (the parent)
    $('#newsbanner').css('font-size', Math.floor(bannerHeight / 1.5) + '%').css('height', bannerHeight);
    // The wrapper overflow sizes need to be set manually to match the image
    $('#banner-clip', newsbanner).css('height', bannerHeight);
    wrapper.css('height', bannerHeight);
  }

  var imageLoad = function() {
    // Calculate the image ratio (1:3, etc)
    ratio = ((this.offsetHeight + 1) / this.offsetWidth) * 100;
    // Resize banners (the first time)
    resizeBanners();
  }

  if (!!newsbanner.length) {
    // Once the image has loaded, we can reference its width and height
    var image = $('#newsbanner .banner img').first();
    // Reset the src to ensure the load event fires
    image.load(imageLoad).attr('src', image.attr('src')+'?'+(+new Date()));
    // Resize the banners on page resize (throttled to run every 50ms)
    $(window).resize( $.throttle(50, resizeBanners) );
  }
  
  links.click(function(e) {
    // prevent the default link action
    e.preventDefault();
    // store the index of the clicked link
    var index = $(links).index(this);

    // add .selected to the current li, and remove it from all others
    $(this).closest("li").addClass('selected').siblings().removeClass('selected');
    // show the corresponding relevant banner image, stop all previous animations
    $("#newsbanner .banner").stop();
    $("#newsbanner .banner:visible").fadeOut(800, function() {
    	// will be called when the element finishes fading out
    	$("#newsbanner .banner:eq("+index+")").css("opacity", "").fadeIn(1000);
    });
    // show the corresponding bottom text item, stop all previous animations
    $("div.text-bottom-item").stop();
    $("div.text-bottom-item:visible").fadeOut(800, function() {
        // will be called when the element finishes fading out
    	$("div.text-bottom-item:eq("+index+")").css("opacity", "").fadeIn(1000);
    });
    // select the first nav item on page load
  }).first().closest("li").addClass('selected');
  
  // show the first bottom text item on page load
  $("div.text-bottom-item").hide();
  $("div.text-bottom-item:eq(0)").show();
  
  $(".banner-nav .bleft").click(function(e) {
	  var prev = $("#newsbanner ol li.selected").prev();
	  if(!prev.length) {
		  var prev = $("#newsbanner ol li:last");
	  }
	  var link = prev.find('a');
	  link.click();
  });
  
  $(".banner-nav .bright").click(function(e) {
	  var next = $("#newsbanner ol li.selected").next();
	  if(!next.length) {
		  var next = $("#newsbanner ol li:first");
	  }
	  var link = next.find('a');
	  link.click();
  });
  
});
