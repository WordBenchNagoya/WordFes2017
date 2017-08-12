<?php
/**
 * セッション詳細ページ テンプレート
 * =====================================================
 * @package    Wordfes2014
 * @author     WordBench Nagoya
 * @license    GPL v2 or later
 * @link       http://2014.wordfes.org
 * @copyright  2014 WordBench Nagoya
 * =====================================================
 */

$facebook     = get_field( 'session_facebook' );
$twitter      = get_field( 'session_twitter' );
$website      = get_field( 'session_website' );
$contents     = get_field( 'session_contents' );
$speaker_name = get_field( 'session_speaker_name' );
$belong_link  = get_field( 'session_speaker_belong_link' );
$slide_data   = get_field( 'session_slide' );
?>

	<div class="section clearfix">
		
		<div class="section-inner">
		
			<div class="clearfix">
				<div class="col-sm-7 col-xs-12 text-left">
					<p class="content">
						<?php echo wp_kses_post( pdc_get_ret2br_text( $contents ) ); ?>
					</p>
				<?php
				if ( $slide_data ):
				?>
					<p class="slide">
						<a href="<?php echo esc_url( $slide_data );?>" target="_blank">
						<img src="<?php echo get_template_directory_uri() ?>/images/common/list-mark-gr.png" alt=""> スライドはこちら
						</a>
					</p>
				<?php
				endif;
				?>
				</div>
				<div class="col-sm-5 col-xs-12">
					<h2 class="sub-title04">こんな方にオススメ</h2>
					<?php
					if ( get_field( 'session_recommended_person' ) ) : ?>
						<ul class="recommended">
						<?php while( has_sub_field( 'session_recommended_person' ) ) : ?>
							<li><?php the_sub_field( 'session_recommended_person_text' ); ?></li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<table class="table table-bordered">
				
						<!--
						<tr>
							<th>対象者</th>
							<td>
						<?php
						//if ( $target_terms = get_the_terms( $session->ID, 'target' ) ):
						//foreach ( $target_terms as $key => $target ) { ?>
						<?php //echo esc_html( $target->name );?>　
						<?php
						//}
						//endif; ?>
							</td>
						</tr>
						-->
				
						<tr>
							<th>時間</th>
							<td>
							<?php
							$timezone   = array_shift( get_the_terms( $post->ID, 'timezone' ) );
							$tz_id      = $timezone->term_id;
							
							//var_dump( $tz_id )
							
							$start_time = get_field( 'pdc-timezone-start', 'timezone_' . $tz_id );
							$end_time   = get_field( 'pdc-timezone-end', 'timezone_' . $tz_id );
							
							echo esc_html( $start_time . ' 〜 ' . $end_time );
							?>
							</td>
						</tr>
						<tr>
							<th>教室</th>
							<td>
							<?php
							$classroom  = array_shift( get_the_terms( $post->ID, 'classroom' ) );
							$cr_title   = $classroom->name;
							
							echo esc_html( $cr_title );
							?>
							</td>
						</tr>
						<tr>
							<th>人数</th>
							<td><?php
							if ( get_field( 'session_persons' ) ) {
							
								echo get_field( 'session_persons' );
								
							} else {
								
								if ( $classroom ) {
								
									//var_dump( $classroom->term_id );
								
									echo get_field( 'classroom_persons', 'classroom_' . $classroom->term_id );
									
								}
								
							}
							?></td>
						</tr>
					</table>
				
					<?php
					// その他
					if ( get_field( 'session_other' ) ) : ?>
					<p>
						<?php the_field( 'session_other' ); ?>
					</p>
					<?php endif; ?>
					
				</div>
				
			</div>
		
		<?php if ( $speaker_name && get_field( 'session_description' ) ) : ?>
		<div class="speaker-block">
			<h2 class="speaker-title">
<!-- 				スピーカー紹介 -->
				スピーカー（進行役）紹介
			</h2>
			<div class="speaker-contents clearfix">
				<div class="speaker-image col-sm-3 col-xs-12 text-left">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'full', array( 'class' => 'thumbnail img-responsive','style="margin-top: 20px"' ) );
					} else{ ?>
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/subpage/no_speaker_image.png" alt="写真なし">
					<?php
					} ?>
				</div>
				<div class="col-sm-9 col-xs-12 text-left">
					<h4><?php echo esc_html( $speaker_name )  ?></h4>
					<div class="social-icon clearfix">
						<?php
						if ( $facebook ) : ?>
							<a href="<?php echo esc_url( $facebook ) ?>" target="_blank" class="facebook-icon">Facebook</a>
						<?php
						endif;
						if ( $twitter ) : ?>
							<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" class="twitter-icon">Twitter</a>
						<?php
						endif;
						if ( $website ) : ?>
							<a href="<?php echo esc_url( $website ); ?>" target="_blank" class="website-icon">Website or Blog</a>
						<?php
						endif; ?>
					</div><!-- .social-icon -->
					
					<div class="belong">
					所属 : <?php if ( $belong_link ) { ?><a target="_blank" href="<?php echo $belong_link; ?>"><?php }  the_field( 'session_speaker_belong' ); if ( $belong_link ) { ?></a><?php } ?>
					</div><!-- .belong -->
					
					<div class="profile">
					<?php the_field( 'session_description' ) ?>
					</div><!-- .profile -->
				</div>
			</div>
			</div>
			<?php endif; ?>
			<?php
			if ( have_rows( 'session_server' ) ) : ?>
			
			
			<?php
				while( have_rows( 'session_server' ) ) : the_row();
					$server_name                 = get_sub_field( 'session_server_name' );
					$session_server_belong       = get_sub_field( 'session_server_belong' );
					$session_server_belong_link  = get_sub_field( 'session_speaker_belong_link' );
					$session_server_profile      = get_sub_field( 'session_server_profile' );
					$session_server_facebook     = get_sub_field( 'session_server_facebook' );
					$session_server_twitter      = get_sub_field( 'session_server_twitter' );
					$session_server_website      = get_sub_field( 'session_server_website' );
					$session_server_image        = get_sub_field( 'session_server_image' );
			?>
			
			<div class="speaker-block">
				<h2 class="speaker-title">
					<!--	進行役紹介 -->
					スピーカー（進行役）紹介
				</h2>
				<div class="speaker-contents clearfix">
					<div class="speaker-image col-sm-3 col-xs-12 text-left">
						<?php echo wp_get_attachment_image( $session_server_image, 'full', false, array( 'class' => 'thumbnail img-responsive','style="margin-top: 20px"' ) ); ?>
					</div>
					<div class="col-sm-9 col-xs-12 text-left">
						<h4><?php echo esc_html( $server_name ); ?></h4>
						<div class="social-icon text-center">
							<?php
							if ( $session_server_facebook ) : ?>
								<a href="<?php echo esc_url( $session_server_facebook ) ?>" target="_blank" class="facebook-icon">Facebook</a>
							<?php
							endif;
							if ( $session_server_twitter ) : ?>
								<a href="<?php echo esc_url( $session_server_twitter ); ?>" target="_blank" class="twitter-icon">Twitter</a>
							<?php
							endif;
							if ( $session_server_website ) : ?>
								<a href="<?php echo esc_url( $session_server_website ); ?>" target="_blank" class="website-icon">Website or Blog</a>
							<?php
							endif; ?>
						</div><!-- social-icon -->
						
						<div class="belong text-left">
						所属 : <?php if ( $session_server_belong_link ) { ?><a target="_blank" href="<?php echo $session_server_belong_link; ?>"><?php }; echo $session_server_belong; if ( $session_server_belong_link ) { ?></a><?php } ?>
						</div><!-- .belong -->
						
						<div class="profile text-left">
						<?php echo $session_server_profile; ?>
						</div><!-- .profile -->
					</div>
				</div>
			</div>
			
			<?php
				endwhile;
			endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wordfes2014' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .section-inner -->
		
	</div><!-- .section -->

	<?php //the_content(); ?>

<?php if ( is_user_logged_in() ) { ?>
	<footer class="entry-footer">
		<?php edit_post_link( __( '編集', 'wordfes2016' ), '<span class="edit-link btn btn-default">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
<?php
} ?>
