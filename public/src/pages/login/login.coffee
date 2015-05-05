# 引入所需模块
loginDataBus = require './loginDataBus.coffee'

# 缓存DOM节点变量
$loginname = $('#loginname')
$password = $('#password')
$authcode = $('#authcode')
$loginBtn = $('#login-btn')
$loginTips = $('.login-tips')
$authCodeStatus = $('#auth-code-status')
$changeCaptchaLink = $('.change-captcha > a')
$authcodeImg = $('#authcode-img')

###
# 页面加载完成执行的操作
###
$ ->
    $('#login-btn').bind 'click', loginBtnHandler
    $authcode.bind 'input', -> authCodeHandler($(this)) if $(this).val().length is 5
    $changeCaptchaLink.bind('click', changeCaptcha)


# 更换验证码
changeCaptcha = ->
    $authcodeImg.attr('src', ' ').attr('src', '/user/captcha' + '?id=' + Math.random(12))

###
# 验证码DOM操作
# @param {Number} errCode: 状态码
###
authCodeAction = (errCode)->
    if errCode is -1
        return $authcode.removeClass()
    if errCode is 0
        $authCodeStatus.removeClass('icon-no').addClass('icon-yes')
        $authcode.removeClass('input-error').addClass('input-right')
    if errCode isnt 0
        $authCodeStatus.removeClass('icon-yes').addClass('icon-no')
        $authcode.removeClass('input-right').addClass('input-error')
###
# 验证码逻辑处理
###
authCodeHandler = ($obj)->
    code = $obj.val()
    if code isnt ''
        loginDataBus.checkCaptcha code, (data)->
            authCodeAction data.errCode
    else
        authCodeAction -1

###
# 点击登录按钮所执行的DOM操作
#   1. 如果出未填信息，给出红色文字提示
#   2. 如果用户的验证码错误，给出红色文字提示
#   2. 如果信息都填写完成，清空文字提示，返回用户信息
#   
###
loginBtnAction = ->
    if not $loginname.val() or not $password.val() or not $authcode.val()
        $loginTips.removeClass('green-tip').addClass('red-tip').text('请填写完整信息')
        return false
    if not $authcode.hasClass('input-right')
        $loginTips.removeClass('green-tip').addClass('red-tip').text('请输入正确的验证码')
        return false
    else
        $loginTips.removeClass('green-tip').removeClass('red-tip').text('')
        return {
            password: $password.val()
            loginname: $loginname.val()
            captcha: $authcode.val()
        }
###
# 点击登录按钮所执行的逻辑
#   1. 判断用户是否输入完成，并且输入信息是否正确
###
loginBtnHandler = ->
    loginInfo = loginBtnAction()
    if loginInfo
        loginDataBus.login loginInfo, (data)->
            if data.errCode isnt 0
                $loginTips.removeClass('green-tip').addClass('red-tip').text(data.message)
            if data.errCode is 0
                $loginTips.removeClass('red-tip').addClass('green-tip').text('登录成功')
                setTimeout ->
                    location.href = '/'
                , 1000
