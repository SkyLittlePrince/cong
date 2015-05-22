Uploader = require "../../common/uploader/index.coffee"

# 缓存DOM节点
$avatar = $("#avatar")
$avatarImg = $("#avatarImg")
$name = $('#name')
$price = $('#price')
$intro = $('#intro')
$shop_id = $('#shop_id')
$ID = $('#ID')
$baseInfoSaveBtn = $('#base-info-save-btn')

# 更改product信息数据模
baseInfoDataBus = 
  updateInfo: (data, callback)->
    $.post "/product/updateProduct", data, (data)->
      callback data


updateInfo = (e)->
  data =
    name: $name.val()
    id: $ID.val()
    price: $price.val()
    intro: $intro.val()

  console.log data
  baseInfoDataBus.updateInfo data, (res)->
    if res.errCode == 0
      alert "修改信息成功"
      window.location.href = "/admin/product-manager"
    else 
      alert res.message

$ ->
	$baseInfoSaveBtn.bind 'click', updateInfo




