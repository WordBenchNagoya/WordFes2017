<?php
/*
 * ログイン画面カスタマイズ
 */

function custom_wp_login() {
	
echo <<<Eof
<style>
html,
body.login {
	/* ページの背景色 */
	background: #ecfada;
}

.login h1 a {
	/* ロゴ画像のサイズ指定 */
	width: 100%;
	height: 253px;
	background-size: 200px 253px;
}
/* 枠外の文字スタイルを変更 */
.login #backtoblog a,
.login #nav a {
	/*color: #FFF;*/
}

.login #backtoblog a:hover,
.login #nav a:hover {
	/*color: #fbbe2c;*/
}
/* ここまで */
.login .message,
.login form {
	/* 枠の背景色 */
	/*background-color: #FFF;*/
}

#login {
	padding-top: 3%;
}
</style>
Eof;
	
}
add_action ( 'login_head', 'custom_wp_login' );


/*
// 管理画面カスタマイズ
*/
function custom_admin_head() {

echo <<<Eof
<style type="text/css">
th#thumb {
	width: 150px;
}

th#wpseo-score-readability {
	width: 100px;
}
</style>
Eof;

if ( ! current_user_can('edit_user') ) {
	
// クイック編集を非表示にする
echo <<<Eof
<style type="text/css">
.has-row-actions .inline {
	display: none;
}
</style>
Eof;

}

}
add_action( 'admin_head', 'custom_admin_head' );