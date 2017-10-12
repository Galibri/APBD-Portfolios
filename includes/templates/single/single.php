<?php
/**
 * The template for displaying single portfolios posts
 *
 * @package apbd-portfolios-plugin
 */
get_header(); ?>

<div class="apbd-single-portfolios-wrapper">
    <div class="container-fluid">
        <?php

        while(have_posts()) {
                the_post();
         ?>
                    
        <div class="row">
            <div class="col-md-6"><?php the_post_thumbnail( get_the_ID(), "full", array() ); ?></div>
            <div class="col-md-6">
                <h2 class="portfolios-title"><?php the_title(); ?></h2>    
                <?php $portfoliosLink = get_post_meta( $post->ID, 'portfolios_link', true );
                 if( $portfoliosLink != '' ) :
                ?>
                <p class="project-single-link"><a href="<?php echo $portfoliosLink; ?>" target="_blank" class="apbd-pf-single-link">Project Link Here</a></p>
                
                <?php
                endif;
                $portfoliosSkills = get_post_meta( $post->ID, 'portfolios_skills', true );
                 if( $portfoliosSkills != '' ) :
                ?>
            
                <p class="project-single-linkskills"><strong>Skills for this project:</strong> <?php echo $portfoliosSkills; ?></p>
                
                <?php endif; ?>
                <p class="project-single-type"><?php echo get_the_term_list( get_the_ID(), 'type', '<strong>Project Type:</strong> ', ', ', '' ); ?></p>
                
                <?php if( get_the_content() != '' ) : ?>
                <h3 class="project-des-title">Project Details:</h3>
                <p class="project-description"><?php the_content(); ?></p>
                <?php endif; ?>
                
            </div> <!-- columns ends -->
        </div> <!-- row ends -->
        
        <?php  } 
            wp_reset_query();
        ?>
        
    </div> <!-- container ends -->
</div> <!-- portfolios wrapper ends -->

<?php get_footer(); ?>