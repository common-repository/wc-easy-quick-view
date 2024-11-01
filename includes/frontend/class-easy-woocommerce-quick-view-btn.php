<?php

require_once EASY_WOO_QUICK_VIEW_PATH . 'includes/backend/class-easy-woocommerce-quick-settings.php';

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Easy_WooCommerce_Quick_View_Btn.
 *
 * This class manages the integration of the quick view button into WooCommerce shop loop items. It determines
 * the placement of the quick view button based on user settings and conditionally displays the button HTML.
 *
 * @since 1.0.0
 */
class Easy_WooCommerce_Quick_View_Btn {

    /**
     * The single instance of the class.
     */
    protected static $instance;

    /**
     * Returns the single instance of the class.
     *
     * @return Easy_WooCommerce_Quick_View_Btn Singleton instance of the class.
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Class Constructor.
     *
     * This constructor initializes the Easy_WooCommerce_Quick_View_Settings and determines the placement
     * of the quick view button on WooCommerce shop loop items based on user settings. The placement can
     * be configured to display the button over the product image, after the title, after the rating,
     * after the price, before the add to cart button, or after the add to cart button.
     *
     * @since 1.0.0
     */
    public function __construct() {
        /** Get the user settings for Easy WooCommerce Quick View. */
        $settings       = Easy_WooCommerce_Quick_View_Settings::get_settings();

        /** Determine the position of the quick view button based on user settings. */
        $ewqv_position  = isset($settings['ewqv_btn_position']) ? $settings['ewqv_btn_position'] : '';
        
        if ( ! empty( $ewqv_position ) ) {
            /** Based on the selected position, add the appropriate action hook to display the button. */
            switch ($ewqv_position) {
                case 'over_product_image':
                    add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 9 );
                    break;
                case 'over_product_image_hover':
                    add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 10);
                    break;
                case 'after_title':
                    add_action( 'woocommerce_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 11 );
                    break;
                case 'after_rating':
                    add_action( 'woocommerce_after_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 6 );
                    break;
                case 'after_price':
                    add_action( 'woocommerce_after_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 11 );
                    break;
                case 'before_add_to_cart':
                    add_action( 'woocommerce_after_shop_loop_item', [ $this, 'add_easy_woo_quick_view_button' ], 9 );
                    break;
                case 'after_add_to_cart':
                    add_action( 'woocommerce_after_shop_loop_item', [ $this, 'add_easy_woo_quick_view_button' ], 11 );
                    break;
                default:
                    add_action( 'woocommerce_after_shop_loop_item', [ $this, 'add_easy_woo_quick_view_button' ], 11 );
                    break;
            }
        }   

	}

    /**
     * Adds the quick view button if enabled by user settings.
     */
    public function add_easy_woo_quick_view_button(){
        /** Get the user settings for Easy WooCommerce Quick View. */
        $settings       = Easy_WooCommerce_Quick_View_Settings::get_settings();
        $ewqv_switch    = isset( $settings['ewqv_switch'] ) ? $settings['ewqv_switch'] : false;
        if($ewqv_switch){
            echo  $this->add_easy_woo_quick_view_buton_html();
        }

    }

    /**
     * Generates HTML for the quick view button.
     *
     * @return string HTML for the quick view button.
     */
    public function add_easy_woo_quick_view_buton_html() {
        /** Get the user settings for Easy WooCommerce Quick View. */
        $settings       = Easy_WooCommerce_Quick_View_Settings::get_settings();
        $ewqv_btn_label = $settings['ewqv_btn_label'];

        global $product;
        $product_id     = $product->get_id();
        $label          = esc_html__($ewqv_btn_label, 'easy-woo-quick-view');
        
        return '<button id="easy_woo_quick_view_btn" class="easy_woo_quick_view_btn button" data-product-id="'. $product_id .'">'. $label .'</button>';
    }
}

/** Initialize the class instance. */
Easy_WooCommerce_Quick_View_Btn::get_instance();