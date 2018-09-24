"use strict";
// Wrapping all JavaScript code into a IIFE function for prevent global variables creation
// and pass in jQuery to be mapped to $.
(function($) {
    jQuery(document).ready(function () {
        //jQuery UI slider for owl carousel
        if (jQuery().slider) {
            var $slider = jQuery(".owl-carousel-slider");
            $slider.each(function () {
                var $this = jQuery(this);
                var data = $this.data();
                $this.slider({
                    value: 0,
                    min: 0,
                    max: data.itemsCount,
                    step: 1,
                    slide: function (event, ui) {
                        jQuery(data.carousel).trigger('to.owl.carousel', [ui.value, 500])
                    }
                });
            })
        }
    });
//end of IIFE function
})(jQuery);