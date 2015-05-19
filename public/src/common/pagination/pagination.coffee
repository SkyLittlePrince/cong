
$ ->
	$(document).on "click", ".pagination .to-page-btn", ()->
		page = $(".pagination .to-page-input").val()
		url = window.location.href.split("?")[0];

		paramStr = window.location.href.split("?")[1];
		paramsArray = paramStr.split("&");

		str = ""
		for i in [0...paramsArray.length]
			if paramsArray[i].split("=")[0] != "page"
				if str.length != 0
					str = str + "&" + paramsArray[i]
				else
					str = paramsArray[i]
		url = url + "?" + str + "&page=" + page

		window.location.href = url
