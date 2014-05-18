jQuery(document).ready(function ($) { 
 function stickymenu() {

		if($("body").hasClass("boxed"))
			return false;

		var headerHeight = $("body > header").height();
		var logo = $("header .logo img");
		var $this = this;
		var logoSmallHeight = 50;

		$this.checkStickyMenu = function() {

			if($(window).scrollTop() > headerHeight + logoSmallHeight && $(window).width() > 768) {

				if($("body").hasClass("sticky-menu-active"))
					return false;

				$("body").addClass("sticky-menu-active");
				logo
					.height(logoSmallHeight)
					.css("width", "auto");

			} else {

				$("body").removeClass("sticky-menu-active");
				logo
					.css("height", "auto")
					.css("width", "auto");

			}

		}

		$(window).on("scroll", function() {

			$this.checkStickyMenu();

		});

		$(window).on("resize", function() {

			$this.checkStickyMenu();

		});

		$this.checkStickyMenu();

		// Anchors Position
		$("a[data-hash]").on("click", function(e) {

			e.preventDefault();
			var target = $(this.hash);

			if(target.get(0))
				$("html,body").animate({scrollTop: target.offset().top - (150)}, 300);

			return false;

		});
		
	}
	
	stickymenu();
		
});