
// (function ($) {
//     class slickCarousel {
//         constructor() {
//            this.initiateCarousel();
//         }
//         initiateCarousel(){
//             $('.posts-carousel').slick({
//                 autoplay: true,
//                 autoplaySpeed: 2000,
//             });
//         }
//     }
//     new slickCarousel();
// })(jQuery)



jQuery(document).ready(function(){
    jQuery('.posts-carousel').slick({
        // autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 3,
        slidesToScroll: 1,
    });
});

