###
# 验证验证码是否正确
# @param {String} code: 字符串格式的验证码
###
checkCaptcha = (code, callback)->
	$.ajax {
		type: "post"
		url: '/user/checkCaptcha'
		data:
			captcha: code
		dataType: 'json'
		success: (data)->
			callback(data)
	}

###
# 验证邮箱是否可用
# @param {String} email: 字符串格式的邮箱
# @return {undefined}
###
checkEmail = (email, callback)->
	$.ajax {
		type: "post"
		url: '/user/checkEmail'
		data: 
			email: email
		success: (data)->
			callback(data)
	}

###
# 
###
getCheckRegister = (callback)->
	$.ajax {
		type: "get"
		url: '/user/getCheckRegister'
		success: (data)->
			callback(data)
	}
emailAction = (errCode)->
	$registerEmail.removeClass('input-error').addClass('input-right') if errCode is 0
	$registerEmail.removeClass('input-right').addClass('input-error') if errCode isnt 0

authCodeAction = (errCode)->
	$('.code-right').show().siblings('.code-error').hide() if errCode is 0
	$('.code-right').hide().siblings('.code-error').show() if errCode isnt 0

emailHandler = ->
	email = $(this).val()
	reg = /^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/;
	if email isnt '' and reg.test(email)
		checkEmail email, (data)->
			emailAction data.errCode
	else
		emailAction 1

authCodeHandler = ->
	code = $(this).val()
	if code isnt ''
		checkCaptcha code, (data)->
			authCodeAction data.errCode
	else
		authCodeAction 1

step1Action = ->
	if !$registerEmail.hasClass 'input-right'
		$step1Tips.text('请输入邮箱')
		$registerEmail.focus()
		return false
	if !$authCode.hasClass 'input-right'
		$step1Tips.text('请输入验证码')
		$authCode.focus()
		return false
	return true
step1Handler = ->
	if step1Action()
		getCheckRegister (data)->
			if data.errCode isnt 0
				$step1Tips.text(data.message)
			else
				$step1.hide()
				$step2.show()

$stepTitle = $('.step-title')
$step1 = $('.step-1')
$step2 = $('.step-2')
$step3 = $('.step-3')
$registerEmail = $('#register-email')
$authCode = $('#auth-code')
$registerBtn1 = $('#register-btn-1')
$registerBtn2 = $('#register-btn-2')
$registerBtn3 = $('#register-btn-3')
$step1Tips = $('.step1-tips')

$ ->
	$registerEmail.bind('blur', emailHandler)
	$authCode.bind('blur', authCodeHandler)
	$registerBtn1.bind('click', step1Handler)