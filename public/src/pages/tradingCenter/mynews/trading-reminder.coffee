
Checkbox = require './../../../common/checkbox/checkbox.coffee'

checkbox = (new Checkbox({
    selector: '.checkbox-wrapper'
    data: ["acceptance", "finishConfirmed", "addPriceOrDelay", "publishSuccess", "publishFail", "nearDeadline"]
})) 

###
# 页面加载完成执行的操作，绑定事件
###
$ ->
	$.get "/message/get-num-of-unread-messages", {type: 1}, (res)->
		$(".unread-message").html(res.num)

dataBus = 
	aa: "a"
