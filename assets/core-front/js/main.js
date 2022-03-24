/**
 * Template Name: Anyar - v2.2.1
 * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
!(function ($) {
	"use strict";

	// Preloader
	$(window).on('load', function () {
		if ($('#preloader').length) {
			$('#preloader').delay(100).fadeOut('slow', function () {
				$(this).remove();
			});
		}
	});

	// Smooth scroll for the navigation menu and links with .scrollto classes
	// var scrolltoOffset = $('#header').outerHeight() - 2;
	// $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function (e) {
	// 	if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
	// 		var target = $(this.hash);
	// 		if (target.length) {
	// 			e.preventDefault();

	// 			var scrollto = target.offset().top - scrolltoOffset;

	// 			if ($(this).attr("href") == '#header' || $(this).attr("href") == 'index.html#header') {
	// 				scrollto = 0;
	// 			}

	// 			$('html, body').animate({
	// 				scrollTop: scrollto
	// 			}, 1500, 'easeInOutExpo');

	// 			if ($(this).parents('.nav-menu, .mobile-nav').length) {
	// 				$('.nav-menu .active, .mobile-nav .active').removeClass('active');
	// 				$(this).closest('li').addClass('active');
	// 			}

	// 			if ($('body').hasClass('mobile-nav-active')) {
	// 				$('body').removeClass('mobile-nav-active');
	// 				$('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
	// 				$('.mobile-nav-overly').fadeOut();
	// 			}
	// 			return false;
	// 		}
	// 	}
	// });

	// Activate smooth scroll on page load with hash links in the url
	$(document).ready(function () {
		if (window.location.hash) {
			var initial_nav = window.location.hash;
			if ($(initial_nav).length) {
				var scrollto = $(initial_nav).offset().top - scrolltoOffset;
				$('html, body').animate({
					scrollTop: scrollto
				}, 1500, 'easeInOutExpo');
			}
		}
	});

	// Mobile Navigation
	if ($('.nav-menu').length) {
		var $mobile_nav = $('.nav-menu').clone().prop({
			class: 'mobile-nav d-lg-none'
		});
		$('body').append($mobile_nav);
		$('body').prepend('<button type="button" id="mobile-nav-toggle" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
		$('body').append('<div class="mobile-nav-overly"></div>');

		$(document).on('click', '.mobile-nav-toggle', function (e) {
			$('body').toggleClass('mobile-nav-active');
			$('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
			$('.mobile-nav-overly').toggle();
		});

		$(document).on('click', '.mobile-nav .drop-down > a', function (e) {
			e.preventDefault();
			$(this).next().slideToggle(300);
			$(this).parent().toggleClass('active');
		});

		$(document).click(function (e) {
			var container = $(".mobile-nav, .mobile-nav-toggle");
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				if ($('body').hasClass('mobile-nav-active')) {
					$('body').removeClass('mobile-nav-active');
					$('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
					$('.mobile-nav-overly').fadeOut();
				}
			}
		});
	} else if ($(".mobile-nav, .mobile-nav-toggle").length) {
		$(".mobile-nav, .mobile-nav-toggle").hide();
	}

	// Navigation active state on scroll
	// var nav_sections = $('section');
	// var main_nav = $('.nav-menu, #mobile-nav');

	// $(window).on('scroll', function () {
	// 	var cur_pos = $(this).scrollTop() + 200;

	// 	nav_sections.each(function () {
	// 		var top = $(this).offset().top,
	// 			bottom = top + $(this).outerHeight();

	// 		if (cur_pos >= top && cur_pos <= bottom) {
	// 			if (cur_pos <= bottom) {
	// 				main_nav.find('li').removeClass('active');
	// 			}
	// 			main_nav.find('a[href="#' + $(this).attr('id') + '"]').parent('li').addClass('active');
	// 		}
	// 		if (cur_pos < 300) {
	// 			$(".nav-menu ul:first li:first").addClass('active');
	// 		}
	// 	});
	// });

	// Toggle .header-scrolled class to #header when page is scrolled
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('#header').addClass('header-scrolled');
			$('#topbar').addClass('topbar-scrolled');
			$('#mobile-nav-toggle').addClass('mobile-nav-toggle-scrolled');
		} else {
			$('#header').removeClass('header-scrolled');
			$('#topbar').removeClass('topbar-scrolled');
			$('#mobile-nav-toggle').removeClass('mobile-nav-toggle-scrolled');
		}
	});

	if ($(window).scrollTop() > 100) {
		$('#header').addClass('header-scrolled');
		$('#topbar').addClass('topbar-scrolled');
		$('#mobile-nav-toggle').addClass('mobile-nav-toggle-scrolled');
	}

	// Back to top button
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$('.back-to-top').fadeIn('slow');
		} else {
			$('.back-to-top').fadeOut('slow');
		}
	});

	$('.back-to-top').click(function () {
		$('html, body').animate({
			scrollTop: 0
		}, 1500, 'easeInOutExpo');
		return false;
	});

	// Intro carousel
	// var heroCarousel = $("#heroCarousel");

	// heroCarousel.on('slid.bs.carousel', function(e) {
	//   $(this).find('h2').addClass('animate__animated animate__fadeInDown');
	//   $(this).find('p, .btn-get-started').addClass('animate__animated animate__fadeInUp');
	// });

	// Clients carousel (uses the Owl Carousel library)
	$(".clients-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		responsive: {
			0: {
				items: 2
			},
			768: {
				items: 4
			},
			900: {
				items: 5
			}
		}
	});



	var heroCarousel = $("#heroCarousel");
	var heroCarouselIndicators = $("#hero-carousel-indicators");
	heroCarousel.find(".carousel-inner").children(".carousel-item").each(function (index) {
		(index === 0) ?
		heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "' class='active'></li>"):
			heroCarouselIndicators.append("<li data-target='#heroCarousel' data-slide-to='" + index + "'></li>");
	});

	heroCarousel.on('slid.bs.carousel', function (e) {
		$(this).find('h2').addClass('animate__animated animate__fadeInDown');
		$(this).find('p, .btn-get-started').addClass('animate__animated animate__fadeInUp');
	});

	var heroCarousel2 = $("#heroCarousel2");
	var heroCarouselIndicators2 = $("#hero-carousel-indicators2");
	heroCarousel2.find(".carousel-inner").children(".carousel-item").each(function (index) {
		(index === 0) ?
		heroCarouselIndicators2.append("<li data-target='#heroCarousel2' data-slide-to='" + index + "' class='active'></li>"):
			heroCarouselIndicators2.append("<li data-target='#heroCarousel2' data-slide-to='" + index + "'></li>");
	});

	heroCarousel2.on('slid.bs.carousel', function (e) {
		$(this).find('h2').addClass('animate__animated animate__fadeInDown');
		$(this).find('p, .btn-get-started').addClass('animate__animated animate__fadeInUp');
	});


	// Porfolio isotope and filter
	$(window).on('load', function () {
		var portfolioIsotope = $('.portfolio-container').isotope({
			itemSelector: '.portfolio-item',
			layoutMode: 'fitRows'
		});

		$('#portfolio-flters li').on('click', function () {
			$("#portfolio-flters li").removeClass('filter-active');
			$(this).addClass('filter-active');

			portfolioIsotope.isotope({
				filter: $(this).data('filter')
			});
			aos_init();
		});

		// Initiate venobox (lightbox feature used in portofilo)
		$(document).ready(function () {
			$('.venobox').venobox();
		});
	});



	// Scroll to a section with hash in url
	// $(window).on('load', function () {

	// 	if (window.location.hash) {
	// 		var initial_nav = window.location.hash;
	// 		if ($(initial_nav).length) {
	// 			var target_hash = $(initial_nav);
	// 			var scrollto_hash = target_hash.offset().top - $('#header').outerHeight();
	// 			$('html, body').animate({
	// 				scrollTop: scrollto_hash
	// 			}, 1500, 'easeInOutExpo');
	// 			$('.nav-menu .active, .mobile-nav .active').removeClass('active');
	// 			$('.nav-menu, .mobile-nav').find('a[href="' + initial_nav + '"]').parent('li').addClass('active');
	// 		}
	// 	}

	// });

	// Portfolio details carousel
	$(".portfolio-details-carousel").owlCarousel({
		autoplay: true,
		dots: true,
		loop: true,
		items: 1
	});

	// Init AOS
	function aos_init() {
		AOS.init({
			duration: 1000,
			easing: "ease-in-out-back",
			once: true
		});
	}
	$(window).on('load', function () {
		aos_init();
	});

	

})(jQuery);

function tampilkanSembunyikan1() {

	var dots1 = document.getElementById("dots1");
	var moreText1 = document.getElementById("text1");
	var moreText11 = document.getElementById("text11");
	var btnText = document.getElementById("tampilkan1");

	if (dots1.style.display === "none") {
		dots1.style.display = "inline";
		btnText.innerHTML = "Selengkapnya"; 
		moreText1.style.display = "none";
		moreText11.style.display = "none";
	} else {
		dots1.style.display = "none";
		btnText.innerHTML = "Sembunyikan"; 
		moreText1.style.display = "inline";
		moreText11.style.display = "inline";
	}
}
function tampilkanSembunyikan2() {

	var dots2 = document.getElementById("dots2");
	var moreText2 = document.getElementById("text2");
	var moreText21 = document.getElementById("text21");
	var btnText = document.getElementById("tampilkan2");

	if (dots2.style.display === "none") {
		dots2.style.display = "inline";
		btnText.innerHTML = "Selengkapnya"; 
		moreText2.style.display = "none";
		moreText21.style.display = "none";
	} else {
		dots2.style.display = "none";
		btnText.innerHTML = "Sembunyikan"; 
		moreText2.style.display = "inline";
		moreText21.style.display = "inline";
	}
}
function tampilkanSembunyikan3() {

	var dots3 = document.getElementById("dots3");
	var moreText3 = document.getElementById("text3");
	var moreText31 = document.getElementById("text31");
	var btnText = document.getElementById("tampilkan3");

	if (dots3.style.display === "none") {
		dots3.style.display = "inline";
		btnText.innerHTML = "Selengkapnya"; 
		moreText3.style.display = "none";
		moreText31.style.display = "none";
	} else {
		dots3.style.display = "none";
		btnText.innerHTML = "Sembunyikan"; 
		moreText3.style.display = "inline";
		moreText31.style.display = "inline";
	}
}
function tampilkanSembunyikan4() {

	var dots4 = document.getElementById("dots4");
	var moreText4 = document.getElementById("text4");
	var moreText41 = document.getElementById("text41");
	var btnText = document.getElementById("tampilkan4");

	if (dots4.style.display === "none") {
		dots4.style.display = "inline";
		btnText.innerHTML = "Selengkapnya"; 
		moreText4.style.display = "none";
		moreText41.style.display = "none";
	} else {
		dots4.style.display = "none";
		btnText.innerHTML = "Sembunyikan"; 
		moreText4.style.display = "inline";
		moreText41.style.display = "inline";
	}
}
function tampilkanSembunyikan5() {

	var dots5 = document.getElementById("dots5");
	var moreText5 = document.getElementById("text5");
	var btnText = document.getElementById("tampilkan5");

	if (dots5.style.display === "none") {
		dots5.style.display = "inline";
		btnText.innerHTML = "Selengkapnya"; 
		moreText5.style.display = "none";
	} else {
		dots5.style.display = "none";
		btnText.innerHTML = "Sembunyikan"; 
		moreText5.style.display = "inline";
	}
}
function tampilkanSembunyikan6() {

	var dots6 = document.getElementById("dots6");
	var moreText6 = document.getElementById("text6");
	var btnText = document.getElementById("tampilkan6");

	if (dots6.style.display === "none") {
		dots6.style.display = "inline";
		btnText.innerHTML = "Selengkapnya"; 
		moreText5.style.display = "none";
	} else {
		dots6.style.display = "none";
		btnText.innerHTML = "Sembunyikan"; 
		moreText6.style.display = "inline";
	}
}