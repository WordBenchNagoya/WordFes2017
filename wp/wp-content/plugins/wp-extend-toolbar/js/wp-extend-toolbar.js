jQuery(function($){
	
	var ua = navigator.userAgent;
	if($(window).width() < 748  ||  ua.indexOf('iPhone') > 0 || ua.indexOf('Android') > 0 ) {
		
		$('wp-admin-bar-extend-toolbar').css({'display':'none'});
	
	} else {

		var title = $("title").text();
		var description = $("meta[name=description]").attr("content");
		
		$("#wp-admin-bar-extend-toolbar-title .ab-item").text("PAGE TITLE：" + title);
		$("#wp-admin-bar-extend-toolbar-description .ab-item").text("DESCRIPTION：" + description);
		
		var total_height = 32;
		total_height += $('#wp-admin-bar-extend-toolbar-title').height();
		total_height += $('#wp-admin-bar-extend-toolbar-description').height();
		
		$('html').css({
			'margin-top': total_height + 'px'
		});
		$('* html body').css({
			'margin-top': total_height + 'px'
		});
		$('#wpadminbar').css({
			'height': total_height + 'px'
		});
		$('body.admin-bar .navbar-fixed-top').css({
			'cssText': 'top:' + total_height + 'px !important'
		});
		$('#wpadminbar').after(
		    '<img src="../img/btn-close.png" id="open-close-button" class="open" alt="">'
        );
        $('#open-close-button').css({
            'top': + ( total_height + 10 ) + 'px'
        });
		$('#open-close-button').on('click', function(){
    		if( $(this).hasClass('open') ) {
        		
        		$(this).removeClass('open');
        		$(this).addClass('close');
        		$(this).attr('src', '../img/btn-open.png');
        		$('#wpadminbar').css({
            		'cssText':'visibility: hidden;'
        		});
        		
    		} else {
        		
        		$(this).removeClass('close');
        		$(this).addClass('open');
        		$(this).attr('src', '../img/btn-close.png');
        		$('#wpadminbar').css({
            		'cssText':'visibility: visible; height:'+total_height+'px;'
        		});
        		
    		}
		});
	}
});
