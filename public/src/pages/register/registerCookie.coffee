# cookie的键值对集合
cookieConfig =
	Auth: "Auth"
	Step: "Step"
	loginName: "loginName"
	captcha: "captcha"
	step2Captcha: "step2Captcha" 

# 和注册过程有关cookie操作
registerCookie =
	# 获取验证码相关的cookie
	getAuthCodeCookie: ->
		return $.cookie cookieConfig.Auth
	###
	# 设置验证码相关的cookie
	# @param {String} field: 和验证码的cookie字段
	###
	setAuthCodeCookie: (field)->
		$.cookie cookieConfig.Auth, field 
	# 移除和验证码有关的cookie
	removeAuthCookie: ->
		$.removeCookie cookieConfig.Auth
	# 获取注册步骤相关的cookie
	getStepCookie: ->
		return $.cookie cookieConfig.Step
	###
	# 设置注册步骤相关的cookie
	# @param {String} field: 和注册步骤的cookie字段
	###
	setStepCookie: (field)->
		$.cookie cookieConfig.Step, field
	# 移除和注册步骤相关的cookie
	removeStepCookie: ->
		$.removeCookie cookieConfig.Step
	# 获取登录名相关的cookie
	getLoginNameCookie: ->
		return $.cookie cookieConfig.loginName
	###
	# 设置登录名相关的cookie
	# @param {String} field: 和注册步骤的cookie字段
	###
	setLoginNameCookie: (field)->
		$.cookie cookieConfig.loginName, field
	# 移除和登录名相关的cookie
	removeloginNameCookie: ->
		$.removeCookie cookieConfig.loginName
	# 获取第一步验证码的cookie
	getCaptchaCookie: ->
		return $.cookie cookieConfig.captcha
	###
	# 设置第一步验证码的cookie
	# @param {String} field: 第一步的验证码
	###
	setCaptchaCookie: (field)->
		$.cookie cookieConfig.captcha, field
	# 移除第一步验证码的cookie
	removeCaptchaCookie: ->
		$.cookie removeCookie cookieConfig.captcha

	getStep2CaptchaCookie: ->
		return $.cookie cookieConfig.step2Captcha
	setStep2CaptchaCookie: (field)->
		$.cookie cookieConfig.step2Captcha, field
	removeStep2CaptchaCookie: ->
		$.removeCookie cookieConfig.step2Captcha

module.exports = registerCookie
