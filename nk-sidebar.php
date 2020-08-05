<?php
/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            Lam Hoang
 * @copyright         2020 NK Nha Trang
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       NK Sidebar Plugin
 * Plugin URI:        https://wordpress.org/plugins/nksidebar-plugin/
 * Description:       Display Phone and Email buttons, they will expand on mouse hover. This plugin requires Font Awesome to work properly.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Lam Hoang
 * Author URI:        https://nknhatrang.com
 * Text Domain:       nksidebar-plugin
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */


require_once plugin_dir_path(__FILE__) . 'includes/nksb-functions.php';


if ( is_admin() ) {
    // we are in admin mode
    require_once plugin_dir_path(__FILE__) . 'admin/nk-sidebar-admin.php';
}

function nksb_styles(){
        wp_register_style('nksb-styles', plugins_url('/public/css/nksb-styles.css', __FILE__));
        wp_enqueue_style( 'nksb-styles' );
    }
add_action('wp_enqueue_scripts','nksb_styles');

function nksb_sidebar_links( $links ) {

	$links = array_merge( array(
		'<a href="' . esc_url( admin_url( 'admin.php?page=nksidebar-plugin/admin/settings.php' ) ) . '">' . __( 'Settings', 'textdomain' ) . '</a>'
	), $links );

	return $links;

}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'nksb_sidebar_links' );
