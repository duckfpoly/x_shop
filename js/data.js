AOS.init();

var btn = $('#btn-back-to-top');
$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.removeClass('d-none');
    btn.addClass('d-block');
  } else {
    btn.addClass('d-none');
    btn.removeClass('d-block');
  }
});
btn.on('click', function (e) {
  e.preventDefault();
  $('html, body').animate({
    scrollTop: 0
  }, 0);
});
(function ($) {
  "use strict";


  // // menu fixed js code
  // $(window).scroll(function () {
  //   var window_top = $(window).scrollTop() + 1;
  //   if (window_top > 50) {
  //     $('.main_menu').addClass('sticky-top animated fadeInDown');
  //   } else {
  //     $('.main_menu').removeClass('sticky-top animated fadeInDown');
  //   }
  // });

  // Search Toggle
  $("#search_input_box").hide();
  $("#search_1").on("click", function () {
    $("#search_input_box").slideToggle();
    $("#search_input").focus();
  });
  $("#close_search").on("click", function () {
    $('#search_input_box').slideUp(500);
  });
  //------- makeTimer js --------//  
  function makeTimer() {

    //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");	
    var endTime = new Date("27 Sep 2019 12:56:00 GMT+01:00");
    endTime = (Date.parse(endTime) / 1000);

    var now = new Date();
    now = (Date.parse(now) / 1000);

    var timeLeft = endTime - now;

    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

    if (hours < "10") {
      hours = "0" + hours;
    }
    if (minutes < "10") {
      minutes = "0" + minutes;
    }
    if (seconds < "10") {
      seconds = "0" + seconds;
    }

    $("#days").html("<span>Days</span>" + days);
    $("#hours").html("<span>Hours</span>" + hours);
    $("#minutes").html("<span>Minutes</span>" + minutes);
    $("#seconds").html("<span>Seconds</span>" + seconds);

  }
  // click counter js
  (function () {

    window.inputNumber = function (el) {

      var min = el.attr('min') || false;
      var max = el.attr('max') || false;

      var els = {};

      els.dec = el.prev();
      els.inc = el.next();

      el.each(function () {
        init($(this));
      });

      function init(el) {

        els.dec.on('click', decrement);
        els.inc.on('click', increment);

        function decrement() {
          var value = el[0].value;
          value--;
          if (!min || value >= min) {
            el[0].value = value;
          }
        }

        function increment() {
          var value = el[0].value;
          value++;
          if (!max || value <= max) {
            el[0].value = value++;
          }
        }
      }
    }
  })();

  inputNumber($('.input-number'));
  setInterval(function () {
    makeTimer();
  }, 1000);

  $('.select_option_dropdown').hide();
  $(".select_option_list").click(function () {
    $(this).parent(".select_option").children(".select_option_dropdown").slideToggle('100');
    $(this).find(".right").toggleClass("fas fa-caret-down, fas fa-caret-up");
  });

  if ($('.new_arrival_iner').length > 0) {
    var containerEl = document.querySelector('.new_arrival_iner');
    var mixer = mixitup(containerEl);
  }

  $('.controls').on('click', function () {
    $(this).addClass('active').siblings().removeClass('active');
  });
}(jQuery));

$(document).ready(function () {
  $('#close_box_update').click(function () { close_model_update() });
  $('#overlay').click(function () { close_model_update() });
});

$('#desc').click(function () {
  $("#box_modal_update").css({
    'display': 'block'
  });
  var box_modal = function () {
    $("#box_modal_update").css({
      'animation': 'box_modal_update 0.3s linear',
    });
  };
  setTimeout(box_modal, 1);
  $("#overlay").css({
    'display': 'block'
  });
});

function close_model_update() {
  $("#overlay").css({
    'display': 'none'
  });
  $("#box_modal_update").css({
    'animation': '',
  });
  var myFnc = function () {
    $("#box_modal_update").css({
      'display': 'none'
    });
  };
  setTimeout(myFnc, 500);
  $("#box_modal_update").css({
    'animation': 'close_box_modal_update 0.7s',
  });
}
