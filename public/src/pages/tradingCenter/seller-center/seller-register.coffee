Checkbox = require('../../../common/checkbox/checkbox.coffee');
Captcha = require('../../../common/captcha/captcha.coffee')

$store = $('#store')
$storeDesc = $('#store-desc')
$skill = $('#skill')
$registerConfirm = $('#register-confirm')

###
# 验证邮箱是否可用
# @param {Object} storeInfo: 包含新增店铺信息的对象
# @return {undefined}
###
AjaxAddStore = (storeInfo, callback)->
	$.ajax {
		type: "post"
		url: '/shop/addShop'
		data: 
			name: storeInfo.name
			description: storeInfo.description
			tags: storeInfo.tags
		success: (data)->
			callback(data)
	}

# 开通店铺DOM操作
registerConfirmAction = ->
	return {
		name: $store.val()
		description: $storeDesc.val()
		tags: $skill.val()
	}
# 开通点铺逻辑
registerConfirmHandler = ->
	storeInfo = registerConfirmAction()
	if storeInfo
		AjaxAddStore storeInfo, (data)->
			if data.errCode is 0
				location.href= '/trading-center/seller/my-store'
			else
				alert data.message


# 文档加载完成执行的操作
$ ->
	checkbox = (new Checkbox({selector: '.my-indents-content'})).init();
	$registerConfirm.bind 'click', registerConfirmHandler

