<?php
/*
Template Name: ランチアンケート
*/

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
		
		<main id="main" class="site-main col-sm-12 col-xs-12" role="main">
			
			<?php
			$page_title = get_post_meta( get_the_ID(), 'pdc-page-title', true ) ? get_post_meta( get_the_ID(), 'pdc-page-title', true ) : get_the_title();
			?>
			
			<h1 class="page-title"><?php echo $page_title; ?></h1>
			
			<?php
			$enquete = get_post( 1517 );
			?>
			
			<?php
			if ( 0 == count($_POST) ):
			?>
			<div class="detail">
				
				<?php the_field('wfn-enquete-detail', $enquete->ID ); ?>
				
			</div>
			
			<div class="enquete">
				
				<form action="<?php echo esc_url( home_url('/lunch-enquete/') ); ?>" method="POST">
				<?php
				$count = 1;
				while ( have_rows( 'wfn-enquete-items', $enquete->ID ) ): the_row();
				?>
				<div class="enquete-item">
					
					<h2 class="question"><?php the_sub_field('question'); ?></h2>
					
					<?php
					//echo '<pre style="text-align:left;">'; var_dump( get_sub_field('answers') ); echo '</pre>';
					$sub_count = 1;
					while( have_rows( 'answers', $enquete->ID ) ): the_row();
					
						//$fields = get_sub_field_object('result');
						$field_name  = 'enquete-' . ( $count - 1 );
						$field_value = 'wfn-enquete-items_' . ( $count - 1 ) . '_answers_' . ( $sub_count - 1 ) . '_result';
						
						//echo '<pre style="text-align:left;">'; var_dump( $fields ); echo '</pre>';
					?>
						<div class="form-check form-check">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="<?php echo esc_attr( $field_name); ?>" value="<?php echo esc_attr( $field_value); ?>" data-required-error="選択してください。">
								<?php the_sub_field('answer'); ?>
							</label>
						</div>
					
					<?php
						$sub_count++;
					endwhile;
					?>

					
				</div>
				<?php
					$count++;
				endwhile;
				?>
			
				<div class="submit">
					
					<input type="submit" class="btn" value="投票する" />
					
				</div>
				
				</form>
			
			</div><!-- .enquete -->
			<?php
			else:
			?>
			<div class="enquete-result">
				
				<?php
				//echo '<pre style="text-align:left;">'; var_dump( $_POST ); echo '</pre>';
				$post_id = 1517;
				$error   = false;
				
				foreach( $_POST as $field_name ) {
					
					$before = get_post_meta( $post_id, $field_name, true );
					
					//echo $field_name . ' before : ' . $before . '<br>';
					
					$after  = ( ++ $before );
					
					//echo $field_name . ' after  : ' . $after  . '<br>';
					
					if ( true === update_post_meta( $post_id, $field_name, $after ) ) {
					
						$result = get_post_meta( $post_id, $field_name, true );
						
						//echo $field_name . ' result : ' . $result . '<br><br>';
					
					} else {
						
						$erro = true;
						
					}
					
				}
				
				if ( ! $error ):
				?>
				<p class="success">ご投票ありがとうございました。</p>
				<?php
				else:
				?>
				<p class="failed">投票に失敗しました。時間をおいて再度、ご投票ください。</p>
				<?php
				endif;
				?>
				
			</div>
			<?php
			endif;
			?>

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
