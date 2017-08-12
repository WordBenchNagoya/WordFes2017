<?php
/*
Template Name: ホーム
*/

/**
 * The template for displaying front-page.
 * 
 * @package WordFes Nagoya 2016
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