cookieConfig = require './cookieConfig.coffee'

# 这个模块提供购物车cookie相关操作

shopping =
	###
	# 更新与购物车有关的cookie
	# @param {Number} numberChange: 一件商品变更的数量
	# @param {Number} price: 盖产品的价格
	###
	updateShoppingCartCookie: (numberChange, price)->
		cartCookie = shopping.getShoppingCartCookie()
		newCartNumber = parseInt(cartCookie.setNum) + numberChange

		setNum = if cartCookie.setNum then cartCookie.setNum else 0
		setTotal = if cartCookie.setTotal then cartCookie.setTotal else 0
		# TODO 计算精度问题
		newPrice = parseFloat(price).toFixed(2) * 100
		newSetTotal = ((parseFloat(setTotal).toFixed(2) * 100 + newPrice * numberChange) / 100).toFixed(2)

		# console.log newSetTotal
		shopping.setShoppingCartCookie newCartNumber, newSetTotal

	###
	# 更新与购物车有关cookie
	###
	setShoppingCartCookie: (num, total)->
		$.cookie cookieConfig.cartNum, num, { expires: 7, path: '/' }
		$.cookie cookieConfig.cartTotal, total, { expires: 7, path: '/' }

	###
	# 获取与购物车有关cookie
	###
	getShoppingCartCookie: ->
		setNum = $.cookie(cookieConfig.cartNum)
		setTotal = $.cookie(cookieConfig.cartTotal)
		return {
        	setNum: setNum
        	setTotal: setTotal
        }
	###
	# 清空与购物车有关cookie
	# ###
	removeShoppingCartCookie: ->
		$.removeCookie(cookieConfig.cartNum, { expires: 7, path: '/' })
		$.removeCookie(cookieConfig.cartTotal, { expires: 7, path: '/' })

	# 获取cookie中所有的产品
	getAllProductFromCookie : ->
		allCookie = $.cookie()
		result = []
		for oneCookie, oneCookieValue of allCookie
			if oneCookie.indexOf(cookieConfig.productIdCookieBegin) > -1
				productInfo = shopping.parseFoodInCookie oneCookieValue
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
			# totalPrice: (cookieArray[2]) * cookieArray[3]
			totalPrice: parseFloat(cookieArray[3] * cookieArray[2]).toFixed(2)
		}
	###
	# 更新一个商品的cookie
	# @param {String} productId: 一个商品的id
	# @param {Number} changeNumber: 变更的数量
	###
	updateOneProductInCookie: (productId, changeNumber)->
		cookieKey = cookieConfig.productIdCookieBegin + productId
		productCookie = $.cookie cookieKey
		newCookie = productCookie.split('&')
		newCookie[3] = parseInt(newCookie[3]) + changeNumber
		$.cookie cookieKey, newCookie.join('&')

	###
	# 删除一件商品的cookie
	# @param {String}: produxtId: 一个商品的id
	###
	deleteOneProductInCookie: (productId)->
		$.removeCookie cookieConfig.productIdCookieBegin + productId, {path :'/'}

module.exports = shopping
