$description = $('.description')
$aboutDescription = $('.about-description')
$ ->
	$('.card-content .edit-btn').bind 'click', editDescription
	$('.card-content .save-btn').bind 'click', saveDescription

editDescription = (e)->
	$target = $(e.currentTarget)
	$aboutDescription.val $description.html().trim()
	$aboutDescription.removeClass("hidden")
	$description.addClass("hidden")
	$target.addClass("hidden").siblings().removeClass("hidden")

saveDescription = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

	ajaxSaveDescription $aboutDescription.val(), (data)->
		if data.errCode is 0
			alert "修改成功"
			$description.html $aboutDescription.val()
		else
			alert data.message

		$description.removeClass("hidden")
		$aboutDescription.addClass("hidden")

ajaxSaveDescription = (description, callback)->
	$.ajax {
		type: "post"
		url: '/user/descrption'
		data:
			description: description
		success: (data)->
			callback(data)
	}
