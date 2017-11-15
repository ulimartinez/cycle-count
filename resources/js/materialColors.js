 
var darkTheme = true;
var navColor = "blue-grey darken-4";
var bodyColor = "blue-grey darken-3";
var linkColor = "light-blue-text text-lighten-2";
var btnColor = "blue lighten-2";
var headerColor = "light-blue-text text-lighten-2";
var btnTxtColor = "white";
var textColor = "white-text";
var formColor = "grey lighten-3";

// $("#theme-button").bind('click', function darkTheme(){
	// if (darkTheme){
		$("#theme-button").text('Dark-theme');
		$("a").addClass(linkColor);
		$("nav").addClass(navColor);
		$("nav a").removeClass(linkColor);
		$("nav a").addClass(textColor);
		$(".side-nav").addClass(bodyColor);
		$(".side-nav .card-panel").addClass(navColor);
		$(".side-nav .collapsible-body").addClass(bodyColor);
		$("body").addClass(bodyColor);
		$("body").addClass(bodyColor);
	 	$("body").css("color", "white"); //Text Color
	 	$("footer").addClass(navColor);
	 	$(".modal").addClass(formColor);
	 	$(".modal-footer").addClass(formColor);
	 	$(".modal a").removeClass(linkColor);
	 	$(".side-nav a").removeClass(linkColor);
	 	$(".side-nav a").addClass(textColor);
	 	$(".side-nav a").addClass(textColor);
	 	$(".side-nav a").css("font-weight", "300");
	 	$(".side-nav .divider").addClass(navColor);
	 	$(".btn").addClass(btnColor);
	 	$(".btn").removeClass(linkColor);
	 	$(".btn a").addClass(btnTxtColor);
	 	$(".btn-large").addClass(btnColor);
	 	$(".btn-large").removeClass(linkColor);
	 	$(".btn-large a").addClass(btnTxtColor);
	 	$(".card").addClass(formColor);
	 	$("tbody a").removeClass(linkColor);
	 	$("tbody a").removeClass(linkColor);
	 	$("tbody tr").addClass(formColor);
	 	// $("tr th").addClass("black-text");
	 	$("form label").addClass("black-text");
	 	$("h1").addClass(headerColor);
	 	$("h2").addClass(headerColor);
	 	$("h3").addClass(headerColor);
	 	$("h4").addClass("black-text");
	 // }

	// })


