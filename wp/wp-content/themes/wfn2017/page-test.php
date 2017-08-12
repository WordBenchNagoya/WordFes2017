<?php get_header('test'); ?>
	
	<div id="primary" class="content-area clearfix">
		<main id="main" class="site-main col-md-9 col-xs-12" role="main">
			
			<?php
			$page_title = get_post_meta( get_the_ID(), 'pdc-page-title', true ) ? get_post_meta( get_the_ID(), 'pdc-page-title', true ) : get_the_title();
			
			do_shortcode('[remains post_id="230"]');
			?>
			
			<h1 class="page-title"><?php echo $page_title; ?></h1>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
		
		<?php get_sidebar('test'); ?>
		
	</div><!-- #primary -->
	
	<div id="secondary" class="content-area clearfix">
		
		<?php
		if ( ! is_page('supporter') ) {
			get_template_part( 'parts/content', 'supporter' );
		}
		?>
		
	</div><!-- #secondary -->
	
<?php get_footer(); ?>