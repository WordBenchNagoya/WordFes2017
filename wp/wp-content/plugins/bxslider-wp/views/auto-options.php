<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>
<div class="bxslider-cover"><p><?php echo sprintf(__('Available in %s version.','bxsliderwp'), '<a href="https://www.codefleet.net/bxslider-wp-pro/">premium</a>'); ?></p></div>
<div class="bxslider-field">
	<label for="bxslider_options_auto"><?php _e('Auto:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][auto]" value="false" />
	<input id="bxslider_options_auto" type="checkbox" value="true" <?php echo ($options['auto']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_auto" class="note"><?php _e('If checked, slides will automatically transition.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_pause"><?php _e('Pause:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_pause" type="number" value="<?php echo esc_attr($options['pause']); ?>" />
	<span class="note"><?php _e('The amount of time (in ms) between each auto transition.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_auto_start"><?php _e('Auto Start:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][auto_start]" value="false" />
	<input id="bxslider_options_auto_start" type="checkbox" value="true" <?php echo ($options['auto_start']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_auto_start" class="note"><?php _e('Auto show starts playing on load. If unchecked, slideshow will start when the "Start" control is clicked.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_auto_direction"><?php _e('Auto Direction:', 'bxsliderwp'); ?></label>
	<select id="bxslider_options_auto_direction">
	<?php foreach($auto_direction_options as $auto_direction_option): ?>
		<option <?php echo esc_attr($auto_direction_option['selected']); ?> value="<?php echo esc_attr($auto_direction_option['value']); ?>"><?php echo esc_attr($auto_direction_option['text']); ?></option>
	<?php endforeach; ?>
	</select>
	<span class="note"><?php _e('The direction of auto show slide transitions.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_auto_hover"><?php _e('Auto Hover:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][auto_hover]" value="false" />
	<input id="bxslider_options_auto_hover" type="checkbox" value="true" <?php echo ($options['auto_hover']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_auto_hover" class="note"><?php _e('Auto show will pause when mouse hovers over slider.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field last">
	<label for="bxslider_options_auto_delay"><?php _e('Auto Delay:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_auto_delay" type="number" value="<?php echo esc_attr($options['auto_delay']); ?>" />
	<span class="note"><?php _e('Time (in ms) auto show should wait before starting.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
