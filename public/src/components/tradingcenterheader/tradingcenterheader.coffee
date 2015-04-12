$(document).ready ()->
	pathname = document.location.pathname

	target = pathname.split("/")[1];

	if(target == "employer")
		index = 0;
	else if  (target == "")
		index  = 1
	else if(target == "mynews") 
		index = 2;

	if(index != undefined)
		nav = $("#trading-center-header").find(".nav").removeClass("active");
		$(nav[index]).addClass("active");