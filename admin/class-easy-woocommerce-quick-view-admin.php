<?php

/**
 * Admin functionality for the Easy WooCommerce Quick View plugin.
 *
 * This class defines the plugin's name, version, and handles the enqueuing
 * of admin-specific styles and JavaScript.
 *
 * @package    Easy_Woocommerce_Quick_View
 * @subpackage Easy_Woocommerce_Quick_View/admin
 * @since      1.0.0
 */
class Easy_Woocommerce_Quick_View_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Enqueue admin-specific styles.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-woocommerce-quick-view-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Enqueue admin-specific JavaScript.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-woocommerce-quick-view-admin.js', array( 'jquery' ), $this->version, false );

	}

}
