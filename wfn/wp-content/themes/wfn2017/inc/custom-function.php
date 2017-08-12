<?php

/*
 *  ラベルを変更
 */
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'スタッフブログ';
    $submenu['edit.php'][5][0] = 'スタッフブログ一覧';
    $submenu['edit.php'][10][0] = 'スタッフブログの新規追加';
    $submenu['edit.php'][16][0] = 'タグ';
    echo '';
}
add_action( 'admin_menu', 'revcon_change_post_label' );

function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'スタッフブログ';
    $labels->singular_name = 'スタッフブログ';
    $labels->add_new = '新規追加';
    $labels->add_new_item = 'スタッフブログを追加';
    $labels->edit_item = 'スタッフブログの編集';
    $labels->new_item = 'スタッフブログ';
    $labels->view_item = 'スタッフブログの表示';
    $labels->search_items = 'スタッフブログを検索';
    $labels->not_found = 'スタッフブログが見つかりませんでした。';
    $labels->not_found_in_trash = 'ゴミ箱内にスタッフブログが見つかりませんでした。';
    $labels->all_items = '全てのスタッフブログ';
    $labels->menu_name = 'スタッフブログ';
    $labels->name_admin_bar = 'スタッフブログ';
} 
add_action( 'init', 'revcon_change_post_object' );


/*
 *  \n を <br> に変換
 */
function pdc_get_ret2br_text( $text ) {
	
	$search = array(
		'<p>',
		'&nbsp;',
	);
	$result = str_replace( $search, '', $text );
	$result = str_replace( "</p>", "<br><br>", $result );
	
	return $result;
	
}


/*
 *  ページＩＤを取得
 */
function pdc_get_page() {
	
	global $post;
	
	//$page = get_page_by_path( get_query_var('pagename') );
	$page = get_post( $post->ID );
	
	if ( ! isset( $page ) ) {
		
		$page = get_page_by_path( get_query_var('post_type') );
		
	}
	
	return $page;
	
}

/*
 *  ページネームを取得
 */
function pdc_get_page_name() {
	
	global $post;
	
	if ( is_home() ) {
		
		$page_name = 'スタッフブログ';
	
	} elseif ( is_single() || is_archive() ) {
		
		$post_type = $post->post_type ? $post->post_type : get_query_var('pagename');
		
		if ( 'post' == $post_type ) {
			
			$page_name = 'スタッフブログ';
			
		} else {
		
			$page_data = get_post_type_object( $post_type );
			$page_name = $page_data->label;
		
		}
		
		//echo '<pre>'; var_dump( $page_data ); echo '</pre>';
		
	} else {
	
		$page      = pdc_get_page();
		$page_name = $page->post_title;
		
		//echo '<pre style="z-index: 999; background: #fff;">'; var_dump( $page ); echo '</pre>';
		
	}
	
	return $page_name;
	
}

/*
 *  ページスラッグを取得
 */
function pdc_get_page_slug() {
	
	global $post;
	
	if ( is_home() ) {
	
		$page_slug = 'staff blog';
	
	} elseif ( is_single() || is_archive() ) {
		
		$page_slug = get_query_var('post_type') ? get_query_var('post_type') : $post->post_type;
		
		if ( 'post' == $page_slug ) {
			
			$page_slug = 'staff blog';
			
		}
		
		//echo '<!-- <pre>'; var_dump( $post ); echo '</pre> -->';
		
	} else {

		$page      = pdc_get_page();
		$page_slug = $page->post_name;
	
	//echo '<!-- <pre style="z-index: 999; background: #fff;">'; var_dump( $page ); echo '</pre> -->';
	
	}

	return $page_slug;
	
}


/*
 *  投稿時のタクソノミーの表示順序を変更
 */
function custom_wp_list_categories( $args, $field) {

    $args['orderby'] = 'order';

    return $args;

}
add_filter( 'acf/fields/taxonomy/wp_list_categories', 'custom_wp_list_categories', 10, 2 );


/*
 *  タイトル入力欄のテキストを変更
 */
function change_post_enter_title_here($title) {
	$screen = get_current_screen();
	if ( 'supporter' == $screen->post_type ) {
		$title = 'サポーター名（表示名）を入力してください';
	}
	return $title;
}
add_filter('enter_title_here', 'change_post_enter_title_here');


/*
 *  固定ページ一覧で表示する項目をカスタマイズ
 */
function manage_pages_columns( $columns ) {
	
	global $post;

	$escape_date          = $columns['date'];
	$escape_author        = $columns['author'];
	
	unset($columns['author']);
	unset($columns['date']);
	unset($columns['tags']);
	unset($columns['comments']);
	
	$columns['pagetitle'] = 'ページタイトル';
	$columns['slug']      = 'スラッグ';
	
	$columns['author']    = $escape_author;
	$columns['date']      = $escape_date;
	
	return $columns;
}
add_filter( 'manage_pages_columns', 'manage_pages_columns' );


/*
 *  固定ページ一覧で表示する項目をカスタマイズ
 */
function add_page_column( $column_name, $post_id ) {
	
	if( 'slug' == $column_name ) {
		
		$post = get_post($post_id);
		$slug = $post->post_name;
		
		echo attribute_escape($slug);
		
	} elseif( 'pagetitle' == $column_name ) {
		
		$pagetitle = get_post_meta( $post_id, 'pdc-page-title', true );
		
		echo esc_html( $pagetitle );
		
	}
	
}
add_action( 'manage_pages_custom_column', 'add_page_column', 10, 2);


//--------------------------------------------------------
// 投稿一覧で表示する項目をカスタマイズ
//--------------------------------------------------------
function manage_posts_columns($columns) {
	unset($columns['tags']);
	unset($columns['comments']);
	
	global $post;
	
	if ( 'supporter' == $post->post_type ) { // ポストタイプを指定
	
		$date_escape   = $columns['date']; // 日付を避難
		$author_escape = $columns['author']; // 投稿者を退避
		$type_escape   = $columns['supporter_type'];
		$option_escape = $columns['supporter_option'];
		
		unset($columns['date']); // 消す
		unset($columns['author']); // 消す
		unset($columns['supporter_type']);
		unset($columns['supporter_option']);
		
		$columns['display'] = '表示';
		
		$columns['author']  = '投稿者'; // ここで投稿者を戻す
		$columns['date']    = $date_escape; // ここで日付を戻す
		
	} elseif ( 'slider' == $post->post_type ) {
		
		$title_escape  = $columns['title']; // タイトルを避難
		$date_escape   = $columns['date']; // 日付を避難
		$author_escape = $columns['author']; // 投稿者を退避
		
		unset($columns['title']); // 消す
		unset($columns['date']); // 消す
		unset($columns['author']); // 消す
		unset($columns['supporter_type']);
		unset($columns['supporter_option']);
		
		$columns['thumb']   = '画像';
		
		$columns['title']   = $title_escape; // ここでタイトルを戻す
		
		$columns['link']    = 'リンク'; // ここでタイトルを戻す
		
		$columns['author']  = '投稿者'; // ここで投稿者を戻す
		$columns['date']    = $date_escape; // ここで日付を戻す
		
	}
	
	return $columns;
}
add_filter( 'manage_posts_columns', 'manage_posts_columns' );


//--------------------------------------------------------
// 投稿一覧で追加項目の内容を表示する
//--------------------------------------------------------
function inside_district_column( $column_name ) {
	global $post;
	
	if ( 'supporter' == $post->post_type && 'display' == $column_name ) {

		$anonym = get_post_meta( $post->ID, 'pdc-supporter-anonym', true );
		
		//var_dump($myMetaValue);
		
		if ( true == $anonym ) {
			
			echo '匿名希望';
			
		} else {
			
			echo '';
			
		}
		
	} elseif ( 'slider' == $post->post_type && 'thumb' == $column_name ) {

		$thumb = wp_get_attachment_image_src( get_field('wfn-slider-image'), 'full' );
		
		echo '<img src="' . esc_url( $thumb[0] ) . '" alt="サムネール" width="100%" height="auto">';
		
	} elseif ( 'slider' == $post->post_type && 'link' == $column_name ) {

		$url = get_field('wfn-slider-url');
		
		echo esc_url( $url );
		
	} elseif ( 'tix_attendee' == $post->post_type && 'tix_name' == $column_name ) {
		
		$attendees = get_posts( array(
			'p'              => $post->ID,
			'posts_per_page' => 1,
			'post_type' => 'tix_attendee',
			'post_status' => array( 'pending', 'publish' ),
			'cache_results' => false,
		) );
		
		$terms = get_post_meta( $post->ID, 'tix_log' );
		$name  = $terms[0][0]['data']['post']['tix_attendee_questions'][1][239];
		
		if ( $name ) {
			
			echo esc_html( $name );
			
		} else {
			
			echo '---';
			
		}

		//echo '<pre>'; var_dump( $terms[0][0]['data']['post']['tix_attendee_questions'][1][239] ); echo '</pre>';
		
	}
	
}
add_action( 'manage_posts_custom_column', 'inside_district_column' );


//--------------------------------------------------------
// アイキャッチがあればアイキャッチを、
// なければ、記事中の最初の画像を、
// それもなければダミー画像を返す。
//
// ＜引数＞
// $post_id	   : 記事の ID
// $dummy		 : ダミー画像の URL
// $image_field   : 画像のフィールド（カスタムフィールドの場合に設定）
// $content_field : 記事のフィールド（カスタムフィールドの場合に設定）
//
// ＜戻り値＞
// 画像の情報の配列
// 0 : 画像の URL
// 1 : 画像の幅（ダミー画像はなし）
// 2 : 画像の高さ（ダミー画像はなし）
//--------------------------------------------------------
function pdc_get_post_thumbnail( $post_id, $dummy, $image_field = '', $content_field = '', $size = 'thumbnail' ) {

	$thumb_src = '';

	if ( 'thumbnail' != $size && 'medium' != $size && 'large' != $size && 'full' != $size ) {

		$size = 'thumbnail';

	}
	
	// 画像を読み込み
	if ( '' != $image_field ) {
		
		// カスタムフィールドから読み込み
		$thumb_src   = wp_get_attachment_image_src( get_post_meta( $post_id, $image_field, true ), $size );
		
	} else {
		
		// アイキャッチを読み込み
		$id		     = get_post_thumbnail_id( $post_id );
		$thumb_src   = wp_get_attachment_image_src( $id, $size );
		
	}
	
	//var_dump($thumb_src);

	if ( ! $thumb_src ) {
		
		// 画像を捜す記事を設定
		if ( '' != $content_field ) {
			
			$content = get_post_meta( $post_id, $content_field, true );
			
		} else {
			
			$content = get_the_content( $post_id );
		}
	
		// 記事中の画像取り出し
		if ( preg_match( '/wp-image-(\d+)/', $content, $matches ) ) {
			
			$thumb_src   = wp_get_attachment_image_src( $matches[1], $size );
			
		} else {
			
			$thumb_src[] = $dummy;
			$thumb_src[] = get_option( $size . '_size_w', 0 );
			$thumb_src[] = get_option( $size . '_size_h', 0 );
			
		}
		
	}
	
	return $thumb_src;

}


//--------------------------------------------------------
// 抜粋記事取得
//
// ＜引数＞
// $text  : 元のテキスト
// $max   : 抜き出す文字数
// $after : 抜き出した際に後ろに付けるテキスト
// $allow : 許可するタグ（デフォルト：''）
//
// ＜戻り値＞
// 抜粋文字列
//--------------------------------------------------------
function pdc_get_excerpt( $text, $max, $after = '', $allow = '' ) {
	
	$text = strip_tags( $text, $allow );
	$len  = mb_strlen( $text );
	
	if ( $max < $len ) {
	
		$excerpt  = mb_substr( $text, 0, $max );
		$excerpt .= $after;
		
	} else {
	
		$excerpt = $text;
		
	}

	return $excerpt;
	
}













