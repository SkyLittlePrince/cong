cookieConfig = require './../../common/shopping/cookieConfig.coffee'

shoppingCartCookie =
	# 获取cookie中所有的产品
	getAllProductFromCookie : ->
		allCookie = $.cookie()
		result = []
		for oneCookie, oneCookieValue of allCookie
			if oneCookie.indexOf(cookieConfig.productIdCookieBegin) > -1
				productInfo = shoppingCartCookie.parseFoodInCookie oneCookieValue
				result.push productInfo
		return result
	###
	# 将cookie中一件商品解析成对象
	# @param {String} productCookieValue: 字符串格式的cookie值
	###
	parseFoodInCookie : (productCookieValue)->
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

module.exports = shoppingCartCookie