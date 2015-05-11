# 引入所需模块
cookieConfig = require './../../../common/shopping/cookieConfig.coffee'
shopping = require './../../../common/shopping/shopping.coffee'

# 缓存DOM节点
$addToCart = $('.add-to-cart')

###
# 根据产品id判断cookie中是否有该产品
# @param {String} productid: 产品的id
# @return {String}: 产品的id值
###
getOneProductFromCookie = (productid)->
	return $.cookie(cookieConfig.productIdCookieBegin + productid)
###
# 将一件商品添加到cookie
# param {Object} info: 包含一个商品详细信息的对象
###
addOneProductToCookie = (info)->
	if not getOneProductFromCookie(info.productId)
		productCookieKey = cookieConfig.productIdCookieBegin + info.productId
		productCookieValue =  info.productId  + '&' + info.productName   + '&' + info.productPrice  + '&' + info.productNumber + '&' + info.productImgUrl
		$.cookie productCookieKey, productCookieValue, { path: '/' }
###
# 更新与购物车有关cookie
# @param {String} price: 商品的单价
###
addToCartCookieHandler = (price)->
	cartCookie = shopping.getShoppingCartCookie()
	setNum = if cartCookie.setNum then cartCookie.cartNum else 0
	setTotal = if cartCookie.setTotal then cartCookie.setTotal else 0
	# TODO 计算精度问题
	newSetTotal = parseInt(setTotal) + parseInt(price)
	shopping.updateShoppingCartCookie setNum + 1, newSetTotal

###
# 获得一个产品的详情
# @param {jQuery Object} $btn: 添加到购物车按钮
###
getProduceInfo = ($btn)->
	return {
		productId : $btn.data 'productid'
		productName : 'test'
		productPrice : '100'
		productNumber : 1
		productImgUrl : $btn.siblings('.product-img').attr 'src'
	}
###
# 添加一件商品到购物车处理逻辑
###
addToCartHandler = ->
	info = getProduceInfo($(this))
	addOneProductToCookie info
	addToCartCookieHandler info.productPrice

$ ->
	$addToCart.bind 'click', addToCartHandler