<?php

/**
 * Action and filter registration for the plugin.
 *
 * This class manages the registration of actions and filters for the plugin, allowing
 * hooks to be easily added and organized.
 *
 * @since 1.0.0
 * @package Easy_Woocommerce_Quick_View
 * @subpackage Easy_Woocommerce_Quick_View/includes
 */
class Easy_Woocommerce_Quick_View_Loader {

	/**
	 * The collection of actions registered with WordPress.
	 *
	 * @since 1.0.0
	 * @var array $actions The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $actions;

	/**
	 * The collection of filters registered with WordPress.
	 *
	 * @since 1.0.0
	 * @var array $filters The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $filters;

	/**
	 * Initialize the action and filter collections.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since 1.0.0
	 * @param string $hook The name of the WordPress action being registered.
	 * @param object $component A reference to the instance of the object on which the action is defined.
	 * @param string $callback The name of the function definition on the $component.
	 * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
	 * @param int $accepted_args Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since 1.0.0
	 * @param string $hook The name of the WordPress filter being registered.
	 * @param object $component A reference to the instance of the object on which the filter is defined.
	 * @param string $callback The name of the function definition on the $component.
	 * @param int $priority Optional. The priority at which the function should be fired. Default is 10.
	 * @param int $accepted_args Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Utility function to register actions and hooks into a collection.
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since 1.0.0
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

	}

}
