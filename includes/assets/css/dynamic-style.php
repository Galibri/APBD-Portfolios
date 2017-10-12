<?php
// Dynamic css output in the wp_head hook from the plugin settings page. No worries, this will not affect your website loading time.
function apbd_dynamic_style_enqueue(){

$screen_border_width = apbd_get_option( 'screen_border_width', 'apbd_basics', '2' );
$screen_border_type = apbd_get_option( 'screen_border_type', 'apbd_basics', 'solid' );
$screen_border_color = apbd_get_option( 'screen_border_color', 'apbd_basics', '#ccc' );
$border_tl_radius = apbd_get_option( 'border_tl_radius', 'apbd_basics', '0' );
$border_tr_radius = apbd_get_option( 'border_tr_radius', 'apbd_basics', '0' );
$border_bl_radius = apbd_get_option( 'border_bl_radius', 'apbd_basics', '0' );
$border_br_radius = apbd_get_option( 'border_br_radius', 'apbd_basics', '0' );

$pf_details_link_bg_color = apbd_get_option( 'pf_details_link_bg_color', 'apbd_basics', '#000' );
$pf_details_link_color = apbd_get_option( 'pf_details_link_color', 'apbd_basics', '#fff' );
$pf_details_icon_size = apbd_get_option( 'pf_details_icon_size', 'apbd_basics', '22' );

$pf_pagination_bg = apbd_get_option( 'pf_pagination_bg', 'apbd_basics', '#ccc' );
$pf_pagination_color = apbd_get_option( 'pf_pagination_color', 'apbd_basics', '#fff' );
$pf_pagination_active_bg = apbd_get_option( 'pf_pagination_active_bg', 'apbd_basics', '#3F51B5' );
$pf_pagination_active_color = apbd_get_option( 'pf_pagination_active_color', 'apbd_basics', '#fff' );

$pf_single_title_size = apbd_get_option( 'pf_single_title_size', 'apbd_advanced', '30' );
$px_single_title_color = apbd_get_option( 'px_single_title_color', 'apbd_advanced', '#fff' );
$px_single_title_bg = apbd_get_option( 'px_single_title_bg', 'apbd_advanced', '#1c2b4f' );

$pf_single_link_size = apbd_get_option( 'pf_single_link_size', 'apbd_advanced', '22' );
$px_single_link_color = apbd_get_option( 'px_single_link_color', 'apbd_advanced', '#fff' );
$px_single_link_bg = apbd_get_option( 'px_single_link_bg', 'apbd_advanced', '#000' );

?>
<style>
.screen {
    border: <?php echo $screen_border_width . 'px ' . $screen_border_type . ' ' . $screen_border_color; ?>;
    border-top-left-radius: <?php echo $border_tl_radius . 'px'; ?>;
    border-top-right-radius: <?php echo $border_tr_radius . 'px'; ?>;
    border-bottom-left-radius: <?php echo $border_bl_radius . 'px'; ?>;
    border-bottom-right-radius: <?php echo $border_br_radius . 'px'; ?>;
}

.apbd-portfolios-details a {
    font-size: <?php echo $pf_details_icon_size . 'px'; ?>;
    color: <?php echo $pf_details_link_color; ?>;
    background: <?php echo $pf_details_link_bg_color; ?>;
}

.portfolios-pagination a.page-numbers {
    background: <?php echo $pf_pagination_bg ?>;
    color: <?php echo $pf_pagination_color ?>;
}

.portfolios-pagination span.page-numbers.current {
    background: <?php echo $pf_pagination_active_bg ?>;
    color: <?php echo $pf_pagination_active_color ?>;
}


h2.portfolios-title {
    font-size: <?php echo $pf_single_title_size . 'px'; ?>;
    background: <?php echo $px_single_title_bg; ?>;
    color: <?php echo $px_single_title_color; ?>;
}

a.apbd-pf-single-link {
    font-size: <?php echo $pf_single_link_size . 'px'; ?>;
    color: <?php echo $px_single_link_color; ?>;
    background: <?php echo $px_single_link_bg; ?>;
}
</style>
<?php } ?>