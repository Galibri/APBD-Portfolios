<?php

//create metabox for portfolios post type
function apbd_create_metaboxes(){
    
    add_meta_box(
        'apbd_portfolios_options_mb',
        __( 'Portfolio Details', 'apbd' ),
        'apbd_portfolios_options_mb',
        'portfolios',
        'normal',
        'high'
    );
}