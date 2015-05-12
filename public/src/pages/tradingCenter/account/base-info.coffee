# 更改个人信息数据模块
baseInfoDataBus = 
	### 
	# 更改用户的密码
	# @param {Object} info: 保存用户个人信息的对象
	# @param {Function} callback: 请求响应之后执行的事件处理函数 
	###
	changePassword: (info, callback)->
		$.ajax {
			type: "post"
			url: "/user/update"
			data:
				name: info.name
				qq: info.qq
				gender: info.gender
				wechat: info.wechat
				province: info.province
				city: info.city
				region: info.region
				address: info.address
				birthday: info.birthday
			success: (data)->
				callback(data)
		}

# 缓存DOM节点
$name = $('#name')
$sex = $('input[name="sex"]')
$year = $('#year')
$month = $('#month')
$day = $('#day')
$wechat = $('#wechat')
$QQ = $('#QQ')
$prov = $('#prov')
$city = $('#city')
$district = $('#district')
$address = $('#address')
$contactSaveBtn = $('#contact-save-btn')

contactSaveAction = ->
	name =  $name.val()
	sex = $sex.val()
	birthday = $year.val() + '-' + $month.val() + '-' + $day.val()
	wechat = $wechat.val()
	QQ = $QQ.val()
	province = $prov.val()
	city = $city.val()
	region = $district.val()
	address = $address.val()

	return {
		name: name
		sex: sex
		birthday: birthday
		wechat: wechat
		QQ: QQ
		province: province
		city: city
		district: region
		address: address
	}

contactSaveHandler = ->
	info = contactSaveAction()
	console.log( info)
	if info
		baseInfoDataBus.changePassword info, (data)->
			alert(data.message)
			if data.errCode is 0
				location.reload()


$ ->
	$contactSaveBtn.bind 'click', contactSaveHandler