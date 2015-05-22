Checkbox = require('../../../common/checkbox/checkbox.coffee');
Captcha = require('../../../common/captcha/captcha.coffee')
Uploader = require "../../../common/uploader/index.coffee"

checkbox = (new Checkbox({
    selector: '.checkbox-wrapper'
}))

$store = $('#store')
$storeDesc = $('#store-desc')
$skill = $('#skill')
$registerConfirm = $('#register-confirm')

$.fn.pVal = ->
	$this = $(this)
	val = $this.eq(0).val()
	if(val == $this.attr('placeholder'))
		return ''
	else
		return val
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
			avatar: storeInfo.avatar
		success: (data)->
			callback(data)
	}

# 开通店铺DOM操作
registerConfirmAction = ->
	if not $("#avatar-url").val()
		alert ("请上传工作室头像")
		return false
	if not $store.val()
		alert '请输入工作室名称'
		return false

	skills = $skill.val().trim()
	if skills.indexOf(',') > -1
		alert('技能标签请用中文逗号分隔')
		$skill.focus()
		return false
	reg = /，\s*，/
	if reg.test skills
		alert('不能连续出现两个逗号')
		$skill.focus()
		return false
	CheckedItem = checkbox.getCheckedInput()
	if not CheckedItem.length
		alert("请勾选协议同意选择框")
		return false
		
	return {
		name: $store.val()
		description: $storeDesc.val()
		tags: skills.split('，')
		avatar: $("#avatar-url").val()
	}
# 开通点铺逻辑
registerConfirmHandler = ->
	storeInfo = registerConfirmAction()
	console.log storeInfo
	if storeInfo
		AjaxAddStore storeInfo, (data)->
			if data.errCode is 0
				alert '工作室创建成功'
				location.href= '/trading-center/seller/my-store'
			else
				alert data.message

setUploadedPhoto = (name)->
	uploader = new Uploader {
		domain: "http://7xj0sp.com1.z0.glb.clouddn.com/"	# bucket 域名，下载资源时用到，**必需**
		browse_button: name + '-file',       # 上传选择的点选按钮，**必需**
		container: name + '-wrapper',       # 上传选择的点选按钮，**必需**
	}, {
		FileUploaded: (up, file, info)->
			info = $.parseJSON info
			domain = up.getOption('domain')
			url = domain + info.key

			# 显示上传之后的图片
			$("#" + name + "-wrapper").find(".avatar-img").attr("src", url)
			$("#avatar-url").val(url)
	}

# 文档加载完成执行的操作
$ ->
	$registerConfirm.bind 'click', registerConfirmHandler
	avatarUploader = setUploadedPhoto "avatar"
