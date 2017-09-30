<?php

/* 記録用。下記のコードを wp-config の「編集が必要なのはここまでです ! WordPress でブログをお楽しみください。」コメントの直前ぐらいに挿入しています。 */

// CloudFlare HTTPS support
if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    $_SERVER['HTTPS'] = 'on';
    $_ENV['HTTPS'] = 'on';
}
