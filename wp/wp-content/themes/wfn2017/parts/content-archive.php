				<?php
				$dummy   = get_template_directory_uri() . '/images/common/no-image.png';
				$thumb   = pdc_get_post_thumbnail( get_the_ID(), $dummy );
				$excerpt = pdc_get_excerpt( get_the_content(), 67 );
				?>
				
				<article class="section-inner text-left clearfix">
					
					<div class="image-box col-xs-12 col-sm-3">
						
						<img src="<?php echo esc_url( $thumb[0] ); ?>" alt="サムネール：<?php the_title(); ?>">
						
					</div>
					
					<div class="text-box col-xs-12 col-sm-9">
						
						<h3 class="post-title clearfix">
							<span class="date"><?php the_time('Y.n.j'); ?></span>
							<span class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
						</h3>
						
						<p>
							<?php echo esc_html( $excerpt ); ?>
							<span>… <a href="<?php the_permalink(); ?>">続きを読む</a></span>
						</p>
						
					</div>
					
				</article><!-- .section-inner -->
