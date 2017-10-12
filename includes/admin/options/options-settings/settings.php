<?php

/*
 * Settings for portfolios plugin
 */
if ( !class_exists('APBD_Settings_API_Test' ) ):
class APBD_Settings_API_Test {

    private $settings_api;

    function __construct() {
        $this->settings_api = new APBD_Settings_API;

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_submenu_page(
        'edit.php?post_type=portfolios',
        __( 'Portfolio Options', 'apbd' ),
        __( 'Portfolio Options', 'apbd' ),
        'manage_options',
        'apbd-portfolios-options',
        array($this, 'plugin_page')
    );
    }
    
    function get_settings_sections() {
        $sections = array(
            array(
                'id'    => 'apbd_basics',
                'title' => __( 'Portfolio Settings', 'apbd' )
            ),
            array(
                'id'    => 'apbd_advanced',
                'title' => __( 'Portfolio Single Page Settings', 'apbd' )
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'apbd_basics' => array(
                array(
                    'name'              => 'screen_border_width',
                    'label'             => __( 'Portfolio border width', 'apbd' ),
                    'desc'              => __( 'Border of each portfolios', 'apbd' ),
                    'placeholder'       => __( '0', 'apbd' ),
                    'min'               => 0,
                    'max'               => 100,
                    'step'              => '1',
                    'type'              => 'number',
                    'default'           => '2'
                ),
                array(
                    'name'              => 'screen_border_type',
                    'label'             => __( 'Portfolio border type', 'apbd' ),
                    'desc'              => __( 'Select the border type', 'apbd' ),
                    'type'              => 'select',
                    'default'           => 'solid',
                    'options'           => array(
                        'solid'           => 'Solid',
                        'dotted'          => 'Dotted',
                        'dashed'          => 'Dashed',
                        'double'          => 'Double',
                        'groove'          => 'Groove',
                        'ridge'           => 'Ridge',
                        'inset'           => 'Inset',
                        'outset'          => 'Outset',
                        'none'            => 'None'
                    )
                ),
                array(
                    'name'              => 'screen_border_color',
                    'label'             => __( 'Portfolio Border Color', 'apbd' ),
                    'desc'              => __( 'Select Color for border', 'apbd' ),
                    'type'              => 'color',
                    'default'           => '#ccc'
                ),
                array(
                    'name'              => 'border_tl_radius',
                    'label'             => __( 'Left Top Radius', 'apbd' ),
                    'desc'              => __( 'Portfolio Border Left Top Radius', 'apbd' ),
                    'placeholder'       => __( '0', 'apbd' ),
                    'min'               => 0,
                    'max'               => 200,
                    'step'              => '1',
                    'type'              => 'number',
                    'default'           => '0'
                ),
                array(
                    'name'              => 'border_tr_radius',
                    'label'             => __( 'Right Top Radius', 'apbd' ),
                    'desc'              => __( 'Portfolio Border Right Top Radius', 'apbd' ),
                    'min'               => 0,
                    'max'               => 200,
                    'step'              => '1',
                    'type'              => 'number',
                    'default'           => '0'
                ),
                array(
                    'name'              => 'border_bl_radius',
                    'label'             => __( 'Left Bottom Radius', 'apbd' ),
                    'desc'              => __( 'Portfolio Border Left Bottom Radius', 'apbd' ),
                    'min'               => 0,
                    'max'               => 200,
                    'step'              => '1',
                    'type'              => 'number',
                    'default'           => '0'
                ),
                array(
                    'name'              => 'border_br_radius',
                    'label'             => __( 'Right Bottom Radius', 'apbd' ),
                    'desc'              => __( 'Portfolio Border Right Bottom Radius', 'apbd' ),
                    'min'               => 0,
                    'max'               => 200,
                    'step'              => '1',
                    'type'              => 'number',
                    'default'           => '0'
                ),
                array(
                    'name'              => 'pf_details_link_bg_color',
                    'label'             => __( 'Portfolio icon background Color', 'apbd' ),
                    'desc'              => __( 'Select portfolios icon background Color', 'apbd' ),
                    'type'              => 'color',
                    'default'           => '#000'
                ),
                array(
                    'name'              => 'pf_details_link_color',
                    'label'             => __( 'Portfolio icon Color', 'apbd' ),
                    'desc'              => __( 'Select portfolios icon Color', 'apbd' ),
                    'type'              => 'color',
                    'default'           => '#fff'
                ),
                array(
                    'name'              => 'pf_details_icon_size',
                    'label'             => __( 'Portfolio icon size', 'apbd' ),
                    'desc'              => __( 'Portfolio icon size in pixel', 'apbd' ),
                    'type'              => 'number',
                    'min'               => 1,
                    'default'           => '22'
                ),
                array(
                    'name'              => 'pf_pagination_bg',
                    'label'             => __( 'Pagination background color', 'apbd' ),
                    'desc'              => __( 'Portfolio Pagination background color', 'apbd' ),
                    'type'              => 'color',
                    'default'           => '#ccc'
                ),
                array(
                    'name'              => 'pf_pagination_color',
                    'label'             => __( 'Pagination font color', 'apbd' ),
                    'desc'              => __( 'Portfolio Pagination font color', 'apbd' ),
                    'type'              => 'color',
                    'default'           => '#fff'
                ),
                array(
                    'name'              => 'pf_pagination_active_bg',
                    'label'             => __( 'Pagination current page link background color', 'apbd' ),
                    'desc'              => __( 'Pagination active page link background color', 'apbd' ),
                    'type'              => 'color',
                    'default'           => '#3F51B5'
                ),
                array(
                    'name'              => 'pf_pagination_active_color',
                    'label'             => __( 'Pagination current page link color', 'apbd' ),
                    'desc'              => __( 'Pagination active page link color', 'apbd' ),
                    'type'              => 'color',
                    'default'           => '#fff'
                ),
            ),
            'apbd_advanced' => array(
                array(
                    'name'    => 'pf_single_title_size',
                    'label'   => __( 'Portfolio Single page title font size', 'apbd' ),
                    'desc'    => __( 'Portfolio Single page title font size', 'apbd' ),
                    'type'    => 'number',
                    'min'     => 0,
                    'default' => '30'
                ),
                array(
                    'name'    => 'px_single_title_color',
                    'label'   => __( 'Portfolio Single page title color', 'apbd' ),
                    'desc'    => __( 'Portfolio Single page title color', 'apbd' ),
                    'type'    => 'color',
                    'default' => '#fff'
                ),
                array(
                    'name'    => 'px_single_title_bg',
                    'label'   => __( 'Portfolio Single page title background color', 'apbd' ),
                    'desc'    => __( 'Portfolio Single page title background color', 'apbd' ),
                    'type'    => 'color',
                    'default' => '#1c2b4f'
                ),
                array(
                    'name'        => 'html',
                    'label'        => __( '<h2>Portfolio Single page</h2>', 'apbd' ),
                    'type'        => 'html'
                ),
                array(
                    'name'    => 'pf_single_link_size',
                    'label'   => __( 'Portfolio Single page link font size', 'apbd' ),
                    'desc'    => __( 'Portfolio Single page link font size', 'apbd' ),
                    'type'    => 'number',
                    'min'     => 0,
                    'default' => '30'
                ),
                array(
                    'name'    => 'px_single_link_color',
                    'label'   => __( 'Portfolio Single page link font color', 'apbd' ),
                    'desc'    => __( 'Portfolio Single page link font color', 'apbd' ),
                    'type'    => 'color',
                    'default' => '#fff'
                ),
                array(
                    'name'    => 'px_single_link_bg',
                    'label'   => __( 'Portfolio Single page link background color', 'apbd' ),
                    'desc'    => __( 'Portfolio Single page link background color', 'apbd' ),
                    'type'    => 'color',
                    'default' => '#000'
                ),
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;

function apbd_get_option( $option, $section, $default = '' ) {
 
    $options = get_option( $section );
 
    if ( isset( $options[$option] ) ) {
    return $options[$option];
    }
 
    return $default;
}
