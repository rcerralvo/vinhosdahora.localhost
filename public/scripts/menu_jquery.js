jQuery("document").ready(function($){
	
	var nav = $('nav');
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 210) {
			nav.addClass('f-nav');
		} else {
			nav.removeClass('f-nav');
		}
	});
});