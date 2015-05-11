# 引入所需模块
Checkbox = require './../../common/checkbox/checkbox.coffee'
shoppingCartCookie = require './shopping-cart-cookie.coffee'


# 缓存DOM节点
$productList = $('.product-list')

# 页面中的模板
$oneProductTemplate = $('#oneProductTemplate')
compiled = _.template $oneProductTemplate.html()

# 文档加载完成执行的操作
$ ->
	checkbox = (new Checkbox({selector: '.shopping-cart-content'})).init()
	init()
	$('body').delegate '.counter-btn', 'click', changeProductNumber

init = ->
	allProduct = shoppingCartCookie.getAllProductFromCookie()
	loadProductToPage(product) for product in allProduct


loadShoppingCart = ->
	cartCookie = shopping.getShoppingCartCookie()

###
# 将一件商品添加到购物车页面
# @param {String} productInfo: 字符串格式的html
###
loadProductToPage = (productInfo)->
	str = compiled productInfo
	$(str).appendTo $productList

changeProductNumber = ->
	$counterInput = $(this).siblings('.counter-input')
	value = parseInt $counterInput.val()
	if value >= 1
		newValue = if $(this).hasClass 'minus' then value - 1 else value + 1
		$counterInput.val newValue
		$totalPrice = $(this).parent().siblings('.total-price').find('.total-price-value')
		$price = $(this).parent().siblings('.price').find('.price-value')
		$totalPrice.text newValue * parseFloat($price.text())

# 删除一件商品
deleteOneProduct = ->

