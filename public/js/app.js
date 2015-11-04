;(function($) {

	var smileImg = $("#smile-img");

	smileImg.on('mouseenter', function () {
		this.src = '/img/smile_white_small.png';
	});

	smileImg.on('mouseleave', function () {
		this.src = '/img/smile_white.png';
	});

	if (location.href.indexOf('posts') > -1) {
		$('#posts-link').addClass('active-link');
	} else if (location.href.indexOf('ask') > -1) {
		$('#ask-link').addClass('active-link');
	} else if(location.href.indexOf('email') > -1) {
		$('#email-link').addClass('active-link');
	} else {
		$('#bio-link').addClass('active-link');
	}

	// function Slider() {
	// 	this.sectionId = 'bio';
	// }

	// Slider.prototype.blink = function(newSectionId) {
		// var self = this;

		// ||
		// $('#' + self.sectionId).fadeOut(100, function() {
		// 	$('#' + newSectionId).fadeIn(100);
		// 	self.sectionId = newSectionId;
		// });

	// 	$('#' + self.sectionId).css('display', 'none');
	// 	$('#' + newSectionId).css('display', 'block');
	// 	self.sectionId = newSectionId;
	// };

	// var slider = new Slider(),
	// 	mainTitle = $('nav #pageTitle');
	// 	activeNavItem = $('.bio');

	// $('.nav-item').on('click', function() {
	// 	var $this = $(this);
	// 	if(!$this.hasClass('active-item')) {
	// 		activeNavItem.removeClass('active-item');
	// 		activeNavItem = $this;

	// 		// mainTitle.fadeOut(200, function() {
	// 			var title = $this.next().data('title');
	// 			mainTitle.text(title);//.fadeIn(200);
	// 		// });

	// 		var newSectionId = activeNavItem.addClass('active-item').data('section-id');
	// 		slider.blink(newSectionId);
	// 	}
	// });

})(jQuery);