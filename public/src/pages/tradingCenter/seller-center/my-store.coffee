$storeName = $('.store-name')
$aboutStoreName = $('.about-store-name')
$BriefIntroduction = $('.brief-introduction')
$aboutBriefIntroduction = $('.about-brief-introduction')
$shopIdInput = $("#shop-id")
$sellTemplate = $("#sellTemplate")
$favorTemplate = $("#favorTemplate")
$rankList = $(".rank-list")

# 编辑店铺简略信息
editStoreInfo = (e)->
	$target = $(e.currentTarget)
	$aboutStoreName.val($storeName.html().trim()).removeClass('hidden')
	$aboutBriefIntroduction.val($BriefIntroduction.html().trim()).removeClass('hidden')
	$storeName.addClass("hidden")
	$BriefIntroduction.addClass("hidden")
	$target.addClass("hidden").siblings().removeClass("hidden")

# 保存店铺简介信息
saveStoreInfo = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

	name = $aboutStoreName.val()
	description = $aboutBriefIntroduction.val()

	if name.length > 19
		alert("请输入不超过19个字的店铺名称")
		return false

	if description.length > 38
		alert("请输入不超过38个字的店铺简介")
		return false

	storeInfo = 
		id: $shopIdInput.val()
		name: name
		description: description 

	shopDataBus.updateShop storeInfo, (data)->
		if data.errCode is 0
			alert "修改成功"
			$storeName.html $aboutStoreName.val()
			$BriefIntroduction.html $aboutBriefIntroduction.val()

			$storeName.removeClass("hidden")
			$BriefIntroduction.removeClass("hidden")
			$(".info-edit").addClass("hidden")
			$(".edit-btn").removeClass("hidden").siblings().addClass("hidden")
		else
			alert data.message

# 取消编辑店铺信息
cancelStoreInfo = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$storeName.removeClass("hidden")
	$aboutStoreName.addClass("hidden")
	$BriefIntroduction.removeClass('hidden')
	$aboutBriefIntroduction.addClass('hidden')
	$target.parent().find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

showSellRank = (e)->
	$elem = $(e.currentTarget)
	$elem.addClass("active").siblings().removeClass("active")

	data = 
		shop_id: $shopIdInput.val()

	compiled = _.template $sellTemplate.html()
	$rankList.html("")

	shopDataBus.getProductRank "SellNum", data, (res)->
		if res.errCode == 0
			products = res.products;
			for i in [0...res.products.length]
				product = products[i]
				str = compiled {name: product.name, price: product.price, sellNum: product.sellNum}
				$(str).appendTo $rankList
		else
			alert res.message

showFavorRank = (e)->
	$elem = $(e.currentTarget)
	$elem.addClass("active").siblings().removeClass("active")

	data = 
		shop_id: $shopIdInput.val()

	compiled = _.template $favorTemplate.html()
	$rankList.html("")

	shopDataBus.getProductRank "FavorNum", data, (res)->
		if res.errCode == 0
			products = res.products;
			for i in [0...res.products.length]
				product = products[i]
				str = compiled {name: product.name, price: product.price, favorNum: product.favorNum}
				$(str).appendTo $rankList
		else
			alert res.message

$ ->
	$('.info .edit-btn').bind 'click', editStoreInfo
	$('.info .save-btn').bind 'click', saveStoreInfo
	$('.info .cancel-btn').bind 'click', cancelStoreInfo

	$('.sellRank').bind 'click', showSellRank
	$('.favorRank').bind 'click', showFavorRank

	$('.sellRank').click()

shopDataBus =
	updateShop: (storeInfo, callback)->
		$.post '/shop/updateShop', storeInfo, (data)->
			callback data

	getProductRank: (name, data, callback)->
		$.get '/product/getSortedProductsBy' + name, data, (data)->
			callback data

