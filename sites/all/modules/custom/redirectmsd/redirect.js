$(document).ready(function() {

$("a.mobile-nav-btn").click(function() { 
	$("#block-block-15").animate({ height: "toggle", opacity: "toggle"}, 500);
});

$("a.mobile-nav-btn-white").click(function() { 
	$("#block-block-15").animate({ height: "toggle", opacity: "toggle"}, 500);
});


$(".accordion .fly").click(function() { 

if ($(this).hasClass("fly")) {
$(this).removeClass('fly');
$(this).addClass('mfly-open');
} else if ($(this).hasClass('mfly-open')) { 
$(this).removeClass('mfly-open');
$(this).addClass('fly');
}

$(this).parent().find('ul:first').animate({
						height: "toggle",
						opacity: "toggle"
					}, "400");
					
});

$(".accordion .sfly").click(function() { 

if ($(this).hasClass("sfly")) {
$(this).removeClass('sfly');
$(this).addClass('msfly-open');
} else if ($(this).hasClass('msfly-open')) { 
$(this).removeClass('msfly-open');
$(this).addClass('sfly');
}

$(this).parent().find('ul:first').animate({
						height: "toggle",
						opacity: "toggle"
					}, "400")
});

})(jQuery);

 