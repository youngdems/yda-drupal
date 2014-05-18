jQuery(document).ready(function ($) {
  // toTop
	$.scrollToTop();
	
	// Browser Selector
	$.browserSelector();
	
	// Mobile Menu
	$('header .region-header-menu').mobileMenu();
	
  // Temporary Menu fix for last parent item with children
	$("ul.porto-nav:first-child").removeClass("dropdown-menu");
	$("ul.porto-nav:first-child").addClass("nav nav-pills nav-main");

  $(".comment-form .form-type-textfield").addClass("span4");
  
  $(".contact-form .form-item-name").addClass("span3");
  $(".contact-form .form-item-mail").addClass("span3");
  $(".contact-form .form-item-subject").addClass("span6");
  
  $('.checkout-review').addClass('table');
  
	
	// Tooltip
	$("a[rel=tooltip]").tooltip();
	
	// prettyPhoto
	$(window).load(function() {
	  $("a[rel^='flickr']").prettyPhoto();
  }); 
  
  function animations() {

		$("[data-appear-animation]").each(function() {

			var $this = $(this);

			$this.addClass("appear-animation");

			if(!$("html").hasClass("no-csstransitions") && $(window).width() > 767) {

				$this.appear(function() {

					var delay = ($this.attr("data-appear-animation-delay") ? $this.attr("data-appear-animation-delay") : 1);

					if(delay > 1) $this.css("animation-delay", delay + "ms");
					$this.addClass($this.attr("data-appear-animation"));

					setTimeout(function() {
						$this.addClass("appear-animation-visible");
					}, delay);

				}, {accX: 0, accY: -150});

			} else {

				$this.addClass("appear-animation-visible");

			}

		});

	}
	
	animations();
  
  function parallax() {

		$(window).load(function () {

			if($(".parallax").get(0)) {
				if (!$('html').hasClass('touch')) {
					$(window).stellar({
						responsive:true,
						scrollProperty: 'scroll',
						parallaxElements: false,
						horizontalScrolling: false,
						horizontalOffset: 0,
						verticalOffset: 0
					});
				} else {
					$(".parallax").addClass("disabled");
				}
			}
		});

	}
	
	parallax(); 
	
  function flexslider() {

		$("div.flexslider").each(function() {

			var slider = $(this);

			var defaults = {
				animationLoop: false,
				controlNav: true,
				directionNav: true
			}

			var config = $.extend({}, defaults, slider.data("plugin-options"));

			if(($(window).width() < 768 && slider.hasClass("normal-device")) || $(window).width() > 768 && slider.hasClass("small-device") || (!slider.hasClass("flexslider-init"))) {

				// Reset if already initialized.
				if(slider.find("div.flex-viewport") && typeof(config.maxVisibleItems) != "undefined") {

					var el = slider;

					el.find("li.clone").remove();

					var elClean = el.clone();

					elClean.find("div.flex-viewport").children().unwrap();

					elClean
						.find("ul.flex-direction-nav, ol.flex-control-nav")
						.remove()
						.end()
						.find("*").removeAttr("style").removeClass (function (index, css) {
							return (css.match (/\bflex\S+/g) || []).join(" ");
						});

					elClean.insertBefore(el);

					el.remove();

					slider = elClean;

				}

				// Set max visible items.
				if(typeof(config.maxVisibleItems) != "undefined") {

					slider.find("ul.slides li > div").unwrap();

					var items = slider.find("ul.slides").children("div");
					var visibleItems = config.maxVisibleItems;

					if($(window).width() < 768) {
						visibleItems = 1;
						slider
							.removeClass("normal-device")
							.addClass("small-device");
					} else {
						slider
							.removeClass("small-device")
							.addClass("normal-device");
					}

					for (var i = 0; i < items.length; i+= visibleItems) {
						var slice = items.slice(i,i + visibleItems);

						slice.wrapAll("<li></li>");
					}

				}

			}
			// Initialize Slider
			slider.flexslider(config).addClass("flexslider-init");

			if(config.controlNav)
				slider.addClass("flexslider-control-nav");

			if(config.directionNav)
				slider.addClass("flexslider-direction-nav");

		});

	}
			
			flexslider();
	
	// Dropdown arrow for menu
	$('li.dropdown a').append('<i class="icon-angle-down"></i>');
	  
  // Circle Slider
	if($("#fcSlideshow").get(0)) {
		$("#fcSlideshow").flipshow();
		
		setInterval( function() {
			$("#fcSlideshow div.fc-right span:first").click();
		}, 3000);
		
	}
			
	// Nivo Slider
	if($("#nivoSlider").get(0)) {
		$("#nivoSlider").nivoSlider();
	}
	
	function lightbox() {

		// Internationalization of Lightbox
		$.extend(true, $.magnificPopup.defaults, {
			tClose: 'Close (Esc)', // Alt text on close button
			tLoading: 'Loading...', // Text that is displayed during loading. Can contain %curr% and %total% keys
			gallery: {
				tPrev: 'Previous (Left arrow key)', // Alt text on left arrow
				tNext: 'Next (Right arrow key)', // Alt text on right arrow
				tCounter: '%curr% of %total%' // Markup for "1 of 7" counter
			},
			image: {
				tError: '<a href="%url%">The image</a> could not be loaded.' // Error message when image could not be loaded
			},
			ajax: {
				tError: '<a href="%url%">The content</a> could not be loaded.' // Error message when ajax request failed
			}
		});

		$(".lightbox").each(function() {

			var el = $(this);

			var config, defaults = {}
			if(el.data("plugin-options"))
				config = $.extend({}, defaults, el.data("plugin-options"));

			$(this).magnificPopup(config);

		});

	}
	
	lightbox();
	
	function toggle() {

		var $this = this;
			previewParClosedHeight = 25;

		$("section.toggle > label").prepend($("<i />").addClass("icon-plus"));
		$("section.toggle > label").prepend($("<i />").addClass("icon-minus"));
		$("section.toggle.active > p").addClass("preview-active");
		$("section.toggle.active > div.toggle-content").slideDown(350, function() {});

		$("section.toggle > label").click(function(e) {

			var parentSection = $(this).parent(),
				parentWrapper = $(this).parents("div.toogle"),
				previewPar = false,
				isAccordion = parentWrapper.hasClass("toogle-accordion");

			if(isAccordion && typeof(e.originalEvent) != "undefined") {
				parentWrapper.find("section.toggle.active > label").trigger("click");
			}

			parentSection.toggleClass("active");

			// Preview Paragraph
			if(parentSection.find("> p").get(0)) {

				previewPar = parentSection.find("> p");
				var previewParCurrentHeight = previewPar.css("height");
				previewPar.css("height", "auto");
				var previewParAnimateHeight = previewPar.css("height");
				previewPar.css("height", previewParCurrentHeight);

			}

			// Content
			var toggleContent = parentSection.find("> div.toggle-content");

			if(parentSection.hasClass("active")) {

				$(previewPar).animate({
					height: previewParAnimateHeight
				}, 350, function() {
					$(this).addClass("preview-active");
				});

				toggleContent.slideDown(350, function() {});

			} else {

				$(previewPar).animate({
					height: previewParClosedHeight
				}, 350, function() {
					$(this).removeClass("preview-active");
				});

				toggleContent.slideUp(350, function() {});

			}

		});

	}
	
	toggle();
	
	// Cloud Animation
	function cloud() {
		$(".cloud").animate( {"top": "+=20px"}, 3000, "linear", cloud )
		$(".cloud").animate( {"top": "-=20px"}, 3000, "linear", cloud );	
	}
	cloud();
	
	// Isotope filters	
  $("ul.sort-source").each(function() {

		var source = $(this);
		var destination = $("ul.sort-destination[data-sort-id=" + $(this).attr("data-sort-id") + "]");

		if(destination.get(0)) {

			var minParagraphHeight = 0;
			var paragraphs = $("span.thumb-info-caption p", destination);

			paragraphs.each(function() {
				if($(this).height() > minParagraphHeight)
					minParagraphHeight = $(this).height();
			});

			paragraphs.height(minParagraphHeight);

			$(window).load(function() {

				destination.isotope({
					itemSelector: "li",
					layoutMode : "fitRows"
				});

				source.find("a").click(function(e) {

					e.preventDefault();

					var $this = $(this);

					source.find("li.active").removeClass("active");
					$(this).parent().addClass("active");

					destination.isotope({
						filter: $this.parent().attr("data-option-value")
					});

					return false;

				});

			});

		}

	});  	
			
});