(function ($, window, document, undefined) {
  ('use strict');

  const mainOverlay = function () {
    const overlay = $('.etnos-overlay');

    if (!overlay.hasClass('open')) {
      overlay.fadeIn().addClass('open');
    } else {
      overlay.fadeOut().removeClass('open');
    }

    closeSection(overlay);
  };

  const htmlOverflow = function () {
    const html = $('html');

    html.toggleClass('no-scroll');
  };

  const closeSection = function (el) {
    let element = el;
    const popup = $('.etnos-search-popup');
    if (element) {
      element.click(function () {
        const th = $(this);

        th.fadeOut().removeClass('open');
        popup.slideUp();
        htmlOverflow();
      });
    }
  };

  new Swiper('.swiper-feebacks', {
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

  $('#etnos-header__main-search').click(function () {
    const th = $(this);
    const popup = $('.etnos-search-popup');

    popup.slideDown();
    mainOverlay();
    htmlOverflow();
  });

  function menuInit() {
    const header = $('#etnos-header');
    let flag = true;

    if (header.length && header) {
      header.on('click', '.etnos-header__burger', function () {
        const overlay = $('.etnos-overlay');

        overlay.stop('true').fadeToggle();
        header.stop('true').toggleClass('open');
      });
    }

    $(document).on('click', '.etnos-header__main-menu-close, .etnos-overlay', function () {
      $('.etnos-header__burger').trigger('click');
    });

    $(window).resize(function () {
      const windowWidth = window.innerWidth;

      if (windowWidth > 992 && flag) {
        const overlay = $('.etnos-overlay');
        overlay.fadeOut();
        header.removeClass('open');
        flag = false;
      }
    });
  }

  menuInit();

  const cartPopup = () => {
    $(document).on('click', '.etnos-header__main-toolbar-cart', function (e) {
      e.preventDefault();
      const btn = $(this);
      const main = btn.parent();

      main.stop('true').toggleClass('active');
    });

    $(document).on('click', function (e) {
      const target = $(e.target);
      if (!target.closest('.etnos-header__main-toolbar-cart-main').length) {
        $('.etnos-header__main-toolbar-cart').parent().removeClass('active');
      }
    });
  };

  cartPopup();

  $(document).on('click', '.etnos-qtybutton', function () {
    const btn = $(this);
    const btnUpdateCart = $('button[name="update_cart"');

    console.log(1);

    btnUpdateCart.removeAttr('disabled');
  });
})(jQuery, window, document);
