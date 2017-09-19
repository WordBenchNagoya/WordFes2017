<?php
/**
* Class for widget
*/
class BxSliderWp_WidgetSlider extends WP_Widget {
	
	/**
	* Register widget with WordPress.
	*/
	public function __construct() {
		parent::__construct(
			'bxslider-widget', // Base ID
			__( 'BxSlider Widget', 'bxsliderwp' ), // Name
			array( 'description' => __( 'Widget for displaying sliders.', 'bxsliderwp' ), ) // Args
		);
	}
	
	function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		
		if ( !empty($instance['title']) ) {
			$title = apply_filters('widget_title', $instance['title']);
			echo $before_title . $title . $after_title;
		}
		$slider = '';
		if ( !empty($instance['slider']) ) {
			$slider = $instance['slider'];
			echo do_shortcode('[bxslider id="'.$slider.'"]');
		}
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['slider'] = strip_tags($new_instance['slider']);
		
		return $instance;

	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'slider' => '' ) );

?>
		<p>
		<?php
		if($sliders = BxSliderWp_Data::get_sliders() ):
		?>
			<label for="<?php echo $this->get_field_id('slider'); ?>"><?php _e('Select a slider:', 'bxsliderwp'); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('slider'); ?>" name="<?php echo $this->get_field_name('slider'); ?>">
				<option value=""></option>
				<?php
				foreach($sliders as $slider): ?>
				<option value="<?php echo $slider->post_name; ?>" <?php echo $instance['slider'] == $slider->post_name ? 'selected="selected"': ''; ?>><?php echo $slider->post_title; ?></option>
				<?php
				endforeach;
				?>
			</select>
		<?php else: ?>
			<?php _e('No sliders found.', 'bxsliderwp'); ?>
		<?php endif; ?>
		</p>
<?php

	}

}

	

