(function($) {

    jQuery(window).on( 'load', function() {
        
        //image control for different window size
        $(window).on("resize",function() {
            jQuery( '.screen img' ).each(function(){
                var imgHeight = jQuery(this).height();
                var finalHeight = imgHeight - 250;
                jQuery(this).css( 'bottom', -finalHeight + 'px' );
            });
        }).resize();
        
        //magnific imgae popup
        $('.apbd-portfolios-zoom').magnificPopup({
          type: 'image'
        });

    });
    //filterable portfolio settings
    jQuery(document).ready(function() {
        jQuery("#portfolio-list").filterable();
    });

}(jQuery));