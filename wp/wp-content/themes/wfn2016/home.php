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

	<div id="primary" class="clearfix">
		
		<main id="main" class="site-main archive col-sm-8 col-xs-12" role="main">
			
			<h1 class="page-title">
				<span class="title">スタッフブログ</span>
			</h1>
			
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
		
			<div class="pagenavi"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>

		</main><!-- #main -->
		
		<?php get_sidebar(); ?>

	</div><!-- #primary -->

<?php get_footer(); ?>