		<div class="main-image">
			
			<h1 class="site-title">
				<img src="<?php echo get_template_directory_uri(); ?>/images/common/img-sitetitle.png" alt="WordPressの森に集おう WordFes Nagoya 2016">
			</h1>
			
			<p class="date">
				<img src="<?php echo get_template_directory_uri(); ?>/images/top/img-date.png" alt="2016.8.27(sat) 10:00-17:00 名古屋工業大学">
			</p>
			
			<a class="hidden-xs" href="http://2016.wordfes.org/topics/session-information-vol01/">
			<div id="signboard">
					&nbsp;
			</div>
			</a>
			
<!-- 			<div class="cover hidden-xs">&nbsp;</div> -->
			<div class="cover-upper hidden-xs">&nbsp;</div>
			<div class="cover-lower hidden-xs">&nbsp;</div>
			
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