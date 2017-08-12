<?php

/**
 * Custom Post Type Settings
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2016
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2016.wordfes.org
 * @copyright  2016 WordBench Nagoya
 * =====================================================
 */

add_action( 'init', 'wordfes2016_post_type_init' );

function wordfes2016_post_type_init() {

	/*
	 * カスタム投稿タイプ「お知らせ」を追加
	 */
	$topics_labels = array(
		'name' => 'お知らせ',
		'singular_name' => 'topics',
		'add_new' => '新しいお知らせ',
		'add_new_item' => '新しいお知らせを登録',
		'edit_item' => '新しいお知らせを編集',
		'new_item' => '新しいお知らせを登録',
		'all_items' => 'すべてのお知らせ',
		'view_item' => 'お知らせページを見る',
		'search_items' => 'お知らせを検索',
		'not_found' => 'お知らせは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'お知らせ',
	);

	$topics_args = array(
		'labels' => $topics_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'topics' ),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'comment' ),
	);

	register_post_type( 'topics', $topics_args );


	/*
	 * カスタム投稿タイプ「サポーター」を追加
	 */
	$suporter_labels = array(
		'name' => 'サポーター',
		'singular_name' => 'supporter',
		'add_new' => '新しいサポーター',
		'add_new_item' => '新しいサポーターを登録',
		'edit_item' => '新しいサポーターを編集',
		'new_item' => '新しいサポーターを登録',
		'all_items' => 'すべてのサポーター',
		'view_item' => 'サポーターページを見る',
		'search_items' => 'サポーターを検索',
		'not_found' =>  'サポーターは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'サポーター'
	);

	$suporter_args = array(
		'labels' => $suporter_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'suporter' ),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'author' )
	);

	register_post_type( 'supporter', $suporter_args );


	/*
	 * カスタム投稿タイプ「セッション」を追加
	 */
	$session_labels = array(
		'name' => 'セッション',
		'singular_name' => 'sessions',
		'add_new' => '新しいセッション',
		'add_new_item' => '新しいセッションを登録',
		'edit_item' => 'このセッションを編集',
		'new_item' => '新しいセッションを登録',
		'all_items' => 'すべてのセッション',
		'view_item' => 'セッションページを見る',
		'search_items' => 'セッションを検索',
		'not_found' =>  'セッションは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'セッション'
	);

	$session_args = array(
		'labels' => $session_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'sessions' ),
		'capability_type' => 'page',
		'has_archive' => false,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'author', 'thumbnail')
	);

	register_post_type( 'sessions', $session_args );
	

	/*
	 * カスタム投稿タイプ「スタッフ紹介」を追加
	 */
	$staff_labels = array(
		'name' => 'スタッフ紹介',
		'singular_name' => 'staff',
		'add_new' => '新しいスタッフ',
		'add_new_item' => '新しいスタッフを登録',
		'edit_item' => '新しいスタッフを編集',
		'new_item' => '新しいスタッフを登録',
		'all_items' => 'すべてのスタッフ',
		'view_item' => 'スタッフページを見る',
		'search_items' => 'スタッフを検索',
		'not_found' => 'スタッフは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'スタッフ紹介',
	);

	$staff_args = array(
		'labels' => $staff_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'staff' ),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title','thumbnail','custom-fields' ),
	);

	register_post_type( 'staff', $staff_args );
	

	/*
	 * カスタム投稿タイプ「スライダー」を追加
	 */
	$staff_labels = array(
		'name' => 'スライダー',
		'singular_name' => 'スライダー',
		'add_new' => '新しいスライダー',
		'add_new_item' => '新しいスライダーを登録',
		'edit_item' => 'スライダーを編集',
		'new_item' => '新しいスライダーを登録',
		'all_items' => 'すべてのスライダー',
		'view_item' => 'スライダーを見る',
		'search_items' => 'スライダーを検索',
		'not_found' => 'スライダーは見つかりませんでした。',
		'not_found_in_trash' => 'ゴミ箱の中にスライダーはありませんでした',
		'parent_item_colon' => '',
		'menu_name' => 'スライダー',
	);

	$slider_args = array(
		'labels' => $staff_labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'staff' ),
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'supports' => array( 'title' ),
	);

	register_post_type( 'slider', $slider_args );
}

