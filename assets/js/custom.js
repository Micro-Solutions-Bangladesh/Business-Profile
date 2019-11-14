"use strict";

(function ($) {
  $(document).ready(function ($) {
    // $('.carousel').carousel();

    /**
     * Superfish
     */
    if ($(".sf-menu")[0]) {
      $('.sf-menu').superfish({
        delay: 100,
        animation: {
          opacity: 'show',
          height: 'show'
        },
        speed: 300,
        autoArrows: false
      });
    }
    /**
     * Snap for Mobile Version Slider
     */


    var snapper;

    function initSnapper() {
      if ($(window).innerWidth() <= 959) {
        if (snapper === undefined) {
          snapper = new Snap({
            element: document.getElementById('page'),
            transitionSpeed: 0.6,
            disable: 'right'
          });
        } else {
          snapper.enable();
        }
      } else if (snapper !== undefined) {
        snapper.disable();
        snapper.close('left');
      }
    }

    $(window).resize(initSnapper);
    initSnapper();
    var header_nav_prepand = '<div id="open-left"><i class="icofont-navigation-menu"></i></div>';
    $("#top_nav nav").prepend(header_nav_prepand);
    var snap_drawers = '<div class="snap-drawers"><div class="snap-drawer snap-drawer-left"><ul class="snap-nav"></ul></div></div>';
    $("body").prepend(snap_drawers);
    var sf_menu = $('.sf-menu').html();
    $(".snap-drawer ul").html(sf_menu);
    $('#open-left').click(function () {
      if ($('body').hasClass('snapjs-left')) {
        snapper.close('left');
      } else if ($('body:not(.snapjs-left)')) {
        snapper.open('left');
      }
    });
    /**
     * Go Top Button
     */

    jQuery('#goTop').click(function () {
      jQuery('body,html').animate({
        scrollTop: 0
      }, 1000);
    });
    jQuery("#goTop").html('<i class="icofont-block-up"></i>').addClass("hidegt");
    jQuery(window).scroll(function () {
      if (jQuery(this).scrollTop() < 100) {
        jQuery("#goTop").addClass("hidegt").removeClass("showgt");
      } else {
        jQuery("#goTop").removeClass("hidegt").addClass("showgt");
      }
    });
  });
})(jQuery);