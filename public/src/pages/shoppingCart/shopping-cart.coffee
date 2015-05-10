# 引入所需模块
Checkbox = require './../../common/checkbox/checkbox.coffee'
cookieConfig = require './../../common/shopping/cookieConfig.coffee'

# 缓存DOM节点
$productList = $('.product-list')
# 页面中的模板
$oneProductTemplate = $('#oneProductTemplate')
compiled = _.template $oneProductTemplate.html()

# 文档加载完成执行的操作
$ ->
	checkbox = (new Checkbox({selector: '.shopping-cart-content'})).init()
	getAllProductFromCookie()

###
# 将cookie中一件商品解析成对象
# @param {String} productCookieValue: 字符串格式的cookie值
###
parseFoodInCookie = (productCookieValue)->
	cookieArray = productCookieValue.split('&')
	return {
		id: cookieArray[0]
		name: cookieArray[1]
		price: cookieArray[2]
		number: cookieArray[3]
		imgSrc: cookieArray[4]
		# TODO 计算精度问题
		totalPrice: cookieArray[2] * cookieArray[3]
	}

# 获取cookie中所有的产品
getAllProductFromCookie = ->
	allCookie = $.cookie()
	for oneCookie, oneCookieValue of allCookie
		if oneCookie.indexOf(cookieConfig.productIdCookieBegin) > -1
			productInfo = parseFoodInCookie oneCookieValue
			loadProductToPage productInfo

###
# 将一件商品添加到购物车页面
# @param {String} productInfo: 字符串格式的html
###
loadProductToPage = (productInfo)->
	str = compiled productInfo
	$(str).appendTo $productList

