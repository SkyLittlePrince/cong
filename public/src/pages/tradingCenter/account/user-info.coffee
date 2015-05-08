# 缓存DOM节点变量
$aboutText = $(".about p")
$aboutTextarea = $(".about textarea")

###
# 页面加载完成执行的操作
###
$ ->
    $('.base-info .edit-btn').bind 'click', editBaseInfo
    $('.about .edit-btn').bind 'click', editAbout
    $('.skill .edit-btn').bind 'click', editSkill
    $('.work-experience .edit-btn').bind 'click', editWorkExperience
    $('.edu-experience .edit-btn').bind 'click', editEduExperience
    $('.awards .edit-btn').bind 'click', editAwards
    $('.contact .edit-btn').bind 'click', editContact

    $('.base-info .cancel-btn').bind 'click', cancelBaseInfo
    $('.about .cancel-btn').bind 'click', cancelAbout
    $('.skill .cancel-btn').bind 'click', cancelSkill
    $('.work-experience .cancel-btn').bind 'click', cancelWorkExperience
    $('.edu-experience .cancel-btn').bind 'click', cancelEduExperience
    $('.awards .cancel-btn').bind 'click', cancelAwards
    $('.contact .cancel-btn').bind 'click', cancelContact

    $('.base-info .save-btn').bind 'click', saveBaseInfo
    $('.about .save-btn').bind 'click', saveAbout
    $('.skill .save-btn').bind 'click', saveSkill
    $('.work-experience .save-btn').bind 'click', saveWorkExperience
    $('.edu-experience .save-btn').bind 'click', saveEduExperience
    $('.awards .save-btn').bind 'click', saveAwards
    $('.contact .save-btn').bind 'click', saveContact

    $('.skill .del-btn').bind 'click', delSkill
    $('.work-experience .del-btn').bind 'click', delWorkExperience
    $('.edu-experience .del-btn').bind 'click', delEduExperience
    $('.awards .del-btn').bind 'click', delAwards

    $('.skill .add-btn').bind 'click', addSkill
    $('.work-experience .add-btn').bind 'click', addWorkExperience
    $('.edu-experience .add-btn').bind 'click', addEduExperience
    $('.awards .add-btn').bind 'click', addAwards

addSkill = (e)->

addWorkExperience = (e)->

addEduExperience = (e)->

addAwards = (e)->	
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find("input").removeClass("hidden")
	$target.addClass("hidden").siblings().removeClass("hidden")


delSkill = (e)->
	console.log ""

delWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	
	data = 
		id: $parent.find(".id").html().trim()
	
	deleteItem "WorkExperience", data, (res)->
		if res.errCode == 0
			alert "删除成功"
			$parent.fadeOut()
		else
			alert res.message


delEduExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	
	data = 
		id: $parent.find(".id").html().trim()
	
	deleteItem "EduExperience", data, (res)->
		console.log res.errCode
		if res.errCode == 0
			alert "删除成功"
			$parent.fadeOut()
		else
			alert res.message

delAwards = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	
	data = 
		id: $parent.find(".id").html().trim()
	
	deleteItem "Award", data, (res)->
		if res.errCode == 0
			alert "删除成功"
			$parent.fadeOut()
		else
			alert res.message


###
# 点击编辑按钮事件
###
editBaseInfo = (e)->
	console.log e.currentTarget

editAbout = (e)->
	$target = $(e.currentTarget)
	$aboutTextarea.val $aboutText.html().trim()
	$aboutTextarea.removeClass("hidden")
	$aboutText.addClass("hidden")
	$target.addClass("hidden").siblings().removeClass("hidden")

editSkill = (e)->
	$target = $(e.currentTarget)
	$target.addClass("hidden").siblings().removeClass("hidden")

editWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	replaceConentByInput $parent.find(".start-time")
	replaceConentByInput $parent.find(".end-time")
	replaceConentByInput $parent.find(".description")
	$target.addClass("hidden").siblings().removeClass("hidden")
	$parent.find(".del-btn").addClass("hidden")

editEduExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	replaceConentByInput $parent.find(".start-time")
	replaceConentByInput $parent.find(".end-time")
	replaceConentByInput $parent.find(".description")
	$target.addClass("hidden").siblings().removeClass("hidden")
	$parent.find(".del-btn").addClass("hidden")

editAwards = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	replaceConentByInput $parent.find(".time")
	replaceConentByInput $parent.find(".description")
	$target.addClass("hidden").siblings().removeClass("hidden")
	$parent.find(".del-btn").addClass("hidden")

editContact = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	replaceConentByInput $parent.find(".mobile")
	replaceConentByInput $parent.find(".qq")
	replaceConentByInput $parent.find(".email")
	$target.addClass("hidden").siblings().removeClass("hidden")

###
# 点击取消按钮事件
###
cancelBaseInfo = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

cancelAbout = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$aboutText.removeClass("hidden")
	$aboutTextarea.addClass("hidden")
	$target.parent().find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

cancelSkill = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

cancelWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find("input").each (index, elem)->
		$elem = $(elem)
		replaceInputByContent $elem, $.data($elem.parent()[0], "oldData")
	$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")
	$parent.find(".del-btn").removeClass("hidden")

cancelEduExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find("input").each (index, elem)->
		$elem = $(elem)
		replaceInputByContent $elem, $.data($elem.parent()[0], "oldData")
	$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")
	$parent.find(".del-btn").removeClass("hidden")

cancelAwards = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find("input").each (index, elem)->
		$elem = $(elem)
		replaceInputByContent $elem, $.data($elem.parent()[0], "oldData")
	$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")
	$parent.find(".del-btn").removeClass("hidden")

cancelContact = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find("input").each (index, elem)->
		$elem = $(elem)
		replaceInputByContent $elem, $.data($elem.parent()[0], "oldData")
	$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

###
# 点击保存按钮事件
###
saveBaseInfo = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

saveAbout = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

	data = 
		content: $aboutTextarea.val()

	saveChanges "About", data, (res)->
		if res.errCode == 0
			alert "修改成功"
			$aboutText.html data.content
		else
			alert res.message
		$aboutText.removeClass("hidden")
		$aboutTextarea.addClass("hidden")

saveSkill = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

saveWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

	data = 
		id: parseInt $parent.find(".id").html()
		start_time: $parent.find(".start-time input").val().trim()
		end_time: $parent.find(".end-time input").val().trim()
		description: $parent.find(".description input").val().trim()

	saveChanges "WorkExperience", data, (data)->
		if data.errCode == 0
			alert "修改成功"
			$parent.find("input").each (index, elem)->
				$elem = $ elem
				replaceInputByContent $elem, $elem.val()
		else
		 	alert data.message
		$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")


saveEduExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

	data = 
		id: parseInt $parent.find(".id").html()
		start_time: $parent.find(".start-time input").val().trim()
		end_time: $parent.find(".end-time input").val().trim()
		description: $parent.find(".description input").val().trim()

	saveChanges "EduExperience", data, (data)->
		if data.errCode == 0
			alert "修改成功"
			$parent.find("input").each (index, elem)->
				$elem = $ elem
				replaceInputByContent $elem, $elem.val()
		else
		 	alert data.message
		$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

saveAwards = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

	data = 
		id: parseInt $parent.find(".id").html()
		time: $parent.find(".time input").val().trim()
		description: $parent.find(".description input").val().trim()

	saveChanges "Award", data, (data)->
		if data.errCode == 0
			alert "修改成功"
			$parent.find("input").each (index, elem)->
				$elem = $ elem
				replaceInputByContent $elem, $elem.val()
		else
		 	alert data.message
		$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

saveContact = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

	data = 
		mobile: $parent.find(".mobile input").val().trim()
		qq: $parent.find(".qq input").val().trim()
		email: $parent.find(".email input").val().trim()

	saveChanges "Contact", data, (data)->
		if data.errCode == 0
			alert "修改成功"
			$parent.find("input").each (index, elem)->
				$elem = $ elem
				replaceInputByContent $elem, $elem.val()
		else
		 	alert data.message
		$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

###
# 工具函数
###
replaceConentByInput = ($elem)->
	content = $elem.html().trim()
	$.data($elem[0], "oldData", content)
	$input = $("<input type='text' value='" + content + "' />")
	$elem.html $input

replaceInputByContent = ($input, content)->
	$parent = $input.parent()
	$parent.html content

saveChanges = (name, data, callback)->
	$.ajax {
		type: "post"
		url: '/user/update' + name
		data: data
		success: (data)->
			callback(data)
	}

deleteItem = (name, data, callback)->
	$.ajax {
		type: "post"
		url: '/user/delete' + name
		data: data
		success: (data)->
			callback(data)
	}

