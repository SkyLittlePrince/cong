
Uploader = require "../../../common/uploader/index.coffee"

$name = $("#realname") 
$credit = $("#idnumber")
$male = $("#male")
$female = $("#female")
$behindUrl = $("#credit-negative")
$frontUrl = $("#credit-positive")
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

setUploadedPhoto = (name)->
	uploader = new Uploader {
		domain: "http://7xj0sp.com1.z0.glb.clouddn.com/"	# bucket 域名，下载资源时用到，**必需**
		browse_button: name + '-file',       # 上传选择的点选按钮，**必需**
		container: name + '-wrapper',      
	}, {
		BeforeUpload: (up, file)->
			console.log $("#" + name + "-file").parent()[0]
			console.log "before: " + name
			$("#" + name + "-file").parent().find(".text").html("上传中...")

		FileUploaded: (up, file, info)->
			info = $.parseJSON info
			domain = up.getOption('domain')
			url = domain + info.key

			$("#" + name + "-wrapper").find(".content-img").removeClass("hidden").find("img").attr("src", url)
			$("#" + name + "-wrapper").find(".img-border").addClass("hidden")
	
			$("#credit-" + name).val url
			$("#" + name + "-file").parent().find(".text").html("重新上传")
			console.log "complete: " + name
	}

$ ->
	$(document).on 'click', '#edit-btn', editAuthentication
	$(document).on 'click', '#create-btn', createAuthentication

	frontUploader = setUploadedPhoto "positive"
	behindUploader = setUploadedPhoto "negative"

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
		console.log res
		if res.errCode == 0
			alert "提交审核成功"
			window.location.href = "/trading-center/account/authentication"
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
	
