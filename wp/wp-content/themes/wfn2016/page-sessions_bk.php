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

	<div id="primary" class="content-area">
		<main id="main" class="site-main session" role="main">

			<?php
			$page_title = get_post_meta( get_the_ID(), 'pdc-page-title', true ) ? get_post_meta( get_the_ID(), 'pdc-page-title', true ) : get_the_title();
			?>
			
			<h1 class="page-title"><?php echo $page_title; ?></h1>

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'main-contents' ); ?>>
				<div class="container">
					<header class="entry-header">
						<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
			
						<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta clearfix">
							<?php //wordfes2015_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php endif; ?>
					</header><!-- .entry-header -->
			
					<div class="entry-content">
						<?php get_template_part( 'parts/time-table' ); ?>
						<?php //get_template_part( 'parts/content', 'session' ); ?>
					</div><!-- .entry-content -->
			
					<footer class="entry-footer">
						<?php //wordfes2015_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div><!-- .container -->
			</article><!-- #post-## -->

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					/*
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					*/
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
		
	</div><!-- #primary -->
	
<?php get_template_part( 'parts/content', 'supporter' ); ?>

<?php get_footer(); ?>
