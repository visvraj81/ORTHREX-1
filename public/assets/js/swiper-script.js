document.addEventListener("DOMContentLoaded", function () {
	var swiperPartner = new Swiper(".swiper-partner", {
	slidesPerView: 2,
	spaceBetween: 30,
	loop: true,
	loopedSlides: 5,
	grabCursor: false,
	observer: true,
	observeParents: true,
	speed: 1000,
	autoplay: {
		delay: 2000,
		disableOnInteraction: false,
		pauseOnMouseEnter: true,
	},
	breakpoints: {
		0: {
			slidesPerView: 2,
		},
		767: { 
			slidesPerView: 4
		},
	},
	});
});

document.addEventListener("DOMContentLoaded", function () {
	var swiperPricingPartner = new Swiper(".swiper-pricing-partner", {
		slidesPerView: 2,
		spaceBetween: 30,
		loop: true,
		loopedSlides: 5,
		grabCursor: false,
		observer: true,
		observeParents: true,
		speed: 1000,
		autoplay: {
			delay: 2000,
			disableOnInteraction: false,
			pauseOnMouseEnter: true,
		},
		breakpoints: {
			0: {
				slidesPerView: 2,
			},
			767: { 
				slidesPerView: 4
			},
			991: {
				slidesPerView: 6
			},
		},
	});
});
