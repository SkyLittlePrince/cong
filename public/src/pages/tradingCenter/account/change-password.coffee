# 更改密码数据模块
changePasswordDataBus = 
	### 
	# 更改用户的密码
	# @param {Object} info: 保存用户新旧密码的对象
	# @param {Function} callback: 请求响应之后执行的事件处理函数 
	###
	changePassword: (info, callback)->
		$.ajax {
			type: "post"
			url: "/user/changePassword"
			data:
				oldPwd: info.oldPwd
				newPwd: info.newPwd
				captcha: info.captcha
			success: (data)->
				callback(data)
		}

# 缓存DOM节点
$changePasswordConfirmBtn = $('#change-password-confirm-btn')
$changePasswordTips = $('.change-password-tips')
$oldPassword = $('#old-password')
$newPassword1 = $('#new-password-1')
$newPassword2 = $('#new-password-2')
$newPassword1Tips = $('.new-password-1-tips')
$newPassword2Tips = $('.new-password-2-tips')

# 验证新密码的长度是否大于等于6位
newPassword1Action = ->
	newPassword1 = $(this).val()
	$newPassword1Tips.text('新密码的长度必须不少于6位')	if newPassword1.length < 6
	$newPassword1Tips.text('')	if newPassword1.length >= 6
# 当两个新密码长度相同的时候，判断两个密码是否相等
newPassword2Action = ->
	newPassword2 = $newPassword2.val()
	newPassword1 = $newPassword1.val()
	if newPassword2 != newPassword1
		$('.new-password-2-tips').text('两次输入的密码不一致')
	else
		$('.new-password-2-tips').text('')

# 更改密码DOM操作
changePasswordAction = ->
	oldPassword = $oldPassword.val()
	newPassword1 = $newPassword1.val()
	newPassword2 = $newPassword2.val()
	if not oldPassword or not newPassword1 or not newPassword2
		$('.change-password-tips').removeClass('green-tip').addClass('red-tip').text('请填写完整信息')
		return false
	if newPassword1 != newPassword2
		$('.new-password-2-tips').text('两次输入的密码不一致')
		$newPassword2.focus()
		return false
	return {
		oldPwd: oldPassword
		newPwd: newPassword1
		captcha: newPassword2
	}

# 更改密码事件处理逻辑
changePasswordHandler = ->
	info = changePasswordAction()
	if info
		changePasswordDataBus.changePassword info, (data)->
			if data.errCode is 10
				alert(data.message)
			if data.errCode is 0
				$changePasswordTips.removeClass('red-tip').addClass('green-tip').text(data.message)
			else
				$changePasswordTips.removeClass('green-tip').addClass('red-tip').text(data.message)

# 文档加载完成执行的初始化操作
$ ->
	$changePasswordConfirmBtn.bind 'click', changePasswordHandler
	$newPassword1.bind 'blur', newPassword1Action
	$newPassword2.bind 'input', -> newPassword2Action() if $newPassword2.val().length == $newPassword1.val().length
