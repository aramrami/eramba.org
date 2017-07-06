jQuery(function($) {
	$(window).on("load", function(e) {
		$("body").addClass("window-loaded");
	});

	$(document).ready(function() {

		$(".gallery > .gallery-item a").each(function() {
			if (!$(this).prop("title")) {
				$(this).prop("title", $(this).children("img").prop("alt"));
			}

			$(this).prop("rel", $(this).closest(".gallery").prop("id"));
		});

		$(".gallery > .gallery-item a").fancybox({
			theme: "light",
			caption : {
				type : 'outside'
			},
			openEffect  : 'fade',
			closeEffect : 'fade',
			nextEffect  : 'fade',
			prevEffect  : 'fade',
			padding: 0
		});
	});

	$(".nano").nanoScroller();
});