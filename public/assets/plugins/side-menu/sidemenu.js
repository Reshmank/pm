(function () {
	"use strict";

	var slideMenu = $('.side-menu');

	// Toggle Sidebar
	$(document).on('click','[data-toggle="sidebar"]',function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	$(window).on('load resize',function(){
        if($(window).width() < 739){
            $('.side-menu').hover(function(event) {
				event.preventDefault();
				$('.app').addClass('sidenav-toggled');
			});
		}
		if($(window).width() > 739.5){
			$('.side-menu').hover(function(event) {
				event.preventDefault();
				$('.app').removeClass('sidenav-toggled');
			});
		}
    });


	// Activate sidebar slide toggle
	$("[data-toggle='slide']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			slideMenu.find("[data-toggle='slide']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});
	
	$("[data-toggle='sub-slide']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			slideMenu.find("[data-toggle='sub-slide']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
		$('.slide.active').addClass('is-expanded');
	});
	
	// Set initial active toggle
	$("[data-toggle='slide.'].is-expanded").parent().toggleClass('is-expanded');
	$("[data-toggle='sub-slide.'].is-expanded").parent().toggleClass('is-expanded');
	

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();
	
		
	// ______________Active Class
	$(".app-sidebar a").each(function() {
	  var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) { 
			$(this).addClass("active");
			$(this).parent().prev().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().parent().parent().prev().addClass("active"); 
			$(this).parent().parent().parent().parent().parent().addClass("is-expanded"); 
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	var toggleSidebar = function() {
		var w = $(window);
		if(w.outerWidth() <= 1024) {
			$("body").addClass("sidebar-gone");
			$(document).off("click", "body").on("click", "body", function(e) {
				if($(e.target).hasClass('sidebar-show') || $(e.target).hasClass('search-show')) {
					$("body").removeClass("sidebar-show");
					$("body").addClass("sidebar-gone");
					$("body").removeClass("search-show");
				}
			});
		}else{
			$("body").removeClass("sidebar-gone");
		}
	}
	toggleSidebar();
	$(window).resize(toggleSidebar);
	
	//p-scroll
	const ps1 = new PerfectScrollbar('.sidebar-scroll', {
		suppressScrollX: true
	});

})();