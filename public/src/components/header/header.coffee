
$(document).ready ()->
	pathname = document.location.pathname

	target = pathname.split("/")[1];
	console.log target
	console.log "cyrilzhao"
	
	if(target == "")
		index = 0;
	else if (target == "employer")
		index  = 1
	else if(target == "bounty-hunter") 
		index = 2;

	if(index != undefined)
		nav = $("#header").find(".nav").find("li").removeClass("active");
		$(nav[index]).addClass("active");