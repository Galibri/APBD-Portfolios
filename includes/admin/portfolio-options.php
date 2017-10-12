<?php

//custom field for portfolios post type
function apbd_portfolios_options_mb( $post ){   
    ?>

    <div class="form-group">
        <label for="portfolios-link">Project Link: </label>
        <input type="url" id="portfolios-link" class="regular-text" name="portfolios_link" placeholder="http://example.com" value="<?php echo get_post_meta( $post->ID, 'portfolios_link', true ); ?>">
    </div>
    <div class="form-group">
        <label for="portfolios-skills">Project Skills: </label>
        <input type="text" id="portfolios-skills" class="regular-text" name="portfolios_skills" placeholder="HTML, CSS, PHP, WordPress" value="<?php echo get_post_meta( $post->ID, 'portfolios_skills', true ); ?>">
    </div>
    

    <?php
}
