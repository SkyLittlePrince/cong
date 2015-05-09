

_defaultConfigs = 
	selector: ""
	checkURL: "/user/checkCaptcha"

captchaDataBus = 
	###
	# 验证验证码是否正确
	# @param {String} code: 字符串格式的验证码
	###
	checkCaptcha: (code, url, callback)->
		$.ajax {
			type: "post"
			url: url
			data:
				captcha: code
			dataType: 'json'
			success: (data)->
				callback(data)
		}

class Captcha
	constructor: (options)->
		self = this

		$(document).on 'input', "#authcode", (e)-> 
			console.log "aaa"
			if $(this).val().length is 5
				self.authCodeHandler($(this))

		$(document).on 'click', options.selector + " .change-captcha a", ()->
			self.changeCaptcha()

		this.init(options)

	init: (options)->
		this.options = $.extend({}, _defaultConfigs, options)

		this.el = $('<div class="captcha-wrapper">' +
						'<input type="text" id="authcode" name="captcha" placeholder="验证码" maxlength="5"/>' +
						'<span id="auth-code-status"></span>' +
						'<img src="" id="authcode-img" width="128" height="46" />' +
						'<div class="clear"></div>' +
						'<span class="change-captcha">看不清？<a href="javascript: void(0)">换张图</a></span>' +
					'</div>')
		
		this.el.input = this.el.find("#authcode")
		this.el.img = this.el.find("#authcode-img")
		this.el.status = this.el.find("#auth-code-status")

		this.wrapper = $ this.options.selector
		this.wrapper.html this.el

		this.changeCaptcha()

	###
	# 验证码DOM操作
	# @param {Number} errCode: 状态码
	###
	authCodeAction: (errCode)->
		if errCode is -1
			return this.el.input.removeClass()
		if errCode is 0
			this.el.status.removeClass('icon-no').addClass('icon-yes')
			this.el.input.removeClass('input-error').addClass('input-right')
		if errCode isnt 0
			this.el.status.removeClass('icon-yes').addClass('icon-no')
			this.el.input.removeClass('input-right').addClass('input-error')
	###
	# 验证码逻辑处理
	###
	authCodeHandler: ($obj)->
		self = this
		code = $obj.val()
		if code isnt ''
			captchaDataBus.checkCaptcha code, this.options.checkURL, (data)->
				self.authCodeAction data.errCode
		else
			self.authCodeAction -1

	# 更换验证码
	changeCaptcha: ->
		this.el.img.attr('src', ' ').attr('src', '/user/captcha' + '?id=' + Math.random(12))

module.exports = Captcha;