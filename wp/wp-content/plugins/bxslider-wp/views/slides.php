<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>

<div class="bxslider-sortables" data-post-id="<?php echo $post_id; ?>">
	<?php echo $slides; ?>
</div><!-- end .bxslider-sortable -->

<input type="button" value="<?php _e('Add Slide', 'bxsliderwp'); ?>" class="bxslider-add-slide button-secondary" />
<input type="button" value="<?php _e('Add Images as Slides', 'bxsliderwp'); ?>" class="bxslider-multiple-slides button-secondary" />