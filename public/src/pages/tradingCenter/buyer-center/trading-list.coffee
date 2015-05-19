require "../../../common/pagination/pagination.coffee"

cancelIndent = (e)->
	$elem = $(e.currentTarget)
	$item = $elem.parent().parent()

	data = 
		indentId: parseInt($item.find(".id").html())

	dataBus.cancelIndent data, (res)->
		if res.errCode == 0
			alert "取消订单成功"
			$item.fadeOut()
		else
			alert res.message

openCommentPage = (e)->
	$elem = $(e.currentTarget)
	$parent = $elem.parent().parent();

	id = parseInt($parent.find(".id").html());
	window.location.href = "/trading-center/seller/indent-evaluation?indent_id=" + id

$ ->
	$(".cancel-btn").click cancelIndent
	$(".comment-btn").click openCommentPage

dataBus = 
	cancelIndent: (data, callback)->
		$.post "/indent/cancel", data, (data)->		
			callback data