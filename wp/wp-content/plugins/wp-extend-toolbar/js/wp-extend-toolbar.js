jQuery(document).ready(function(jQuery){
	
	var title = jQuery("title").text();
	var description = jQuery("meta[name=description]").attr("content");
	
	jQuery("#wp-admin-bar-extend-toolbar-title .ab-item").text("PAGE TITLE：" + title);
	jQuery("#wp-admin-bar-extend-toolbar-description .ab-item").text("DESCRIPTION：" + description);
	
	var total_height = 32;
	total_height += jQuery('#wp-admin-bar-extend-toolbar-title').height();
	total_height += jQuery('#wp-admin-bar-extend-toolbar-description').height();
	
	jQuery('html').css({
		'margin-top': total_height + 'px',
		'position': 'relative'
	});
	jQuery('* html body').css({
		'margin-top': total_height + 'px'
	});
	jQuery('#wpadminbar').css({
		'height': total_height + 'px'
	});
	jQuery('body.admin-bar .navbar-fixed-top').css({
		'cssText': 'top:' + total_height + 'px !important'
	});
});
