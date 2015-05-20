Checkbox = require './../../common/checkbox/checkbox.coffee'
Uploader = require "../../common/uploader/index.coffee"

$avatar = $("#avatar")
$avatarImg = $("#avatarImg")
$realname = $('#realname')
$male = $('#male')
$female = $('#female')
$year = $('#year')
$month = $('#month')
$day = $('#day')
$wechat = $('#wechat')
$QQ = $('#QQ')
$prov = $('#prov')
$city = $('#city')
$region = $('#region')
$address = $('#address')
$baseInfoSaveBtn = $('#base-info-save-btn')

showInfoDataBus =
  showUserInfo: (data, callback)->
    $.get "/user/imformation?id=1",(data)->
      callback data

showUserInfo = (e)->
  showInfoDataBus.showUserInfo (data)->
  if res.errCode == 0
    alert data.user
    $QQ.text(data.user.qq)
    $realname.text(data.user.username)
    $address.text(data.user.address)

  else
    alert data.user



$ ->
  showUserInfo()