<?php
/**
 * Class for saving and getting data  
 */
class BxSliderWp_Data extends BxSliderWp_AutoInject {
	
	/**
	 * Gets all sliders
	 *
	 * @return array The array of slider
	 */
	public static function get_sliders() {
		$args = array(
			'post_type' => 'bxslider',
			'order'=>'ASC',
			'numberposts' => -1
		);

		$slider_posts = get_posts($args); // Use get_posts to avoid filters
		$slider = '';
		
		if( !empty($slider_posts) ){
			return $slider_posts;
		} else {
			return false;
		}
	}
	
	/**
	 * Get a slider
	 *
	 * @param string $name Post slug of the slider custom post.
	 * @return array The array of slider
	 */
	public function get_slider_by_name( $name ) {
		// Get slider by id
		$args = array(
			'post_type' => 'bxslider',
			'order'=>'ASC',
			'numberposts' => 1,
			'name'=> $name
		);

		$slider_posts = get_posts( $args ); // Use get_posts to avoid filters

		if( !empty($slider_posts) and isset($slider_posts[0]) ){
			return $slider_posts[0];
		} else {
			return false;
		}
	}
	
	public function get_slider_render($slider_slug, $view) {
		
		$name = esc_attr($slider_slug);// Slideshow slug or ID

		$output = '';
		
		if( $slider = $this->get_slider_by_name( $name ) ){

			$slides = $this->get_slides( $slider->ID );
			$options = $this->get_options( $slider->ID );
			
			$vars = array();
			$vars['slides'] = $slides;
			$vars['options'] = $options;
			$vars['slider_id'] = $slider->ID;
			
			foreach($vars['slides'] as $i=>$slide){
				$vars['slides'][$i] = wp_parse_args($slide, $this->get_slide_defaults()); //Apply defaults in case some keys are missing
				$image_url = wp_get_attachment_image_src( $slide['id'], 'full' );
				$image_url = (is_array($image_url)) ? $image_url[0] : '';
				$vars['slides'][$i]['image_url'] = $image_url;
			}
			
			$output = $view->get_render('slider.php', $vars);
			
		} else {
			
			$output = sprintf(__('[Slider "%s" not found]', $this->plugin['textdomain']), $name);
			
		}
		
		return $output;
	}
	
	/**
	 * Gets the slider settings. Defaults and filters are applied.
	 *
	 * @param int $slider_id Post ID of the slider custom post.
	 * @return array The array of slider settings
	 */
	public function get_saved_data( $slider_id ) {
		$meta = get_post_custom($slider_id);
		$slider_settings = array();
		if(isset($meta['_bxslider'][0]) and !empty($meta['_bxslider'][0])){
			$slider_settings = maybe_unserialize($meta['_bxslider'][0]);
		}
		return $slider_settings;
	}
	
	/**
	 * Gets the number of slides in a slider
	 *
	 * @param int Slider id
	 * @return int Total slides
	 */
	public function get_slides_count($slider_id){
		$slides = $this->get_slides( $slider_id );
		if(!empty($slides)){
			return count( $slides );
		}
		return 0;
	}
	
	/**
	 * Get slides
	 *
	 * @param int Slider id
	 * @return array Slide data
	 */
	public function get_slides( $slider_id ){
		$slides = array();
		$saved_data = $this->get_saved_data( $slider_id );
		if(isset( $saved_data['slides'] ) and !empty( $saved_data['slides'] )){
			$slides = $saved_data['slides'];
		}
		return $slides;
	}
	
	/**
	 * Get slide defaults  
	 */
	public function get_slide_defaults(){
		return array(
			'type' => 'image',
			'id' => '',
			'enable_link' => 'false',
			'link' => '',
			'link_target' => '_self',
			'caption' => '',
			'custom' => ''
		);
	}
	
	/**
	 * Get slider options
	 *
	 * @param int $slider_id - ID of slider to get options from
	 * @return array Slide options data
	 */
	public function get_options( $slider_id ){
		$options = array();
		$saved_data = $this->get_saved_data( $slider_id );
		if(isset( $saved_data['options'] ) and !empty( $saved_data['options'] )){
			$options = $saved_data['options'];
		}
		$options = wp_parse_args($options, $this->get_default_options() );
		return $options;
	}
	
	/**
	 * Format Options
	 *
	 * Turn options into html5 data attributes to be used by the slider
	 *
	 * @param int $slider_id - ID of slider to get options from
	 * @return string Slide options formatted as data attributes
	 */
	public function format_options($slider_id){
        
		$options = $this->get_options( $slider_id );
		$out = ' ';
		foreach($options as $name=>$option){
			$out .= 'data-bxslider-'.str_replace('_', '-', $name).'="'.$option.'"';
		}
		$out.=' ';
		return $out;
		
	}
		
	/**
	 * Get default options
	 *
	 * @return array Default slide options data
	 */
	public function get_default_options(){
		return array(
			'mode' => 'horizontal',
			'speed' => 500,
			'slide_margin' => 0,
			'start_slide' => 0,
			'random_start' => 'false',
			'slide_selector' => '',
			'infinite_loop' => 'true',
			'hide_control_on_end' => 'false',
			'captions' => 'true',
			'ticker' => 'false',
			'ticker_hover' => 'false',
			'adaptive_height' => 'false',
			'adaptive_height_speed' => 500,
			'video' => 'false',
			'responsive' => 'true',
			'use_css' => 'true',
			'easing' => 'null',
			'preload_images' => 'visible',
			'touch_enabled' => 'true',
			'swipe_threshold' => 50,
			'one_to_one_touch' => 'true',
			'prevent_default_swipe_x' => 'true',
			'prevent_default_swipe_y' => 'false',
			
			'pager' => 'true',
			'pager_type' => 'full',
			'pager_short_separator' => ' / ',
			'pager_selector' => '',
			
			'controls' => 'true',
			'next_text' => 'Next',
			'prev_text' => 'Prev',
			'next_selector' => 'null',
			'prev_selector' => 'null',
			'auto_controls' => 'false',
			'start_text' => 'Start',
			'stop_text' => 'Stop',
			'auto_controls_combine' => 'false',
			'auto_controls_selector' => 'null',
			
			'auto' => 'false',
			'pause' => 4000,
			'auto_start' => 'true',
			'auto_direction' => 'next',
			'auto_hover' => 'false',
			'auto_delay' => 0,
			
			'min_slides' => 1,
			'max_slides' => 1,
			'move_slides' => 0,
			'slide_width' => 0,
		);
	}
	
	/**
	 * Get array of jquery easing options
	 *
	 * @return array Easing options
	 */
	public function get_jquery_easing_options(){
		return array(
			array(
				'text' => 'default',
				'value' => 'null'
			),
			array(
				'text' => 'swing',
				'value' => 'swing'
			),
			array(
				'text' => 'easeInQuad',
				'value' => 'easeInQuad'
			),
			array(
				'text' => 'easeOutQuad',
				'value' => 'easeOutQuad'
			),
			array(
				'text' => 'easeInOutQuad',
				'value' => 'easeInOutQuad'
			),
			array(
				'text' => 'easeInCubic',
				'value' => 'easeInCubic'
			),
			array(
				'text' => 'easeOutCubic',
				'value' => 'easeOutCubic'
			),
			array(
				'text' => 'easeInOutCubic',
				'value' => 'easeInOutCubic'
			),
			array(
				'text' => 'easeInQuart',
				'value' => 'easeInQuart'
			),
			array(
				'text' => 'easeOutQuart',
				'value' => 'easeOutQuart'
			),
			array(
				'text' => 'easeInOutQuart',
				'value' => 'easeInOutQuart'
			),
			array(
				'text' => 'easeInQuint',
				'value' => 'easeInQuint'
			),
			array(
				'text' => 'easeOutQuint',
				'value' => 'easeOutQuint'
			),
			array(
				'text' => 'easeInOutQuint',
				'value' => 'easeInOutQuint'
			),
			array(
				'text' => 'easeInSine',
				'value' => 'easeInSine'
			),
			array(
				'text' => 'easeOutSine',
				'value' => 'easeOutSine'
			),
			array(
				'text' => 'easeInOutSine',
				'value' => 'easeInOutSine'
			),
			array(
				'text' => 'easeInExpo',
				'value' => 'easeInExpo'
			),
			array(
				'text' => 'easeOutExpo',
				'value' => 'easeOutExpo'
			),
			array(
				'text' => 'easeInOutExpo',
				'value' => 'easeInOutExpo'
			),
			array(
				'text' => 'easeInCirc',
				'value' => 'easeInCirc'
			),
			array(
				'text' => 'easeOutCirc',
				'value' => 'easeOutCirc'
			),
			array(
				'text' => 'easeInOutCirc',
				'value' => 'easeInOutCirc'
			),
			array(
				'text' => 'easeInElastic',
				'value' => 'easeInElastic'
			),
			array(
				'text' => 'easeOutElastic',
				'value' => 'easeOutElastic'
			),
			array(
				'text' => 'easeInOutElastic',
				'value' => 'easeInOutElastic'
			),
			array(
				'text' => 'easeInBack',
				'value' => 'easeInBack'
			),
			array(
				'text' => 'easeOutBack',
				'value' => 'easeOutBack'
			),
			array(
				'text' => 'easeInOutBack',
				'value' => 'easeInOutBack'
			),
			array(
				'text' => 'easeInBounce',
				'value' => 'easeInBounce'
			),
			array(
				'text' => 'easeOutBounce',
				'value' => 'easeOutBounce'
			),
			array(
				'text' => 'easeInOutBounce',
				'value' => 'easeInOutBounce'
			)
		);
	}
	
	/**
	 * Get array of CSS3 easing options
	 *
	 * @return array Easing options
	 */
	public function get_css_easing_options(){
		return array(
			array(
				'text' => 'default',
				'value' => 'null'
			),
			array(
				'text' => 'linear',
				'value' => 'linear'
			),
			array(
				'text' => 'ease',
				'value' => 'ease'
			),
			array(
				'text' => 'ease-in',
				'value' => 'ease-in'
			),
			array(
				'text' => 'ease-out',
				'value' => 'ease-out'
			),
			array(
				'text' => 'ease-in-out',
				'value' => 'ease-in-out'
			)
		);
	}
	
	/**
	 * Debug with a twist
	 *
	 * @echo variable
	 */
	public function debug($s){
		echo '<pre>'.print_r($s, 1).'</pre>';
	}
}
