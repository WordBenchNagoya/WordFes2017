<?php
/**
 * サポーター モジュール
 *
 * - - -
 *
 * setup.php にてアクションフックで出力させてます
 *
 * =====================================================
 * @package    WordPress
 * @subpackage WordFes 2016
 * @author     Grow Group
 * @license    GPLv2 or later
 * @link       http://2016.wordfes.org
 * @copyright  2016 WordBench Nagoya
 * =====================================================
 */
?>

	<div class="section">
		<h2 class="section--title text-center entry-title">サポーター</h2>
		<div class="suporter-area">
		<?php
		if ( is_user_logged_in() ) {
			$post_status = array( 'draft','publish' );
		} else {
			$post_status = array( 'publish' );
		}
			
		// Get Sponsor Kind
		$suporter_temrs = get_terms( 'supporter_type', array( 'hide_empty' => false, 'orderby' => 'order', 'order' => 'ASC') );

		$count = 0;

		foreach ( $suporter_temrs as $key => $suporter_term ):
		
			/* サポーター */
		
			$args = array(
				'post_type'      => 'supporter',
				'post_status'    => $post_status,
				'posts_per_page' => -1,
				'orderby'        => 'order',
				'order'          => 'ASC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'supporter_type',
						'field'    => 'id',
						'terms'    => $suporter_term,
					),
				),
			);
			$the_query = new WP_Query( $args );
			
			$count ++;

			if ( $the_query->have_posts() ) : ?>
				<div class="suporter-contents">
					<div class="clearfix">
						<h3 class="suporter-<?php echo esc_html( sprintf( "%02d", $count ) ); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/images/title_suporter-' . sprintf( "%02d", $count ) ); ?>" alt="" />
						</h3>
						<div class="colmun-row clearfix">
						<?php
						while ( $the_query->have_posts() ):
							$the_query->the_post();
							$add_class = ( 'draft' == $post->post_status ) ? ' draft' : ''; ?>
							
							<?php //echo '<pre>'; var_dump( get_post_custom() ); echo '</pre>'; ?>
							
								<div class="colmun text-center<?php echo esc_attr( $add_class ); ?>">
									<a href="<?php echo esc_url( get_field( 'pdc-supporter-url' ) ) ?>" target="_blank" title="<?php the_title(); ?>">
									<?php if ( $image = wp_get_attachment_url( get_field( 'pdc-suporter-banner' ) ) ): ?>
									<?php //var_dump($image); ?>
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title(); ?>" class="img-responsive">
									<?php else: ?>
										<p class="no-image"><?php the_title(); ?></p>
									<?php endif; ?>
									</a>
								</div>
						<?php
						endwhile; ?>
						</div>
					</div>
				</div>

			<?php
			else: ?>

			<?php
			endif;
			wp_reset_query();
			
		endforeach;
		?>

		<?php if ( is_user_logged_in() ) { ?>
			<p class="edit-link">
				<a href="<?php echo admin_url( '/post-new.php?post_type=supporter' ); ?>" class="btn btn-success"><i class="dashicons dashicons-admin-generic"></i> 新しいサポーターを追加</a>
			</p>
		<?php } ?>

		</div>
	</div><!-- .section -->
