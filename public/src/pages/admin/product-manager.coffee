Uploader = require "../../common/uploader/index.coffee"

# 缓存DOM节点
$ID = $('#ID')
$name = $('#name')
$price = $('#price')
$DeleteBtn = $('#del-btn')

# 更改个人信息数据模块
baseInfoDataBus = 
  deleteUserInfo: (data, callback)->
    $.post "/admin/deleteProduct", data, (data)->
      callback data


deleteUserInfo = (e)->
  data =
    id: $ID.text()
  console.log data
  baseInfoDataBus.deleteUserInfo data, (res)->
    if res.errCode == 0
      alert "删除信息成功"
      window.location.href = "/admin/product-manager"
    else 
      alert res.message



$ ->
  $DeleteBtn.bind 'click', deleteUserInfo
