/**
 * File gademm-scripts.js.
 *
 * Theme enhancements for a better user experience.
 *
 * Contains all custom scripts.
 */
( function( $ ) {
	// Site title and descsription.

    $.fn.exists = function() {
        return this.length > 0;
    }

    $(document).ready(function() {

        $(function() {

            var homepageMenuContainer = $('.homepage-image-menu-container');
            var swipeBoxItem = $('.lookbook-item');
            var homepageVideoContainer = $('#homepage-video-container');
            var homepageVideo = $('#homepage-video');
            var productSlider = $('.woocommerce-product-gallery__wrapper');

            if(homepageMenuContainer.exists()) {
                var $grid = homepageMenuContainer.imagesLoaded( function() {
                    $grid.masonry({
                        itemSelector: '.grid-item',
                        percentPosition: true,
                        columnWidth: '.grid-sizer'
                    }); 
                });
            }

            if(swipeBoxItem.exists()) {
                swipeBoxItem.swipebox();
            }

            if(homepageVideoContainer.exists()) {
                homepageVideoContainer.click(function(event) {
                    homepageVideo.css('visibility', 'visible');
                    homepageVideo[0].src += "&autoplay=1";
                    event.preventDefault();
                })
            }

            if(productSlider.exists()) {
                productSlider.slick({
                    dots: true
                });
            }
                
        });

    })

} )( jQuery );