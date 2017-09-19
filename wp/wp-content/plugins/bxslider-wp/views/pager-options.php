<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>
<div class="bxslider-cover"><p><?php echo sprintf(__('Available in %s version.','bxsliderwp'), '<a href="https://www.codefleet.net/bxslider-wp-pro/">premium</a>'); ?></p></div>
<div class="bxslider-field">
	<label for="bxslider_options_pager"><?php _e('Pager:', 'bxsliderwp'); ?> </label>
	<input type="hidden" name="bxslider[options][pager]" value="false" />
	<input id="bxslider_options_pager" type="checkbox" value="true" <?php echo ($options['pager']=='true') ? 'checked="checked"' : ''; ?> />
	<label for="bxslider_options_pager" class="note"><?php _e('If checked, a pager will be added.', 'bxsliderwp'); ?></label>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_pager_type"><?php _e('Pager Type:', 'bxsliderwp'); ?></label>
	<select id="bxslider_options_pager_type">
	<?php foreach($pager_type_options as $pager_type_option): ?>
		<option <?php echo esc_attr($pager_type_option['selected']); ?> value="<?php echo esc_attr($pager_type_option['value']); ?>"><?php echo esc_attr($pager_type_option['text']); ?></option>
	<?php endforeach; ?>
	</select>
	<span class="note"><?php _e('If "full", a pager link will be generated for each slide. If "short", a x / y pager will be used (ex. 1 / 5).', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field">
	<label for="bxslider_options_pager_short_separator"><?php _e('Pager Short Separator:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_pager_short_separator" type="text" value="<?php echo esc_attr($options['pager_short_separator']); ?>" />
	<span class="note"><?php _e('If "short", pager will use this value as the separating character.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field last">
	<label for="bxslider_options_pager_selector"><?php _e('Pager Selector:', 'bxsliderwp'); ?> </label>
	<input id="bxslider_options_pager_selector" type="text" value="<?php echo esc_attr($options['pager_selector']); ?>" />
	<span class="note"><?php _e('Element used to populate the pager. By default, the pager is appended to the bx-viewport. Note: Use jQuery selectors.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
