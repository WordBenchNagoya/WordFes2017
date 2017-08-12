<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WordFes Nagoya 2015
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<?php
if ( is_front_page() ) {
	
	$title = 'WordFes Nagoya 2016 | WordPress の森に集おう！';
	
} else {
	
	$title = get_the_title() . ' | WordFes Nagoya 2016'; 
	
}
?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo esc_html( $title ); ?></title>
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body id="<?php echo esc_attr( pdc_get_page_slug() ); ?>" <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="page">

	<header class="site-header">
		
		<?php
		if ( is_front_page() ) {
			
			get_template_part( 'parts/header', 'home' );
			
		} else {
			
			get_template_part( 'parts/header', 'page' );
			
		}
		?>

		<nav id="site-navigation">
			
			<div class="navigation-menu clearfix text-center">
				
				<p class="menu-bar visible-xs"><img class="menu-open" src="<?php echo get_template_directory_uri(); ?>/images/navigation/btn-open.png" alt="open"></p>
				
				<ul class="clearfix text-center">
					<li class="col-sm-2 col-xs-12">
						<a href="<?php echo esc_url( home_url('/') ); ?>">
							<img class="swap" src="<?php echo get_template_directory_uri(); ?>/images/navigation/nav-home.png" alt="トップ">
						</a>
					</li>
					<li class="col-sm-2 col-xs-12">
						<a href="<?php echo esc_url( home_url('/about') ); ?>">
							<img class="swap" src="<?php echo get_template_directory_uri(); ?>/images/navigation/nav-about.png" alt="開催概要">
						</a>
					</li>
					<li class="col-sm-2 col-xs-12">
						<a href="<?php echo esc_url( home_url('/sessions') ); ?>">
							<img class="swap" src="<?php echo get_template_directory_uri(); ?>/images/navigation/nav-timetable.png" alt="タイムテーブル">
						</a>
					</li>
					<li class="col-sm-2 col-xs-12">
						<a href="<?php echo esc_url( home_url('/access') ); ?>">
							<img class="swap" src="<?php echo get_template_directory_uri(); ?>/images/navigation/nav-access.png" alt="アクセス">
						</a>
					</li>
					<li class="col-sm-2 col-xs-12">
						<a href="<?php echo esc_url( home_url('/supporter') ); ?>">
							<img class="swap" src="<?php echo get_template_directory_uri(); ?>/images/navigation/nav-supporter.png" alt="サポーター">
						</a>
					</li>
					<li class="col-sm-2 col-xs-12">
						<a href="<?php echo esc_url( home_url('/entry') ); ?>">
							<img class="swap" src="<?php echo get_template_directory_uri(); ?>/images/navigation/nav-entry.png" alt="参加申込">
						</a>
					</li>
				</ul>
				
			</div>
			
		</nav><!-- #site-navigation -->
		
	</header><!-- #masthead -->
	
	<?php if ( is_page() || is_single() || is_archive() ): ?>
	<!--
	<div class="bread-crumb">
		
		<ul>
			<li><a href="<?php home_url('/'); ?>">トップページ</a> &gt;</li>
		</ul>
		
	</div>
	-->
	<?php endif; ?>

	<div id="content" class="site-content">