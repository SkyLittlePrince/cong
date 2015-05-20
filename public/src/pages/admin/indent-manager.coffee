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

# 更改个人信息数据模块
baseInfoDataBus = 
  deleteUserInfo: (data, callback)->
    $.post "/user/delete", data, (data)->
      callback data
# 正则表达式
isNumber = /^\d*$/
isBirthday = /^\d{4}-\d{1,2}-\d{1,2}$/

deleteUserInfo = (e)->

  console.log data
  baseInfoDataBus.deleteUserInfo data, (res)->
    if res.errCode == 0
      alert "删除信息成功"
      window.location.href = "/admin/indent-manager"
    else 
      alert res.message

setUploadedAvatar = (name)->
  uploader = new Uploader {
    domain: "http://7xj0sp.com1.z0.glb.clouddn.com/"  # bucket 域名，下载资源时用到，**必需**
    browse_button: 'revise-avatar',       # 上传选择的点选按钮，**必需**
    container: 'avatar-wrapper',       
  }, {
    FileUploaded: (up, file, info)->
      info = $.parseJSON info
      domain = up.getOption('domain')
      url = domain + info.key

      $avatarImg.attr("src", url)
      $avatar.val url
  }

$ ->
  $DeleteBtn.bind 'click', deleteUserInfo
  frontUploader = setUploadedAvatar()
