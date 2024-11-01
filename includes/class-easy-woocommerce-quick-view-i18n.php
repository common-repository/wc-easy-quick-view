<?php

/**
 * Internationalization functionality for the plugin.
 *
 * This class loads and defines the internationalization files, making the plugin ready for translation.
 *
 * @package Easy_Woocommerce_Quick_View
 * @subpackage Easy_Woocommerce_Quick_View/includes
 * @since 1.0.0
 */
class Easy_Woocommerce_Quick_View_i18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since 1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'easy-woo-quick-view',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
