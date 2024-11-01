<?php
/*
Plugin Name: SS Image
Plugin URI: http://miguras.com
Description: With SS Image Shortcode you can add animated images with captions everywhere. Also, you can create a gallery, just adding images with the shortcode manager at the same page.
Version: 1.2.4
Author: Miguras
Author URI: http://miguras.com
*/

require_once('ss_shortcode.php');
wp_enqueue_script( 'jquery');
wp_register_style( 'prettyphoto', plugins_url( '/css/prettyPhoto.css', __FILE__));
wp_enqueue_style( 'prettyphoto');
wp_register_style( 'ss-style', plugins_url( '/css/ss-styles.css', __FILE__));
wp_enqueue_style( 'ss-style');
wp_register_script( 'prettyphoto', plugins_url( '/js/jquery.prettyPhoto.js', __FILE__));
wp_enqueue_script( 'prettyphoto');
wp_register_script( 'ss-image-effects', plugins_url( '/js/ss_effects.js', __FILE__));
wp_enqueue_script( 'ss-image-effects');


if ( ! defined( 'ABSPATH' ) )
	die( "Can't load this file directly" );

class ss
{
	function __construct() {
		add_action( 'admin_init', array( $this, 'action_admin_init' ) );
	}
	
	function action_admin_init() {
		// only hook up these filters if we're in the admin panel, and the current user has permission
		// to edit posts and pages
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			add_filter( 'mce_buttons', array( $this, 'filter_mce_button' ) );
			add_filter( 'mce_external_plugins', array( $this, 'filter_mce_plugin' ) );
		}
	}
	
	function filter_mce_button( $buttons ) {
		// add a separation before our button, here our button's id is "ss_button"
		array_push( $buttons, '|', 'ss_button' );
		return $buttons;
	}
	
	function filter_mce_plugin( $plugins ) {
		// this plugin file will work the magic of our button
		$plugins['ss'] = plugin_dir_url( __FILE__ ) . '/admin/ss_shortcode_admin.js';
		return $plugins;
	}
}

$ss = new ss();