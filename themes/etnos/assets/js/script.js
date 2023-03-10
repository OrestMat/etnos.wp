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

  $(".swiper").each(function (i) {
    new Swiper($(".swiper")[i], {
      slidesPerView: 5,
      spaceBetween: 15,
      loop: true,
      keyboard: {
        enabled: true,
      },
      navigation: {
        nextEl: $(".swiper-button-next")[i],
        prevEl: $(".swiper-button-prev")[i],
      },
    });
  });
})(jQuery, window, document);
