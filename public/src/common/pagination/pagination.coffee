
$ ->
	$(document).on "click", ".pagination .to-page-btn", ()->
		page = $(".pagination .to-page-input").val()
		window.location.href = window.location.href.split("?")[0] + "?page=" + page