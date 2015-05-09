$storeName = $('.store-name')
$aboutStoreName = $('.about-store-name')
$BriefIntroduction = $('.brief-introduction')
$aboutBriefIntroduction = $('.about-brief-introduction')

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

	storeInfo = 
		id: '3'		# TODO
		name: $aboutStoreName.val()
		description: $aboutBriefIntroduction.val()
	shopDataBus.updateShop storeInfo, (data)->
		if data.errCode is 0
			alert "修改成功"
			$storeName.html $aboutStoreName.val()
			$BriefIntroduction.html $aboutBriefIntroduction.val()

			$storeName.removeClass("hidden")
			$BriefIntroduction.addClass("hidden")
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

editStoreDetail = (e)->

saveStoreDetail = (e)->

cancelStoreDetail = (e)->

$ ->
	$('.info .edit-btn').bind 'click', editStoreInfo
	$('.info .save-btn').bind 'click', saveStoreInfo
	$('.info .cancel-btn').bind 'click', cancelStoreInfo
	$('.detail .edit-btn').bind 'click', editStoreDetail
	$('.detail .save-btn').bind 'click', saveStoreDetail
	$('.detail .cancel-btn').bind 'click', cancelStoreDetail

shopDataBus =
	updateShop: (storeInfo, callback)->
		$.ajax {
			type: 'post'
			url: '/shop/updateShop'
			success: (data)->
				callback data
		}
