(function ($, window, document, undefined) {
  "use strict";

  new Swiper(".etnos-slider-inst .swiper", {
    slidesPerView: 3,

    spaceBetween: 30,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  new Swiper(".etnos-slider-products .swiper", {
    slidesPerView: 5,
    spaceBetween: 15,
    loop: true,
    keyboard: {
      enabled: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
})(jQuery, window, document);
