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
	# 增加一个产品
	addProduct: (name, intro, price, avatar, callback)->
		$.post '/product/addProduct', { name: name, intro: intro, price: price, avatar: avatar}, (data) -> callback(data)
	# 删除一个产品
	deleteProduct: (id, callback)->
		$.ajax {
			type: "get"
			url: "/product/deleteProduct"
			data: 
				id: id
			success: (data)->
				callback data
		}
	# 更新一个商品
	updateProduct: (id, name, intro, price, avatar, callback)->
		$.post '/product/updateProduct', { id: id, name: name, intro: intro, price: price, avatar: avatar}, (data) -> callback(data)

	# 商品新增图片
	addPicture: (product_id, image, callback)->
		$.post '/product/addPicture', { product_id: product_id, image: image}, (data) -> callback(data)

	# 删除商品一张图片
	deletePicture: (id, callback)->
		$.ajax {
			type: "get"
			url: "/product/deletePicture"
			data: 
				id: id
			success: (data)->
				callback data
		}
module.exports = shopDataBus
