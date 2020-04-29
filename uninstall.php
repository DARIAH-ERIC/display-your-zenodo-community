<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://www.dariah.eu
 * @since      1.0.0
 *
 * @package    Display_Your_Zenodo_Community
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

/**
 * Delete postmeta from the option table when uninstalling the plugin.
 *
 */
$keys = array(
	'display-your-zenodo-community'
);

global $wpdb;
foreach ( $keys as $key ) {
	$wpdb->query(
		$wpdb->prepare(
			"
			 DELETE FROM $wpdb->postmeta
			 WHERE meta_key = %s
			",
			$key
		)
	);
}
