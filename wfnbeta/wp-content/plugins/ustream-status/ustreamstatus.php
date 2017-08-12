<?php
/*
Contributors: katz515
Plugin Name: Ustream Status
Plugin URI: http://katzueno.com/wordpress/ustream-status/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R8S6WTYMY9SXG
Description: Display the online/offline status of a Ustream channel.
Version: 3.0.0
Author: Katz Ueno
Author URI: http://katzueno.com/
Tags: livecasting, status, ustream, live cast
License: GPL2
*/

/*  Copyright 2016 Katsuyuki Ueno (email : katzueno@deerstudio.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class wp_ustream_status_widget extends WP_Widget {

	/* ============================================================
	 * Constructer
     * ============================================================
    */
    function wp_ustream_status_widget () {
		$widget_ops = array(
        'description' => 'Display Ustream online status'
        );
	    parent::WP_Widget(false, $name = 'Ustream Status',$widget_ops);
    }

	/* ============================================================
	 * Form
     * ============================================================
    */
    function form( $instance ) {
		//Reading the existing data from $instance
		$instance = wp_parse_args( (array) $instance, array( 'account' => 'YokosoNews', 'online' => '', 'offline' => '') );
		$title = esc_attr( $instance['title'] );
		$account = esc_attr( $instance['account'] );
		$online = esc_attr( $instance['online'] );
		$offline = esc_attr( $instance['offline'] );
    ?>
    <!--Form-->
    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

    <p><label for="<?php echo $this->get_field_id('account'); ?>"><?php _e('Ustream channel name or URL:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('account'); ?>" name="<?php echo $this->get_field_name('account'); ?>" type="text" value="<?php echo $account; ?>" /></label></p>

    <p><label for="<?php echo $this->get_field_id('online'); ?>"><?php _e('Online image URL:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('online'); ?>" name="<?php echo $this->get_field_name('online'); ?>" type="text" value="<?php echo $online; ?>" /></label></p>

    <p><label for="<?php echo $this->get_field_id('offline'); ?>"><?php _e('Offline image URL:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('offline'); ?>" name="<?php echo $this->get_field_name('offline'); ?>" type="text" value="<?php echo $offline; ?>" /></label></p>
    <!--/Form-->
    <?php    }


	/* ============================================================
	 * Update
     * ============================================================
    */
    function update( $new_instance, $old_instance ) {
    // Old Instance and New instance
    		$instance = $old_instance;
    		$instance['title'] = esc_html( $new_instance['title'] );
    		$instance['account'] = preg_replace("#^.*/([^/]+)/?$#",'${1}', $new_instance['account']);
    		$instance['online'] = esc_url( $new_instance['online'] );
    		$instance['offline'] = esc_url( $new_instance['offline'] );
    return $instance;
    }

	/* ============================================================
	 * Widget View
     * ============================================================
    */
	function widget( $args, $instance ) {
		extract($args);
		$account = esc_html($instance['account']);
		$title = esc_html($instance['title']);
		$online = esc_url($instance['online']);
		$offline = esc_url($instance['offline']);
        echo $before_widget;
		if ( $account ) {
    		if (!empty($title)) {
    		echo $before_title . $title . $after_title;
            }
    		// ==============================
    		// Ustream Status starts here
    		// ==============================
    		// TRANSIENT STARTS HERE
            $transientName = 'wp_ustream_status_' . $account;
    		if ( false === ( $UstChannelStatus = get_transient( $transientName ) ) ) {
    			$opt = stream_context_create(array(
    			'http' => array( 'timeout' => 3 )
    			));
    			$UstChannelMetaTags = array();
    			$UstChannelMetaTags = @get_meta_tags('http://www.ustream.tv/channel/' . $account);
    			$UstChannelID = intval($UstChannelMetaTags['ustream:channel_id']);
    			if ($UstChannelID) {
        			$UstChannelStatus = @file_get_contents('https://api.ustream.tv/channels/' . $UstChannelID . '.json',0,$opt);
            		$UstChannelStatus = json_decode($UstChannelStatus);
                    $UstChannelStatus = $UstChannelStatus->channel->status;
        			set_transient($transientName, $UstChannelStatus, 60 );
    			} else {
        			$UstChannelStatus = '';
    			}
    		}
    		// TRANSIENT ENDS HERE
    			// For DEBUG
    		// Decode JSON
    		switch ($UstChannelStatus) {
    			case 'live':
        			$output = "<a href=\"http://www.ustream.tv/channel/$account\" alt=\"";
        			$output .= __('Click here to visit the Ustream channel');
        			$output .= '" target="_blank">';
        			$output .= "<img src=\"$online\" alt=\"";
        			$output .= __('Live now');
        			$output .= '" style="max-width: 100%;" />';
        			$output .= "</a>";
        			echo $output;
    		// ONLINE part ends here
    			break;
    			case 'offair':
        			// If not live, including when the API does not respond
        			$output = "<a href=\"http://www.ustream.tv/channel/$account\" alt=\"";
        			$output .= __('Click here to visit the Ustream channel');
        			$output .= ' target="_blank">';
        			$output .= "<img src=\"$offline\" alt=\"";
        			$output .= __('Offline');
        			$output .= '" style="max-width: 100%;" />';
        			$output .= '</a>';
        			echo $output;
    			break;
    			default:
    			    _e('Error occured. We could not retrieve the data from Ustream.');
    			break;
            }
    		// ==============================
    		// Ustream Status ends here
    		// ==============================
		}
		echo $after_widget;
	}
}

// ============================================================
// Registering shortcode
// [ustream-status online='online image URL' offline='offline image URL' channel='http://www.ustream.tv/concrete5japan']
// ============================================================
function ustream_status_shortcode($atts) {
    // do something
    $account = esc_html(preg_replace("#^.*/([^/]+)/?$#",'${1}',$atts['channel']));
    $online = esc_url($atts['online']);
    $offline = esc_url($atts['offline']);

	// TRANSIENT STARTS HERE
    $transientName = 'wp_ustream_status_' . $account;
	if ( false === ( $UstChannelStatus = get_transient( $transientName ) ) ) {
		$opt = stream_context_create(array(
		'http' => array( 'timeout' => 3 )
		));
		$UstChannelMetaTags = array();
		$UstChannelMetaTags = @get_meta_tags('http://www.ustream.tv/channel/' . $account);
		$UstChannelID = intval($UstChannelMetaTags['ustream:channel_id']);
		if ($UstChannelID) {
			$UstChannelStatus = @file_get_contents('https://api.ustream.tv/channels/' . $UstChannelID . '.json',0,$opt);
    		$UstChannelStatus = json_decode($UstChannelStatus);
            $UstChannelStatus = $UstChannelStatus->channel->status;
			set_transient($transientName, $UstChannelStatus, 60 );
		} else {
			$UstChannelStatus = '';
		}
	}
	// TRANSIENT ENDS HERE
    switch ( $UstChannelStatus )
        {
        case 'live':
    	    $output = '<a href="http://www.ustream.tv/channel/';
    	    $output .= $account;
    	    $output .= '" alt="';
    	    $output .= __('Click here to visit the Ustream channel');
    	    $output .= '" target="_blank"><br /><img src="';
    	    $output .= $online;
    	    $output .='" alt="';
    	    $output .= __('Live now');
    	    $output .= '" target="_blank" /><br /></a>';
            // ONLINE part ends here
        break;
        case 'offair':
            // If not live, including when the API does not respond
    	    $output = '<a href="http://www.ustream.tv/channel/';
    	    $output .= $account;
    	    $output .= '" alt="';
    	    $output .= __('Click here to visit the Ustream channel');
    	    $output .= '" target="_blank"><br /><img src="';
    	    $output .= $offline;
    	    $output .= '" alt="';
    	    $output .= __('Offline');
    	    $output .= '" /><br /></a>';
            break;
        default:
            $output = __('Error occured. We could not retrieve the data from Ustream.');
        break;
        }
    return $output;
}

// ============================================================
// Registering plug-ins
// ============================================================
function wpUstreamStatusInit() {
    // Registering class name
    register_widget('wp_ustream_status_widget');
}

// ============================================================
// execute wpUstreamStatusInit()
// ============================================================
add_action('widgets_init', 'wpUstreamStatusInit');
add_shortcode('ustream-status', 'ustream_status_shortcode' );
?>
