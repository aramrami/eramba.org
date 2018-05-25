jQuery(function($) {
	if (!$("#table-of-contents").length) {
		return false;
	}

	var $toc = $("#table-of-contents");
	var $parse = $(".main-content article");

	if ($toc.data("parseSelector")) {
		$parse = $toc.data("parseSelector");
	}

	$toc.prepend(parseData());

	var body = $("html, body");
	$(".table-of-contents .doc-list a").on("click", function(e) {
		e.preventDefault();

		var id = $(this).attr("href");
		var top = $(id).offset().top;

		body.animate({scrollTop:top}, '400', function() { 
			//alert("Finished animating");
		});
	});

	
	function parseData() {
		var $toc = $("#table-of-contents");
		var $parse = $(".main-content article");

		if ($toc.data("parse-selector")) {
			$parse = $toc.data("parse-selector");
		}

		if (!$parse.find("h2").length && !$parse.find("h3").length) {
			return '<p>Nothing to show.</p>'
		}

		var Toc = '';
		if ($parse.find("h2").length) {
			Toc = parseHeadings($parse.find("h2"), true);
		}
		else if($parse.find("h3").length) {
			Toc = parseHeadings($parse.find("h3"), true);
		}


		return Toc;
	}

	function parseHeadings(elements, firstLevel) {
		if (!elements.length) {
			return '';
		}

		var items = '<ul>';
		if (firstLevel) {
			items = "<ul class='doc-list'>";
		}

		elements.each(function(i, el) {
		
			var children, newLine, title, link, children, childrenList, childrenLine;
			el = $(el);
		
			if (el.prop("tagName").toLowerCase() == "h2") {
				children = el.nextUntil("h2", "h3");
			}
			else {
				children = [];
			}

			if (children.length) {
				childrenList = parseHeadings(children, false);
			}
			else {
				childrenList = '';
			}

			title = el.text();
			setId(el);

			link = "#" + el.attr("id");

			newLine =
			"<li>" +
				"<a href='" + link + "'>" +
				title +
				"</a>" +
				childrenList +
			"</li>";

			items += newLine;
		});

		items += "</ul>";

		return items;
	}

	function setId(el) {
		if (!el.attr("id")) {
			el.attr("id", convertToSlug(el.text()));
		}
	}

	function convertToSlug(Text) {
		return Text
			.toLowerCase()
			.replace(/ /g,'-')
			.replace(/[^\w-]+/g,'')
			;
	}
});