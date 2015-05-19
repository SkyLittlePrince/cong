# 引入所需模块
Checkbox = require './../../common/checkbox/checkbox.coffee'
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
	# checkbox = (new Checkbox({selector: '.shopping-cart-content'}))
	loadShoppingCart()
	$('body').delegate '.counter-btn', 'click', changeProductNumber
	$('body').delegate '.delete', 'click', deleteOneProductHandler

###
# 根据cookie加载页面
#	1. 如果cookie中有购物车相关的cookie，加载购物车页面
#	2. 如果cookie中没有购物车相关的cookie，加载没有商品提示块
### 
loadShoppingCart = ->
	cartCookie = shopping.getShoppingCartCookie()
	if not cartCookie.setNum
		$noProductContent.show()
	else
		$CartContent.show()
		allProduct = shopping.getAllProductFromCookie()
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
###
changeProductNumber = ->
	$counterInput = $(this).siblings('.counter-input')
	$this = $(this)
	value = parseInt $counterInput.val()
	if value >= 1
		# 如果数字为1，不能减， 函数返回
		return if $this.hasClass('minus') and value is 1
		# 新的数字
		$counterInput.val newValue = if $(this).hasClass 'minus' then value - 1 else value + 1
		# 新的总价
		$totalPrice = $(this).parent().siblings('.total-price').find('.total-price-value')
		price = $(this).parent().siblings('.price').find('.price-value').text()

		$totalPrice.text parseFloat(newValue * price).toFixed(2)
		
		id = $this.parent().siblings('.id').val()
		# 更新cookie
		shopping.updateOneProductInCookie id, (newValue - value)
		shopping.updateShoppingCartCookie (newValue - value), price
		# 更新页面上的结算数据
		updateShoppingCart();

# 更新购物车DOM操作
updateShoppingCart = ->
	cartCookie = shopping.getShoppingCartCookie()
	$clearningNumber.text(cartCookie.setNum)
	$clearningTotal.text(cartCookie.setTotal)

getProductInfo = ($objInList)->
	$listWrapper = $objInList.closest(".one-list")
	return {
		$id: $listWrapper.find('.id')
		$counterInput: $listWrapper.find('.counter-input')
		$price: $listWrapper.find('.price-value')
		$totalPrice: $listWrapper.find('.total-price-value')
	}

# 根据cookie检测购物车是否为空
detectCartIsEmpty = ->
	cartCookie = shopping.getShoppingCartCookie()
	return flag = if cartCookie.setNum and cartCookie.setNum is '0' then true else false 

# 删除购物车中的一件商品
deleteOneProductHandler = ->
	if confirm('确定删除该商品？')
		info = getProductInfo($(this))
		# 移除该商品的cookie
		shopping.deleteOneProductInCookie info.$id.val() 
		shopping.updateShoppingCartCookie -parseInt(info.$counterInput.val()), info.$price.text()
		$(this).closest(".one-list").remove()
		updateShoppingCart()

		if detectCartIsEmpty()
			shopping.removeShoppingCartCookie()
			$noProductContent.show()
			$CartContent.hide()

# 删除一件商品
deleteOneProduct = ->
