<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>
<div class="bxslider-cover"><p><?php echo sprintf(__('Available in %s version.','bxsliderwp'), '<a href="https://www.codefleet.net/bxslider-wp-pro/">premium</a>'); ?></p></div>
<div class="bxslider-field">
	<label for="bxslider_options_min_slides"><?php _e('Min Slides:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_min_slides" type="number" value="<?php echo esc_attr($options['min_slides']); ?>" />
	<span class="note"><?php _e('The minimum number of slides to be shown. Slides will be sized down if carousel becomes smaller than the original size.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_max_slides"><?php _e('Max Slides:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_max_slides" type="number" value="<?php echo esc_attr($options['max_slides']); ?>" />
	<span class="note"><?php _e('The maximum number of slides to be shown. Slides will be sized up if carousel becomes larger than the original size.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_move_slides"><?php _e('Move Slides:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_move_slides" type="number" value="<?php echo esc_attr($options['move_slides']); ?>" />
	<span class="note"><?php _e('The number of slides to move on transition. This value must be ">= minSlides", and "<= maxSlides". If zero (default), the number of fully-visible slides will be used.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field last">
	<label for="bxslider_options_slide_width"><?php _e('Slide Width:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_slide_width" type="number" value="<?php echo esc_attr($options['slide_width']); ?>" />
	<span class="note"><?php _e('The width of each slide. This setting is required for all horizontal carousels!', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
