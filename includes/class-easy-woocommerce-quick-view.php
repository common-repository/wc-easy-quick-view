<?php

/**
 * Core plugin class.
 *
 * This class defines the core functionality of the plugin, including internationalization,
 * admin and public hooks, and plugin settings.
 *
 * @since 1.0.0
 * @package Easy_Woocommerce_Quick_View
 * @subpackage Easy_Woocommerce_Quick_View/includes
 */
class Easy_Woocommerce_Quick_View {

	/**
	 * The loader responsible for maintaining and registering all hooks that power the plugin.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var Easy_Woocommerce_Quick_View_Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * The single instance of the class.
	 */
	protected static $instance;

    /**
     * Returns the single instance of the class.
     *
     * @return Easy_Woocommerce_Quick_View Singleton instance of the class.
     */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and version, load dependencies, define locale, and set hooks for admin
	 * and public-facing sides of the site.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		if ( defined( 'EASY_WOO_QUICK_VIEW_VERSION' ) ) {
			$this->version = EASY_WOO_QUICK_VIEW_VERSION;
		} else {
			$this->version = '1.2.0';
		}
		$this->plugin_name = 'easy-woo-quick-view';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->register_settings();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Includes files that make up the plugin:
	 * - Easy_Woocommerce_Quick_View_Loader: Orchestrates the hooks of the plugin.
	 * - Easy_Woocommerce_Quick_View_i18n: Defines internationalization functionality.
	 * - Easy_Woocommerce_Quick_View_Admin: Defines hooks for the admin area.
	 * - Easy_Woocommerce_Quick_View_Public: Defines hooks for the public side of the site.
	 * - Various other plugin components.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function load_dependencies() {

		/**Load required dependencies and initiate plugin functionalities. */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-easy-woocommerce-quick-view-loader.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-easy-woocommerce-quick-view-i18n.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-easy-woocommerce-quick-view-admin.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-easy-woocommerce-quick-view-public.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'libs/codestar-framework/codestar-framework.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/frontend/class-easy-woocommerce-quick-view-btn.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/frontend/class-easy-woocommerce-quick-view-ajax.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/backend/class-easy-woocommerce-quick-settings.php';

		$this->loader = new Easy_Woocommerce_Quick_View_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Sets the domain and registers the hook with WordPress.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function set_locale() {

		$plugin_i18n = new Easy_Woocommerce_Quick_View_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register hooks related to the admin area functionality of the plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Easy_Woocommerce_Quick_View_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register hooks related to the public-facing functionality of the plugin.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function define_public_hooks() {

		$plugin_public = new Easy_Woocommerce_Quick_View_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since 1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * Get the plugin name.
	 *
	 * @since 1.0.0
	 * @return string The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Get the loader instance.
	 *
	 * @since 1.0.0
	 * @return Easy_Woocommerce_Quick_View_Loader Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Get the version number of the plugin.
	 *
	 * @since 1.0.0
	 * @return string The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Register plugin settings.
	 *
	 * @access private
	 */
    private function register_settings() {
        $plugin_settings = new Easy_WooCommerce_Quick_View_Settings();
        $plugin_settings->register_easy_woo_quick_view_options_settings();
    }

}


