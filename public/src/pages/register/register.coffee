# 引入所需模块
registerDataBus = require './registerDataBus.coffee'
registerCookie = require './registerCookie.coffee'

# 缓存DOM节点
$registerForm = $('.register-form')
$stepTitle = $('.step-title')
$registerEmail = $('#register-email')
$authCode = $('#auth-code')
$registerSec = $('#register-sec')
$registerSecWrapper = $('.register-sec')
$inputEmail = $('.input-email')
$region1 = $('#region-1')
$region2 = $('#region-2')
$step1 = $('.step-1')
$step2 = $('.step-2')
$step3 = $('.step-3')
$step1Tips = $('.step1-tips')
$step2Tip = $('.step2-tips')
$step3Tip = $('.step3-tip')
$registerBtn1 = $('#register-btn-1')
$registerBtn2 = $('#register-btn-2')
$registerBtn3 = $('#register-btn-3')
$registerName = $('#register-name')
$loginname = $('#loginname')
$registerAuthcode = $('#register-authcode')
$loginNameTips = $('.login-name-tips')
$changeCaptchaLink = $('.change-captcha > a')
$authcodeImg = $('#authcode-img')
$stepTitle = $('.step-title > li')

# 页面加载完成执行事件处理程序绑定和脚本初始化
$ ->
	$registerEmail.bind('blur', emailHandler)
	$authCode.bind('blur', authCodeHandler)
	$registerBtn1.bind('click', step1Handler)
	$registerBtn2.bind('click', step2Handler)
	$registerBtn3.bind('click', step3Handler)
	$changeCaptchaLink.bind('click', changeCaptcha)
	$('body').delegate('.register-sec.click-able', 'click', restartStep1)
	init()
#-----------------------------------全局begin-------------------------------------------#
# 脚本初始化函数
init = ->
	step = if registerCookie.getStepCookie() then registerCookie.getStepCookie() else 'step-1'
	$registerForm.hide()
	$('.' + step).show()
	renderSecond() if step is 'step-2'
	renderStepBanner(step.charAt(step.length - 1))

# 更换验证码
changeCaptcha = ->
	registerDataBus.changeCaptcha (data)->
		console.log(data)
		# $authcodeImg.attr 'src', data

# 更改注册进度条
renderStepBanner = (step)->
	$stepTitle.removeClass('active').each ->
		$this = $(this)
		$this.addClass('active') if ($this.index() + 1) <= step
#-----------------------------------全局end---------------------------------------------#

#---------------------------------注册第一步begin---------------------------------------#
###
# 邮箱DOM操作
# @param {Number} errCode: 状态码
###
emailAction = (errCode, message)->
	$registerEmail.removeClass('input-error').addClass('input-right') if errCode is 0
	$registerEmail.removeClass('input-right').addClass('input-error') if errCode isnt 0
	$loginNameTips.text(message)

###
# 邮箱逻辑处理
###
emailHandler = ->
	email = $(this).val()
	reg = /^[_.0-9a-z-a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,4}$/;
	if email isnt '' and reg.test(email)
		registerDataBus.checkEmail email, (data)->
			emailAction data.errCode, data.message
			registerCookie.setLoginNameCookie(email) if data.errCode is 0
	else
		message = if email isnt '' then "邮箱不符合格式" else '' 
		emailAction 1, message
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
# 注册第一步DOM操作， 验证输入的信息是否都合法
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
# 	1. 验证输入信息是否合法
#	2. 如果合法，发送`发送验证码`请求
#	3. 如果发送成功，提示信息，跳转到第二步
#	4. 如果发送不成功，提示信息
###
step1Handler = ->
	if step1Action()
		$step1Tips.text('正在发送验证码')
		registerDataBus.getCheckRegister registerCookie.getLoginNameCookie(), (data)->
			if data.errCode isnt 0
				$step1Tips.text(data.message)
			else
				$step1Tips.text('验证码发送成功')
				startStep2()

# 跳转到注册的第二步
startStep2 = ->
	$step1.hide()
	$step2.show()
	registerCookie.setCaptchaCookie $authCode.val()
	registerCookie.setStepCookie 'step-2'
	renderSecond()
	renderStepBanner(2)
	$inputEmail.text registerCookie.getLoginNameCookie()

#-----------------------------------注册第一步end---------------------------------------#

#---------------------------------注册第二步begin---------------------------------------#
number = 60
renderSecond = ->
	$inputEmail.text registerCookie.getLoginNameCookie()
	$registerSecWrapper.addClass('click-able').text('点击重新操作') if number is 0
	$registerSec.text(--number) if number > 0
	setTimeout(renderSecond, 1000) if number > -1

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
	registerAuthcode = $registerAuthcode.val()
	if registerAuthcode is ''
		$step2Tip.text('验证码不能为空')
		return false
	return true

###
# 注册第二步逻辑处理
###
step2Handler = ->
	if step2Action()
		registerAuthcode = $registerAuthcode.val()
		registerDataBus.checkRegister registerAuthcode, (data) ->
			if data.errCode isnt 0
				$step2Tip.text(data.message)
			else
				startStep3(registerAuthcode)

###
# 跳转到注册第三步
#	1. 隐藏第二步的注册表单，显示第三步的注册表单
#	2. 添加所需cookie
# @param {String} registerAuthcode: 第二步的邮箱验证码
###
startStep3 = (registerAuthcode)->
	$step2.hide()
	$step3.show()
	renderStepBanner(2)
	registerCookie.setStepCookie 'step-3'
	registerCookie.setStep2CaptchaCookie registerAuthcode
	# 渲染第三步中用户之前所填信息
	$loginname.text registerCookie.getLoginNameCookie()

#-----------------------------------注册第二步end---------------------------------------#

#-----------------------------------注册第三步begin-------------------------------------#
###
# 注册第三步DOM操作，验证输入信息是否合法
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

	return {
		password: region1
		username: registerName
	}
###
# 注册第三步逻辑处理
# 1. 判断用户输入信息是否合法
# 2. 如果合法封装注册所需信息，Ajax提交注册请求
# 3. 如果信息状态码是0，清空cookie，提示注册成功，并在1秒之后跳转到主页
# 3. 如果信息状态码不是0，提示错误信息
###
step3Handler = ->
	data = step3Action() 
	if data
		data.loginname = registerCookie.getLoginNameCookie()
		data.registerSalt = registerCookie.getStep2CaptchaCookie()
		registerDataBus.Register data, (data)->
			if data.errCode is 0
				$step3Tip.text('注册成功！')
				registerCookie.removeStepCookie()
				registerCookie.removeloginNameCookie()
				setTimeout ->
					location.href = '/'
				, 1000
			else
				$step3Tip.text(data.message)

#-----------------------------------注册第三步end---------------------------------------#
