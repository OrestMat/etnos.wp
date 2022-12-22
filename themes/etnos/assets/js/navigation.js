/**
 * Header menu
 */
// (function ($, window, document, undefined) {
//   "use strict";

//   const mobileMenuBreakpoint = 1199;
//   let winW = null;

//   /* ============================ */
//   /* CALCULATE WINDOW SIZE (width, height) */

//   /* ============================ */
//   function calcWinSizes() {
//     winW = window.innerWidth;
//   }

//   $(window).on("load resize orientationchange", function () {
//     calcWinSizes();
//   });

//   /*=================================*/
//   /* MOBILE MENU */
//   /*=================================*/

//   if ($(".etnos-header--wrap").length) {
//     // Add dropdown arrow to items with childrens
//     $(".etnos-header--wrap .menu-item-has-children > a").after(
//       '<span class="dropdown-btn"></span>'
//     );

//     $(".etnos-header--wrap").append('<span class="body-overlay"></span>');

//     // click menu item
//     $(".etnos-header--wrap")
//       .find(".menu-item-has-children .dropdown-btn")
//       .on("click", function (e) {
//         e.stopPropagation();
//         if (winW <= mobileMenuBreakpoint) {
//           var parentItems = $(this).parent().parent().parent().parent();

//           if (parentItems.hasClass("etnos-header--menu-wrapper")) {
//             $(this)
//               .closest(".etnos-header--menu-wrapper")
//               .find(".dropdown-btn")
//               .not(this)
//               .next(".sub-menu")
//               .slideUp();
//           }

//           $(this).next(".sub-menu").slideToggle();
//         }
//       });

//     if (!$(".etnos-header--menu-wrapper").find(".btn-close").length) {
//       $(".etnos-header--menu-wrapper").append(
//         '<span class="btn-close"><i class="ion-android-close"></i></span>'
//       );
//     }

//     // Close click
//     $(".btn-close").on("click", function () {
//       $(".etnos-header--menu-wrapper").removeClass("menu-open");
//       $("html").removeClass("no-scroll");

//       $("body").removeClass("sidebar-open");
//       $(".etnos-header--mob-nav__hamburger").removeClass("active");
//     });
//   }

//   $(".etnos-header--mob-nav__hamburger").on("click", function (e) {
//     e.preventDefault();

//     var adminBarH = 0;

//     $(this).toggleClass("active");

//     if ($(this).hasClass("active")) {
//       $("html").addClass("no-scroll");
//       $("body").addClass("sidebar-open");
//       $(".etnos-header--menu-wrapper").addClass("menu-open");
//     } else {
//       $("html").removeClass("no-scroll");
//       $("body").removeClass("sidebar-open");
//       $(".etnos-header--menu-wrapper").removeClass("menu-open");
//     }
//     if ($("#wpadminbar").length) {
//       adminBarH = $(window).width() && $("#wpadminbar").length > 782 ? 32 : 46;
//     }
//     $(".etnos-header--menu-wrapper").css("top", adminBarH);
//   });

//   function resizeMenu() {
//     if ($(window).width() > 1199 && $("html").hasClass("no-scroll")) {
//       $("html").removeClass("no-scroll").height("auto");
//       $(".etnos-header--mob-nav__hamburger").toggleClass("active");
//     } else {
//       var adminBar = 0;

//       if ($("#wpadminbar").length) {
//         adminBar = $(window).width() && $("#wpadminbar").length > 782 ? 32 : 46;
//       }

//       var menuHeight = $(window).height() - adminBar;

//       $(".etnos-header--menu-wrapper").outerHeight(menuHeight);
//     }
//   }

//   $(window).on("load resize orientationchange", function () {
//     resizeMenu();
//   });
// })(jQuery, window, document);

(function ($, window, document, undefined) {
  const burger = $("#etnos-header__main-hamburger-btn");
  const megamenu = $("#etnos-header__mega-menu");
  const header = $("#etnos-header");

  burger.on("click", () => {
    header.toggleClass("open-menu");
    $("html").toggleClass("no-scroll");
  });

  $("#etnos-header__dropdown").click(function () {
    const th = $(this);
    th.stop(true).toggleClass("active");
  });

  if ($(".etnos-header__notification")) {
    $(".etnos-header__notification").is(function () {
      const th = $(this);
      const btn = $("button", th);
      const mainHeader = $(".etnos-main-wrapper ");

      btn.click(function () {
        setCookie("notification", "false", 30);
        mainHeader.removeClass("etnos-notification-active");
        th.hide();
        isHeadingSpace();
      });
    });
  }

  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  // function getCookie(name) {
  //   var nameEQ = name + "=";
  //   var ca = document.cookie.split(";");
  //   for (var i = 0; i < ca.length; i++) {
  //     var c = ca[i];
  //     while (c.charAt(0) == " ") c = c.substring(1, c.length);
  //     if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  //   }
  //   return null;
  // }

  function isHeadingSpace() {
    const heading = $(".etnos-header__wrap");
    const headingH = heading.height();
    const menu = $("#etnos-header__mega-menu");

    menu.css("padding-top", headingH);
  }
  isHeadingSpace();

  $(window).on("load resize orientationchange", function () {
    $("#etnos-header__dropdown").removeClass("active");
  });
})(jQuery, window, document);
