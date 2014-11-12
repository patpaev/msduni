jQuery.fn.outerHTML = function(s) {
    return s
        ? this.before(s).remove()
        : jQuery("<p>").append(this.eq(0).clone()).html();
};

jQuery(document).ready(function($) {
	var navigation = $('div.navigation').clone();
	
	$(navigation).removeClass("navigation").addClass("mobile-menu");

	$(navigation).find("#cssmenu").addClass("grey demo-container").removeAttr("id");
	$(navigation).find("ul.menu").removeClass("menu").addClass("accordion").attr("id", "accordion-2");
	
	$("div#mobile-toggle").after(navigation.outerHTML());
	
	$('#accordion-2').dcAccordion({
		eventType: 'click',
		autoClose: false,
		saveState: false,
		disableLink: true,
		speed: 'fast',
		showCount: false
	});
});

// Toggle accordion menu script
jQuery(document).ready(function($) {
	$('#toggle-menu').click(function() {
		$('.mobile-menu').slideToggle('fast');
		return false;
	});
});
	
// Toggle accordion menu icon image switch
function changeImage(element) {
	var right = "/sites/all/themes/msd2014/images/mob-toggle.png";
	var left = "/sites/all/themes/msd2014/images/mob-toggle-x.png";
	element.src = element.bln ? right : left;
	element.bln = !element.bln;
}

jQuery(document).ready(function($){

	// Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	// Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
