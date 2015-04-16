LeftNav = require "../../../common/leftnav/index.coffee"

$(document).ready ()->
	pathname = document.location.pathname

	nav = pathname.split("/")[2];

	leftNav = new LeftNav(nav, "#buyer-left-nav", "buyer")	