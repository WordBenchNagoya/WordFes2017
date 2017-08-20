<?php
$sec_count = get_query_var('sec_count') ? get_query_var('sec_count') : '';

//var_dump($post);

$sec_id    = sprintf( "sec-%s", str_replace( 'home-', '', $post->post_name ) );
?>
<div id="<?php echo esc_attr( $sec_id ); ?>" class="section text-center">
	
	<div class="section-inner text-left clearfix">
		
		<?php the_content(); ?>
		
	</div><!-- .section-inner -->
	
</div><!-- .section -->