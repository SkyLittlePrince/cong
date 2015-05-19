# 引入所需模块
shopping = require './../../common/shopping/shopping.coffee'

# 获取所有的商品
loadCartProduct = ->
	return  shopping.getAllProductFromCookie()
# 获取购物车信息
loadCartInfo = ->
	return shopping.getShoppingCartCookie()

# 缓存DOM节点
$orderNumber = $('.order-number')
$orderTime = $('.order-time')

$ ->

