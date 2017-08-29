<?php
/**
 * The template for displaying all single posts.
 *
 * @package WordFes Nagoya 2017
 */

get_header(); ?>

	<div id="primary" class="content-area clearfix">
		
		<main id="main" class="site-main col-sm-8 col-xs-12 session" role="main">
			
			<?php
			$page_title = get_post_meta( get_the_ID(), 'pdc-page-title', true ) ? get_post_meta( get_the_ID(), 'pdc-page-title', true ) : get_the_title();
			?>
			
			<h1 class="page-title"><?php echo $page_title; ?></h1>
			
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php get_template_part( 'parts/content-session' ); ?>
			
			<?php endwhile; // End of the loop. ?>

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
