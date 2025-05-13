<?php
/**
 * Plugin Name: CM Clean Automation
 * Plugin URI:  https://plugins.cmetech.co.za/wp-clean-automation
 * Description: A WordPress plugin that disables commenting, deletes the "Hello Dolly" and "Akismet Anti-Spam: Spam Protection" plugins, and performs other basic tasks.
 * Version:     1.0.1
 * Author:      tino[at]cmetech.co.za
 * Author URI:  https://cmetech.co.za
 * License:     GPL2
 */
define( 'MY_PLUGIN_VERSION', '1.0.1' )

 // Define current version
if ( ! defined( 'MY_PLUGIN_VERSION' ) ) {
    define( 'MY_PLUGIN_VERSION', '1.0.1' );
}

// // Plugin activation hook
// register_activation_hook( __FILE__, 'my_plugin_activate' );
// function my_plugin_activate() {
//     update_option( 'my_plugin_version', MY_PLUGIN_VERSION );
// }

// // Version check on plugins_loaded
// add_action( 'plugins_loaded', 'my_plugin_upgrade_check' );
// function my_plugin_upgrade_check() {
//     $installed_version = get_option( 'my_plugin_version' );

//     if ( $installed_version !== MY_PLUGIN_VERSION ) {
//         my_plugin_run_upgrades( $installed_version );
//         update_option( 'my_plugin_version', MY_PLUGIN_VERSION );
//     }
// }

// // Upgrade routine
// function my_plugin_run_upgrades( $installed_version ) {
//     if ( version_compare( $installed_version, '1.0.0', '<' ) ) {
//         error_log( 'Upgrading plugin from version ' . $installed_version . ' to 1.0.0' );
//     }
//     // Add future upgrade steps here...
// }

require 'includes/plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$updateChecker = PucFactory::buildUpdateChecker(
    'https://plugins.cmetech.co.za/updates/packages/?slug=wp-clean-automation',
    __FILE__,
    'wp-clean-automation'
);


// Include all the separate functionality files
require_once plugin_dir_path(__FILE__) . 'includes/disable-comments.php';
require_once plugin_dir_path(__FILE__) . 'includes/delete-default-plugins.php';
require_once plugin_dir_path(__FILE__) . 'includes/basic-setup.php';

// Add actions if necessary in the main file or delegate them to individual files
