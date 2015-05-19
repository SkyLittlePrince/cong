
$email = $("#email")

$ ->
	$("#send-email").bind "click", (e)->	
		data = 
			email: $email.val()

		dataBus.sendEmail data, (res)->
			console.log res
			if res.errCode == 0
				alert "邀请发送成功"
			else
				alert res.message

dataBus = 
	sendEmail: (data, callback)->
		$.post "/invitation/sendEmail", data, (data)->
			callback data