<?php
/*
 * テンプレートフォルダを挿入
 */
function pdc_get_theme_folder() {
	
	return get_template_directory_uri();
	
}
add_shortcode( 'theme_folder', 'pdc_get_theme_folder' );


/*
 * テンプレートフォルダを挿入
 */
function pdc_get_home_url() {
	
	return home_url('/');
	
}
add_shortcode( 'home_url', 'pdc_get_home_url' );


/*
 * 記事リスト
 */
function pdc_article_list( $atts ) {
	
	extract(
		shortcode_atts(
			array(
				'post_type' => 'post',
				'style'     => 'li',
				'number'    => 5,
			),
			$atts
		)
	);
	
	if ( is_user_logged_in() ) {
		
		$status = array( 'publish', 'pending', 'draft', 'private' );
		
	} else {
		
		$status = array( 'publish' );
		
	}
	
	$post_type_name = get_post_type_object( $post_type )->labels->name;
	
	$args = array(
		'post_type'      => $post_type,
		'post_status'    => $status,
		'posts_per_page' => $number,
	);
	$lists = new WP_Query( $args );
	
	if ( $lists->have_posts() ):
	
		$result = "<ul>\n";
		
		while ( $lists->have_posts() ):
			$lists->the_post();
			
			$result .= "  <li>\n";
			$result .= "    <p class=\"date\">" . get_the_time( 'Y.m.d' ) . "</p>\n";
			$result .= "    <p class=\"title\">";
			$result .= "      <a href=\"" . get_the_permalink() . "\">" . get_the_title() . "</a>\n";
			$result .= "    </p>\n";
			$result .= "  </li>\n";
			
		endwhile;
		
		$result .= "</ul>";
		
	else:
		$result = "<ul><li>まだ、{$post_type_name}はありません。<br>しばらくお待ちください。</li></ul>\n";
	endif;
	
	return $result;
	
}
add_shortcode( 'article_list', 'pdc_article_list' );


/*
 * ツイッター
 */
function pdc_twitter( $atts ) {

	extract(
		shortcode_atts(
			array(
				'id' => 'wordfesnagoya',
			),
			$atts
		)
	);
	
	return "<a class=\"twitter-timeline\" data-lang=\"ja\" data-height=\"400\" data-theme=\"light\" href=\"https://twitter.com/" . esc_attr( $id ) . "\">Tweets by " . esc_attr( $id ) . "</a>";
	
}
add_shortcode( 'twitter', 'pdc_twitter' );


/*
 * 残数表示
 */
function pdc_get_remains( $atts ) {
	
	extract(
		shortcode_atts(
			array(
				'post_id' => '230',
			),
			$atts
		)
	);
	
	$adjust          = 0;
	
	$session_remains = $GLOBALS['camptix']->get_remaining_tickets( 230 );
	$session_sale    = intval( get_post_meta( 230, 'tix_coupon_quantity', true ) ) - $session_remains;
	$party_remains   = $GLOBALS['camptix']->get_remaining_tickets( 235 );
	$party_sale      = intval( get_post_meta( 235, 'tix_coupon_quantity', true ) ) - $party_remains;
	$stay_remains    = $GLOBALS['camptix']->get_remaining_tickets( 236 );
	$stay_sale       = intval( get_post_meta( 236, 'tix_coupon_quantity', true ) ) - $stay_remains;
	
	switch ( $post_id ) {
		
		case 230:
			// セッションのみ
			//$remains = $session_remains + $party_remains + $saty_remains;
			//$remains = $session_remains + $party_remains + $stay_remains + $adjust;
			$remains = $session_remains + $adjust;
			break;
		
		case 235:
			// 懇親会
			//$remains = $party_remains + $stay_remains - 3;
			//$remains = $party_remains + $stay_remains + $adjust;
			$remains = $party_remains + $adjust;
			break;
			
		case 236:
			// 宿泊
			$remains = $stay_remains + $adjust;
			break;
			
		default:
			break;
		
	}
	
	if ( 0 == $remains ) {
		
		$remains_text = '（ <span class="remains red">完売しました</span> ）';
		
	} elseif ( 10 > $remains ) {
		
		$remains_text = '（ あと <span class="remains red">' . $remains . '</span> 名 ）';
		
	} else {
		
		$remains_text = '（ あと <span class="remains green">' . $remains . '</span> 名 ）';
		
	}
	
	
	
	return wp_kses_post( $remains_text );
	
}
add_shortcode( 'remains', 'pdc_get_remains' );





