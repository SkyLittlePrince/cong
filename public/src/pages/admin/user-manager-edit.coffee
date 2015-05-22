Uploader = require "../../common/uploader/index.coffee"

# 缓存DOM节点
$avatar = $("#avatar")
$avatarImg = $("#avatarImg")
$realname = $('#realname')
$male = $('#male')
$female = $('#female')
$year = $('#year')
$ID = $('#ID')
$month = $('#month')
$day = $('#day')
$wechat = $('#wechat')
$QQ = $('#QQ')
$prov = $('#prov')
$city = $('#city')
$country = $('#country')
$address = $('#address')
$bool = $('#bool')
$baseInfoSaveBtn = $('#base-info-save-btn')
$failInfoSaveBtn = $('#base-info-fail-btn')

# 更改个人信息数据模块
baseInfoDataBus = 
	updateUserInfo: (data, callback)->
		  $.post "/admin/passAuthentication", data, (data)->
			  callback data


updateUserInfo = (e)->

	data = 
		id: $ID.val()


	console.log data
	baseInfoDataBus.updateUserInfo data, (res)->
		if res.errCode == 0
			alert "批准个人信息成功"
			window.location.href = "/admin/user-manager"
		else 
			alert res.message

failInfoDataBus =
  	failUserInfo: (data, callback)->
    		$.post "/admin/failAuthentication", data, (data)->
      			callback data

failUserInfo = (e)->

  	data =
   	        id: $ID.val()


  	console.log data
  	failInfoDataBus.failUserInfo data, (res)->
    		if res.errCode == 0
      			alert "打回个人信息成功"
    		else
      			alert res.message



$baseInfoSaveBtn.bind 'click', updateUserInfo
$failInfoSaveBtn.bind 'click', failUserInfo
