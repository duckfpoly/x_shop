
// LoadLess
function load_less(array, btn_less, btn_more, view_cut) {
    $(btn_less).click(function (e) {
        e.preventDefault();
        $(array).slice(view_cut, $(array).lenght).slideUp();
        $(btn_more).removeClass("d-none");
        $(btn_less).addClass("d-none");
    });
}

function load_less_scroll(array, btn_less, btn_more, view_cut, height) {
    $(btn_less).click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: height
        }, 0);
        $(array).slice(view_cut, $(array).lenght).slideUp();
        $(btn_more).removeClass("d-none");
        $(btn_less).addClass("d-none");
    });
}




// load more
function load_more(array, btn_more, btn_less, view) {
    $(array).hide();
    $(array).slice(0, view).show();
    if ($(array).length <= view) {
        $(btn_more).addClass("d-none");
    }
    else {
        $(btn_more).on("click", function (e) {
            e.preventDefault();
            $(array + ":hidden").slice(0, view).slideDown();
            if ($(array + ":hidden").length == 0) {
                $(btn_more).addClass("d-none");
                $(btn_less).removeClass("d-none");
            }
        });
    }
}
(function ($) {
	'use strict';
	
	// preloader js
	function loader() {
		$(window).on('load', function () {
			$('#ctn-preloader').addClass('loaded');
			$("#loading").fadeOut(500);
			// Una vez haya terminado el preloader aparezca el scroll
			if ($('#ctn-preloader').hasClass('loaded')) {
				// Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
				$('#preloader').delay(900).queue(function () {
					$(this).remove();
				});
                $(window).scroll(function () {
                    var window_top = $(window).scrollTop() + 1;
                    if (window_top > 50) {
                    $('.main_menu').addClass('sticky-top bg-white animated fadeInDown');
                    } else {
                    $('.main_menu').removeClass('sticky-top bg-white animated fadeInDown');
                    }
                });
			}
            else {
                // menu fixed js code
  
            }
		});
	}
	loader();



	

})(jQuery);