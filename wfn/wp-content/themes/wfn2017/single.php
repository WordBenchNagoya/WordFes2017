<?php
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
		<main id="main" class="site-main col-md-8 col-xs-12" role="main">
			
			<div class="section text-center">
				
				<div class="section-inner text-left clearfix">
					
				<?php
				//echo '<pre>POST STATUS : '; var_dump( $wp_query ); echo '</pre>';
				?>
					
				<?php while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'parts/content', 'single' ); ?>
				
					<div class="page-navi clearfix">
						
						<div class="prev col-xs-6">
							<?php previous_post_link('%link'); ?>
						</div>
						<div class="next col-xs-6">
							<?php next_post_link('%link'); ?>
						</div>
						
					</div>
					
				<?php endwhile; // End of the loop. ?>

				</div><!-- .section-inner -->
				
			</div><!-- .section -->

		</main><!-- #main -->
		
		<?php get_sidebar(); ?>
		
	</div><!-- #primary -->
	
	<div id="secondary" class="content-area clearfix">
		
		<?php
		//if ( ! is_page('supporter') ) {
			get_template_part( 'parts/content', 'supporter' );
		//}
		?>
		
	</div><!-- #secondary -->
	
<?php get_footer(); ?>
