<?php

require_once EASY_WOO_QUICK_VIEW_PATH . 'includes/backend/class-easy-woocommerce-quick-settings.php';

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Easy_Woocommerce_Quick_View
 * @subpackage Easy_Woocommerce_Quick_View/public
 */
class Easy_Woocommerce_Quick_View_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register and enqueue the stylesheets for the public-facing side of the site.
	 *
	 * This function is responsible for registering and enqueuing all the necessary
	 * stylesheets required for the Easy WooCommerce Quick View plugin to enhance the
	 * visual presentation and functionality of the site on the front end.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {

		/** Retrieve settings from the plugin's options page. */
		$settings  							= Easy_WooCommerce_Quick_View_Settings::get_settings();

		/** Retrieve general button settings for border radious. */
        $ewqv_btn_border_radius_top        	= isset($settings['ewqv_btn_border_radius_top']) ? $settings['ewqv_btn_border_radius_top'] : '';
        $ewqv_btn_border_radius_right      	= isset($settings['ewqv_btn_border_radius_right']) ? $settings['ewqv_btn_border_radius_right'] : '';
        $ewqv_btn_border_radius_bottom     	= isset($settings['ewqv_btn_border_radius_bottom']) ? $settings['ewqv_btn_border_radius_bottom'] : '';
        $ewqv_btn_border_radius_left       	= isset($settings['ewqv_btn_border_radius_left']) ? $settings['ewqv_btn_border_radius_left'] : '';

		/** Retrieve button icon settings */
		$ewqv_icon_switch 					= isset( $settings['ewqv_icon_switch'] ) ? $settings['ewqv_icon_switch'] : '';
        $ewqv_btn_icon_font_size       		= isset($settings['ewqv_btn_icon_font_size']) ? $settings['ewqv_btn_icon_font_size'] : '';
        $ewqv_icon_only_switch       		= isset($settings['ewqv_icon_only_switch']) ? $settings['ewqv_icon_only_switch'] : '';
        $ewqv_icon_btn_style       			= isset($settings['ewqv_icon_btn_style']) ? $settings['ewqv_icon_btn_style'] : '';

		/** Retrieve button alignment settings. */
		$ewqv_btn_align_position_top       	= isset($settings['ewqv_btn_align_position_top']) ? $settings['ewqv_btn_align_position_top'] : '';
		$ewqv_btn_align_position_top_left   = isset($settings['ewqv_btn_align_position_top_left']) ? $settings['ewqv_btn_align_position_top_left'] : '';
		$ewqv_btn_align_position_top_right  = isset($settings['ewqv_btn_align_position_top_right']) ? $settings['ewqv_btn_align_position_top_right'] : '';

		/** Retrieve modal window settings. */
		$ewqv_modal_width					= isset($settings['ewqv_modal_width_height']['width']) ? $settings['ewqv_modal_width_height']['width'] : '';
		$ewqv_modal_height					= isset($settings['ewqv_modal_width_height']['height']) ? $settings['ewqv_modal_width_height']['height'] : '';
		$ewqv_modal_z_index					= isset($settings['ewqv_modal_z_index']) ? $settings['ewqv_modal_z_index'] : '';
		$ewqv_close_btn_switch				= isset($settings['ewqv_close_btn_switch']) ? $settings['ewqv_close_btn_switch'] : '';
		$ewqv_review_link_switch			= isset($settings['ewqv_review_link_switch']) ? $settings['ewqv_review_link_switch'] : '';

		/** Retrieve modal slider settings */
		$ewqv_slider_dot_switch				= isset($settings['ewqv_slider_dot_switch']) ? $settings['ewqv_slider_dot_switch'] : '';
		$ewqv_slider_btn_icon_size			= isset($settings['ewqv_slider_btn_icon_size']) ? $settings['ewqv_slider_btn_icon_size'] : '';
		$ewqv_slider_btn_icon_color			= isset($settings['ewqv_slider_btn_icon_color']) ? $settings['ewqv_slider_btn_icon_color'] : '';
		$ewqv_slider_btn_icon_hover_color	= isset($settings['ewqv_slider_btn_icon_hover_color']) ? $settings['ewqv_slider_btn_icon_hover_color'] : '';
		$ewqv_slider_btn_icon_bg_color		= isset($settings['ewqv_slider_btn_icon_bg_color']) ? $settings['ewqv_slider_btn_icon_bg_color'] : '';
		$ewqv_slider_btn_icon_bg_hover_color= isset($settings['ewqv_slider_btn_icon_bg_hover_color']) ? $settings['ewqv_slider_btn_icon_bg_hover_color'] : '';

		/** Retrieve modal cart button settings */
		$ewqv_cart_btn_border_radius_top    = isset($settings['ewqv_content_add_to_cart_btn_border_radius_top']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_top'] : '';
        $ewqv_cart_btn_border_radius_right  = isset($settings['ewqv_content_add_to_cart_btn_border_radius_right']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_right'] : '';
        $ewqv__cart_btn_border_radius_bottom= isset($settings['ewqv_content_add_to_cart_btn_border_radius_bottom']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_bottom'] : '';
        $ewqv_cart_btn_border_radius_left   = isset($settings['ewqv_content_add_to_cart_btn_border_radius_left']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_left'] : '';

		/** Retrieve scrollbar background color. */
        $ewqv_scrollbar_bg   			    = isset($settings['ewqv_scrollbar_bg']) ? $settings['ewqv_scrollbar_bg'] : '';
		
		/** Retrieve content variation description setting. */
        $ewqv_content_variation_description = isset($settings['ewqv_content_variation_description']) ? $settings['ewqv_content_variation_description'] : '';

		/** Retrieve button position and icon margin settings. */
        $ewqv_btn_position 					= isset($settings['ewqv_btn_position']) ? $settings['ewqv_btn_position'] : '';
        $ewqv_btn_icon_select 				= isset($settings['ewqv_btn_icon_select']) ? $settings['ewqv_btn_icon_select'] : '';
        $ewqv_btn_icon_margin_right 		= isset($settings['ewqv_btn_icon_margin_right']['right']) ? $settings['ewqv_btn_icon_margin_right']['right'] : '';
        $ewqv_btn_icon_margin_left 			= isset($settings['ewqv_btn_icon_margin_left']['left']) ? $settings['ewqv_btn_icon_margin_left']['left'] : '';

		/** Retrieve loading animation settings. */
        $ewqv_loading_switch 			= isset($settings['ewqv_loading_switch']) ? $settings['ewqv_loading_switch'] : '';

        ?>

        <style>
			/**
			* CSS Styles for Easy WooCommerce Quick View Plugin
			*
			* This section of CSS code defines styles for various elements and behaviors
			* associated with the Easy WooCommerce Quick View plugin on the front end.
			* It includes styles for buttons, icons, modal windows, scrollbars, and more.
			*
			* @since 1.0.0
			*/
            .easy_woo_quick_view_btn {
                transition: ease-in-out .5s !important;
            }
			.easy_woo_quick_view_btn i {
				font-size: <?php echo $ewqv_btn_icon_font_size; ?>px !important;
			}
			.easy-wqv-summary-content::-webkit-scrollbar-thumb {
				background: <?php echo $ewqv_scrollbar_bg; ?>!important;
			}
			.easy_woo_quick_view_btn {
				border-top-left-radius:     <?php echo $ewqv_btn_border_radius_top; ?>px!important;
				border-top-right-radius:    <?php echo $ewqv_btn_border_radius_right; ?>px!important;
				border-bottom-right-radius: <?php echo $ewqv_btn_border_radius_bottom; ?>px!important;
				border-bottom-left-radius:  <?php echo $ewqv_btn_border_radius_left; ?>px!important;
			}
			.easy-wqv-summary-content .cart .single_add_to_cart_button {
				transition: ease-in-out .5s !important;
				border-top-left-radius:     <?php echo $ewqv_cart_btn_border_radius_top; ?>px!important;
				border-top-right-radius:    <?php echo $ewqv_cart_btn_border_radius_right; ?>px!important;
				border-bottom-right-radius: <?php echo $ewqv__cart_btn_border_radius_bottom; ?>px!important;
				border-bottom-left-radius:  <?php echo $ewqv_cart_btn_border_radius_left; ?>px!important;
			}
			.easy-wqv-product-modal {
				max-width: <?php echo $ewqv_modal_width ; ?>px !important;
			}
			.easy-wqv-product-modal {
				max-height: <?php echo $ewqv_modal_height ; ?>px !important;
			}
			.easy-wqv-product-modal .slick-arrow i {
				font-size: <?php echo $ewqv_slider_btn_icon_size ; ?>px !important;
			}
			.easy-wqv-product-modal .slick-arrow {
				color: <?php echo $ewqv_slider_btn_icon_color ; ?> !important;
				background-color: <?php echo $ewqv_slider_btn_icon_bg_color ; ?> !important;
				transition: ease-in-out .5s !important;
			}
			.easy-wqv-product-modal .slick-arrow:hover {
				color: <?php echo $ewqv_slider_btn_icon_hover_color ; ?> !important;
				background-color: <?php echo $ewqv_slider_btn_icon_bg_hover_color ; ?> !important;
			}
			<?php if($ewqv_icon_switch && $ewqv_icon_only_switch == '1' && $ewqv_icon_btn_style == 'square'): ?>
				button.easy_woo_quick_view_btn {
					font-size: 0px !important;
					width: 38px !important;
					height: 38px !important;
					margin: 0 !important;
					padding: 0 !important;
				}
			<?php endif; ?>
			<?php if($ewqv_icon_switch && $ewqv_icon_only_switch == '1' && $ewqv_icon_btn_style == 'round'): ?>
				button.easy_woo_quick_view_btn {
					font-size: 0px !important;
					width: 38px !important;
					height: 38px !important;
					margin: 0 !important;
					padding: 0 !important;
					border-radius: 50% !important;
				}
			<?php endif; ?>
			<?php if($ewqv_icon_switch && $ewqv_icon_only_switch == '1' && $ewqv_icon_btn_style == 'rounded_square'): ?>
				button.easy_woo_quick_view_btn {
					font-size: 0px !important;
					width: 38px !important;
					height: 38px !important;
					margin: 0 !important;
					padding: 0 !important;
					border-radius: 20% !important;
				}
			<?php endif; ?>
			<?php if($ewqv_btn_position == 'over_product_image'): ?>
				button.easy_woo_quick_view_btn {
					position: absolute !important;
					top: 	<?php echo $ewqv_btn_align_position_top; ?>px !important;
					left: 	<?php echo $ewqv_btn_align_position_top_left; ?>px !important;
					right: 	<?php echo $ewqv_btn_align_position_top_right; ?>px !important;
				}
			<?php endif; ?>
			<?php if($ewqv_btn_position == 'over_product_image_hover'): ?>
				button.easy_woo_quick_view_btn {
					position: absolute !important;
					opacity: 0;
					top: 	<?php echo $ewqv_btn_align_position_top; ?>px !important;
					left: 	<?php echo $ewqv_btn_align_position_top_left; ?>px !important;
					right: 	<?php echo $ewqv_btn_align_position_top_right; ?>px !important;
				}
				.woocommerce-LoopProduct-link:hover .easy_woo_quick_view_btn {
					opacity: 1;
				} 
			<?php endif; ?>
			<?php if($ewqv_btn_icon_select == 'before'): ?>
				.easy_woo_quick_view_btn i {
					margin-right: <?php echo $ewqv_btn_icon_margin_right ; ?>px;
				}
			<?php endif; ?>
			<?php if($ewqv_btn_icon_select == 'after'): ?>
				.easy_woo_quick_view_btn i {
					margin-left: <?php echo $ewqv_btn_icon_margin_left ; ?>px;
				}
			<?php endif; ?>
			<?php if(array_key_exists('ewqv_modal_z_index', $settings)): ?>
				.mfp-bg.mfp-ewqv {
					z-index: <?php echo esc_html($settings['ewqv_modal_z_index']);?>!important;
				}
			<?php endif; ?>
			<?php if($ewqv_close_btn_switch == '0') : ?>
				.easy-wqv-product-modal .mfp-close {
					display: none;
				}
			<?php endif; ?>	
			<?php if($ewqv_review_link_switch == '0') : ?>
				.easy-wqv-summary-content .woocommerce-product-rating .woocommerce-review-link {
					display: none;
				}
			<?php endif; ?>	
			<?php if($ewqv_content_variation_description == '0') : ?>
				.easy-wqv-summary-content .woocommerce-variation-description {
					display: none;
				}
			<?php endif; ?>	
			<?php if($ewqv_slider_dot_switch == '0') : ?>
				.easy-wqv-product-modal .easy-wqv-product-images-slider .slick-dots {
					display: none !important;
				}
			<?php endif; ?>
			<?php if($ewqv_loading_switch == '0') : ?>
				.loading-overlay .loading-text {
					display: none !important;
				}
			<?php endif; ?>
        </style>
        <?php

		/** Enqueue the Font Awesome CSS for the public-facing side of the site. */
		wp_enqueue_style( $this->plugin_name. '-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), $this->version, 'all' );

		/** Enqueue the Slick CSS for the public-facing side of the site. */
		wp_enqueue_style( $this->plugin_name. '-slick', plugin_dir_url( __FILE__ ) . 'css/slick.min.css', array(), $this->version, 'all' );

		/** Enqueue the Magnific CSS for the public-facing side of the site. */
		wp_enqueue_style( $this->plugin_name.'-magnific', plugin_dir_url( __FILE__ ) . 'css/easy-woocommerce-quick-view-public-magnific.css', array(), $this->version, 'all' );
		
		/** Enqueue the main plugin CSS for the public-facing side of the site. */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-woocommerce-quick-view-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Enqueue JavaScript for the public-facing side of the WordPress site.
	 *
	 * This function registers and enqueues several JavaScript files necessary for
	 * the functionality of the plugin. It also localizes scripts to make certain
	 * data available to the JavaScript files.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		/** Enqueue the WooCommerce "Add to Cart" variation script. */
		wp_enqueue_script( 'wc-add-to-cart-variation' );

		/** Enqueue the Slick JavaScript file for the public-facing side of the site. */
		wp_enqueue_script( $this->plugin_name.'-slick', plugin_dir_url( __FILE__ ) . 'js/easy-woocommerce-quick-view-public-slick.min.js', array( 'jquery' ), $this->version, false );

		/** Enqueue the Magnific JavaScript file for the public-facing side of the site. */
		wp_enqueue_script( $this->plugin_name.'-magnific', plugin_dir_url( __FILE__ ) . 'js/easy-woocommerce-quick-view-public-magnific.js', array( 'jquery' ), $this->version, false );

		/** Enqueue the main plugin JavaScript file for the public-facing side of the site.*/
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-woocommerce-quick-view-public.js', array( 'jquery' ), $this->version, false );

		/** Localize the main script with essential data. */
		wp_localize_script($this->plugin_name, 'easy_woocommerce_quick_view', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'nonce'    => wp_create_nonce( 'easy_woocommerce_quick_view_nonce' ),
		));
		
		/** Retrieve settings from the plugin's options page. */
		$settings 				= Easy_WooCommerce_Quick_View_Settings::get_settings();

		/** Retrieve settings related to icons and buttons. */
		$ewqv_icon_switch 		= isset( $settings['ewqv_icon_switch'] ) ? $settings['ewqv_icon_switch'] : '';
		$ewqv_btn_icon 			= isset( $settings['ewqv_btn_icon'] ) ? $settings['ewqv_btn_icon'] : '';
		$ewqv_btn_icon_select 	= isset( $settings['ewqv_btn_icon_select'] ) ? $settings['ewqv_btn_icon_select'] : '';

		/** Retrieve settings for slider button icons. */
		$ewqv_slider_btn_left_icon				= isset($settings['ewqv_slider_btn_left_icon']) ? $settings['ewqv_slider_btn_left_icon'] : '';
		$ewqv_slider_btn_right_icon				= isset($settings['ewqv_slider_btn_right_icon']) ? $settings['ewqv_slider_btn_right_icon'] : '';

		/** Retrieve loading animation text. */
		$ewqv_loading_text 						= isset($settings['ewqv_loading_text']) ? $settings['ewqv_loading_text'] : '';

		/** Localize script with button icon data if icon switch is enabled. */
		if ($ewqv_icon_switch) {
			wp_localize_script($this->plugin_name, 'ewqv_btn', array(
				'icon' 			=> $ewqv_btn_icon,
				'icon_position' => $ewqv_btn_icon_select,
			));
		}

		/** Localize script with slider button icon data. */
		wp_localize_script($this->plugin_name, 'ewqv_slidrt_icon', array(
			'left' 				=> $ewqv_slider_btn_left_icon,
			'right' 			=> $ewqv_slider_btn_right_icon,
		));

		/** Localize script with loading animation text. */
		wp_localize_script($this->plugin_name, 'loading', array(
			'animation_text' 	=> $ewqv_loading_text,
		));
	}

}
