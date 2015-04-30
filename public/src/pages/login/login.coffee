loginDataBus = require './loginDataBus'
###
# 验证码DOM操作
# @param {Number} errCode: 状态码
###
authCodeAction = (errCode)->
    if errCode is 0
        $('.code-right').show().siblings('.code-error').hide()
        $authCode.removeClass('input-error').addClass('input-right')
    if errCode isnt 0
        $('.code-right').hide().siblings('.code-error').show() 
        $authCode.removeClass('input-right').addClass('input-error')
###
# 验证码逻辑处理
###
authCodeHandler = ->
    code = $(this).val()
    if code isnt ''
        registerDataBus.checkCaptcha code, (data)->
            authCodeAction data.errCode
    else
        authCodeAction 1

###
# 点击登录按钮所执行的DOM操作
# 
###
loginBtnAction = ->

###
# 点击登录按钮所执行的逻辑
###
loginBtnHandler = ->
    event.preventDefault()
# 缓存页面DOM节点变量
$loginBtn = $('#login-btn')

###
# 页面加载完成执行的操作
###
$ ->
    $('#login-btn').bind 'click', loginBtnHandler
