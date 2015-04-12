navConfig = require "../../common/nav.coffee"

$(document).ready ()->
	pathname = document.location.pathname
	subNav = pathname.split("/")[2]

	$leftNav = $("#account-left-nav")
	$subNavs = $leftNav.find(".sub-nav").find("li")
	$navs = $leftNav.find(".nav-item")

	subNavIndexes = {
		"base-info": 0,
		"address": 1,
		"contact": 2,
		"card": 3,
		"bind-phone": 4,
		"bind-email": 5,
		"bind-weibo": 6,
		"change-password": 7,
		"protect-login": 8,
		"protect-password": 9
	}

	targetSubNav = $subNavs[navConfig["account"].subNavIndexes[subNav]];
	$(targetSubNav).addClass("active")

	targetNav = $navs[navConfig["account"].NavIndexes[subNav]]
	$(targetNav).parent().addClass("active")
	$(targetNav).parent().find(".sub-nav").slideDown()

	$navItem = $leftNav.find ".nav-a" 
	$navItem.click (e)->
		$target = $ e.currentTarget

		$navItem.each (index, item)->
			$item = $(item)
			$parent = $item.parent()
			if $parent.hasClass("active")
				$parent.removeClass "active"
				$parent.find(".sub-nav").slideUp()

		$parent = $target.parent()
		$parent.find(".sub-nav").slideToggle()
		$parent.addClass "active"

	


