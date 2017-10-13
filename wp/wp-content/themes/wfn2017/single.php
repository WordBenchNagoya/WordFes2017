<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordFes Nagoya 2017
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
					
										<div>
										<?php if ( is_singular('topics') ) : ?>
										<style>
										.btn:hover {<br />
										background: #e85524;<br />
 										text-decoration: none;<br />
 										color: white;<br />
										font-size: 3rem;<br />
										}<br />
										</style>

										<p class="text-center"><a class="btn btn-warning btn-lg" href="https://2017.wordfes.org/topics/"><i class="glyphicon glyphicon-flag"></i> 一覧へ</a></p>
										<?php else : ?>
										<style>
										.btn:hover {<br />
									    background: #e85524;<br />
										text-decoration: none;<br />
 										color: white;<br />
										font-size: 3rem;<br />
										}<br />
										</style>

										<p class="text-center"><a class="btn btn-warning btn-lg" href="https://2017.wordfes.org/blog/"><i class="glyphicon glyphicon-flag"></i> 一覧へ</a></p>
										<?php endif; ?>
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