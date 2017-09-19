<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>

<div class="bxslider-slide">
	<div class="bxslider-header">
		<span class="bxslider-icon">
			<?php if ('custom'==$slide['type']) : ?>
			<i class="icon-font"></i>
			<?php elseif ('video'==$slide['type']) : ?>
			<i class="icon-film"></i>
			<?php else: ?>
			<i class="icon-picture"></i>
			<?php endif; ?>
		</span>
		<span class="bxslider-title">
			<?php echo $box_title; ?>
		</span>
		<span class="bxslider-controls">
			<span class="bxslider-drag" title="<?php _e('Drag', 'bxsliderwp'); ?>"><?php _e('Drag', 'bxsliderwp'); ?></span>
			<span class="bxslider-toggle" title="<?php _e('Toggle', 'bxsliderwp'); ?>"><?php _e('Toggle', 'bxsliderwp'); ?></span>
			<span class="bxslider-delete" title="<?php _e('Delete', 'bxsliderwp'); ?>"><?php _e('Delete', 'bxsliderwp'); ?></span>
		</span>
		<div class="clear"></div>
	</div>
	<div class="bxslider-body">
		<div class="bxslider-slide-type-bar">
			<select class="bxslider-slide-type-switcher" name="bxslider[slides][<?php echo $i; ?>][type]">
				<option value="image" <?php echo ('image'==$slide['type']) ? 'selected="selected"' : ''; ?>><?php _e('Image', 'bxsliderwp'); ?></option>
				<option value="custom" <?php echo ('custom'==$slide['type']) ? 'selected="selected"' : ''; ?>><?php _e('Custom', 'bxsliderwp'); ?></option>
			</select>	
		</div>
		<div class="clear"></div>
		<div class="bxslider-image">
			<div class="bxslider-image-preview">
				<div class="bxslider-image-thumb" <?php echo (empty($image_url)) ? 'style="display:none"' : '';?>>
					<?php if($image_url): ?>
					<img src="<?php echo esc_url($image_url); ?>" alt="thumb">
					<?php endif; ?>
				</div>
				<input class="bxslider-image-id" name="bxslider[slides][<?php echo $i; ?>][id]" type="hidden" value="<?php echo esc_attr($slide['id']); ?>" />
				<input class="button-secondary bxslider-media-gallery-show" type="button" value="<?php _e('Get Image', 'bxsliderwp'); ?>" />
			</div>
			<div class="bxslider-image-settings">
				<p class="expandable-group-title first"><?php _e('Slide Properties:', 'bxsliderwp'); ?></p>
				<div class="expandable-box">
					<div class="expandable-header first"><?php _e('Link', 'bxsliderwp'); ?></div>
					<div class="expandable-body">
						<div class="field">
							<label><?php _e('Enable Link:', 'bxsliderwp'); ?></label> <br>
							<input name="bxslider[slides][<?php echo $i; ?>][enable_link]" type="hidden" value="false" />
							<input name="bxslider[slides][<?php echo $i; ?>][enable_link]" type="checkbox" <?php echo ($slide['enable_link']=='true') ? 'checked="checked"' : ''; ?> value="true" />
						</div>
						<div class="field">
							<label><?php _e('Link URL:', 'bxsliderwp'); ?></label> <br>
							<input class="widefat" name="bxslider[slides][<?php echo $i; ?>][link]" type="text" value="<?php echo esc_url($slide['link']); ?>" />
						</div>
						<div class="field last">
							<label for=""><?php _e('Open Link in:', 'bxsliderwp'); ?></label> <br>
							<select id="" name="bxslider[slides][<?php echo $i; ?>][link_target]">
								<option <?php echo ('_self'==$slide['link_target']) ? 'selected="selected"' : ''; ?> value="_self"><?php _e('Same Window', 'bxsliderwp'); ?></option>
								<option <?php echo ('_blank'==$slide['link_target']) ? 'selected="selected"' : ''; ?> value="_blank"><?php _e('New Tab or Window', 'bxsliderwp'); ?></option>
							</select>
						</div>
					</div>
				</div>
				<div class="expandable-box last">
					<div class="expandable-header"><?php _e('Caption', 'bxsliderwp'); ?></div>
					<div class="expandable-body">
						<div class="field last">
							<textarea class="widefat bxslider-slide-meta-description" name="bxslider[slides][<?php echo $i; ?>][caption]"><?php echo esc_html($slide['caption']); ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="bxslider-custom">
			<div class="field last">
				<label for=""><?php _e('Custom HTML', 'bxsliderwp'); ?></label>
				<textarea class="widefat bxslider-custom-html" name="bxslider[slides][<?php echo $i; ?>][custom]"><?php echo esc_textarea($slide['custom']); ?></textarea>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>