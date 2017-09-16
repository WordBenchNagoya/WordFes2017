<?php
/*
Template Name: ホーム
*/

/**
 * The template for displaying front-page.
 * 
 * @package WordFes Nagoya 2017
 */

get_header(); ?>

	<div id="primary">
		
		<main id="main">
		<?php
		//　固定ページのスラッグが'home'の親ページと子ページを表示する
		$page_slug =  get_page_by_path( 'home' );
		
		if ( ! empty( $page_slug ) ) {
			
			$parent_ID = $page_slug->ID;

			if ( is_user_logged_in() ) {
				
				$post_status = 'draft,publish';
				
			} else {
				
				$post_status = 'publish';
				
			}
			
/*
			$wfn_wp_query = new WP_Query();
			$wfn_wp_pages = $wfn_wp_query->query( array(
				'post_type'   => 'page',
				'nopaging'    => 'true',
				'post_status' => $post_status,
			) );

			$page_children = get_page_children( $parent_ID, $wfn_wp_pages );
			
			if ( ! empty( $page_children ) ) {
				foreach ( $page_children as $children ) {
					$page_home[] = $children->ID;
				}
			}
*/
			
			$args = array(
				'child_of'    => $parent_ID,
				'sort_column' => 'menu_order', // 固定ページの順序でソート
				'sort_order'  => 'asc',
				'post_type'   => 'page',
				'post_status' => $post_status,
			);

<?php if (is_user_logged_in()) {
			<div id="signboard">
				<ul class="bxslider clearfix">
				<?php
				$args = array(
					'post_type'      => 'slider',
					'posts_per_page' => -1,
				);
				$sliders   = new WP_Query( $args );
				while ( $sliders->have_posts() ):
					$sliders->the_post();
				/*
				$slide_ids  = array();
				foreach( $sliders->posts as $slider ) {
					
					$slide_ids[] = $slider->ID;
					
				}
				shuffle( $slide_ids );
				
				if ( 0 < count( $slide_ids ) ):
					$count_max = 5;
					$count     = 0;
					foreach ( $slide_ids as $slide ):
					
						if ( $count >= $count_max ) {
							break;
						}
				*/	
						$image = wp_get_attachment_image_src( get_field('wfn-slider-image', $slide), 'full' );
						$url   = get_field('wfn-slider-url', $slide);
				?>
					<li class="slide">
						<a href="<?php echo esc_url( $url ); ?>">
							<img class="slide-img" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>">
						</a>
					</li>
				<?php
				/*
						$count++;
					endforeach;
				endif;
				*/
				endwhile;
				?>
				</ul>
			</div>
} else {
  // ログインしていない
}
?>
			$wfnposts = get_pages( $args );
			
			$sec_count = 1;

			foreach( $wfnposts as $post ) {
				
				setup_postdata( $post );
				
				//var_dump($post);
				
				set_query_var( 'sec_count', $sec_count );
				get_template_part( 'parts/content', 'home' );
				
				$sec_count++;
				
			}
		} ?>

		<?php get_template_part( 'parts/content', 'supporter' ); ?>
		
		</main><!-- #main -->
		
	</div><!-- #primary -->

	<div id="secondary" class="content-area clearfix">
		
		<?php //get_template_part( 'parts/content', 'supporter' ); ?>
		
	</div><!-- #secondary -->

<?php get_footer(); ?>