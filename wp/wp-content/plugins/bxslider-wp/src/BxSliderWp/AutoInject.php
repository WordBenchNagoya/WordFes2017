<?php
/**
 * Class that auto injects service locator object
 */
abstract class BxSliderWp_AutoInject {

    protected $plugin;

	public function inject( $plugin ){
        $this->plugin = $plugin;
    }
}