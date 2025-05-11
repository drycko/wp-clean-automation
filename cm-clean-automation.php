<?php
/**
 * Plugin Name: CM Clean Automation
 * Plugin URI:  https://cmetechsa.co.za/wp-clean-automation
 * Description: A WordPress plugin that disables commenting, deletes the "Hello Dolly" and "Akismet Anti-Spam: Spam Protection" plugins, and performs other basic tasks.
 * Version:     1.0
 * Author:      tino[at]cmetechsa.co.za
 * Author URI:  https://cmetechsa.co.za
 * License:     GPL2
 */

// Include all the separate functionality files
require_once plugin_dir_path(__FILE__) . 'includes/disable-comments.php';
require_once plugin_dir_path(__FILE__) . 'includes/delete-default-plugins.php';
require_once plugin_dir_path(__FILE__) . 'includes/basic-setup.php';

// Add actions if necessary in the main file or delegate them to individual files
