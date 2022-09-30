(function ($) {
  "use strict";

  // menu fixed js code
  $(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 10) {
      $('.main_menu').addClass('menu_fixed animated fadeInDown');
    } else {
      $('.main_menu').removeClass('menu_fixed animated fadeInDown');
    }
  });
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
(function() {
 
  window.inputNumber = function(el) {

    var min = el.attr('min') || false;
    var max = el.attr('max') || false;

    var els = {};

    els.dec = el.prev();
    els.inc = el.next();

    el.each(function() {
      init($(this));
    });

    function init(el) {

      els.dec.on('click', decrement);
      els.inc.on('click', increment);

      function decrement() {
        var value = el[0].value;
        value--;
        if(!min || value >= min) {
          el[0].value = value;
        }
      }

      function increment() {
        var value = el[0].value;
        value++;
        if(!max || value <= max) {
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
//  $('.controls').on('click', function(){
//   $('.controls').removeClass('add');
//   $('.controls').addClass('add');
//  });

 $('.controls').on('click', function(){
  $(this).addClass('active').siblings().removeClass('active');
 }); 


}(jQuery));



const view = new URLSearchParams(window.location.search).get('v');
if(view){
    if(view == 'shop'){
        $('#shop').addClass('active fw-bold');  
    }
    else if (view == 'about'){
        $('#about').addClass('active fw-bold');  
    }
    else if (view == 'contact'){
        $('#contact').addClass('active fw-bold');  
    }
    else if (view == 'feedback'){
        $('#feedback').addClass('active fw-bold');  
    }
    else if (view == 'blog'){
        $('#blog').addClass('active fw-bold');  
    }
}
else {
    $('#home').addClass('active fw-bold');  
}

var btn = $('#btn-back-to-top');
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.removeClass('d-none');
    btn.addClass('d-block');
  } else {
    btn.addClass('d-none');
    btn.removeClass('d-block');
  }
});
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({
    scrollTop: 0
  }, 0);
});
