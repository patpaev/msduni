var NEWSBANNER_SLIDER_TRANSITION_SPEED = 10000;
var newsbannerSliderTimer;

jQuery(document).ready(function($) {
    // Load megamenu
    $('#top-menu > ul.menu').megamenu({});
    
    // Initiate newsbanner timed slide
    // NB: This is not required for homebanner
    if ($('#newsbanner').length > 0) {
        slideNewsbanner();
    }
    
    // If the newsbanner is clicked at any time, stop the timer
    $('#newsbanner ol li a').click(function(event) {
        clearTimeout(newsbannerSliderTimer);
    });
    
    /*
     * Slides the newsbanner to the next item and sets up the next timed call
     */
    function slideNewsbanner() {
        newsbannerSliderTimer = setTimeout(function() {
            var selectedItem = $('#newsbanner ol li.selected');
            
            // Checks if the item is not last in the list and clicks on the next
            // item if so.  Otherwise, clicks on the first item in the list
            if (selectedItem.next().length > 0) {
                selectedItem.next().find('a').click();
            } else {
                $('#newsbanner ol li:first a').click();
            }
            
            slideNewsbanner();
        },
        NEWSBANNER_SLIDER_TRANSITION_SPEED
        );
    }
});