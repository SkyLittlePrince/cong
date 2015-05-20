Uploader = require "../../common/uploader/index.coffee"

# 缓存DOM节点
$avatar = $("#avatar")
$avatarImg = $("#avatarImg")
$realname = $('#realname')
$male = $('#male')
$female = $('#female')
$year = $('#year')
$month = $('#month')
$day = $('#day')
$wechat = $('#wechat')
$QQ = $('#QQ')
$prov = $('#prov')
$city = $('#city')
$country = $('#country')
$address = $('#address')
$baseInfoSaveBtn = $('#base-info-save-btn')

# 更改个人信息数据模块
baseInfoDataBus = 
	updateUserInfo: (data, callback)->
		$.post "/user/update", data, (data)->
			callback data
# 正则表达式
isNumber = /^\d*$/
isBirthday = /^\d{4}-\d{1,2}-\d{1,2}$/

updateUserInfo = (e)->
	month = if $month.val().length > 1 then $month.val() else "0" + $month.val()
	day = if $day.val().length > 1 then $day.val() else "0" + $day.val()
	year = $year.val()
	birthday = year + "-" + month + "-" + day
	if not isBirthday.test(birthday)
		alert('日期不符合格式要求')
		return false

	if $male[0].checked
		gender = 1
	if $female[0].checked
		gender = 0

	if not isNumber.test($QQ.val())
		alert("QQ号必须是数字")
		return false
	data = 
		avatar: $avatar.val()
		realname: $realname.val()
		birthday: birthday
		gender: gender
		wechat: $wechat.val()
		qq: if Math.floor($QQ.val()) is 0 then '' else Math.floor($QQ.val())
		province: $prov.val()
		city: $city.val()
		country: $country.val()
		address: $address.val()

	console.log data
	baseInfoDataBus.updateUserInfo data, (res)->
		if res.errCode == 0
			alert "修改个人信息成功"
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
