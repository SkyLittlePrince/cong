Checkbox = require './../../../common/checkbox/checkbox.coffee'
newsDataBus = require './newsDataBus.coffee'
Dialog = require './../../../common/dialog/dialog.coffee'

checkbox_all = (new Checkbox({
    selector: '.checkbox-wrapper-all'
}))

checkbox = (new Checkbox({
    selector: '.checkbox-wrapper'
}))

# 复选框全选按钮事件处理程序
selectAll = (e)->
	if checkbox_all.selected
		checkbox_all.selected = false
		checkbox.resetAllItems()
	else
		checkbox_all.selected = true
		checkbox.setAllItemsSelected()

$oneMessageContentTemplate = $("#one-message-content-template")
oneMessageContentCompile = _.template $oneMessageContentTemplate.html()

# 缓存DOM节点
$markAll = $('.mark-all')
$deleteAll = $('.delete-all')
$clearAll = $('.clear-all')

dialog = new Dialog({
	title: "我的消息"
})

# 点击一条消息处理逻辑
readMessage = ->
	$this = $(this)
	id = $this.siblings('.message-id').val()
	status = if $this.siblings('.message-status').val() is '0' then 1 else 0
	newsDataBus.getOneMessage id, (data)->
		# 加载弹出框
		dialog.options.content = oneMessageContentCompile(data.message)
		dialog.loadDialogToPage()
		if status is 1
			newsDataBus.markMessageStatus id, status, (data)->
				if data.errCode is 0
					$this.removeClass('status-0').addClass('status-1')
					$this.siblings('.message-status').val('1')
# 标记消息为已读
markAllAsRead = ->
	CheckedItem = checkbox.getCheckedItem()
	if CheckedItem.length
		for $item in CheckedItem
			messageInfo = getOneMessageInfo($item)
			if (messageInfo.status is '0')
				newsDataBus.markMessageStatus messageInfo.id, 1, (data)->
					if data.errCode is 0
						messageInfo.$title.removeClass('status-0').addClass('status-1')
						messageInfo.$title.siblings('.message-status').val('1')
###
# 获取一个选择框对应的消息的信息
# @param {jQuery Object} $checkbox: jquery对象格式的复选框 
###
getOneMessageInfo = ($checkbox)->
	$oneMessageWrapper = $($checkbox.closest('.one-message'))
	return {
		id: $oneMessageWrapper.find('.message-id').val()
		status: $oneMessageWrapper.find('.message-status').val()
		$title: $oneMessageWrapper.find('.message-title')
	}

# 清空已经接收到的所有消息
clearAllMessage = ->
	newsDataBus.clearAllMessage (data)->
		if data.errCode is 0
			$('.one-message').remove()

# 删除选中的消息
deleteMarkMessage = ->
	CheckedItem = checkbox.getCheckedItem()
	if CheckedItem.length
		for $item in CheckedItem
			messageInfo = getOneMessageInfo($item)
			newsDataBus.deleteOneMessage messageInfo.id, (data)->
				if data.errCode is 0
					messageInfo.$title.parent().parent().remove()


# 页面加载完成执行的操作，绑定事件
$ ->
	$.get "/message/get-num-of-unread-messages", {type: 1}, (res)->
		$(".unread-message").html(res.num)

	$(".checkbox-wrapper-all").click selectAll

	$("body").delegate '.message-title', 'click', readMessage
	$markAll.bind 'click', markAllAsRead
	$deleteAll.bind 'click', deleteMarkMessage
	$clearAll.bind 'click', clearAllMessage