<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

//this will delete all of your portfolios posts once you delete the plguin from your site.
function apbd_delete_plugin() {
	global $wpdb;

	$posts = get_posts(
		array(
			'numberposts' => -1,
			'post_type' => 'portfolio',
			'post_status' => 'any',
		)
	);

	foreach ( $posts as $post ) {
		wp_delete_post( $post->ID, true );
	}
}

apbd_delete_plugin();
