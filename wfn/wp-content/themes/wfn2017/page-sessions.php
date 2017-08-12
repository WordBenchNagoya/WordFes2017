<?php
/*
Template Name: セッション
*/

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordFes Nagoya 2016
 */

get_header(); ?>

	<div id="primary" class="content-area clearfix">
		
		<main id="main" class="site-main col-sm-12 col-xs-12" role="main">
			
			<?php
			$page_title = get_post_meta( get_the_ID(), 'pdc-page-title', true ) ? get_post_meta( get_the_ID(), 'pdc-page-title', true ) : get_the_title();
			?>
			
			<h1 class="page-title"><?php echo $page_title; ?></h1>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/time-table' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
		
	</div><!-- #primary -->
	
	<div id="secondary" class="content-area clearfix">
		
		<?php
		//if ( ! is_page('supporter') ) {
			get_template_part( 'parts/content', 'supporter' );
		//}
		?>
		
	</div><!-- #secondary -->
	
<?php get_footer(); ?>
