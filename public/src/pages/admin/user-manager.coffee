Uploader = require "../../common/uploader/index.coffee"

# 缓存DOM节点
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
$country = $('#country')
$address = $('#address')
$DeleteBtn = $('#del-btn')
$ID = $('#ID')

# 更改个人信息数据模块
baseInfoDataBus = 
  deleteUserInfo: (data, callback)->
    $.post "/admin/deleteUser", data, (data)->
      callback data


deleteUserInfo = (e)->
  data =
    id: $ID.text()

  console.log data
  baseInfoDataBus.deleteUserInfo data, (res)->
    if res.errCode == 0
      alert "删除信息成功"
      window.location.href = "/admin/user-manager"
    else 
      alert res.message



$ ->
  $DeleteBtn.bind 'click', deleteUserInfo
