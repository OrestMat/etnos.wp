(function ($, window, document, undefined) {
  'use strict';

  if ($('.woocommerce-product-gallery__slider-item').length) {
    let flag = true;

    $('.woocommerce-product-gallery__slider-item').on('click', function (e) {
      e.preventDefault();
      const th = $(this),
        thImage = $('a', th).attr('href'),
        mainImage = $('.woocommerce-product-gallery__image-main'),
        mainImageHref = $('a', mainImage).attr('href');

      if (flag) {
        $('a', mainImage).attr('data-image', mainImageHref);
        flag = false;
      }

      $('img', mainImage).attr('src', thImage).attr('srcset', thImage);
      $('a', mainImage).attr('href', thImage);
    });

    if ($('.woocommerce-product-gallery__image-main').length) {
      $('.woocommerce-product-gallery__image-main').on('click', function (e) {
        e.preventDefault();
        const th = $(this),
          getImage = $('a', th),
          getImageAttr = getImage.attr('data-image');

        if (typeof getImageAttr !== typeof undefined && getImageAttr !== false) {
          getImage.attr('href', getImageAttr);
          $('img', th).attr('src', getImageAttr).attr('srcset', getImageAttr);
        }
      });
    }

    $('.cfvsw-swatches-option, .reset_variations').on('click', function () {
      const mainImage = $('.woocommerce-product-gallery__image-main');

      setTimeout(() => {
        $('a', mainImage).attr('data-image', $('a', mainImage).attr('href'));
      }, 10);
    });
  }

  new Swiper('.woocommerce-product-gallery__slider', {
    slidesPerView: 4,
    spaceBetween: 0,
    freeMode: true,
  });

  new Swiper('.related-product-section__wrap', {
    slidesPerView: 4,
    spaceBetween: 20,
    freeMode: true,
  });
})(jQuery, window, document);
