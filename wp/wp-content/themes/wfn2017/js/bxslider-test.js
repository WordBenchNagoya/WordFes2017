jQuery(document).ready(function($){
$('.bxslider').bxSlider({
	slideWidth: 486,
	slideHeight: 323,
	minSlides: 2,
	mode: horizontal,
	infiniteLoop: true,
	speed: 1000,
	startSlide: 0,
	randomStart: true,
	slideMargin: 0,
	ticker: true,
	captions: true,
	pager: true,
`	controls: false,
	auto: true,
	moveSlides: 2,
	touchEnabled: true,
	oneToOneTouch: true,
	preventDefaultSwipeX: true
});
})(jQuery);

