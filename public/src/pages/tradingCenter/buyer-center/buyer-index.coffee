
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

$ ->
	$(".cancel-btn").click cancelIndent

dataBus = 
	cancelIndent: (data, callback)->
		$.post "/indent/cancel", data, (data)->		
			callback data