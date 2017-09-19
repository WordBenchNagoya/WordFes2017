<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>

<input type="hidden" name="<?php echo $nonce_name; ?>" value="<?php echo $nonce; ?>" />

<div class="bxslider-field">
	<label for="bxslider_options_mode"><?php _e('Mode:', 'bxsliderwp'); ?></label>
	<select id="bxslider_options_mode" name="bxslider[options][mode]">
	<?php foreach($mode_options as $mode_option): ?>
		<option <?php echo esc_attr($mode_option['selected']); ?> value="<?php echo esc_attr($mode_option['value']); ?>"><?php echo esc_attr($mode_option['text']); ?></option>
	<?php endforeach; ?>
	</select>
	<span class="note"><?php _e('Type of transition between slides.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_speed"><?php _e('Speed:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_speed" type="number" name="bxslider[options][speed]" value="<?php echo esc_attr($options['speed']); ?>" />
	<br /><span class="note"><?php _e('Slide transition duration (in ms).', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>

<div class="bxslider-field">
	<label for="bxslider_options_random_start"><?php _e('Random Start:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][random_start]" value="false" />
	<input id="bxslider_options_random_start" type="checkbox" name="bxslider[options][random_start]" value="true" <?php echo ($options['random_start']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_random_start" class="note"><?php _e('Start slider on a random slide.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>

<div class="bxslider-field">
	<label for="bxslider_options_infinite_loop"><?php _e('Infinite Loop:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][infinite_loop]" value="false" />
	<input id="bxslider_options_infinite_loop" type="checkbox" name="bxslider[options][infinite_loop]" value="true" <?php echo ($options['infinite_loop']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_infinite_loop" class="note"><?php _e('If checked, clicking "Next" while on the last slide will transition to the first slide and vice-versa.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_hide_control_on_end"><?php _e('Hide Control On End:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][hide_control_on_end]" value="false" />
	<input id="bxslider_options_hide_control_on_end" type="checkbox" name="bxslider[options][hide_control_on_end]" value="true" <?php echo ($options['hide_control_on_end']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_hide_control_on_end" class="note"><?php _e('If checked, "Next" control will be hidden on last slide and vice-versa. Note: Only used when Infinite Loop is unchecked.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_captions"><?php _e('Captions:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][captions]" value="false" />
	<input id="bxslider_options_captions" type="checkbox" name="bxslider[options][captions]" value="true" <?php echo ($options['captions']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_captions" class="note"><?php _e('Include image captions.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_ticker"><?php _e('Ticker:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][ticker]" value="false" />
	<input id="bxslider_options_ticker" type="checkbox" name="bxslider[options][ticker]" value="true" <?php echo ($options['ticker']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_ticker" class="note"><?php _e('Use slider in ticker mode (similar to a news ticker).', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_ticker_hover"><?php _e('Ticker Hover:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][ticker_hover]" value="false" />
	<input id="bxslider_options_ticker_hover" type="checkbox" name="bxslider[options][ticker_hover]" value="true" <?php echo ($options['ticker_hover']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_ticker_hover" class="note"><?php _e('Ticker will pause when mouse hovers over slider. Note: this functionality does NOT work if using CSS transitions!', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_adaptive_height"><?php _e('Adaptive Height:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][adaptive_height]" value="false" />
	<input id="bxslider_options_adaptive_height" type="checkbox" name="bxslider[options][adaptive_height]" value="true" <?php echo ($options['adaptive_height']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_adaptive_height" class="note"><?php _e('Dynamically adjust slider height based on each slide\'s height.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_adaptive_height_speed"><?php _e('Adaptive Height Speed:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_adaptive_height_speed" type="number" name="bxslider[options][adaptive_height_speed]" value="<?php echo $options['adaptive_height_speed']; ?>" />
	<span class="note"><?php _e('Slide height transition duration (in ms). Note: only used if Adaptive Height is checked.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_video"><?php _e('Video:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][video]" value="false" />
	<input id="bxslider_options_video" type="checkbox" name="bxslider[options][video]" value="true" <?php echo ($options['video']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_video" class="note"><?php _e('Check this if any slides contain a video.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_responsive"><?php _e('Responsive:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][responsive]" value="false" />
	<input id="bxslider_options_responsive" type="checkbox" name="bxslider[options][responsive]" value="true" <?php echo ($options['responsive']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_responsive" class="note"><?php _e('Enable or disable auto resize of the slider. Useful if you need to use fixed width sliders.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_use_css"><?php _e('Use CSS:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][use_css]" value="false" />
	<input id="bxslider_options_use_css" type="checkbox" name="bxslider[options][use_css]" value="true" <?php echo ($options['use_css']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_use_css" class="note"><?php _e('If checked, CSS transitions will be used for horizontal and vertical slide animations (this uses native hardware acceleration). If unchecked, jQuery animate() will be used.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_easing"><?php _e('Easing:', 'bxsliderwp'); ?></label>
	<select id="bxslider_options_easing" name="bxslider[options][easing]">
	<?php echo $easing_options; ?>
	</select>
	<span class="note"><?php _e('The type of "easing" to use during transitions.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_preload_images"><?php _e('Preload Images:', 'bxsliderwp'); ?></label>
	<select id="bxslider_options_preload_images" name="bxslider[options][preload_images]">
	<?php foreach($preload_images_options as $preload_images_option): ?>
		<option <?php echo esc_attr($preload_images_option['selected']); ?> value="<?php echo esc_attr($preload_images_option['value']); ?>"><?php echo esc_attr($preload_images_option['text']); ?></option>
	<?php endforeach; ?>
	</select>
	<span class="note"><?php _e('If "all", preloads all images before starting the slider. If "visible", preloads only images in the initially visible slides before starting the slider (tip: use "visible" if all slides are identical dimensions).', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_touch_enabled"><?php _e('Touch Enabled:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][touch_enabled]" value="false" />
	<input id="bxslider_options_touch_enabled" type="checkbox" name="bxslider[options][touch_enabled]" value="true" <?php echo ($options['touch_enabled']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_touch_enabled" class="note"><?php _e('If checked, slider will allow touch swipe transitions.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_swipe_threshold"><?php _e('Swipe Threshold:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_swipe_threshold" type="number" name="bxslider[options][swipe_threshold]" value="<?php echo $options['swipe_threshold']; ?>" />
	<span class="note"><?php _e('Amount of pixels a touch swipe needs to exceed in order to execute a slide transition. Note: Only used if Touch Enabled is checked.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_one_to_one_touch"><?php _e('One To One Touch:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][one_to_one_touch]" value="false" />
	<input id="bxslider_options_one_to_one_touch" type="checkbox" name="bxslider[options][one_to_one_touch]" value="true" <?php echo ($options['one_to_one_touch']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_one_to_one_touch" class="note"><?php _e('If checked, non-fade slides follow the finger as it swipes.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_prevent_default_swipe_x"><?php _e('Prevent Default Swipe X:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][prevent_default_swipe_x]" value="false" />
	<input id="bxslider_options_prevent_default_swipe_x" type="checkbox" name="bxslider[options][prevent_default_swipe_x]" value="true" <?php echo ($options['prevent_default_swipe_x']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_prevent_default_swipe_x" class="note"><?php _e('If checked, touch screen will not move along the x-axis as the finger swipes.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_prevent_default_swipe_y"><?php _e('Prevent Default Swipe Y:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][prevent_default_swipe_y]" value="false" />
	<input id="bxslider_options_prevent_default_swipe_y" type="checkbox" name="bxslider[options][prevent_default_swipe_y]" value="true" <?php echo ($options['prevent_default_swipe_y']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_prevent_default_swipe_y" class="note"><?php _e('If checked, touch screen will not move along the y-axis as the finger swipes.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_slide_margin"><?php _e('Slide Margin:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_slide_margin" type="number" name="bxslider[options][slide_margin]" value="<?php echo esc_attr($options['slide_margin']); ?>" />
	<br /><span class="note"><?php _e('Margin between each slide.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field last">
	<label for="bxslider_options_slide_selector"><?php _e('Slide Selector:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_slide_selector" type="text" name="bxslider[options][slide_selector]" value="<?php echo $options['slide_selector']; ?>" />
	<span class="note"><?php _e('Element to use as slides (ex. \'div.slide\'). Note: by default, bxSlider will use all immediate children of the slider element.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field" style="display: none;">
	<label for="bxslider_options_start_slide"><?php _e('Start Slide:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_start_slide" type="number" name="bxslider[options][start_slide]" value="<?php echo esc_attr($options['start_slide']); ?>" />
	<br /><span class="note"><?php _e('Starting slide index (zero-based).', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>