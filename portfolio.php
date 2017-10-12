<?php
/*
Plugin Name:  APBD Portfolio
Plugin URI:   http://andproductionbd.com/apbd-portfolios.zip
Description:  An image sliding portfolios plugin that will add a portfolios section to your WordPress website
Version:      1.0
Author:       Asadullah Al Galib
Author URI:   http://andproductionbd.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  apbd
*/

if( !function_exists( 'add_action' ) ){
    die( 'Hello there! I am just a plugin and I can\'t do anything without WordPress installation.' );
}

//setup
define( 'APBD_PORTFOLIO_PLUGIN_URL', __FILE__ );
define( 'APBD_PORTFOLIO_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );


//includes
include_once( 'includes/activate.php' );
include_once( 'includes/init.php' );
include_once( 'includes/admin/init.php' );
include_once( 'includes/scripts.php' );
include_once( 'includes/shortcode/template.php' );
include_once( 'includes/process/save-post.php' );
include_once( 'includes/templates/template-init.php' );
require_once dirname( __FILE__ ) . '/includes/admin/shortcode-generator.php';
require_once dirname( __FILE__ ) . '/includes/admin/options/src/class.settings-api.php';
require_once dirname( __FILE__ ) . '/includes/admin/options/options-settings/settings.php';
include_once( 'includes/assets/css/dynamic-style.php' );

//hooks
register_activation_hook( __FILE__, 'apbd_activate_plugin' );
add_action( 'init', 'apbd_init' );
add_action( 'wp_enqueue_scripts', 'apbd_image_portfolios_enqueue_scripts' );
add_action( 'admin_init', 'portfolios_admin_init' );
add_action( 'save_post_portfolios', 'apbd_save_post_admin', 10, 3 );
//add_filter( 'template_include', 'apbd_portfolios_locate_template');
add_filter( 'single_template', 'change_portfolios_single_template' );
add_action( 'wp_head', 'apbd_dynamic_style_enqueue' );


//shortcodes
add_shortcode( 'apbd_portfolios', 'apbd_portfolios_shortcode' );

//php Class to execute plugin option
new APBD_Settings_API_Test();