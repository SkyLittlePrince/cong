registerDataBus = 
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

	###
	# 验证邮箱是否可用
	# @param {String} email: 字符串格式的邮箱
	# @return {undefined}
	###
	checkEmail: (email, callback)->
		$.ajax {
			type: "post"
			url: '/user/checkEmail'
			data: 
				email: email
			success: (data)->
				callback(data)
		}

	###
	# 发送邮箱验证码
	# @param {String} loginname: 登录名
	###
	getCheckRegister: (loginname, callback)->
		$.ajax {
			type: "get"
			data:
				loginname: loginname
			url: '/user/getCheckRegister'
			success: (data)->
				callback(data)
		}
	###
	# 验证邮箱验证码是否正确
	# @param {String} registerSalt: 字符串格式的邮箱验证码
	# @param {Function} callback: 与后台进行数据交互之后执行的函数
	###
	checkRegister: (registerSalt, callback)->
		$.ajax {
			type: 'post'
			url: '/user/checkRegister'
			data: 
				registerSalt: registerSalt
			success: (data)->
				callback(data)
		}

	###
	# 更换验证码
	# @param {Function} callback: 获取新的验证码之后执行的函数
	###
	changeCaptcha: (callback)->
		$.ajax {
			type: 'get'
			url: '/user/captcha'
			success: (data)->
				callback(data)
		}
	###
	# 用户注册
	# @param {Object} data: 用户注册表单对象
	# @param {Function} callback: 注册响应后执行的函数
	###
	Register: (data, callback)->
		$.ajax {
			type: 'post'
			url: '/user/register'
			data: 
				username: data.username
				password: data.password
				loginname: data.loginname
				captcha: data.captcha
				registerSalt: data.registerSalt
			success: (data)->
				callback(data)
		}

module.exports = registerDataBus