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

	<div class="section supporter-section">
		<div class="section-inner">
			<h2 class="section-title text-center entry-title">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/supporter/title-supporter.png' ); ?>" alt="SUPPORTER" />
			</h2>
			<div class="suporter-area">
			<?php
			if ( is_user_logged_in() ) {
				$post_status = array( 'draft','publish' );
			} else {
				$post_status = array( 'publish' );
			}
				
			$supporter_opts = get_terms( 'supporter_option', array( 'hide_empty' => false, 'orderby' => 'order', 'order' => 'ASC') );
		
			foreach ( $supporter_opts as $key => $supporter_term ):
			
				/* サポーター */
			
				$args = array(
					'post_type'      => 'supporter',
					'post_status'    => $post_status,
					'posts_per_page' => -1,
					'orderby'        => 'order',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'supporter_option',
							'field'    => 'id',
							'terms'    => $supporter_term->term_id,
						),
					),
				);
				
				set_query_var( 'term_slug', $supporter_term->slug );
				set_query_var( 'args', $args );
				get_template_part( 'parts/loop', 'supporter' );
				
			endforeach;

			// Get Sponsor Kind
			$supporter_temrs = get_terms( 'supporter_type', array( 'hide_empty' => false, 'orderby' => 'order', 'order' => 'ASC') );
		
			foreach ( $supporter_temrs as $key => $supporter_term ):
			
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
							'terms'    => $supporter_term,
						),
					),
				);
				
				//echo '<!-- <pre>'; var_dump( $supporter_term ); echo '</pre> -->';
				
				set_query_var( 'term_slug', $supporter_term->slug );
				set_query_var( 'args', $args );
				get_template_part( 'parts/loop', 'supporter' );
				
			endforeach;
			?>
		
			<?php if ( is_user_logged_in() ) { ?>
				<p class="edit-link">
					<a href="<?php echo admin_url( '/post-new.php?post_type=supporter' ); ?>" class="btn btn-success"><i class="dashicons dashicons-admin-generic"></i> 新しいサポーターを追加</a>
				</p>
			<?php } ?>
		
			</div>
		</div><!-- .section-inner -->
	</div><!-- .section -->
