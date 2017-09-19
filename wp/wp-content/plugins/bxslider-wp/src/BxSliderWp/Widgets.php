<?php
/**
* Class for initializing widgets
*/
class BxSliderWp_Widgets implements BxSliderWp_IRunnable {

    /**
     * Initialize
     */
    public function run() {
        add_action('widgets_init', array( $this, 'register_widgets') );
    }
    
    /**
     * Register to WP
     */
    public function register_widgets(){
        register_widget('BxSliderWp_WidgetSlider');
    }
    
}