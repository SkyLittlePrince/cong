
$(document).ready ()->
	pathname = document.location.pathname

	target = pathname.split("/")[1];

	if(target == "reward-task")
		index = 0;
	else if(target == "auction") 
		index = 1;

	if(index != undefined)
		nav = $("#left-nav").find(".nav").find("li").removeClass("active")
		$(nav[index]).addClass("active")


	$headerNav = $("#header").find(".nav").find("li").removeClass("active")
	$($headerNav[2]).addClass("active")