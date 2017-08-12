function mainImageAdjust() {
	
	var target = jQuery('.main-image');
	var parent = jQuery('.main-image').parent();
	
	if ( target.width() > parent.width() ) {
		
		var offset = ( parent.width() - target.width() ) / 2;
		
		target.css({'margin-left':offset});
		
	}
	
}
