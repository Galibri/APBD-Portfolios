<?php

//metabox initialization
function portfolios_admin_init(){
    include_once( 'create-metaboxes.php' );
    include_once( 'portfolio-options.php' );
    include_once( 'admin-enqueue.php' );
    
    add_action( 'add_meta_boxes_portfolios', 'apbd_create_metaboxes' );
    add_action( 'admin_enqueue_scripts', 'apbd_admin_enqueue' );
}