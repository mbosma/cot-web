jQuery(document).ready(function() {
	var windowht = jQuery(window).height();
	var contentht = jQuery("#page-wrapper").outerHeight();
	
	if(contentht < windowht) {
		var newht = windowht - contentht;
		jQuery("#footer-wrapper").css("margin-top", newht);
	}
	else {
		jQuery("#footer-wrapper").css("margin-top", "0");
	}
}); 

jQuery(document).ready(function(){
    jQuery("#quickset-mobile_accordion_menu h3:first").trigger('click');
});