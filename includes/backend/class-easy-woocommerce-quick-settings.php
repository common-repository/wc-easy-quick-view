<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Easy_WooCommerce_Quick_View_Settings {

    /**
     * Plugin settings prefix.
     *
     * @var string
     */
    public static $prefix = EASY_WOO_QUICK_VIEW_SLUG;

    /**
     * The single instance of the class.
     */
    protected static $instance;

    /**
     * Returns single instance of the class
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct() {

	}

    public function register_easy_woo_quick_view_options_settings(){

            /** Set a unique slug-like ID */
            $prefix = EASY_WOO_QUICK_VIEW_SLUG;
        
            /** Plugin options */
            CSF::createOptions( $prefix, array(
            'menu_title'        => esc_html__('Easy Woo Quick View', 'easy-woo-quick-view'),
            'menu_slug'         => 'easy-woo-quick-view',
            'menu_type'         => 'menu',
            'ajax_save'         => true,
            'show_reset_all'    => false,
            'show_search'       => false,
            'show_footer'       => false,
            'show_all_options'  => false,
            'show_sub_menu'     => false,
            'show_reset_section'=> false,
            'nav'               => 'inline',
            'theme'             => 'light',
            'class'             => 'easy_woo_quick_view_framework',
            'menu_position'     => 59,
            'framework_title'   => esc_html__( 'Easy WooCommerce Quick View Settings', 'easy-woo-quick-view' ),
            /** footer */
            'footer_text'       => '',
            'footer_after'      => '',
            'footer_credit'     => '',
            ) );
        
            /** General Settings */
            CSF::createSection( $prefix, array(
            'name'   => 'ewqv_general_settings',
            'title'  => esc_html__( 'Button', 'easy-woo-quick-view' ),
            'fields' => array(
                array(
                    'id'        => 'ewqv_switch',
                    'type'      => 'switcher',
                    'default'   => true,
                    'output'    => '.easy_woo_quick_view_btn',
                    'title'     => esc_html__( 'Enable quick view', 'easy-woo-quick-view' ),
                ), 
                array(
                    'id'        => 'ewqv_btn_position',
                    'type'      => 'select',
                    'title'     => esc_html__( 'Position', 'easy-woo-quick-view' ),
                    'subtitle'  => esc_html__( 'Choose the placement of the quick view button.', 'easy-woo-quick-view' ),
                    'options'   => array(
                        'over_product_image'        => esc_html__( 'Over product image', 'easy-woo-quick-view' ),
                        'over_product_image_hover'  => esc_html__( 'Over product image hover', 'easy-woo-quick-view' ),
                        'after_title'               => esc_html__( 'After title', 'easy-woo-quick-view' ),
                        'after_rating'              => esc_html__( 'After rating', 'easy-woo-quick-view' ),
                        'after_price'               => esc_html__( 'After price', 'easy-woo-quick-view' ),
                        'before_add_to_cart'        => esc_html__( 'Before add to cart button', 'easy-woo-quick-view' ),
                        'after_add_to_cart'         => esc_html__( 'After add to cart button', 'easy-woo-quick-view' ),
                    ),
                    'default'   => 'after_add_to_cart',
                ),
                array(
                    'id'            => 'ewqv_btn_label',
                    'type'          => 'text',
                    'title'         => esc_html__( 'Text', 'easy-woo-quick-view' ),
                    'default'       => esc_html__( 'Quick View', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'            => 'ewqv_icon_switch',
                    'type'          => 'switcher',
                    'default'       => false,
                    'title'         => esc_html__( 'Enable icon', 'easy-woo-quick-view' ),
                    'desc'          => esc_html__( 'To display only the icon, remove the button text.', 'easy-woo-quick-view' ),
                ), 
                array(
                    'id'            => 'ewqv_btn_icon',
                    'type'          => 'icon',
                    'title'         => esc_html__( 'Icon', 'easy-woo-quick-view' ),
                    'default'       => 'far fa-eye',
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'            => 'ewqv_btn_icon_font_size',
                    'type'          => 'number',
                    'unit'          => 'px',
                    'title'         => esc_html__( 'Icon font size', 'boomdevs-toc' ),
                    'default'       => 16,
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'                => 'ewqv_btn_icon_font_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Icon color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy_woo_quick_view_btn i',
                    'default'           => esc_html__( '#fff', 'easy-woo-quick-view' ),
                    'dependency'        => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'                => 'ewqv_btn_icon_select',
                    'type'              => 'select',
                    'title'             => esc_html__( 'Icon position', 'easy-woo-quick-view' ),
                    'options' => array(
                      'before'  => 'Before',
                      'after'   => 'After',
                    ),
                    'default'          => 'before',
                    'dependency'       => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'            => 'ewqv_btn_icon_margin_right',
                    'type'          => 'spacing',
                    'title'         => esc_html__( 'Icon margin right', 'easy-woo-quick-view' ),
                    'output_mode'   => 'margin',
                    'top'           => false,
                    'bottom'        => false,
                    'right'         => true,
                    'left'          => false,
                    'default'=> array(
                        'right'  => '0',
                        'unit'   => 'px',
                    ),
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'            => 'ewqv_btn_icon_margin_left',
                    'type'          => 'spacing',
                    'title'         => esc_html__( 'Icon margin left', 'easy-woo-quick-view' ),
                    'output_mode'   => 'margin',
                    'top'           => false,
                    'bottom'        => false,
                    'right'         => false,
                    'left'          => true,
                    'default'=> array(
                        'left'   => '0',
                        'unit'   => 'px',
                    ),
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true')
                ),
                array(
                    'id'            => 'ewqv_icon_only_switch',
                    'type'          => 'switcher',
                    'default'       => false,
                    'title'         => esc_html__( 'Enable icon only', 'easy-woo-quick-view' ),
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'            => 'ewqv_icon_btn_style',
                    'type'          => 'select',
                    'title'         => esc_html__( 'Icon button style', 'easy-woo-quick-view' ),
                    'options'=> array(
                        'square'        => esc_html__( 'Square', 'easy-woo-quick-view' ),
                        'round'         => esc_html__( 'Round', 'easy-woo-quick-view' ),
                        'rounded_square'=> esc_html__( 'Rounded square', 'easy-woo-quick-view' ),
                    ),
                    'default'       => 'square',
                    'dependency'    => array( 'ewqv_icon_only_switch', '==', 'true' )
                ),
                array(
                    'id'         => 'ewqv_btn_align_position_top',
                    'type'       => 'number',
                    'unit'       => 'px',
                    'title'      => esc_html__( 'Top', 'boomdevs-toc' ),
                    'desc'       => esc_html__( 'Position top works when you select Over Product Image or Over Product Image options', 'easy-woo-quick-view' ),
                    'default'    => 0,
                ),
                array(
                    'id'         => 'ewqv_btn_align_position_top_left',
                    'type'       => 'number',
                    'unit'       => 'px',
                    'title'      => esc_html__( 'Top left', 'boomdevs-toc' ),
                    'desc'       => esc_html__( 'Position top left works when you select Over Product Image or Over Product Image options', 'easy-woo-quick-view' ),
                    'default'    => '',
                ),
                array(
                    'id'         => 'ewqv_btn_align_position_top_right',
                    'type'       => 'number',
                    'unit'       => 'px',
                    'title'      => esc_html__( 'Top right', 'boomdevs-toc' ),
                    'default'    => '',
                    'desc'       => esc_html__( 'Position top right works when you select Over Product Image or Over Product Image options', 'easy-woo-quick-view' ),
                ),           
                array(
                    'id'               => 'ewqv_btn_font_family',
                    'title'            => esc_html__( 'Typography', 'easy-woo-quick-view' ),
                    'type'             => 'typography',
                    'output'           => 'a.easy_woo_quick_view_btn',
                    'output_important' => true,
                    'font_family'      => true,
                    'font_weight'      => true,
                    'subset'           => true,
                    'font_style'       => true,
                    'font_size'        => true,
                    'line_height'      => true,
                    'letter_spacing'   => true,
                    'text_align'       => true,
                    'text_transform'   => true,
                    'color'            => false,
                    'default'          => array(
                        'font-family'  => '',
                        'font-size'    => '16',
                        'font-weight'  => '500',
                        'unit'         => 'px',
                        'type'         => 'google',
                    ),
                ),
                array(
                    'id'                => 'ewqv_btn_bg_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Background color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background-color',
                    'output_important'  => true,
                    'output'            => '.easy_woo_quick_view_btn',
                    'default'           => esc_html__( '#eb7a61', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_btn_bg_hover_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Background hover color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background-color',
                    'output_important'  => true,
                    'output'            => '.easy_woo_quick_view_btn:hover',
                    'default'           => esc_html__( '#15c7a4', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_btn_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Text color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy_woo_quick_view_btn',
                    'default'           => esc_html__( '#fff', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_btn_hover_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Text hover color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy_woo_quick_view_btn:hover',
                    'default'           => esc_html__( '#fff', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_btn_padding',
                    'type'              => 'spacing',
                    'title'             => esc_html__( 'Padding', 'easy-woo-quick-view' ),
                    'output'            => '.easy_woo_quick_view_btn',
                    'output_mode'       => 'padding',
                    'output_important'  => true,
                    'default'           => array(
                        'top'    => '10',
                        'right'  => '16',
                        'bottom' => '10',
                        'left'   => '16',
                        'unit'   => 'px',
                    ),
                ),
                array(
                    'id'                => 'ewqv_btn_margin',
                    'type'              => 'spacing',
                    'title'             => esc_html__( 'Margin', 'easy-woo-quick-view' ),
                    'output'            => '.easy_woo_quick_view_btn',
                    'output_mode'       => 'margin',
                    'output_important'  => true,
                    'default'           => array(
                        'top'    => '16',
                        'right'  => '0',
                        'bottom' => '0',
                        'left'   => '0',
                        'unit'   => 'px',
                    ),
                ),
                array(
                    'id'                => 'ewqv_btn_border',
                    'type'              => 'border',
                    'title'             => esc_html__( 'Border', 'easy-woo-quick-view' ),
                    'output'            => '.easy_woo_quick_view_btn',
                    'output_important'  => true,
                    'default'           => array(
                        'style'  => 'solid',
                        'color'  => '#ffffff',
                        'top'    => '0',
                        'right'  => '0',
                        'bottom' => '0',
                        'left'   => '0',
                        'unit'   => 'px',
                    ),
                ),
                array(
                    'type'    => 'subheading',
                    'content' => esc_html__( 'Border Radius', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'      => 'ewqv_btn_border_radius_top',
                    'type'    => 'number',
                    'unit'    => 'px',
                    'default' => '0',
                    'title'   => esc_html__( 'Top', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'      => 'ewqv_btn_border_radius_right',
                    'type'    => 'number',
                    'unit'    => 'px',
                    'default' => '0',
                    'title'   => esc_html__( 'Right', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'      => 'ewqv_btn_border_radius_bottom',
                    'type'    => 'number',
                    'unit'    => 'px',
                    'default' => '0',
                    'title'   => esc_html__( 'Bottom', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'      => 'ewqv_btn_border_radius_left',
                    'type'    => 'number',
                    'unit'    => 'px',
                    'default' => '0',
                    'title'   => esc_html__( 'Left', 'easy-woo-quick-view' ),
                ),                            
            )
            ) );
        
            /** Modal Settings */
            CSF::createSection( $prefix, array(
            'name'   => 'ewqv_modal_settings',
            'title'  => esc_html__( 'Modal', 'easy-woo-quick-view' ),
            'fields' => array(
                array(
                    'type'              => 'subheading',
                    'content'           => esc_html__( 'Global Setting', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_modal_width_height',
                    'type'              => 'dimensions',
                    'title'             => esc_html__( 'Modal size', 'easy-woo-quick-view' ),
                    'subtitle'          => esc_html__( 'For best results, use 2:1 width-to-height ratio.', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_modal_z_index',
                    'type'              => 'number',
                    'title'             => esc_html__( 'Modal Z-Index', 'easy-woo-quick-view' ),
                    'default'           => 999999
                ),
                array(
                    'id'                => 'ewqv_modal_bg_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Background color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal',
                    'default'           => esc_html__( '#fff', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_modal_bg_overlay',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Background overlay color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.mfp-bg.mfp-ewqv',
                    'default'           => esc_html__( '#0b0b0b', 'easy-woo-quick-view' ),
                ),
                array(
                    'type'              => 'subheading',
                    'content'           => esc_html__( 'Close Button', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch',
                    'type'              => 'switcher',
                    'default'           => true,
                    'title'             => esc_html__( 'Button show/hide', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_bg',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Button background color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close',
                    'default'           => esc_html__( 'transparent', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_bg_hover',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Button background hover color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close:hover',
                    'default'           => esc_html__( '#eb7a61', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Button icon color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close',
                    'default'           => esc_html__( '#333', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_hover_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Button icon hover color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close:hover',
                    'default'           => esc_html__( '#fff', 'easy-woo-quick-view' ),
                ),
                array(
                    'type'              => 'subheading',
                    'content'           => esc_html__( 'Scrollbar', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_scrollbar_bg',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Scrollbar background color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'default'           => esc_html__( '#333', 'easy-woo-quick-view' ),
                ),
                array(
                    'type'              => 'subheading',
                    'content'           => esc_html__( 'Loading Animation', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_loading_switch',
                    'type'              => 'switcher',
                    'default'           => true,
                    'title'             => esc_html__( 'Preloader', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_loading_text',
                    'type'              => 'text',
                    'title'             => esc_html__( 'Loading text', 'easy-woo-quick-view' ),
                    'default'           => esc_html__( 'Loading...', 'easy-woo-quick-view' ),
                    'dependency'        => array( 'ewqv_loading_switch', '==', 'true' )
                ),
                array(
                    'id'                => 'ewqv_loading_text_color',
                    'type'              => 'color',
                    'title'             => esc_html__( 'Loading text color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.loading-overlay .loading-text',
                    'default'           => esc_html__( '#fff', 'easy-woo-quick-view' ),
                    'dependency'        => array( 'ewqv_loading_switch', '==', 'true' ),
                ),
            )
            ) );

            /** Thumbnails Settings */
            CSF::createSection( $prefix, array(
                'name'   => 'ewqv_thumbnails_settings',
                'title'  => esc_html__( 'Thumbnails', 'easy-woo-quick-view' ),
                'fields' => array(
                    array(
                        'type'      => 'subheading',
                        'content'   => esc_html__( 'Slider', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'        => 'ewqv_slider_dot_switch',
                        'type'      => 'switcher',
                        'default'   => true,
                        'title'     => esc_html__( 'Slider dot show/hide', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'        => 'ewqv_slider_btn_icon_size',
                        'type'      => 'number',
                        'title'     => esc_html__( 'Slider icon size', 'easy-woo-quick-view' ),
                        'default'   => 24,
                        'unit'      => 'px',
                    ),
                    array(
                        'id'        => 'ewqv_slider_btn_icon_color',
                        'type'      => 'color',
                        'title'     => esc_html__( 'Slider icon color', 'easy-woo-quick-view' ),
                        'default'   => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'        => 'ewqv_slider_btn_icon_hover_color',
                        'type'      => 'color',
                        'title'     => esc_html__( 'Slider icon hover color', 'easy-woo-quick-view' ),
                        'default'   => esc_html__( '#fff', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'            => 'ewqv_slider_btn_icon_bg_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Slider icon background color', 'easy-woo-quick-view' ),
                        'output_mode'   => 'background-color',
                        'default'       => esc_html__( 'transparent', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'            => 'ewqv_slider_btn_icon_bg_hover_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Slider icon background hover color', 'easy-woo-quick-view' ),
                        'output_mode'   => 'background-color',
                        'default'       => esc_html__( '#000', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'            => 'ewqv_slider_btn_left_icon',
                        'type'          => 'icon',
                        'title'         => esc_html__( 'Slider left icon', 'easy-woo-quick-view' ),
                        'default'       => 'fas fa-chevron-left',
                    ),
                    array(
                        'id'            => 'ewqv_slider_btn_right_icon',
                        'type'          => 'icon',
                        'title'         => esc_html__( 'Slider right icon', 'easy-woo-quick-view' ),
                        'default'       => 'fas fa-chevron-right',
                    ),
                )
            ) );
            /** Content Settings */
            CSF::createSection( $prefix, array(
                'name'   => 'ewqv_content_settings',
                'title'  => esc_html__( 'Content', 'easy-woo-quick-view' ),
                'fields' => array(
                    array(
                        'id'                => 'ewqv_modal_content_padding',
                        'type'              => 'spacing',
                        'title'             => esc_html__( 'Content wrapper padding', 'easy-woo-quick-view' ),
                        'output'            => '.easy-wqv-summary-wrapper',
                        'output_mode'       => 'padding',
                        'output_important'  => true,
                        'default'           => array(
                            'top'    => '20',
                            'right'  => '20',
                            'bottom' => '20',
                            'left'   => '20',
                            'unit'   => 'px',
                        ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => esc_html__( 'Product info show/hide options', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_title_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => esc_html__( 'Title', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_rating_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => esc_html__( 'Rating', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_Price_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => esc_html__( 'Price', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_excerpt_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => esc_html__( 'Excerpt', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_add_to_cart_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => esc_html__( 'Add To Cart', 'easy-woo-quick-view' ),
                    ), 
                    array(
                        'id'                => 'ewqv_meta_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => esc_html__( 'Meta', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_social_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => esc_html__( 'Social Share', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => esc_html__( 'Title', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_title_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .product_title',
                        'default'           => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => esc_html__( 'Review and Rating', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_review_link_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => esc_html__( 'Review link', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_review_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Review color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .woocommerce-product-rating .woocommerce-review-link',
                        'default'           => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_rating_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Rating color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .woocommerce-product-rating .star-rating',
                        'default'           => esc_html__( '#dd9933', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => esc_html__( 'Price', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_price_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .price',
                        'default'           => esc_html__( '#77a464', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => esc_html__( 'Excerpt', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_excerpt_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .woocommerce-product-details__short-description p',
                        'default'           => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => esc_html__( 'Variations Form ', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_variation_description',
                        'type'              => 'switcher',
                        'default'           => false,
                        'title'             => esc_html__( 'Variation description', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_variation_label_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Label color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .variations_form .variations th',
                        'default'           => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_variation_value_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Value color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .variations_form .variations td select',
                        'default'           => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => esc_html__( 'Add To Cart', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_bg',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Button background color', 'easy-woo-quick-view' ),
                        'output_mode'       => 'background',
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
                        'default'           => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_bg_hover',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Button background hover color', 'easy-woo-quick-view' ),
                        'output_mode'       => 'background',
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button:hover',
                        'default'           => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_text_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Button text color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
                        'default'           => esc_html__( '#fff', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_text_hover_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Button text hover color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button:hover',
                        'default'           => esc_html__( '#fff', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_btn_padding',
                        'type'              => 'spacing',
                        'title'             => esc_html__( 'Button padding', 'easy-woo-quick-view' ),
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
                        'output_mode'       => 'padding',
                        'output_important'  => true,
                        'default'           => array(
                            'top'    => '10',
                            'right'  => '16',
                            'bottom' => '10',
                            'left'   => '16',
                            'unit'   => 'px',
                        ),
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_btn_margin',
                        'type'              => 'spacing',
                        'title'             => esc_html__( 'Button margin', 'easy-woo-quick-view' ),
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
                        'output_mode'       => 'margin',
                        'output_important'  => true,
                        'default'           => array(
                            'top'    => '0',
                            'right'  => '0',
                            'bottom' => '0',
                            'left'   => '0',
                            'unit'   => 'px',
                        ),
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_btn_border',
                        'type'              => 'border',
                        'title'             => esc_html__( 'Button border', 'easy-woo-quick-view' ),
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
                        'output_important'  => true,
                        'default'           => array(
                            'style'  => 'solid',
                            'color'  => '#ffffff',
                            'top'    => '0',
                            'right'  => '0',
                            'bottom' => '0',
                            'left'   => '0',
                            'unit'   => 'px',
                        ),
                    ),
                    array(
                        'type'    => 'subheading',
                        'content' => esc_html__( 'Button Border Radius', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_content_add_to_cart_btn_border_radius_top',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '3',
                        'title'   => esc_html__( 'Top', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_content_add_to_cart_btn_border_radius_right',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '3',
                        'title'   => esc_html__( 'Right', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_content_add_to_cart_btn_border_radius_bottom',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '3',
                        'title'   => esc_html__( 'Bottom', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_content_add_to_cart_btn_border_radius_left',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '3',
                        'title'   => esc_html__( 'Left', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => esc_html__( 'Meta', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_meta_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Text color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .product_meta, .easy-wqv-summary-content .product_meta .sku_wrapper, .easy-wqv-summary-content .product_meta .posted_in',
                        'default'           => esc_html__( '#222', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_meta_link_color',
                        'type'              => 'color',
                        'title'             => esc_html__( 'Link color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .product_meta a',
                        'default'           => esc_html__( '#1e73be', 'easy-woo-quick-view' ),
                    ),
                )
            ) );
  
    }

    /**
     * Return plugin all settings.
     *
     * @return string|array Settings values.
     */
    public static function get_settings() {
        return get_option( Easy_WooCommerce_Quick_View_Settings::$prefix );
    }

}