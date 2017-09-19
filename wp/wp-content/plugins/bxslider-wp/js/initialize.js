jQuery(document).ready(function(){
    
    jQuery('.bxslider').each(function(){
        jQuery(this).bxSlider({
            mode: jQuery(this).data('bxslider-mode'),
            speed: jQuery(this).data('bxslider-speed'),
            slideMargin: jQuery(this).data('bxslider-slide-margin'),
            startSlide: jQuery(this).data('bxslider-start-slide'),
            randomStart: jQuery(this).data('bxslider-random-start'),
            slideSelector: jQuery(this).data('bxslider-slide-selector'),
            infiniteLoop: jQuery(this).data('bxslider-infinite-loop'),
            hideControlOnEnd: jQuery(this).data('bxslider-hide-control-on-end'),
            captions: jQuery(this).data('bxslider-captions'),
            ticker: jQuery(this).data('bxslider-ticker'),
            tickerHover: jQuery(this).data('bxslider-ticker-hover'),
            adaptiveHeight: jQuery(this).data('bxslider-adaptive-height'),
            adaptiveHeightSpeed: jQuery(this).data('bxslider-adaptive-height-speed'),
            video: jQuery(this).data('bxslider-video'),
            responsive: jQuery(this).data('bxslider-responsive'),
            useCSS: jQuery(this).data('bxslider-use-css'),
            easing: jQuery(this).data('bxslider-easing'),
            preloadImages: jQuery(this).data('bxslider-preload-images'),
            touchEnabled: jQuery(this).data('bxslider-touch-enabled'),
            swipeThreshold: jQuery(this).data('bxslider-swipe-threshold'),
            oneToOneTouch: jQuery(this).data('bxslider-one-to-one-touch'),
            preventDefaultSwipeX: jQuery(this).data('bxslider-prevent-default-swipe-x'),
            preventDefaultSwipeY: jQuery(this).data('bxslider-prevent-default-swipe-y')
        });
    });
});