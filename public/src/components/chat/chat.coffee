# 日期格式化函数
Date.prototype.Format = (fmt)->
    o =
        "M+": this.getMonth() + 1
        "d+": this.getDate()
        "h+": this.getHours()
        "m+": this.getMinutes()
        "s+": this.getSeconds()
        "q+": Math.floor((this.getMonth() + 3) / 3)
        "S": this.getMilliseconds()

    if (/(y+)/.test(fmt))
        fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length))

    for key, value of o
        if (new RegExp("(" + key + ")").test(fmt))
            tempStr = if (RegExp.$1.length == 1) then (value) else (("00" + value).substr(("" + value).length))
            fmt = fmt.replace(RegExp.$1, tempStr)

    return fmt

# 换存DOM节点变量
$logStatus = $('#logStatus')
currentId = $('#current-userid').val()
currentUsername = $('#current-username').val()
toId = $('#to-userid').val()
toUsername = $('#to-username').val()
logStatus = $logStatus.val()
$chatLog = $('.chat-log')

# 页面模板
$oneMessageTemplate = $('#one-message-template')
oneMessageCompile = _.template $oneMessageTemplate.html()

ws = null

# 与服务器的动作
chatConnect = ->
    if not ws    
        ws = new WebSocket('ws://127.0.0.1:9501/')
        # 绑定到连接建立的事件处理程序
        ws.onopen = (event)->
            data =
                who: currentId
                dowhat: 'login'

            ws.send(JSON.stringify(data))
        # 绑定接收到消息的事件处理程序
        ws.onmessage = (message)->
            renderMessage JSON.parse(message.data)

        # 绑定到连接关闭的事件处理程序
        ws.onclose = ->
            who = currentId
            data = 
                who: who
                dowhat: 'logout'

            ws.send(JSON.stringify(data))

# 点击`谈一谈`按钮事件处理逻辑
talkHandler = ->
    if logStatus is '0'
        alert "请先登录"
        return

    if currentId is toId
        alert "不能和自己聊天"
        return

    $('#chat-box').show()

keyDownSendMessage = (event)->
    if event.keyCode is 13
        $("#chat-submit").click()

# 发送信息逻辑
sendMessage = (event)->
    event.preventDefault()
    msg = $('#chat-input-box').val()

    if not msg
        return

    data = 
        who: currentId
        dowhat: 'chat'
        to: toId
        msg: msg

    ws.send(JSON.stringify(data))

    loadMessageToBox("right", msg, currentUsername);

###
# 将消息加载到聊天窗口上面
# @param {String} type: 一个用于指出是接收消息还是发送消息的字符串
# @param {String} message: 字符串格式的消息主体
###
loadMessageToBox = (type, msg, name)->
    current_time = new Date().Format("yyyy-MM-dd hh:mm:ss")
    # $chatLog.append("<div style='float: left;'>" + "<p><small>" + current_time + '</small></p><p>' + toUsername + ': ' + data.msg + "</p></div><div style='clear: both; height: 10px;'></div>")
    message = oneMessageCompile({
        className: type
        name: name
        content: msg
        avatar: "http://7sbxao.com1.z0.glb.clouddn.com/login.jpg"
    });

    $('.chat-log').append(message)
    $('#chat-input-box').val('') 

# 渲染接收到的消息消息
renderMessage = (data)->
    if data.dowhat is 'login'
        console.log data.fd + 'logined'
    if data.dowhat is 'chat'
        loadMessageToBox('left', data.msg, toUsername)
    if data.dowhat is 'logout'
        console.log data.who + ': ' + data.dowhat

# 关闭聊天窗口事件处理程序
closeChatRoom = ->
    $('#chat-box').hide()

# 脚本加载完成得时候执行事件绑定操作
$ ->
    $('#talk-btn').on 'click', talkHandler
    $("body").delegate '#chat-box', 'keydown', keyDownSendMessage
    $("body").delegate '#chat-submit', 'click', sendMessage
    $("body").delegate '.chat-close-btn', 'click', closeChatRoom
