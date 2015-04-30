registerDataBus = require './registerDataBus.coffee'

###
# 邮箱DOM操作
# @param {Number} errCode: 状态码
###
emailAction = (errCode)->
	$registerEmail.removeClass('input-error').addClass('input-right') if errCode is 0
	$registerEmail.removeClass('input-right').addClass('input-error') if errCode isnt 0

###
# 邮箱逻辑处理
###
emailHandler = ->
	email = $(this).val()
	reg = /^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/;
	if email isnt '' and reg.test(email)
		registerDataBus.checkEmail email, (data)->
			emailAction data.errCode
	else
		emailAction 1
###
# 验证码DOM操作
# @param {Number} errCode: 状态码
###
authCodeAction = (errCode)->
	if errCode is 0
		$('.code-right').show().siblings('.code-error').hide()
		$authCode.removeClass('input-error').addClass('input-right')
	if errCode isnt 0
		$('.code-right').hide().siblings('.code-error').show() 
		$authCode.removeClass('input-right').addClass('input-error')
###
# 验证码逻辑处理
###
authCodeHandler = ->
	code = $(this).val()
	if code isnt ''
		registerDataBus.checkCaptcha code, (data)->
			authCodeAction data.errCode
	else
		authCodeAction 1
###
# 注册第一步DOM操作
###
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
###
# 注册第一步逻辑处理
###
step1Handler = ->
	if step1Action()
		registerDataBus.getCheckRegister (data)->
			# if data.errCode isnt 0
			# 	$step1Tips.text(data.message)
			# else
			$step1.hide()
			$step2.show()
###
# 注册第二步DOM操作
###
step2Action = ->

###
# 注册第二步逻辑处理
###
step2Handler = ->

###
# 注册第三步DOM操作
###
step3Action = ->
	
###
# 注册第三步逻辑处理
###
step3Handler = ->


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