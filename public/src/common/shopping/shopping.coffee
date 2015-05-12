cookieConfig = require './cookieConfig.coffee'

shopping =
	###
	# 更新与购物车有关的cookie
	# @param {Number} numberChange: 一件商品变更的数量
	# @param {Number} price: 盖产品的价格
	###
	updateShoppingCartCookie: (numberChange, price)->
		cartCookie = shopping.getShoppingCartCookie()
		newCartNumber = parseInt(cartCookie.setNum) + numberChange
		console.log numberChange, price
		console.log (numberChange * price)
		newCartTotal = parseInt(cartCookie.setTotal) + (numberChange * price)
		shopping.setShoppingCartCookie(newCartNumber, newCartTotal)

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

module.exports = shopping
