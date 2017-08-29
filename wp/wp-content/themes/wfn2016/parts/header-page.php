		<div class="main-image">
			
			<div id="signboard">
				
				<h1 class="site-title">
					<img src="<?php echo get_template_directory_uri(); ?>/images/common/img-sitetitle.png" alt="WordPressの森に集おう WordFes Nagoya 2016">
				</h1>
				
				<h2 class="page-title">
					<?php echo esc_html( pdc_get_page_name() ); ?><br>
					<span><?php echo wp_kses_post( strtoupper( pdc_get_page_slug() ) ); ?></span>
				</h2>
			</div>
			
			<?php
			/*
			$post_type = $post->post_type ? $post->post_type : get_query_var('pagename');
			
			if ( 'blog' == $post_type ) {
				
				$post_type = 'post';
				
			}
			
			echo "<!-- header-page.php\n<pre>"; var_dump( get_post_type_object( $post_type ) ); echo '</pre> -->';

			$page_data = get_post_type_object( $post->post_type );
			*/
			?>
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