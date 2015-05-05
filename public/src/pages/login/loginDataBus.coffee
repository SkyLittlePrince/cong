loginDataBus =
	login: (data, callback)->
		$.ajax {
			type: 'post'
			url: '/user/register'
			data: 
				password: data.password
				loginname: data.loginname
				captcha: data.captcha
			success: (data)->
				callback(data)
		}
	###
	# 验证验证码是否正确
	# @param {String} code: 字符串格式的验证码
	###
	checkCaptcha: (code, callback)->
		$.ajax {
			type: "post"
			url: '/user/checkCaptcha'
			data:
				captcha: code
			dataType: 'json'
			success: (data)->
				callback(data)
		}

module.exports = loginDataBus