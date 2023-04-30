(function ($, window, document, undefined) {
  "use strict";

  new Swiper(".swiper-feebacks", {
    spaceBetween: 30,
    loop: true,
    breakpoints: {
      320: {
        spaceBetween: 15,
        slidesPerView: 1,
      },
      450: {
        spaceBetween: 15,
        slidesPerView: 2,
      },
      767: {
        slidesPerView: 3,
      },
      991: {
        slidesPerView: 4,
      },
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  $(".etnos-slider-products .swiper").each(function (i) {
    new Swiper($(".etnos-slider-products .swiper")[i], {
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

  $(document).on("click", ".remove", function () {
    jQuery.ajax({
      type: "POST",
      dataType: "json",
      url: woocommerce_params.ajax_url,
      data: {
        action: "get_cart_count",
      },
      success: function (response) {
        jQuery.get("?wc-ajax=get_refreshed_fragments", function (response) {
          let cartCount = jQuery(response.fragments["span.mini_cart_count"])
            .text()
            .trim();

          $(".etnos-header__main-toolbar-cart-count").text(cartCount);
        });
      },
      error: function (error) {
        console.log(error);
      },
    });
  });

  $(".etnos-header__main-toolbar-cart-main").on("click", function (e) {
    e.preventDefault();
    const th = $(this);
    th.toggleClass("active").stop("true");
  });
})(jQuery, window, document);
