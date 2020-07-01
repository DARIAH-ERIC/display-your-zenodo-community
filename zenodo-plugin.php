<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.dariah.eu/
 * @since             0.0.1
 * @package           Display_Your_Zenodo_Community
 *
 * @wordpress-plugin
 * Plugin Name:       Display your Zenodo Publications
 * Plugin URI:        https://github.com/dariah-eric/display-your-zenodo-community
 * Description:       This plugin allows user to view their community data from Zenodo on WordPress
 * Version:           1.1.0
 * Author:            DARIAH-EU
 * Author URI:        https://www.dariah.eu
 * License:           Apache License - 2.0
 * License URI:       http://www.apache.org/licenses/LICENSE-2.0
 * Text Domain:       display-your-zenodo-community
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DISPLAY_YOUR_ZENODO_COMMUNITY_ROOT', dirname( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-display-your-zenodo-community-activator.php
 */
function activate_display_your_zenodo_community() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-display-your-zenodo-community-activator.php';
	Display_Your_Zenodo_Community_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-display-your-zenodo-community-deactivator.php
 */
function deactivate_display_your_zenodo_community() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-display-your-zenodo-community-deactivator.php';
	Display_Your_Zenodo_Community_Deactivator::deactivate();
}
register_activation_hook( __FILE__, 'activate_display_your_zenodo_community' );
register_deactivation_hook( __FILE__, 'deactivate_display_your_zenodo_community' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-display-your-zenodo-community.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_display_your_zenodo_community() {
	$plugin = new Display_Your_Zenodo_Community();
	$plugin->run();

    $display_your_zenodo_community_options = get_option( $plugin->get_plugin_name() );
}

run_display_your_zenodo_community();
