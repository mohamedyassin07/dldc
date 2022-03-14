<?php
/**
 * Comment Like & Dislike
 *
 * @package       DLDC
 * @author        Mohamed Yassin
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Comment Like & Dislike
 * Plugin URI:    https://mydomain.com
 * Description:   Short Description
 * Version:       1.0.0
 * Author:        Mohamed Yassin
 * Author URI:    https://developeryassin.wordpress.com
 * Text Domain:   DLDC
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin Name
define( 'DLDC_NAME',			'Comment Like & Dislike' );

// Plugin Slug
define( 'DLDC_SLUG',			'DLDC' );

// Plugin version
define( 'DLDC_VERSION',		'1.0.0' );

// Plugin Root File
define( 'DLDC_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'DLDC_PLUGIN_BASE',	plugin_basename( DLDC_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'DLDC_PLUGIN_DIR',	plugin_dir_path( DLDC_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'DLDC_PLUGIN_URL',	plugin_dir_url( DLDC_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once DLDC_PLUGIN_DIR . 'class-DLDC.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Mohamed Yassin
 * @since   1.0.0
 * @return  object|DLDC
 */
function DLDC() {
	return DLDC::instance();
}

DLDC();