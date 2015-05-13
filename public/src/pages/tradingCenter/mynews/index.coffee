Checkbox = require './../../../common/checkbox/checkbox.coffee'

checkbox_all = (new Checkbox({
    selector: '.checkbox-wrapper-all'
}))

checkbox = (new Checkbox({
    selector: '.checkbox-wrapper'
}))

selectAll = (e)->
	if checkbox_all.selected
		checkbox_all.selected = false
		checkbox.resetAllItems()
	else
		checkbox_all.selected = true
		checkbox.setAllItemsSelected()

###
# 页面加载完成执行的操作，绑定事件
###
$ ->
	$.get "/message/get-num-of-unread-messages", {type: 2}, (res)->
		$(".unread-message").html(res.num)

	$(".checkbox-wrapper-all").click selectAll


