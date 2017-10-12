<?php

//check post type for portfolios and save or update post
function apbd_save_post_admin( $post_id, $post, $update ){
    
    if ( isset( $_POST['portfolios_link'] ) ) {
        update_post_meta( $post_id, 'portfolios_link', esc_url( $_POST['portfolios_link'] ) );
    }
    if ( isset( $_POST['portfolios_skills'] ) ) {
        update_post_meta( $post_id, 'portfolios_skills', sanitize_text_field( $_POST['portfolios_skills'] ) );
    }
}