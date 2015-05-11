# 引入所需模块
Checkbox = require './../../common/checkbox/checkbox.coffee'
shoppingCartCookie = require './shopping-cart-cookie.coffee'
shopping = require './../../common/shopping/shopping.coffee'

# 缓存DOM节点
$productList = $('.product-list')
$clearningNumber = $('.clearning .number')
$clearningTotal = $('.clearning .clearning-total')
$noProductContent = $('.no-product-content')
$CartContent = $('.cart-content')

# 页面中的模板
$oneProductTemplate = $('#oneProductTemplate')
compiled = _.template $oneProductTemplate.html()

# 文档加载完成执行的操作
$ ->
	checkbox = (new Checkbox({selector: '.shopping-cart-content'})).init()
	loadShoppingCart()
	$('body').delegate '.counter-btn', 'click', changeProductNumber

###
# 根据cookie加载页面
#	1. 如果cookie中有购物车相关的cookie，加载购物车页面
#	2. 如果cookie中没有购物车相关的cookie，加载没有商品提示块
### 
loadShoppingCart = ->
	cartCookie = shopping.getShoppingCartCookie()
	console.log cartCookie
	if not cartCookie.setNum
		$noProductContent.show()
	else
		$CartContent.show()
		allProduct = shoppingCartCookie.getAllProductFromCookie()
		loadProductToPage(product) for product in allProduct
		$clearningNumber.text(cartCookie.setNum)
		$clearningTotal.text(cartCookie.setTotal)


###
# 将一件商品添加到购物车页面
# @param {String} productInfo: 字符串格式的html
###
loadProductToPage = (productInfo)->
	str = compiled productInfo
	$(str).appendTo $productList

###
# 点击商品数目左右两边的加减号处理逻辑
#	1. 
###
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

