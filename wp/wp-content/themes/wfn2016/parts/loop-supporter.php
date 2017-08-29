				<?php
				$args      = get_query_var('args');
				$term_slug = get_query_var('term_slug');
					
				$the_query = new WP_Query( $args );
				
				if ( $the_query->have_posts() ) :
				
					//echo '<pre style="text-align: left;">'; var_dump($the_query->query['tax_query'][0]['taxonomy']); echo '</pre>';

					$number    = substr( $term_slug, -2 );
					$item_id   = $the_query->posts[0]->ID;
					$tax_type  = $the_query->query['tax_query'][0]['taxonomy'];
					
					//echo '<!-- <pre>'; var_dump( $tmp ); echo '</pre> -->';
					
					if ( 'supporter_option' == $tax_type ) {
						
						$add_name = 'opt' . $number;
						
					} else {
						
						$add_name = $number;
						
					}
					
				?>
					<div class="supporter-contents">
						<div class="clearfix">
							<h3 class="supporter-title supporter-<?php echo esc_html( $add_name ); ?> col-sm-3">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/images/supporter/title-sup-' . $add_name . '.png' ); ?>" alt="" />
							</h3>
							<?php if ( 'sup-type-02' == $term_slug ): ?>
							<div class="column-person colmun-row col-sm-9 clearfix text-left">
							<?php else: ?>
							<div class="column-row col-sm-9 clearfix">
							<?php endif; ?>
							<?php
							
							$count = 0;
							$anonym_count = 0;
							
							while ( $the_query->have_posts() ):
								$the_query->the_post();
								$count++;
								
								$add_class = ( 'draft' == $post->post_status ) ? ' draft' : '';
								$add_class .= ' sup-' . $add_name;
								$image     = wp_get_attachment_image_src( get_field( 'pdc-supporter-banner' ), 'full' );
								$disp_flag = get_post_meta( get_the_ID(), 'pdc-supporter-anonym', true );
								
								if ( 'sup-type-02' == $term_slug && true == $disp_flag ) {
									
									$anonym_count++;
									continue;
									
								}
		
								//echo '<!-- <pre>'; var_dump( $term ); echo '</pre> -->';
								
								//var_dump($image);
							?>
								
								<?php if ( 'sup-type-02' == $term_slug ): ?>
									<span class="person">
									<?php if ( 1 != $count ){ echo '、'; } ?>
										<a href="<?php echo esc_url( get_field( 'pdc-supporter-link' ) ) ?>" target="_blank" title="<?php the_title(); ?>">
											<?php the_title(); ?>
										</a>
										 様
									</span>
								<?php else: ?>
									<div class="column col-sm-6 text-center<?php echo esc_attr( $add_class ); ?>">
										<a href="<?php echo esc_url( get_field( 'pdc-supporter-link' ) ) ?>" target="_blank" title="<?php the_title(); ?>">
										<?php if ( $image ): ?>
										<?php //var_dump($image); ?>
											<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" class="img-responsive">
										<?php else: ?>
											<p class="no-image"><span class="title"><?php the_title(); ?></span></p>
										<?php endif; ?>
										</a>
									</div>
								<?php endif; ?>
							<?php
							endwhile; ?>
							<?php if ( 0 < $anonym_count ): ?>
								<p class="anonym">※この他、匿名希望の<?php echo mb_convert_kana( $anonym_count, 'N' ); ?>名の方より、ご支援いただいております。</p>
							<?php endif; ?>
							</div>
						</div>
					</div>
		
				<?php
				else:
				?>
		
				<?php
				endif;
				wp_reset_query();
				?>
