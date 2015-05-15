newsDataBus = 
	# 获取一条消息的详细信息
	getOneMessage: (messageId, callback)->
		$.ajax {
			type: "get"
			url: "/message/get"
			data:
				messageId: messageId
			success: (data)->
				callback data
		}
	# 标记一条消息的状态
	markMessageStatus: (messageId, status, callback)->
		$.ajax {
			type: "post"
			url: "/message/read"
			data: 
				messageId: messageId
				status: status
			success: (data)->
				callback data
		}

	# 清空某一条消息
	deleteOneMessage: (messageId, callback)->
		$.ajax {
			type: "post"
			url: "/message/delete"
			data: 
				messageId: messageId
			success: (data)->
				callback data
		}
	clearAllMessage: (callback)->
		$.ajax {
			type: "post"
			url: "/message/clear"
			success: (data)->
				callback data
		}

module.exports = newsDataBus
