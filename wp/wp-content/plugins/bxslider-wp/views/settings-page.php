<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>

<div class="wrap">
	<?php echo $screen_icon; ?>
	<h2><?php echo $page_title; ?></h2>
	
	<?php settings_errors();?>
	
	<?php echo $debug_info; ?>
	
	<form method="post" action="options.php">
		<?php
		echo $settings_fields;
		?>
		<table class="form-table">
			<tr>
				<th><label for="bxslider-settings-license_id"><?php _e('License:', 'bxsliderwp'); ?></label></th>
				<td>
					<input type="text" class="regular-text" id="bxslider-settings-license_id" name="<?php echo esc_attr( $option_name."[license_id]" ); ?>" value="<?php echo esc_attr( $settings_data['license_id'] ); ?>" />
				</td>
			</tr>
			<tr>
				<th><label for="bxslider-settings-license_key"><?php _e('Secret Key:', 'bxsliderwp'); ?></label></th>
				<td>
					<input type="text" class="regular-text" id="bxslider-settings-license_key" name="<?php echo esc_attr( $option_name."[license_key]" ); ?>" value="<?php echo esc_attr( $settings_data['license_key'] ); ?>" />

					<p><em><?php printf( __('Your license and secret key can be found in the %s page under each order.', 'bxsliderwp'), '<a target="_blank" href="https://www.codefleet.net/my-account/">My Account</a>'); ?></em></p>
				</td>
			</tr>
		</table>
		<br /><br />
		<input type="submit" name="submit" value="<?php _e('Save Options', 'bxsliderwp' ); ?>" class="button button-primary btn-submit">
		<input type="submit" name="reset" value="<?php _e('Restore Defaults', 'bxsliderwp' ); ?>" class="button btn-reset">
	</form>
	
</div>