;(function($) {
	var smileImg = $("#smile-img");

	smileImg.on('mouseenter', function () {
		this.src = '/assets/img/smile_white_small.png';
	});

	smileImg.on('mouseleave', function () {
		this.src = '/assets/img/smile_white.png';
	});
})(jQuery);