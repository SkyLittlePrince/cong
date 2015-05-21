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
		$.post "/indent/get?indentId=xxx", data, (data)->
			callback data
# 正则表达式
isNumber = /^\d*$/
isBirthday = /^\d{4}-\d{1,2}-\d{1,2}$/

updateproductInfo = (e)->
	data = 
		indentId: $indentId.val()
		indent: $indent.val()
		createTime: $createTime.val()
		status: $status.val()
		

	console.log data
	baseInfoDataBus.updateUserInfo data, (res)->
		if res.errCode == 0
			alert "修改信息成功"
			window.location.href = "/trading-center/account/base-info"
		else 
			alert res.message

setUploadedAvatar = (name)->
	uploader = new Uploader {
		domain: "http://7xj0sp.com1.z0.glb.clouddn.com/"	# bucket 域名，下载资源时用到，**必需**
		browse_button: 'revise-avatar',       # 上传选择的点选按钮，**必需**
		container: 'avatar-wrapper',       
	}, {
		FileUploaded: (up, file, info)->
			info = $.parseJSON info
			domain = up.getOption('domain')
			url = domain + info.key

			$avatarImg.attr("src", url)
			$avatar.val url
	}

$ ->
	$baseInfoSaveBtn.bind 'click', updateUserInfo
	frontUploader = setUploadedAvatar()






