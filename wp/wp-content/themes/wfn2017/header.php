<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WordFes Nagoya 2017
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
	
	$title = 'WordFes Nagoya 2017 これから 〜未来へ繋ぐ〜';
	
} else {
	
	$title = get_the_title() . ' | WordFes Nagoya 2017 これから 〜未来へ繋ぐ〜'; 
	
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

<?php
if ( is_front_page() ) {
    
    echo '<meta property="og:image" content="http://2017.wordfes.org/wp/wp-content/uploads/2017/08/wordfesnagoya2017-ogp.jpg" />';
    
}
?>

<script type="text/javascript" src="//typesquare.com/accessor/script/typesquare.js?Winn3RhO6lE%3D" charset="utf-8"></script>

<?php require_once( 'parts/ga-code.php' ); ?>

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

	<header class="site-header" role="banner">
		
		<div class="main-image">
  		<div class="imdesc">
			  <div class="site-branding">
  				<?php
                  //$main_image = 'page-title.svg';
                  $main_image = 'page-title.png';
//  				if( ! ( is_home() || is_front_page() || wordfes2015_is_mobile() ) ) {
                /*
		  		  if( ! ( is_home() || is_front_page() ) ) {
			  		  $main_image = 'subpage-title.svg';
				    }
				*/
				  ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/common/<?php echo $main_image; ?>" alt="<?php bloginfo( 'description' ); ?> <?php bloginfo( 'name' ); ?>" />
                </a>
            </h1>
			  </div><!-- .site-branding -->
            <!--
            <div class="headerLeft">
              <img src="<?php echo get_template_directory_uri(); ?>/images/common/wapu-orange.svg" alt="babyワプー" />
            </div>
            <div class="headerRight">
              <img src="<?php echo get_template_directory_uri(); ?>/images/common/wapu-black.svg" alt="futureワプー" />
            </div>
            -->
      </div>
		</div><!-- .main-image -->

		
		<nav id="site-navigation" class="main-navigation lato" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'wordfes2017' ); ?></button>
			<div class="navigation-menu">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_class'     => 'nav-menu',
					'menu_id'        => 'primary-menu',
					'depth'          => 1,
				) ); ?>
			</div>
		</nav><!-- #site-navigation -->

<?php if ( is_front_page() ) : ?>
<!-- スライダーサンプル -->
<script type="text/javascript">
<!--
//dd = new Date();
//document.write(dd.toLocaleString());
// -->
</script>

<div class="slider-container">
    <ul class="bxslider">
<?php
$args   = array(
    'post_type'      => 'slider',
    'posts_per_page' => -1,
    'orderby'        => 'rand',
);
$slides = new WP_Query( $args );
while ( $slides->have_posts() ):

    $slides->the_post();
    
    $url = get_field('wfn-slider-url');
    $img = wp_get_attachment_image_src( get_field('wfn-slider-image'), 'full' );
    
    if ( $url ):
?>
        <li>
            <a href="<?php echo esc_url( $url ); ?>">
                <img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
            </a>
        </li>
<?php
    else:
?>
        <li>
            <img src="<?php echo esc_url( $img[0] ); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
        </li>
<?php
    endif;
    
endwhile;
wp_reset_postdata();
?>
    </ul>
</div>

<style>
/* a.bx-pager-link :active { color: #ea5514; } */

.slider-container {
    padding: 20px 0;
    background: #fff;
}

.bx-wrapper .bx-pager.bx-default-pager a:hover,
.bx-wrapper .bx-pager.bx-default-pager a.active {
	background: #ea5514;
}
.bx-wrapper .bx-pager.bx-default-pager a {
	background: #DCDDDD;
}
.bx-wrapper{ margin: 0 auto !important;}
.bx-viewport {
    left: 0 !important;
    /*height: auto !important;*/
    border: none !important;
    box-shadow: none !important;
}
.bx-pager {
    display: none !important;
}

</style>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('.bxslider').bxSlider({
		auto: true,
		//margin: 0 auto 60px;
		slideWidth: 486,
		slideMargin: 30,
		slideHeight: 333,
		minSlides: 1,
		maxSlides: 2,
		infiniteLoop: true,
		speed: 1000,
		moveSlides: 1,
		//captions: true,
		speed: 300,
		pause: 6000,
		pager: false,
		controls: false,
		//pager: true,
		//controls: true,
		autoControls: false,
		autoHover: true, // マウスオーバー時に自動遷移を停止する
		
		// スライドさせる要素の大きさ（幅）を指定する
		// デフォルトでは100%になり、スライドエリアと同じサイズになる
		//slideWidth: 0, 		
	});
});
</script>

<?php endif ; ?>

	</header><!-- #masthead -->
	

	<div id="content" class="site-content">