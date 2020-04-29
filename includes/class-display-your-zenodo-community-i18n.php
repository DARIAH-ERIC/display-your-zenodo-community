<?php
/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Display_Your_Zenodo_Community
 * @subpackage Display_Your_Zenodo_Community/includes
 * @author     Yoann <yoann.moranville@dariah.eu>
 */
class Display_Your_Zenodo_Community_i18n {
	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'display-your-zenodo-community',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
