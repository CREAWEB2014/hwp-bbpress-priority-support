<?php
/**
 * Plugin Name: HWP bbPress Priority Support
 * Plugin URI:  http://wordpress.org/plugins
 * Description: Adds priority support features to bbPress. Requires Pods and the HWP Pods bbPress plugin.
 * Version:     0.1.0
 * Author:      Josh Pollock
 * Author URI:  
 * License:     GPLv2+
 * Text Domain: hwp_bps
 * Domain Path: /languages
 */

/**
 * Copyright (c) 2014 Josh Pollock (email : Josh@JoshPress.net)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or, at
 * your discretion, any later version, as published by the Free
 * Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

/**
 * Built using grunt-wp-plugin
 * Copyright (c) 2013 10up, LLC
 * https://github.com/10up/grunt-wp-plugin
 */

// Useful global constants
define( 'HWP_BPS_VERSION', '0.1.0' );
define( 'HWP_BPS_URL',     plugin_dir_url( __FILE__ ) );
define( 'HWP_BPS_PATH',    dirname( __FILE__ ) . '/' );

/**
 * Default initialization for the plugin:
 * - Registers the default textdomain.
 */
function hwp_bps_init() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'hwp_bps' );
	load_textdomain( 'hwp_bps', WP_LANG_DIR . '/hwp_bps/hwp_bps-' . $locale . '.mo' );
	load_plugin_textdomain( 'hwp_bps', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

/**
 * Activate the plugin
 */
function hwp_bps_activate() {
	// First load the init scripts in case any rewrite functionality is being loaded
	hwp_bps_init();

	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'hwp_bps_activate' );

/**
 * Deactivate the plugin
 * Uninstall routines should be in uninstall.php
 */
function hwp_bps_deactivate() {

}
register_deactivation_hook( __FILE__, 'hwp_bps_deactivate' );

// Wireup actions
add_action( 'init', 'hwp_bps_init' );

// Wireup filters

// Wireup shortcodes
