		<div class="main-image">
			
			
			<h1 class="site-title">
				<img src="<?php echo get_template_directory_uri(); ?>/images/common/img-sitetitle.png" alt="WordPressの森に集おう WordFes Nagoya 2016">
			</h1>
			
			<p class="date">
				<img src="<?php echo get_template_directory_uri(); ?>/images/top/img-date.png" alt="2016.8.27(sat) 10:00-17:00 名古屋工業大学">
			</p>
			
			<div id="signboard">
				<ul class="bxslider clearfix">
				<?php
				$args = array(
					'post_type'      => 'slider',
					'posts_per_page' => -1,
				);
				$sliders   = new WP_Query( $args );
				while ( $sliders->have_posts() ):
					$sliders->the_post();
				/*
				$slide_ids  = array();
				foreach( $sliders->posts as $slider ) {
					
					$slide_ids[] = $slider->ID;
					
				}
				shuffle( $slide_ids );
				
				if ( 0 < count( $slide_ids ) ):
					$count_max = 5;
					$count     = 0;
					foreach ( $slide_ids as $slide ):
					
						if ( $count >= $count_max ) {
							break;
						}
				*/	
						$image = wp_get_attachment_image_src( get_field('wfn-slider-image', $slide), 'full' );
						$url   = get_field('wfn-slider-url', $slide);
				?>
					<li class="slide">
						<a href="<?php echo esc_url( $url ); ?>">
							<img class="slide-img" src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>">
						</a>
					</li>
				<?php
				/*
						$count++;
					endforeach;
				endif;
				*/
				endwhile;
				?>
				</ul>
			</div>
			
<!-- 			<div class="cover hidden-xs">&nbsp;</div> -->
			
			<?php
			if ( is_single() ):
				/* シングルページ用のソーシャルボタン */
				get_template_part( 'template-parts/social', 'single' );
			else:
				/* サイト用のソーシャルボタン */
				get_template_part( 'template-parts/social' );
			endif;
			?>
		</div><!-- .main-image -->
		
		<script type="text/javascript">
		jQuery(function($){
			
			$('.bxslider').bxSlider({
				mode: 'fade',
				speed: 300,
				pause: 6000,
				pager: false,
				controls: false,
				auto: true
			});
			
		});
		</script>