cookieConfig = require './cookieConfig.coffee'

shopping =
	# updateShoppingCart: (number)->
	# 	console.log 1231
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
