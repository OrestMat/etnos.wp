(function ($, window, document, undefined) {
  "use strict";

  new Swiper(".swiper", {
    slidesPerView: 3,
    spaceBetween: 3,
    spaceBetween: 30,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
})(jQuery, window, document);
