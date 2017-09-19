<?php
$bxsliderwp_instance = null;

// Hook the plugin
add_action('plugins_loaded', 'bxsliderwp_init');
function bxsliderwp_init() {
    global $bxsliderwp_instance;

    $plugin = new BxSliderWp_Servicer();
    
    $plugin->set('path', realpath(plugin_dir_path(dirname(__FILE__))) . DIRECTORY_SEPARATOR);
    $plugin->set('url', plugin_dir_url(dirname(__FILE__)));
    $plugin->set('main_file', 'main.php');
    $plugin->set('view_folder', $plugin->get('path').'views'.DIRECTORY_SEPARATOR);
    $plugin->set('language_path', basename($plugin->get('path')).'/languages/');
    $plugin->set('debug', false);
    $plugin->set('nonce_name', 'bxslider_wp_nonce');
    $plugin->set('nonce_action', 'bxslider_wp_action');

    $plugin->set('slug', 'bxsliderwp_service_slug');
    $plugin->set('plugin_headers', 'bxsliderwp_service_headers');
    $plugin->set('version', 'bxsliderwp_service_version');
    $plugin->set('textdomain', 'bxsliderwp_service_textdomain');
    $plugin->set('admin', 'bxsliderwp_service_admin');
    $plugin->set('frontend', 'bxsliderwp_service_frontend');
    $plugin->set('data', 'bxsliderwp_service_data');
    $plugin->set('view', 'bxsliderwp_service_view');
    $plugin->set('widgets', 'bxsliderwp_service_widgets');

    $loaded = load_plugin_textdomain( $plugin->get('textdomain'), false, $plugin->get('language_path') ); // Load language files
    
    $plugin->run();

    $bxsliderwp_instance = $plugin;
}

// PHP embed code function
/**
* BxSlider
*
* Displays the slider on template files.
*
* @param string $slider_slug The slug of the slider.
*/
function bxslider( $slider_slug ){
	global $bxsliderwp_instance;
	if(isset($bxsliderwp_instance)){
		echo $bxsliderwp_instance->get('frontend')->bxslider_shortcode( array('id'=>$slider_slug) );
	} else {
        echo __("No BxSliderWP instance.", "bxsliderwp");
    }
}

// Services
function bxsliderwp_service_slug( $plugin ) {
    return basename($plugin->get('path')).'/'.$plugin->get('main_file');
}

function bxsliderwp_service_headers( $plugin ){

	$default_headers = array(
		'name' => 'Plugin Name',
		'plugin_uri' => 'Plugin URI',
		'version' => 'Version',
		'author' => 'Author',
		'author_uri' => 'Author URI',
		'license' => 'License',
		'license_uri' => 'License URI',
		'domain_path' => 'Domain Path',
		'text_domain' => 'Text Domain'
	);
	return get_file_data( $plugin->get('path').DIRECTORY_SEPARATOR. $plugin->get('main_file'), $default_headers, 'plugin' ); // WP Func
}

function bxsliderwp_service_version( $plugin ){
	$h = $plugin->get('plugin_headers');
    return $h['version'];
}

function bxsliderwp_service_textdomain( $plugin ){
	$h = $plugin->get('plugin_headers');
    return $h['text_domain'];
}

function bxsliderwp_service_admin( $plugin ) {
    return new BxSliderWp_Admin();
}

function bxsliderwp_service_frontend( $plugin ) {
    return new BxSliderWp_Frontend();
}

function bxsliderwp_service_data( $plugin ) {
    return new BxSliderWp_Data();
}

function bxsliderwp_service_view( $plugin ) {
    return new BxSliderWp_View( $plugin->get('view_folder') );
}

function bxsliderwp_service_widgets( $plugin ) {
    return new BxSliderWp_Widgets();
}


