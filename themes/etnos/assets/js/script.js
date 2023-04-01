(function ($, window, document, undefined) {
  'use strict';

  new Swiper('.etnos-slider-inst .swiper-feedbacks', {
    slidesPerView: 5,
    spaceBetween: 30,
    // loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  $('.etnos-slider-products .swiper').each(function (i) {
    new Swiper($('.etnos-slider-products .swiper')[i], {
      slidesPerView: 5,
      spaceBetween: 15,
      loop: true,
      keyboard: {
        enabled: true,
      },
      navigation: {
        nextEl: $('.swiper-button-next')[i],
        prevEl: $('.swiper-button-prev')[i],
      },
    });
  });

  new Swiper('.woocommerce-product-gallery__slider', {
    slidesPerView: 4,
    spaceBetween: 0,
    freeMode: true,
  });
})(jQuery, window, document);
