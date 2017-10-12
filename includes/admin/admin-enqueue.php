<?php

//enqueue file for admin dashboard only on portfolios related pages
function apbd_admin_enqueue(){
    global $typenow;
    if( $typenow != 'portfolios' ){
        return;
    }
    wp_register_style( 'apbd_style', plugins_url( '/includes/admin/admin-style/style.css', APBD_PORTFOLIO_PLUGIN_URL ) );
    
    wp_enqueue_style( 'apbd_style' );
}