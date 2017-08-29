<?php
/*
Template Name: スタッフブログ
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
			if( get_query_var('pagename') ) {
				
				$page = get_page_by_path( get_query_var('pagename') );
				$page_name = $page->page_title;
			
			}
			?>
		
			<h1 class="page-title"><?php echo esc_html( $page_name ); ?></h1>
			
			<div class="section">
			
			<?php
			if( have_posts() ):
				while ( have_posts() ) : the_post();
			?>

				<?php get_template_part( 'parts/content', 'archive' ); ?>

			<?php
				endwhile; // End of the loop.
			else:
			?>
				<p>まだ、スタッフブログはありません。</p>
			<?php
			endif;
			?>
			
			</div>
		
		</main><!-- #main -->
		
	</div><!-- #primary -->

<?php get_footer(); ?>