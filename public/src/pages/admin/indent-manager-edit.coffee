Uploader = require "../../common/uploader/index.coffee"

# 缓存DOM节点
$indentId = $('#indentId')
$indent = $('#indent')
$createTime = $('#createTime')
$status = $('#status')
$baseInfoSaveBtn = $('#base-info-save-btn')

# 更改indent信息数据模块
baseInfoDataBus = 
	updateindentInfo: (data, callback)->
		$.post "/indent/updata", data, (data)->
			callback data
# 正则表达式
isNumber = /^\d*$/
isBirthday = /^\d{4}-\d{1,2}-\d{1,2}$/

updateproductInfo = (e)->
	data =
		indentId: $indentId.val()
		status: $status.val()
		

	console.log data
	baseInfoDataBus.updateUserInfo data, (res)->
		if res.errCode == 0
			alert "修改信息成功"
			window.location.href = "/admin/indent-manager"
		else 
			alert res.message



$ ->
	$baseInfoSaveBtn.bind 'click', updateUserInfo







