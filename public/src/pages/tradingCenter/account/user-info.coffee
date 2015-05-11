# 缓存DOM节点变量
$aboutText = $(".about p")
$aboutTextarea = $(".about textarea")

###
# 页面加载完成执行的操作，绑定事件
###
$ ->
    $('.base-info .edit-btn').bind 'click', editBaseInfo
    $('.about .edit-btn').bind 'click', editAbout
    $(document).on 'click', '.skill .edit-btn', editSkill
    $(document).on 'click', '.work-experience .edit-btn', editWorkExperience
    $(document).on 'click', '.edu-experience .edit-btn', editEduExperience
    $(document).on 'click', '.awards .edit-btn', editAwards
    $('.contact .edit-btn').bind 'click', editContact

    $('.base-info .cancel-btn').bind 'click', cancelBaseInfo
    $('.about .cancel-btn').bind 'click', cancelAbout
    $(document).on 'click', '.skill .cancel-btn', cancelSkill
    $(document).on 'click', '.work-experience .cancel-btn', cancelWorkExperience
    $(document).on 'click', '.edu-experience .cancel-btn', cancelEduExperience
    $(document).on 'click', '.awards .cancel-btn', cancelAwards
    $('.contact .cancel-btn').bind 'click', cancelContact

    $('.base-info .save-btn').bind 'click', saveBaseInfo
    $('.about .save-btn').bind 'click', saveAbout
    $(document).on 'click', '.skill .save-btn', saveSkill
    $(document).on 'click', '.work-experience .save-btn', saveWorkExperience
    $(document).on 'click', '.edu-experience .save-btn', saveEduExperience
    $(document).on 'click', '.awards .save-btn', saveAwards
    $('.contact .save-btn').bind 'click', saveContact

    $(document).on 'click', '.skill .del-btn', delSkill
    $(document).on 'click', '.work-experience .del-btn', delWorkExperience
    $(document).on 'click', '.edu-experience .del-btn', delEduExperience
    $(document).on 'click', '.awards .del-btn', delAwards

    $(document).on 'click', '.skill .add-btn', addSkill
    $(document).on 'click', '.work-experience .add-btn', addWorkExperience
    $(document).on 'click', '.edu-experience .add-btn', addEduExperience
    $(document).on 'click', '.awards .add-btn', addAward

    $('.skill .add-save-btn').bind 'click', addSaveSkill
    $('.work-experience .add-save-btn').bind 'click', addSaveWorkExperience
    $('.edu-experience .add-save-btn').bind 'click', addSaveEduExperience
    $('.awards .add-save-btn').bind 'click', addSaveAwards

    $('.skill .add-cancel-btn').bind 'click', addCancelSkill
    $('.work-experience .add-cancel-btn').bind 'click', addCancelWorkExperience
    $('.edu-experience .add-cancel-btn').bind 'click', addCancelEduExperience
    $('.awards .add-cancel-btn').bind 'click', addCancelAward

###
# 点击新增按钮事件
###
addSkill = (e)->

addWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find(".work-time").removeClass("hidden")
	$parent.find(".work-content").removeClass("hidden")
	$target.addClass("hidden").siblings().removeClass("hidden")

addEduExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find(".edu-time").removeClass("hidden")
	$parent.find(".edu-content").removeClass("hidden")
	$target.addClass("hidden").siblings().removeClass("hidden")

addAward = (e)->	
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find("input").removeClass("hidden")
	$target.addClass("hidden").siblings().removeClass("hidden")

###
# 点击保存取消按钮事件
###
addCancelSkill = (e)->
	# need to continue...

addCancelWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find(".work-time").addClass("hidden")
	$parent.find(".work-content").addClass("hidden")
	$parent.find(".add-btn").removeClass("hidden").siblings().addClass("hidden")

addCancelEduExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find(".edu-time").addClass("hidden")
	$parent.find(".edu-content").addClass("hidden")
	$parent.find(".add-btn").removeClass("hidden").siblings().addClass("hidden")

addCancelAward = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find("input").addClass("hidden")
	$parent.find(".add-btn").removeClass("hidden").siblings().addClass("hidden")

###
# 点击保存新增按钮事件
###
addSaveSkill = (e)->
	# need to continue...

addSaveWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	data = 
		start_time: $parent.find(".start-time input").val()
		end_time: $parent.find(".end-time input").val()
		description: $parent.find(".description input").val()

	compiled = _.template $("#workExperienceTemplate").html()

	addItem "WorkExperience", data, (res)->
		if res.errCode == 0
			alert "新增成功"
			str = compiled {"newWorkExperienceId": res.newWorkExperienceId, startTime: data.start_time, endTime: data.end_time, description: data.description}
			$(str).insertBefore $parent
			$parent.find(".work-time").addClass("hidden")
			$parent.find(".work-content").addClass("hidden")
			$parent.find(".add-btn").removeClass("hidden").siblings().addClass("hidden")
		else
			alert res.message

addSaveEduExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	data = 
		start_time: $parent.find(".start-time input").val()
		end_time: $parent.find(".end-time input").val()
		description: $parent.find(".description input").val()

	compiled = _.template $("#eduExperienceTemplate").html()

	addItem "EduExperience", data, (res)->
		if res.errCode == 0
			alert "新增成功"
			str = compiled {"newEduExperienceId": res.newEduExperienceId, startTime: data.start_time, endTime: data.end_time, description: data.description}
			$(str).insertBefore $parent
			$parent.find(".edu-time").addClass("hidden")
			$parent.find(".edu-content").addClass("hidden")
			$parent.find(".add-btn").removeClass("hidden").siblings().addClass("hidden")
		else
			alert res.message

addSaveAwards = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	data = 
		time: $parent.find(".time input").val()
		description: $parent.find(".description input").val()

	compiled = _.template $("#awardTemplate").html()

	addItem "Award", data, (res)->
		if res.errCode == 0
			alert "新增成功"
			str = compiled {"newAwardId": res.newAwardId, time: data.time, description: data.description}
			$(str).insertBefore $parent
			$parent.find("input").addClass("hidden")
			$parent.find(".add-btn").removeClass("hidden").siblings().addClass("hidden")
		else
			alert res.message

###
# 点击删除按钮事件
###
delSkill = (e)->
	# need to continue...

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
	# need to continue...

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
	# need to continue...

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
	# need to continue...

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
		$parent.find(".del-btn").removeClass("hidden")


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
		$parent.find(".del-btn").removeClass("hidden")

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
		$parent.find(".del-btn").removeClass("hidden")

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

addItem = (name, data, callback)->
	$.ajax {
		type: "post"
		url: '/user/add' + name
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

