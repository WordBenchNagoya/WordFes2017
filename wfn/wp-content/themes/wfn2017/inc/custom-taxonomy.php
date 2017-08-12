<?php

/**
 * Custom Taxonomy Settings
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2016
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2016.wordfes.org
 * @copyright  2016 WordBench Nagoya
 * =====================================================
 */

// Hook into the 'init' action
add_action( 'init', 'wordfes2016_taxonomy', 0 );

/**
 * WordFes 2016 All Register taxonomy
 *
 * @return void : register taxonomy
 */
function wordfes2016_taxonomy() {

	/**
	 * suporter category labels
	 * @var array
	 */

	$sponsor_labels = array(
		'name'                       => 'サポーターオプション',
		'singular_name'              => 'サポーターオプション',
		'menu_name'                  => 'サポーターオプション', 
		'all_items'                  => 'すべてのサポーターオプション', 
		'parent_item'                => '親サポーターオプション', 
		'parent_item_colon'          => '親サポーターオプション:', 
		'new_item_name'              => '新しいサポーターオプション', 
		'add_new_item'               => '新しいサポーターオプションを追加', 
		'edit_item'                  => 'サポーターオプションを編集', 
		'update_item'                => 'サポーターオプションを更新', 
		'separate_items_with_commas' => 'アイテムをカンマで区切る', 
		'search_items'               => 'サポーターオプションを検索', 
		'add_or_remove_items'        => '追加、または削除', 
		'choose_from_most_used'      => 'Choose from the most used items', 
		'not_found'                  => 'サポーターオプション見つかりませんでした。', 
	);
	$sponsor_args = array(
		'labels'                     => $sponsor_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register "sponsor" category
	register_taxonomy( 'supporter_option', array( 'supporter' ), $sponsor_args );

	/**
	 * suporter type labels
	 * @var array
	 */

	$sponsor_type_labels = array(
		'name'                       => 'サポータータイプ', 
		'singular_name'              => 'サポータータイプ', 
		'menu_name'                  => 'サポータータイプ', 
		'all_items'                  => 'すべてのサポータータイプ', 
		'parent_item'                => '親サポータータイプ', 
		'parent_item_colon'          => '親サポータータイプ:', 
		'new_item_name'              => '新しいサポータータイプ', 
		'add_new_item'               => '新しいサポータータイプを追加', 
		'edit_item'                  => 'サポータータイプを編集', 
		'update_item'                => 'サポータータイプを更新', 
		'separate_items_with_commas' => 'アイテムをカンマで区切る', 
		'search_items'               => 'サポータータイプを検索', 
		'add_or_remove_items'        => '追加、または削除', 
		'choose_from_most_used'      => 'Choose from the most used items', 
		'not_found'                  => 'サポータータイプ見つかりませんでした。', 
	);
	$sponsor_type_args = array(
		'labels'                     => $sponsor_type_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register "sponsor" category
	register_taxonomy( 'supporter_type', array( 'supporter' ), $sponsor_type_args );

	/**
	 * Target category labels
	 * @var array
	 */

	$target_labels = array(
		'name'                       => 'ターゲット', 
		'singular_name'              => 'ターゲット', 
		'menu_name'                  => 'ターゲット', 
		'all_items'                  => 'すべてのターゲット', 
		'parent_item'                => '親ターゲット', 
		'parent_item_colon'          => '親ターゲット:', 
		'new_item_name'              => '新しいターゲット', 
		'add_new_item'               => '新しいターゲットを追加', 
		'edit_item'                  => 'ターゲットを編集', 
		'update_item'                => 'ターゲットを更新', 
		'separate_items_with_commas' => 'アイテムをカンマで区切る', 
		'search_items'               => 'ターゲットを検索', 
		'add_or_remove_items'        => '追加、または削除', 
		'choose_from_most_used'      => 'Choose from the most used items', 
		'not_found'                  => 'ターゲット見つかりませんでした。', 
	);
	$target_args = array(
		'labels'                     => $target_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register target category
	register_taxonomy( 'target', array( 'sessions' ), $target_args );

	/**
	 * Class room category labels
	 * @var array
	 */

	$classroom_labels = array(
		'name'                       => '教室',
		'singular_name'              => '教室',
		'menu_name'                  => '教室', 
		'all_items'                  => 'すべての教室', 
		'parent_item'                => '親教室', 
		'parent_item_colon'          => '親教室:', 
		'new_item_name'              => '新しい教室', 
		'add_new_item'               => '新しい教室', 
		'edit_item'                  => '教室', 
		'update_item'                => '教室', 
		'separate_items_with_commas' => 'アイテムをカンマで区切る', 
		'search_items'               => '教室', 
		'add_or_remove_items'        => '追加、または削除', 
		'choose_from_most_used'      => 'Choose from the most used items', 
		'not_found'                  => '教室が見つかりませんでした。', 
	);
	$classroom_args = array(
		'labels'                     => $classroom_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register session category
	register_taxonomy( 'classroom', array( 'sessions' ), $classroom_args );

	/**
	 * Class room category labels
	 * @var array
	 */

	$time_zone_labels = array(
		'name'                       => 'タイムゾーン',
		'singular_name'              => 'タイムゾーン',
		'menu_name'                  => 'タイムゾーン', 
		'all_items'                  => 'すべてのタイムゾーン', 
		'parent_item'                => '親タイムゾーン', 
		'parent_item_colon'          => '親タイムゾーン:', 
		'new_item_name'              => '新しいタイムゾーン', 
		'add_new_item'               => '新しいタイムゾーン', 
		'edit_item'                  => 'タイムゾーン', 
		'update_item'                => 'タイムゾーン', 
		'separate_items_with_commas' => 'アイテムをカンマで区切る', 
		'search_items'               => 'タイムゾーン', 
		'add_or_remove_items'        => '追加、または削除', 
		'choose_from_most_used'      => 'Choose from the most used items', 
		'not_found'                  => 'タイムゾーンが見つかりませんでした。', 
	);
	$time_zone_args = array(
		'labels'                     => $time_zone_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register session category
	register_taxonomy( 'timezone', array( 'sessions' ), $time_zone_args );

	$topics_labels = array(
		'name'                       => 'お知らせカテゴリ',
		'singular_name'              => 'お知らせカテゴリ',
		'menu_name'                  => 'お知らせカテゴリ', 
		'all_items'                  => 'すべてのお知らせカテゴリ', 
		'parent_item'                => '親お知らせカテゴリ', 
		'parent_item_colon'          => '親お知らせカテゴリ:', 
		'new_item_name'              => '新しいお知らせカテゴリ', 
		'add_new_item'               => '新しいお知らせカテゴリ', 
		'edit_item'                  => 'お知らせカテゴリ', 
		'update_item'                => 'お知らせカテゴリ', 
		'separate_items_with_commas' => 'アイテムをカンマで区切る', 
		'search_items'               => 'お知らせカテゴリ', 
		'add_or_remove_items'        => '追加、または削除', 
		'choose_from_most_used'      => 'Choose from the most used items', 
		'not_found'                  => 'お知らせカテゴリが見つかりませんでした。', 
	);
	$topics_args = array(
		'labels'                     => $topics_labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);

	// register session category
	register_taxonomy( 'topics', array( 'sessions' ), $topics_args );


}


