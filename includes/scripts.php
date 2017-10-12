<?php

function apbd_image_portfolios_enqueue_scripts(){
    //bootstrap minified css version enqueue
    wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . '/assets/css/bootstrap.min.css' );
    //fontawesome enqueue
    wp_enqueue_style( 'fontawesome', plugin_dir_url( __FILE__ ) . '/assets/css/font-awesome.min.css' );
    //magnific-popup
    wp_enqueue_style( 'magnific-popup', plugin_dir_url( __FILE__ ) . '/assets/css/magnific-popup.css' );
    //main stylesheet
    wp_enqueue_style( 'style', plugin_dir_url( __FILE__ ) . '/assets/css/styles.css' );
    
    //bootstrap minified js version enqueue
    wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ) . '/assets/js/bootstrap.min.js', array('jquery') );
    //magnific-popup minified js
    wp_enqueue_script( 'magnific-popup', plugin_dir_url( __FILE__ ) . '/assets/js/jquery.magnific-popup.min.js', array('jquery') );
    wp_enqueue_script( 'filterable', plugin_dir_url( __FILE__ ) . '/assets/js/filterable.js', array('jquery') );
    //plugin main js file
    wp_enqueue_script( 'main-js', plugin_dir_url( __FILE__ ) . '/assets/js/main.js', array('jquery') );
}