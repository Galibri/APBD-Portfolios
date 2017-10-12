<?php

//First code to run after the plugin installation
function apbd_activate_plugin(){
    if( version_compare( get_bloginfo( 'version' ), '4.6', '<' ) ){
        wp_die( __('This plugin requires WordPress min version 4.6 to run smoothly.') );
    }
}