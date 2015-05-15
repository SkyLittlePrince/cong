Dialog = require './../../../common/dialog/dialog.coffee'

$storeName = $('.store-name')
$aboutStoreName = $('.about-store-name')
$BriefIntroduction = $('.brief-introduction')
$aboutBriefIntroduction = $('.about-brief-introduction')
$shopIdInput = $("#shop-id")
$sellTemplate = $("#sellTemplate")
$favorTemplate = $("#favorTemplate")
$rankList = $(".rank-list")
# 店铺商品有关DOM节点
$editStoreProduct = $('#edit-store-product')
$storeProductList = $('.store-product-list')
$storeProductRanking = $('.store-product-ranking')
$deleteStore = $('.delete-store')
$saveStoreProduct = $('#save-store-product')
$deleteProductBtn = $('.delete-product')
$addProductBtn = $('.add-product')
$productBtn = $('.product-btn')

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

$allTag = $('.detail .tags')
$disabledTagTemplate = $('#disabledTagTemplate')
$oneTagTemplat = $('#oneTagTemplat')
$tagEdit = $('.tag-edit')
$tagDisplay = $('.tag-display')
# 已有标签模板
disabledTagcompiled = _.template $disabledTagTemplate.html()
oneTagCompiled = _.template $oneTagTemplat.html()

# 获取当前所有的标签
getAllTags = ->
	tagArray = []
	$allOneTag = $allTag.find('.one-tag')
	$allOneTag.each ->
		tag =
			tagValue: $(this).text().trim()
			tagId: $(this).data('tagid')
		tagArray.push tag
	return tagArray

primaryTag = getAllTags()

loadTagsToEditState = (tagArray)->
	$addTagInput = $('.edit-tag-list .add-tag-input')
	for tag in tagArray
		console.log tag
		$addTagInput.before (disabledTagcompiled {tagValue: tag.tagValue, tagId: tag.tagId})

# 编辑店铺标签
editDetailStoreInfo = (e)->
	$target = $(e.currentTarget)
	tagArray = getAllTags()
	# 进入编辑模式
	$allTag.children().remove()
	$tagDisplay.hide()
	$tagEdit.show()
	
	# 加载现有标签
	loadTagsToEditState(tagArray)
	$target.addClass("hidden").siblings().removeClass("hidden")

# 添加一个新的标签处理逻辑
addNewTag = ->
	tag = $(this).siblings('input[type="text"]').val().trim()
	if not tag.length
		alert('标签不能为空')
		return false
	if tag.length > 10
		alert('标签的长度不能超过10个字')
		return false

	$allEditTag = $('.edit-tag-list input[disabled="disabled"]')
	flag = true
	$allEditTag.each -> flag = false if $(this).val() == tag
	if flag is false
		alert('标签不能重复')
		return false

	$addTagInput = $('.edit-tag-list .add-tag-input')
	
	shopDataBus.addShopTag $shopIdInput.val(), tag, (data)->
		if data.errCode is 0
			$addTagInput.before((disabledTagcompiled {tagValue: tag, tagId: data.tag_id})).find('input').val('')
		else
			alert(data.message)
# 删除旧的标签
deleteOldTag = ->
	$this = $(this)
	tagId = $(this).data('tagid')
	if confirm('确定删除该标签？')
		shopDataBus.deleteShopTag $shopIdInput.val(), tagId, (data)->
			if data.errCode is 0
				$this.parent().remove()
			else
				alert(data.message)

# 保存店铺简介信息
saveDetailStoreInfo = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	currentEditTag = getCurrentEditTag()
	# 退出编辑模式
	$tagDisplay.show()
	$('.display-tag').remove()
	$tagEdit.hide()
	for tag in currentEditTag
		str = oneTagCompiled {tagValue: tag.tagValue, tagId: tag.tagId}
		$('.detail .tags').append $(str)

	$target.parent().find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

getCurrentEditTag = ->
	$allEditTag = $('.edit-tag-list input[disabled="disabled"]')
	tagArray = []
	$allEditTag.each ->
		tag = 
			tagId: $(this).siblings('a').data('tagid')
			tagValue: $(this).val().trim()
		tagArray.push tag
	return tagArray 

# 取消编辑店铺信息
cancelDetailStoreInfo = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$tagDisplay.show()
	$('.display-tag').remove()
	$tagEdit.hide()
	$('.detail .tags').append($('<span class="one-tag">' + tag + '&nbsp&nbsp</span>')) for tag in primaryTag
	$target.parent().find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

# 删除店铺
deleteStore = ->
	if (confirm('确定删除店铺？'))
		storeId = $shopIdInput.val()
		shopDataBus.deleteStore storeId, (data)->
			if data.errCode is 0
				alert("店铺删除成功")
				location.reload()

# 店铺商品进入编辑模式
editStoreProductMode = (e)->
	$deleteStore.hide()
	$storeProductList.addClass('edit-state')
	$storeProductRanking.hide()
	$productBtn.show()
	$target = $(e.currentTarget)
	$target.parent().find(".edit-btn").addClass("hidden").siblings().removeClass("hidden")

# 退出店铺商品编辑
saveStoreProductMode = (e)->
	$deleteStore.show()
	$productBtn.hide()
	$storeProductList.removeClass('edit-state')
	$storeProductRanking.show()

	$target = $(e.currentTarget)
	$target.parent().find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

$addProductTemplate = $('#addProductTemplate')
addProductCompile = _.template $addProductTemplate.html()

# 弹出一个弹出框，用于新增商品
addOneProduct = ->
	dialog = new Dialog({
		title: "增加商品"
		content: addProductCompile({})
	})
	dialog.loadDialogToPage()

$ ->
	$('.info .edit-btn').bind 'click', editStoreInfo
	$('.info .save-btn').bind 'click', saveStoreInfo
	$('.info .cancel-btn').bind 'click', cancelStoreInfo

	$('.detail .edit-btn').bind 'click', editDetailStoreInfo
	$('.detail .save-btn').bind 'click', saveDetailStoreInfo
	# $('.detail .cancel-btn').bind 'click', cancelDetailStoreInfo

	$("body").delegate '#add-tag-btn', 'click', addNewTag
	$("body").delegate '.delete-tag-btn', 'click', deleteOldTag

	$('.sellRank').bind 'click', showSellRank
	$('.favorRank').bind 'click', showFavorRank

	$('.sellRank').click()

	$('.delete-store').bind 'click', deleteStore

	$editStoreProduct.bind 'click', editStoreProductMode
	$saveStoreProduct.bind 'click', saveStoreProductMode

	$addProductBtn.bind 'click', addOneProduct

shopDataBus =
	updateShop: (storeInfo, callback)->
		$.post '/shop/updateShop', storeInfo, (data)->
			callback data

	getProductRank: (name, data, callback)->
		$.get '/product/getSortedProductsBy' + name, data, (data)->
			callback data
	# 删除店铺
	deleteStore: (storeId, callback) ->
		$.get '/shop/deleteShop', storeId, (data)->
			callback data
	# 新增店铺标签
	addShopTag: (storeId, tagName, callback)->
		$.post '/shop/addTag', {shop_id: storeId, name: tagName}, (data)->callback(data)
	# 删除店铺标签
	deleteShopTag: (storeId, tag_id, callback)->
		$.post '/shop/deleteTag', {shop_id: storeId, tag_id: tag_id}, (data)->callback(data)