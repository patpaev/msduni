Drupal.msd2014 = {
    toggleProfile : function(obj) {
    	
    	if(jQuery(obj).val() != 5) {
        	return;
        }
        
        if(jQuery(obj).prop('checked')) {
        	jQuery('#user_user_form_group_staff_settings').show();
        	jQuery('#user_user_form_group_staff_profile').show();
        } else {
        	jQuery('#user_user_form_group_staff_settings').hide();
        	jQuery('#user_user_form_group_staff_profile').hide();
        }
     
    }
};

(function ($) {
	$(document).ready(function() {
	    Drupal.msd2014.toggleProfile(jQuery('div#edit-roles-change #edit-roles-change-5'));
	});
})(jQuery);