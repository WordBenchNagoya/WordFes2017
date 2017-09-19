<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>

<div class="bxslider-field">
	<label for="bxslider_get_shortcode"><?php _e('Your Shortcode:', 'bxsliderwp'); ?> </label>
	<input onfocus="bxslider_select(this)" readonly="true" id="bxslider_get_shortcode" type="text" class="ltr widefat" name="" value="<?php echo esc_attr($shortcode); ?>" />
	<span class="note"><?php _e('Copy and paste this shortcode into your Post, Page or Custom Post editor.', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>
<div class="bxslider-field last">
	<label for="bxslider_get_code"><?php _e('Your PHP Code:', 'bxsliderwp'); ?> </label>
	<input onfocus="bxslider_select(this)" readonly="true" id="bxslider_get_code" type="text" class="ltr widefat" name="" value="<?php echo esc_attr($template_code); ?>" />
	<span class="note"><?php _e('Copy and paste this code when you need to display the slider in template files (header.php, front-page.php, etc.).', 'bxsliderwp'); ?></span>
	<div class="clear"></div>
</div>