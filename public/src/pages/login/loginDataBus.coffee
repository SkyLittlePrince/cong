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

module.exports = loginDataBus