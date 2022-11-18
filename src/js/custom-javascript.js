// Add your custom JS here.
(function ($) {
    // Use the $ in peace...
    $(document).ready(function () {
        $('.slider-images-carousel').flickity({
            prevNextButtons: false,
            pageDots: false,
            wrapAround: true,
            autoPlay: true,
            setGallerySize: false,
          });
    });

}(jQuery));
