cookieConfig = require './cookieConfig.coffee'

shopping =
	# updateShoppingCart: (number)->
	# 	console.log 1231
	###
	# 更新与购物车有关cookie
	###
	updateShoppingCartCookie: (num, total)->
		$.cookie cookieConfig.cartNum, num, {path:'/'}
		$.cookie(cookieConfig.cartTotal, total, {path:'/'})

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
		$.removeCookie(cookieConfig.cartNum, { path: '/' })
		$.removeCookie(cookieConfig.cartTotal, { path: '/' })

module.exports = shopping
