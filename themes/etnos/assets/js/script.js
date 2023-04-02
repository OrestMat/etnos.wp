(function ($, window, document, undefined) {
  'use strict';

  new Swiper('.swiper-feebacks', {
    slidesPerView: 5,
    spaceBetween: 30,
    loop: true,
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

  $(document).on('click', '.remove', function () {
    jQuery.ajax({
      type: 'POST',
      dataType: 'json',
      url: woocommerce_params.ajax_url,
      data: {
        action: 'get_cart_count',
      },
      success: function (response) {
        jQuery.get('?wc-ajax=get_refreshed_fragments', function (response) {
          let cartCount = jQuery(response.fragments['span.mini_cart_count']).text().trim();

          $('.etnos-header__main-toolbar-cart-count').text(cartCount);
        });
      },
      error: function (error) {
        console.log(error);
      },
    });
  });
})(jQuery, window, document);
