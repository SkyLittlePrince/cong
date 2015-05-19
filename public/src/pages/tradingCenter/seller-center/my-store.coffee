Uploader = require "../../../common/uploader/index.coffee"
Checkbox = require('../../../common/checkbox/checkbox.coffee');
shopDataBus = require './shopDataBus.coffee'

checkbox = (new Checkbox({
    selector: '.checkbox-wrapper'
}))

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
	if name.length is 0
		alert '店铺名称不能为空'
		return false
	if name.length > 19
		alert("请输入不超过19个字的店铺名称")
		return false
	if description.length is 0
		alert "店铺描述不能为空"
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

# 或许当前为止正在编辑的标签
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

#-------------------------------------------------店铺商品部分 begin-------------------------------------------------------------#
# 引入所需模块
Dialog = require './../../../common/dialog/dialog.coffee'
# 缓存DOM节点变量
$addProductTemplate = $('#addProductTemplate')
addProductCompile = _.template $addProductTemplate.html()
$recommendationImage = $('.recommendation-image')
$productEditBtn = $('.product-edit')
$editStoreProduct = $('#edit-store-product')
$storeProductList = $('.store-product-list')
$storeProductRanking = $('.store-product-ranking')
$deleteStore = $('.delete-store')
$saveStoreProduct = $('#save-store-product')
$deleteProductBtn = $('.delete-product')
$addProductBtn = $('.add-product')
$productBtn = $('.product-btn')

# 所需模板
$oneProductTemplate = $('#one-product-template')
oneProductCompile = _.template $oneProductTemplate.html()
$updateProductTemplate = $('#update-product-template')
updateProductCompile = _.template $updateProductTemplate.html()

dialog = new Dialog({
	title: "增加商品"
	content: addProductCompile({})
	buttons: [{text:"确定", className: "add-product-confirm"}]
})

# 店铺商品进入编辑模式
editStoreProductMode = (e)->
	$deleteStore.hide()
	$storeProductList.addClass('edit-state')
	$storeProductRanking.hide()
	$productBtn.show()
	$('.checkbox-wrapper').removeClass('hidden')
	$('.product-edit').removeClass('hidden')
	$('.add-product-picture').removeClass('hidden')
	$target = $(e.currentTarget)
	$target.parent().find(".edit-btn").addClass("hidden").siblings().removeClass("hidden")

# 退出店铺商品编辑
saveStoreProductMode = (e)->
	$deleteStore.show()
	$productBtn.hide()
	$storeProductList.removeClass('edit-state')
	$storeProductRanking.show()
	$('.checkbox-wrapper').addClass('hidden')
	$('.product-edit').addClass('hidden')
	$('.add-product-picture').addClass('hidden')
	$target = $(e.currentTarget)
	$target.parent().find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")


# 弹出一个弹出框，用于新增商品
addOneProduct = ->
	dialog.loadDialogToPage()

	# 为上传按钮绑定上传图片事件
	avatarUploader = setUploadedPhoto "avatar"
	$('.add-product-confirm').bind 'click', addProductConfirm

# 验证商品的信息是否正确
ProductConfirmAction = ->
	if not $('#avatar-url').val() or not $('#product-name').val() or not $('#product-price').val() or not $('#product-dec').val()
		alert "请填写完整信息"
		return false
	return {
		avatar: $('#avatar-url').val()
		name: $('#product-name').val()
		price: $('#product-price').val()
		intro: $('#product-dec').val()
	}

# 点击添加商品确定事件
addProductConfirm = ->
	info = ProductConfirmAction()
	if info
		shopDataBus.addProduct info.name, info.intro, info.price, info.avatar, (data)->
			if data.errCode is 0
				alert("商品添加成功")
				dialog.closeDialog(dialog)
				info.id = data.product_id
				loadOneCreateProduct(info)

# 将一个新添加的商品添加到页面上
loadOneCreateProduct = (info)->
	info.id = if info.id then info.id else ''
	str = oneProductCompile(info)
	$recommendationImage.append $(str)

# 上传图片到七牛云
setUploadedPhoto = (name)->
	uploader = new Uploader {
		domain: "http://7xj0sp.com1.z0.glb.clouddn.com/"	# bucket 域名，下载资源时用到，**必需**
		browse_button: name + '-file',       # 上传选择的点选按钮，**必需**
		container: name + '-wrapper',       # 上传选择的点选按钮，**必需**
	}, {
		FileUploaded: (up, file, info)->
			info = $.parseJSON info
			domain = up.getOption('domain')
			url = domain + info.key
			# 显示上传之后的图片
			$("#" + name + "-wrapper").find(".avatar-img").attr("src", url)
			$("#avatar-url").val(url)
	}

# 删除产品逻辑
deleteProductHandler = ->
	CheckedItem = checkbox.getCheckedInput()
	if CheckedItem.length
		if confirm '确定删除这些商品？'
			for $item in CheckedItem
				(($item)->
					id = $item.parent().parent().siblings('.product-id').val()
					$oneImg = $item.parent().parent().parent().parent()
					shopDataBus.deleteProduct id, (data)->
						if data.errCode is 0
							$oneImg.remove()
						else
							alert data.message
				)($item)
	else
		alert "请选中商品左上角的选择框"

# 根据所点击的编辑按钮获取用户信息
getOneProductMessage = ($editBtn)->
	$productInfo = $editBtn.parent().siblings('.product-info')
	return {
		id: $productInfo.find('.product-id').val()
		name: $productInfo.find('.name').text()
		price: $productInfo.find('.price-value').text()
		avatar: $productInfo.find('.avatar').attr('src')
		intro: $productInfo.find('.product-intro').val()
	}

# 更新一个产品处理逻辑
editOneProductHandler = ->
	message = getOneProductMessage($(this))
	$oneImg = $(this).parent()
	dialog.options.title = "更新商品"
	dialog.options.content = updateProductCompile(message)
	dialog.options.buttons = [
		{text:"确定", className: "update-product-confirm"}
		{text:"取消", className: "close-button"}
	]
	dialog.loadDialogToPage()
	avatarUploader = setUploadedPhoto "avatar"
	$('.update-product-confirm').bind 'click', ->
		updateProductConfirm(message.id, $oneImg)

# 点击更新产品的确定按钮事件处理程序
updateProductConfirm = (id, $oneImg)->
	info = ProductConfirmAction()
	if info
		shopDataBus.updateProduct id, info.name, info.intro, info.price, info.avatar, (data)->
			if data.errCode is 0
				alert('更新成功')
				dialog.closeDialog(dialog)
				info.id = id
				$oneImg.replaceWith oneProductCompile(info)
			else
				alert data.message

# 获取一个商品的所有图片地址和id
getProductImageCollection = ($btn)->
	$imgsUrl = $btn.parent().siblings('.imgs-url')
	id = $btn.parent().siblings('.product-info').find('.product-id').val()
	imgUrls = []
	$imgsUrl.find('.one-img-url').each ->
		imgUrls.push $(this).val()

	return {
		imgUrls: imgUrls
		id: id
	}

$addProductImgTemplate = $('#add-product-img-template')
addProductImgCompile = _.template $addProductImgTemplate.html()

# 弹出增加商品弹出框
addProductImgHandler = ->
	info = getProductImageCollection($(this))
	dialog.options.dialogClass = 'add-image'
	dialog.options.title = "添加图片"
	dialog.options.content = addProductImgCompile({imgUrls: info.imgUrls, id: info.id})
	dialog.options.buttons = [
		{text:"确定", className: "add-product-img-confirm"}
		{text:"取消", className: "close-button"}
	]
	dialog.loadDialogToPage()

	addNewUploader = addNewPicUpload "avatar"

# 给商品添加图片
addImageToProduct = ->
	product_id = $('#unique-product-id').val()
	image = $("#avatar-url").val()
	console.log product_id, image
	shopDataBus.addPicture product_id, image, (data)->
		if data.errCode is 0
			alert("添加成功")
		else
			alert data.message

# 上传新的商品图片到云端
addNewPicUpload = (name)->
	uploader = new Uploader {
		domain: "http://7xj0sp.com1.z0.glb.clouddn.com/"	# bucket 域名，下载资源时用到，**必需**
		browse_button: name + '-file',       # 上传选择的点选按钮，**必需**
		container: name + '-wrapper',       # 上传选择的点选按钮，**必需**
	}, {
		FileUploaded: (up, file, info)->
			info = $.parseJSON info
			domain = up.getOption('domain')
			url = domain + info.key
			# 显示上传之后的图片
			$("#" + name + "-wrapper").find(".avatar-img").attr("src", url)
			$("#avatar-url").val(url)
		UploadComplete: ()->
			$('.add-new-img-file').hide()
			$('.add-img-to-product').removeClass('hidden')
	}


#-------------------------------------------------店铺商品部分 end---------------------------------------------------------------#

# 文档加载完成执行的初始化操作，主要执行事件绑定
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

	$('.delete-product').bind 'click', deleteProductHandler

	$('body').delegate '.product-edit', 'click', editOneProductHandler

	$('body').delegate '.add-product-picture', 'click', addProductImgHandler

	$('body').delegate '.add-img-to-product', 'click', addImageToProduct

# 用于添加测试用例
# for i in [1...5]
# 	shopDataBus.addProduct 111,111,111,"http://7sbxao.com1.z0.glb.clouddn.com/login.jpg", (data) ->
# 		console.log 'success'

