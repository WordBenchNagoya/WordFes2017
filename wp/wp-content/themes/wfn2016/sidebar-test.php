		<aside class="sidebar col-sm-3 col-xs-12">
			
			<h2>開催概要</h2>
			
			<div class="banner-container">
				<?php dynamic_sidebar('banner-area'); ?>
			</div>
			
			<nav id="side-navigation">
				
				<div class="navigation-menu">
					<?php wp_nav_menu( array(
						'theme_location' => 'secondary',
						'menu_class'     => 'nav-menu',
						'menu_id'        => 'secondary-menu',
						'depth'          => 2,
					) );
					?>
				</div>
				
			</nav><!-- #site-navigation -->
			
		</aside>