
$name = $("#realname") 
$credit = $("#idnumber")
$male = $("#male")
$female = $("#female")
$behindUrl = $("#behind-url")
$frontUrl = $("#front-url")
$address = $("#address")
$phone = $("#phone")
$id = $("#id")

dataBus =
	createAuthentication: (data, callback)->
		$.post "/seller-authentication/create", data, (res)->
			callback res

	updateAuthenticatoin: (data, callback)->
		$.post "/seller-authentication/update", data, (res)->
			callback res

$ ->
	$('#edit-btn').bind 'click', editAuthentication
	$('#create-btn').bind 'click', createAuthentication

	uploader = Qiniu.uploader {
		runtimes: 'html5,flash,html4',    # 上传模式,依次退化
		browse_button: 'positive-file',       # 上传选择的点选按钮，**必需**
		uptoken_url: '/qiniu/getUpToken',            # Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
		domain: 'http://7xj0sp.com1.z0.glb.clouddn.com/',   # bucket 域名，下载资源时用到，**必需**
		container: 'positive-wrapper',           # 上传区域DOM ID，默认是browser_button的父元素，
		max_file_size: '5mb',           # 最大文件体积限制
		flash_swf_url: '/lib/plupload/Moxie.swf',  # 引入flash,相对路径
		max_retries: 3,                   # 上传失败最大重试次数
		dragdrop: false,                   # 关闭可拖曳上传
		drop_element: 'container',        # 拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
		chunk_size: '4mb',                # 分块上传时，每片的体积
		auto_start: true,                 # 选择文件后自动上传，若关闭需要自己绑定事件触发上传,
		init: {
			'Error': (up, err, errTip)->
				console.log "aaa"
				# 上传出错时,处理相关的事情

			'FileUploaded': (up, file, info)->
				info = $.parseJSON info
				console.log "http://7xj0sp.com1.z0.glb.clouddn.com/" + info.key
				console.log $("#positive-wrapper").find(".content-img").removeClass("hidden").find("img").length
				$("#positive-wrapper").find(".content-img").removeClass("hidden").find("img").attr("src", "http://7xj0sp.com1.z0.glb.clouddn.com/" + info.key)
				$("#positive-wrapper").find(".img-border").addClass("hidden")

			'UploadComplete': ()->
				console.log "finished"
				# 队列文件处理完毕后,处理相关的事情
		}
	}

editAuthentication = (e)->
	if $male[0].checked
		gender = 1
	else
		gender = 0

	data =
		id: $id.val()
		name: $name.val()
		credit_id: $credit.val()
		credit_front: $frontUrl.val()
		credit_behind: $behindUrl.val()
		address: $address.val()
		phone: $phone.val()
		gender: gender

	dataBus.updateAuthenticatoin data, (res)->
		if res.errCode == 0
			alert "提交审核成功"
			window.location.href = "/trading-center/seller/authentication"
		else
			alert res.message

createAuthentication = (e)->
	if $male[0].checked
		gender = 1
	else
		gender = 0

	data =
		name: $name.val()
		credit_id: $credit.val()
		credit_front: $frontUrl.val()
		credit_behind: $behindUrl.val()
		address: $address.val()
		phone: $phone.val()
		gender: gender

	dataBus.createAuthentication data, (res)->
		if res.errCode == 0
			alert "提交审核成功"
			window.location.href = "/trading-center/seller/authentication"
		else
			alert res.message
	
