(function ($, window, document, undefined) {
  "use strict";

  // if (typeof fitVids === "function") {
  //   $("body").fitVids({
  //     ignore:
  //       ".vimeo-video, .youtube-simple-wrap iframe, .iframe-video.for-btn iframe, .post-media.video-container iframe",
  //   });
  // }

  /*=================================*/
  /* PAGE CALCULATIONS */
  /*=================================*/

  if (typeof pageCalculations !== "function") {
    var winW,
      winH,
      pageCalculations,
      onEvent = window.addEventListener;

    pageCalculations = function (func) {
      winW = window.innerWidth;
      winH = window.innerHeight;

      if (!func) return;

      onEvent("load", func, true); // window onload
      onEvent("resize", func, true); // window resize
      onEvent("orientationchange", func, false); // window orientationchange
    }; // end pageCalculations

    pageCalculations(function () {
      pageCalculations();
    });
  }

  // $(window).on("load", function () {
  //   if ($(".etnos-preloader").length) {
  //     $(".etnos-preloader").fadeOut(400);
  //   }

  //   wpc_add_img_bg(".js-bg");
  // });

  // function calcPaddingMainWrapper() {
  //   if ($(".etnos-footer").length) {
  //     var footer = $(".etnos-footer");
  //     var paddValue = footer.outerHeight();

  //     footer.bind("heightChange", function () {
  //       $("body").css("padding-bottom", paddValue);
  //     });

  //     footer.trigger("heightChange");
  //   }
  // }

  // function blogIsotope() {
  //   if ($(".etnos-blog--isotope").length) {
  //     $(".etnos-blog--isotope").each(function () {
  //       var self = $(this);
  //       self.isotope({
  //         itemSelector: ".etnos-blog--post",
  //         layoutMode: "masonry",
  //         masonry: {
  //           columnWidth: ".etnos-blog--post",
  //         },
  //       });
  //     });
  //   }
  // }

  // function wpc_add_img_bg(img_sel, parent_sel) {
  //   if (!img_sel) {
  //     return false;
  //   }

  //   var $parent, $imgDataHidden, _this;
  //   $(img_sel).each(function () {
  //     _this = $(this);
  //     $imgDataHidden = _this.data("s-hidden");
  //     $parent = _this.closest(parent_sel);
  //     $parent = $parent.length ? $parent : _this.parent();
  //     $parent
  //       .css("background-image", "url(" + this.src + ")")
  //       .addClass("s-back-switch");
  //     if ($imgDataHidden) {
  //       _this.css("visibility", "hidden");
  //       _this.show();
  //     } else {
  //       _this.hide();
  //     }
  //   });
  // }

  function adminBarPositionFix() {
    if ($("#wpadminbar").length) {
      $("#wpadminbar").css("position", "fixed");
    }
  }

  function errorPageHeight() {
    if ($(".etnos-error--wrap").length) {
      var footerH = $(".etnos-footer").length
          ? $(".etnos-footer").outerHeight()
          : 0,
        headerH = $(".etnos-header--wrap").length
          ? $(".etnos-header--wrap").outerHeight()
          : 0,
        errorH = $(window).height() - footerH - headerH;

      $(".etnos-error--wrap").outerHeight(errorH);
    }
  }

  $(".etnos-blog--single__comments-button").on("click", function () {
    $(this).toggleClass("active");
    if ($(".etnos-blog--single__comments").length) {
      $(".etnos-blog--single__comments").slideToggle();
    }
  });

  $(window).on("load resize orientationchange", function () {
    // calcPaddingMainWrapper();
    // setTimeout(blogIsotope, 200);
    adminBarPositionFix();
    errorPageHeight();
  });
})(jQuery, window, document);
