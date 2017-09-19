<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>
<div class="bxslider-cover"><p><?php echo sprintf(__('Available in %s version.','bxsliderwp'), '<a href="https://www.codefleet.net/bxslider-wp-pro/">premium</a>'); ?></p></div>
<div class="bxslider-field">
	<label for="bxslider_options_controls"><?php _e('Controls:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][controls]" value="false" />
	<input id="bxslider_options_controls" type="checkbox" value="true" <?php echo ($options['controls']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_controls" class="note"><?php _e('If checked, "Next" / "Prev" controls will be added.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_next_text"><?php _e('Next Text:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_next_text" type="text" value="<?php echo esc_attr($options['next_text']); ?>" />
	<span class="note"><?php _e('Text to be used for the "Next" control.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_prev_text"><?php _e('Prev Text:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_prev_text" type="text" value="<?php echo esc_attr($options['prev_text']); ?>" />
	<span class="note"><?php _e('Text to be used for the "Prev" control.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_next_selector"><?php _e('Next Selector:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_next_selector" type="text" value="<?php echo esc_attr($options['next_selector']); ?>" />
	<span class="note"><?php _e('Element used to populate the "Next" control.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_prev_selector"><?php _e('Prev Selector:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_prev_selector" type="text" value="<?php echo esc_attr($options['prev_selector']); ?>" />
	<span class="note"><?php _e('Element used to populate the "Prev" control.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_auto_controls"><?php _e('Auto Controls:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][auto_controls]" value="false" />
	<input id="bxslider_options_auto_controls" type="checkbox" value="true" <?php echo ($options['auto_controls']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_auto_controls" class="note"><?php _e('If checked, "Start" / "Stop" controls will be added.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_start_text"><?php _e('Start Text:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_start_text" type="text" value="<?php echo esc_attr($options['start_text']); ?>" />
	<span class="note"><?php _e('Text to be used for the "Start" control.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_stop_text"><?php _e('Stop Text:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_stop_text" type="text" value="<?php echo esc_attr($options['stop_text']); ?>" />
	<span class="note"><?php _e('Text to be used for the "Stop" control.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_auto_controls_combine"><?php _e('Auto Controls Combine:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][auto_controls_combine]" value="false" />
	<input id="bxslider_options_auto_controls_combine" type="checkbox" value="true" <?php echo ($options['auto_controls_combine']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_auto_controls_combine" class="note"><?php _e('When slideshow is playing only "Stop" control is displayed and vice-versa.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field last">
	<label for="bxslider_options_auto_controls_selector"><?php _e('Auto Controls Selector:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_auto_controls_selector" type="text" value="<?php echo esc_attr($options['auto_controls_selector']); ?>" />
	<span class="note"><?php _e('Element used to populate the auto controls.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
