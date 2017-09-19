<?php if(!defined('ABSPATH')) die('Direct access denied.'); ?>

<ul class="bxslider" <?php echo $data_attributes; ?>>
    <?php foreach($slides  as $slide): ?>
        <?php if($slide['type'] == 'image'): ?>
        <li>
            <?php if ($slide['enable_link']=='true'): ?><a target="<?php echo esc_attr($slide['link_target']); ?>" href="<?php echo esc_url( $slide['link'] ); ?>"><?php endif; ?>
            <img src="<?php echo esc_url( $slide['image_url'] ); ?>" title="<?php echo esc_attr( $slide['caption'] ); ?>" />
            <?php if ($slide['enable_link']=='true'): ?></a><?php endif; ?>
        </li>
        <?php else: ?>
        <li><?php echo $slide['custom']; ?></li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>