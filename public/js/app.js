;(function($) {

	function Slider() {
		this.sectionId = 'bio';
	}

	Slider.prototype.blink = function(newSectionId) {
		var self = this;

		// ||
		// $('#' + self.sectionId).fadeOut(100, function() {
		// 	$('#' + newSectionId).fadeIn(100);
		// 	self.sectionId = newSectionId;
		// });

		$('#' + self.sectionId).css('display', 'none');
		$('#' + newSectionId).css('display', 'block');
		self.sectionId = newSectionId;
	};

	var slider = new Slider(),
		mainTitle = $('nav h1');
		activeNavItem = $('.bio');

	$('.nav-item').on('click', function() {
		var $this = $(this);
		if(!$this.hasClass('active-item')) {
			activeNavItem.removeClass('active-item');
			activeNavItem = $this;

			// mainTitle.fadeOut(200, function() {
				var title = $this.next().data('title');
				mainTitle.text(title);//.fadeIn(200);
			// });

			var newSectionId = activeNavItem.addClass('active-item').data('section-id');
			slider.blink(newSectionId);
		}
	});

})(jQuery);