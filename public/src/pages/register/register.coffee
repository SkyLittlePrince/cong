# 引入所需模块
registerDataBus = require './registerDataBus.coffee'
registerCookie = require './registerCookie.coffee'

$registerForm = $('.register-form')
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
$registerSec = $('#register-sec')
$registerSecWrapper = $('.register-sec')
$inputEmail = $('.input-email')
$region1 = $('#region-1')
$region2 = $('#region-2')
$step3Tip = $('.step3-tip')
$registerName = $('#register-name')
$loginname = $('#loginname')

$ ->
	$registerEmail.bind('blur', emailHandler)
	$authCode.bind('blur', authCodeHandler)
	$registerBtn1.bind('click', step1Handler)
	$registerBtn2.bind('click', step2Handler)
	$registerBtn3.bind('click', step3Handler)
	$('body').delegate('.register-sec.click-able', 'click', restartStep1)
	init()
#-----------------------------------全局begin-------------------------------------------#
init = ->
	step = if registerCookie.getStepCookie() then registerCookie.getStepCookie() else 'step-1'
	$registerForm.hide()
	$('.' + step).show()
	renderSecond() if step is 'step-2'

#-----------------------------------全局end---------------------------------------------#

#---------------------------------注册第一步begin---------------------------------------#
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
			emailAction data.errCode, email
			registerCookie.setLoginNameCookie(email) if data.errCode is 0
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
			startStep2()

# 跳转到注册的第二步
startStep2 = ->
	$step1.hide()
	$step2.show()
	registerCookie.setStepCookie 'step-2'
	renderSecond()
	$inputEmail.text registerCookie.getLoginNameCookie()

#-----------------------------------注册第一步end---------------------------------------#

#---------------------------------注册第二步begin---------------------------------------#
number = 60
renderSecond = ->
	$inputEmail.text registerCookie.getLoginNameCookie()
	$registerSecWrapper.addClass('click-able').text('点击重新操作') if number is 0
	$registerSec.text(--number) if number > 0
	setTimeout(renderSecond, 50) if number > -1

# 回到第一步，重新获取验证码
restartStep1 = ->
	$step2.hide()
	$step1.show()
	registerCookie.setStepCookie 'step-1'
	$registerSecWrapper.removeClass('click-able').text('<span id="register-sec">59</span>秒后可重新操作')

###
# 注册第二步DOM操作
###
step2Action = ->
	renderSecond()
###
# 注册第二步逻辑处理
###
step2Handler = ->
	startStep3()

startStep3 = ->
	$step2.hide()
	$step3.show()
	registerCookie.setStepCookie 'step-3'
	$loginname.text registerCookie.getLoginNameCookie()

#-----------------------------------注册第二步end---------------------------------------#

#-----------------------------------注册第三步begin-------------------------------------#
###
# 注册第三步DOM操作
###
step3Action = ->
	region1 = $region1.val()
	region2 = $region2.val()
	registerName = $registerName.val()
	if not region1 or not region2 or not registerName
		$step3Tip.text('请输入完整信息！')
		return false
	if region1 != region2
		$step3Tip.text('两次输入密码不一致！')
		return false

	return true
###
# 注册第三步逻辑处理
###
step3Handler = ->
	if step3Action()
		$step3Tip.text('注册成功！')
		registerCookie.removeStepCookie()
		registerCookie.removeloginNameCookie()

#-----------------------------------注册第三步end---------------------------------------#
