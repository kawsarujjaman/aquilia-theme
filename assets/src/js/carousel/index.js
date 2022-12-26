
(function ($) {
    class slickCarousel {
        constructor() {
           this.initiateCarousel();
        }
        initiateCarousel(){
            $('.posts-carousel').slick({
                autoplay: true,
                autoplaySpeed: 2000,
            });
        }
    }
    new slickCarousel();
})(jQuery)