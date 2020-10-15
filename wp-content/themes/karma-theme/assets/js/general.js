
$(document).ready(function() {
/*banner slider*/
$(".hl-banner-slider").owlCarousel(
	{
		items: 1,
		autoplay: false,
		autoplayTimeout: 3000,
		smartSpeed: 1500,
		loop: true,
		dots:false,
		nav: false,
		autoplayTimeout: 3000,
		smartSpeed: 1500,
		onInitialize: function (e) {
			if ($(".hl-banner-slider figure").length >= 2) {
				this.settings.loop = 1
			} else {
				this.settings.loop = !1;
			}
		},
	});
	
/*************** Sticky Header *****************/
   $(window).scroll(function()
{
	if ($(window).scrollTop() > 100)
	{
		$('header').addClass('sticky');
	}
	else
	{
		$('header').removeClass('sticky');
	}
});
/************ header search ******************/
	$(".search-btn").click(function(){
        $(".search-box-main").fadeIn();
		$("body").addClass("popup");
    });
	  $(".search-close").click(function(){
        $(".search-box-main").fadeOut();
		$("body").removeClass("popup");
    });  
/************* Animation *******************/
	var get_width = $(window).width();
	if (get_width >= 1025) {
		new WOW().init();
	} 
/************* Custom Scrollbar*******************/
   $(".welcometxt").mCustomScrollbar({
        mouseWheel: {
            enable: true
        },
        contentTouchScroll: true
    });
    

$(document).ready(function ()
	{
		if ($(window).scrollTop() > 100)
			{
				$('.scroll-top').addClass('visible');
				$('header').addClass('sticky');
			}
		$(".scroll-top").click(function () {
			$('html, body').animate({
				scrollTop: 0
			}, 2000);
	});
}); 

$(".client_tesimonialslider").owlCarousel({
	autoplay: false,
	autoplayTimeout: 3000,
	loop: true,
	center: false,
	smartSpeed: 1500,
	nav: false,
	margin:50,
	dots: true,
	responsiveClass: true,
	responsive: {
		0: {
			items: 1
		},
		375: {
			items: 1,
		},
		567: {
			items:1,
			margin:10
		},	
		991: {
			items: 1,
			margin:10,
		},
		992: {
			items: 1,
		
		}
	}
});


/************ inner page ************************/

$(".serviceslider").owlCarousel({
	autoplay: false,
	autoplayTimeout: 3000,
	loop: true,
	center: false,
	smartSpeed: 1500,
	nav: false,
	margin:30,
	dots: true,
	responsiveClass: true,
	responsive: {
		0: {
			items: 1
		},
		375: {
			items: 2,
		},
		567: {
			items:2,
			margin:10
		},	
		991: {
			items: 3,
			margin:10,
		},
		992: {
			items: 4,
		
		}
	}
});


/********************* mobile-accordion ************************/
$(".mobile-accordion .title span").click(function() {
	if ($(this).parent(".title").parent(".mobile-accordion").hasClass("in")) {
		$(this).parent(".title").parent(".mobile-accordion").children("ul").slideUp();
		$(this).parent(".title").parent(".mobile-accordion").children(".mobile-accordion-toggle").slideUp();
		$(".mobile-accordion").removeClass("in");
	} else {
		$(".mobile-accordion").children("ul").slideUp();
		$(".mobile-accordion").children(".mobile-accordion-toggle").slideUp();
		$(".mobile-accordion").removeClass("in");
		$(this).parent(".title").parent(".mobile-accordion").children("ul").slideDown();
		$(this).parent(".title").parent(".mobile-accordion").toggleClass("in");
		if ($(this).parent(".title").parent(".mobile-accordion").hasClass('mobile-toggle')) {
			$(this).parent(".title").parent(".mobile-accordion").children(".mobile-accordion-toggle").slideToggle();
		} else {
			$(".mobile-accordion-toggle").slideUp();
		}
	}
});
/************* Scroll Top *************/
$(window).scroll(function ()
{
	if ($(window).scrollTop() > 100)
	{
		$('.scroll-top').addClass('visible');
		$('header').addClass('sticky');
	} else {
		$('.scroll-top').removeClass('visible');
		$('header').removeClass('sticky');
	}
});
/********** scroll down********************/
	jQuery('#scroll_down').click(function() {
    jQuery('html, body').animate({
        scrollTop: jQuery(".seo_sec").offset().top - 100
    }, 2000);
	}); 
});
