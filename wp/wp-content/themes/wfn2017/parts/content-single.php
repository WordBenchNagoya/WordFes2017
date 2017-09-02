				<article>
					
					<div class="article-header">
						
						<h1 class="article-title"><?php the_title(); ?></h1>
						<p class="article-date text-right"><?php the_time('Y年m月d日'); ?></p>
						
					</div>
					
					<div class="social text-right">
						
						<?php get_template_part( 'parts/social' ); ?>
						
					</div>
					
					<div class="article-content">
						
						<?php the_content(); ?>
						
					</div>
					
				</article>
				
