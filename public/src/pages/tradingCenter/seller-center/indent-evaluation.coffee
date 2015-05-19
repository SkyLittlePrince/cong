#引入所需模块
Score = require './../../../common/score/score.coffee'


# 缓存DOM节点
$productId = $("#product-id");
$score = $('#score')
$content = $('#content')
$confirm = $('#confirm')

# 文档加载完成执行的操作
$ ->
	# 添加打分组件
	score = new Score({
		selector: '.buyer-score'
		data: [
			{id: 'product-score', starNumber: 5}
		]
	})

	$confirm.bind 'click',addAppraise

# 提交订单信息监测
addAppraiseAction = ->
	if not $('#product-score').val()
		alert("请给商品打分")
		return false

	if not ($content.val())
		alert("评价不能为空")
		return false

	return {
		product_id: $productId.val()
		score: $('#product-score').val()
		content: $content.val()
	}
###	
# 获取特定字段的查询字符串
# @param {String} name: 查询字符串的字段名
###
getQuerySrting = (name)->
	search = location.search.substring(1).split('&')
	value = false
	for item in search
		keyValue = item.split('=')
		if keyValue[0] is name
			value = keyValue[1]
	return value

# 提交订单处理逻辑
addAppraise = (e)->
	data = addAppraiseAction()
	if data
		databus.addIndentAppraise data, (res)->
			if res.errCode == 0
				alert res.message
				productId = getQuerySrting("product_id")
				# window.location.href = '/trading-center/seller/product-detail?product_id=' + productId
				location.href = '/trading-center/buyer/trading-list'
			else 
				alert res.message

databus = 
	addIndentAppraise: (data, callback)->
		$.post "/evaluation/addEvaluation", data, (data)->
			callback data
	