
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
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3
               
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
        
    });
});

