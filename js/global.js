/* global ajthemeblog */
(function ($) {

	// Variables and DOM Caching.
	var $body = $('body'),
		$customHeader = $body.find('.header-blog'),
		isFrontPage = $body.hasClass('home'),
		headerOffset;

	function ajustStyleHeader() {
		if (isFrontPage) {
			$customHeader.addClass('transparent');
			if (window.pageYOffset >= 80) {
				$customHeader.removeClass('transparent');
			}
		}
	}

	function featuredPostSlide() {
		$('.featured-post-slides').slick({
			dots: true,
			arrows: false,
			infinite: true,
			speed: 500,
			fade: false,
			cssEase: 'linear',
			slidesToShow: 1,
			autoplay: true,
  			autoplaySpeed: 4000
		});
	}

	// Fire on document ready.
	$(document).ready(function () {
		ajustStyleHeader();
		featuredPostSlide();
	});

	$(window).resize(function () {
		ajustStyleHeader();
	});

	$(window).on('scroll', function () {
		ajustStyleHeader();
	});

})(jQuery);


jQuery(function($){
	$('#select-category-home-filter').on('change', function(){
		var filter = $('#filter');
		$.ajax({
			url:filter.attr('action'),
			data:filter.serialize(), // form data
			type:filter.attr('method'), // POST
			beforeSend:function(xhr){
				$('.global-loading').addClass('show');
			},
			success:function(data){
				$('.global-loading').removeClass('show');
				$('#response').html(data); // insert data
			}
		});
		return false;
	});
});
