
# 缓存DOM节点
$best = $('#best')
$medium = $('#medium')
$worse = $('#worse')
$appraise = $('#appraise')
$confirm = $('#confirm')

confirm = 
	addIntent: (data, callback)->
		$.post "/user/", data, (data)->
			callback data

addIntent = (e)->
	if $best[0].checked
		gender = 1
	if $medium[0].checked
		gender = 2
	if $worse[0].checked
		gender = 3

	data = 
		gender: gender
		appraise：appraise

	console.log data

	confirm.addIntent data, (res)->
	#	if res.errCode == 0
			alert "订单评价成功"
			window.location.href = "/trading-center/seller/product-detail?product_id=1"
	#	else 
			alert res.message

$ ->
	$confirm.bind 'click', addIndent
	console.log "hehe"