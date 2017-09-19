<?php
/**
* Class for settings page
*/
class BxSliderWp_SettingsPage extends BxSliderWp_AutoInject implements BxSliderWp_IRunnable {
	
	
	public function run() {

		// Add settings
		add_action( 'admin_init', array( $this, 'register_settings') );
	
		// Add settings page
		add_action( 'admin_menu', array( $this, 'add_menu_and_page'));
	}
	
	public function add_menu_and_page(){
		// Use built-in WP function
		add_submenu_page(
			$this->plugin->get('settings_page.parent_slug'),
			$this->plugin->get('settings_page.page_title'),
			$this->plugin->get('settings_page.menu_title'),
			'manage_options',
			$this->plugin->get('settings_page.menu_slug'),
			array( $this, 'render_settings_page')
		);
	}
	
	/**
	* Render settings page. This function should echo the HTML form of the settings page.
	*/
	public function render_settings_page($post){
		global $wp_version;
		
		$settings_data = $this->get_settings_data();
		
		$vars = array();
		$vars['page_title'] = $this->plugin->get('settings_page.page_title');
		
		if ( version_compare( $wp_version, '3.7', '<=' ) ) { // WP 3.7 and below
			$vars['screen_icon'] = get_screen_icon('options-general');
		} else { // WP 3.8+
			$vars['screen_icon'] = ''; // Screen icons are no longer used as of WordPress 3.8
		}
		
		$vars['settings_fields'] = $this->settings_fields( $this->plugin->get('settings_page.option_group') );
		$vars['option_name'] = $this->plugin->get('settings_page.option_name');
		$vars['settings_data'] = $settings_data;
		$vars['debug'] = $this->plugin->get('debug');
		$vars['debug_info'] = ($this->plugin->get('debug')) ? '<pre>'.print_r( $vars['settings_data'], true ).'</pre>' : '';
		
		$this->plugin->get('view')->render('settings-page.php', $vars);
	}
	
	/**
	* Prepare option data
	*/
	public function register_settings() {
		register_setting(
			$this->plugin->get('settings_page.option_group'),
			$this->plugin->get('settings_page.option_name'),
			array( $this, 'validate_options')
		);
	}
		
	/**
	* Validate data from HTML form
	*/
	public function validate_options( $input ) {
		$input = wp_parse_args($input, $this->get_settings_data());
		
        delete_site_transient('update_plugins'); // Force check. Regenerate package url for updater
		
		if( isset($_POST['reset']) ){
			$input = $this->get_default_settings_data();
			add_settings_error( $this->plugin->get('settings_page.menu_slug'), 'restore_defaults', __( 'Default options restored.', 'bxsliderwp'), 'updated fade' );
		}
		return $input;
	}
	
	/**
	* Get settings data. If there is no data from database, use default values
	*/
	public function get_settings_data(){
		return get_option( $this->plugin->get('settings_page.option_name'), $this->get_default_settings_data() );
	}
	
	/**
	* Apply default values
	*/
	public function get_default_settings_data() {
		$defaults = array();
		
		$defaults['license_id'] = '';
		$defaults['license_key'] = '';
		
		return $defaults;
	}
	
	/**
	* Output needed fields for security
	*/
	function settings_fields( $option_group ) {
		$fields = "<input type='hidden' name='option_page' value='" . esc_attr($option_group) . "' />";
		$fields .= '<input type="hidden" name="action" value="update" />';
		$fields .= wp_nonce_field("$option_group-options", '_wpnonce', true, false);
		return $fields;
	}
	
		
	
	/**
	* Get settings data by uid
	*/
	public function get_data($uid){
		$settings_data = $this->get_settings_data();
		if(isset($settings_data[$uid])){
			return $settings_data[$uid];
		}
		return false;
	}
	
}
