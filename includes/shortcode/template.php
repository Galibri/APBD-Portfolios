<?php

//shrotcode registration for portfolios post type

function apbd_portfolios_shortcode( $atts, $content = null ){
    
global $post;
    
$big = 999999999; // need an unlikely integer
    
extract(shortcode_atts( array(
    'posts_per_page'    => 6,
    'order'             => 'DESC',
    'column_number'     => 3,
), $atts )  );

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'      => 'portfolios',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'order'         => $order
);

$loop = new WP_Query($args);


$pft_posts = '<div class="apbd-wrapper">
                <div class="container-fluid">';
   $terms = get_terms("type");
    $count = count($terms);
$pft_posts .= '<ul id="portfolio-filter">';
$pft_posts .= '<li><a href="#all" title="">All</a></li>';
        if ( $count > 0 )
        {   
            foreach ( $terms as $term ) {
                $termname = strtolower($term->name);
                $termname = str_replace(' ', '-', $termname);
                $pft_posts .= '<li><a href="#'.$termname.'" title="" rel="'.$termname.'">'.$term->name.'</a></li>';
            }
        }
$pft_posts .= "</ul>";

$pft_posts .=  '<div id="portfolio-list" class="row">';
    
            while ($loop->have_posts()) : $loop->the_post();
            
                $terms = get_the_terms( $post->ID, 'type' );
                                 
                        if ( $terms && ! is_wp_error( $terms ) ) : 
                            $links = array();
 
                            foreach ( $terms as $term ) 
                            {
                                $links[] = $term->name;
                            }
                            $links = str_replace(' ', '-', $links); 
                            $tax = join( " ", $links );     
                        else :  
                            $tax = '';  
                        endif;
                    
$pft_posts .= '<div class="col-md-' . $column_number .  ' content portfolio-item ' . strtolower($tax) . ' all">';
$pft_posts .= '<div class="screen">' . get_the_post_thumbnail( get_the_ID(), "full", array() );
$pft_posts .= '<div class="apbd-portfolios-details">';
$pft_posts .= '<a href="' . get_the_permalink() . '" class="apbd-single-portfolios"><i class="fa fa-link"></i></a>';
$pft_posts .= '<a href="' . get_post_meta( $post->ID, "portfolios_link", true ) . '" target="_blank" class="apbd-pf-external-link"><i class="fa fa-chevron-right"></i></a>';
$pft_posts .= '<a href="' . get_the_post_thumbnail_url( get_the_ID(), "full", array() ) . '" class="apbd-portfolios-zoom"><i class="fa fa-search-plus"></i></a>';
$pft_posts .= '</div></div></div>';     
                    
endwhile;

wp_reset_query();
$pagination = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $loop->max_num_pages
) );
    
$pft_posts .= '<div class="portfolios-pagination">' . $pagination;

$pft_posts .= '</div></div></div></div>';
    
    return $pft_posts;

}
?>
