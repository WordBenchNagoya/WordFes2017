<?php
/**
 * @package WordFes Nagoya 2016
 */

if ( ! function_exists( 'wordfes2016_is_mobile' ) ) :
function wordfes2016_is_mobile() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$_ret = true;

	if ( wp_is_mobile() ) {
		if ( preg_match( '/ipad/i', $ua ) ) {
			$_ret = false;
		} elseif ( preg_match( '/Android/i', $ua ) && !( preg_match( '/Mobile/i', $ua ) ) ) {
			$_ret = false;
		}
	} else {
		$_ret = false;
	}
	return $_ret;
}
endif;

if ( ! function_exists( 'wordfes2016_the_term' ) ) :
function wordfes2016_the_term( $post_id, $taxonomy, $meta = '' ){
	$output = '';
	$terms = get_the_terms( $post_id, $taxonomy );

	if ( $terms ) {
		foreach ( $terms as $key => $term ) {
			$output = $term->name;
		}
	}

	if ( $meta ) {
		$output = $term->$meta;
	}

	echo esc_html( $output );
}
endif;

function wordfes2016_insert_template ( $atts ) {
	
	extract(
		shortcode_atts(array(
			'file' => '',
		), $atts)
	);
	
	//var_dump($file);
	
	get_template_part( 'template-parts/'. $file );
	
}

add_shortcode( 'template', 'wordfes2016_insert_template' );