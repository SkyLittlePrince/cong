# 缓存DOM节点变量
$aboutText = $(".about p")
$aboutTextarea = $(".about textarea")
$userId = $("#user_id");
$addFriendBtn = $("#add-friend-btn");
$deleteFriendBtn = $("#delete-friend-btn");

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

    $(document).on 'mouseover', '.skill-item', addDel
    $(document).on 'mouseout', '.skill-item', removeDel
    $(document).on 'click', '.skill .del-btn-skill', delSkill
    $(document).on 'click', '.work-experience .del-btn', delWorkExperience
    $(document).on 'click', '.edu-experience .del-btn', delEduExperience
    $(document).on 'click', '.awards .del-btn', delAwards

    $(document).on 'click', '.skill .add-btn-img', addSkill
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

    $("#add-friend-btn").bind 'click', addFriend
    $("#delete-friend-btn").bind 'click', deleteFriend

    checkIsFriend()

checkIsFriend = ()->
	data = 
		friend_id: $userId.val()

	dataBus.checkIsFriend data, (res)->
		if res.isFriend == 1
			$deleteFriendBtn.removeClass("hidden")
		else if res.isFriend == 0
			$addFriendBtn.removeClass("hidden")

###
# 点击添加及删除好友按钮事件
###
addFriend = (e)->
	friend_id = $userId.val()

	data = 
		friend_id: friend_id

	dataBus.addFriend data, (res)->
		if res.errCode == 0
			alert "添加好友成功"
			$addFriendBtn.addClass("hidden")
			$deleteFriendBtn.removeClass("hidden")
		else
			alert res.message

deleteFriend = (e)->
	friend_id = $userId.val()

	data = 
		friend_id: friend_id

	dataBus.deleteFriend data, (res)->
		if res.errCode == 0
			alert "删除好友成功"
			$deleteFriendBtn.addClass("hidden")
			$addFriendBtn.removeClass("hidden")
		else
			alert res.message

###
# 点击新增按钮事件
###
addSkill = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find(".show").removeClass("hidden")
	$parent.find(".bg").removeClass("hidden")
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
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find(".show").addClass("hidden")
	$parent.find(".bg").addClass("hidden")
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
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	data = 
		name: $parent.find(".skill-name input").val()

	compiled = _.template $("#skillTemplate").html()
	dataBus.addItem "Skill", data, (res)->
		if res.errCode == 0
			alert "新增成功"
			str = compiled {"skill_id": res.skill_id, name: data.name}
			$(str).insertBefore $(".skill-add")
			$parent.find(".bg").addClass("hidden")
			$parent.find(".show").addClass("hidden")
		else
			alert res.message

addSaveWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	data = 
		start_time: $parent.find(".start-time input").val()
		end_time: $parent.find(".end-time input").val()
		description: $parent.find(".description input").val()

	compiled = _.template $("#workExperienceTemplate").html()

	dataBus.addItem "WorkExperience", data, (res)->
		if res.errCode == 0
			alert "新增成功"
			str = compiled {"newWorkExperienceId": res.newWorkExperienceId, startTime: data.start_time, endTime: data.end_time, description: data.description}
			$(str).insertBefore $parent
			$parent.find(".work-time").addClass("hidden")
			$parent.find(".work-content").addClass("hidden")
			$parent.find(".add-btn").removeClass("hidden").siblings().addClass("hidden")
		else
			console.log res
			alert res.message

addSaveEduExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	data = 
		start_time: $parent.find(".start-time input").val()
		end_time: $parent.find(".end-time input").val()
		description: $parent.find(".description input").val()

	compiled = _.template $("#eduExperienceTemplate").html()

	dataBus.addItem "EduExperience", data, (res)->
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

	dataBus.addItem "Award", data, (res)->
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
addDel = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find(".del-btn-skill").removeClass("hidden")
	$parent.find(".del-btn-skill").addClass("block-img")
removeDel = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	$parent.find(".del-btn-skill").addClass("hidden")
	$parent.find(".del-btn-skill").removeClass("block-img")
delSkill = (e)->
	# need to continue...
	$target = $(e.currentTarget)
	$parent = $target.parent()
	data = 
		id: $parent.find(".skill-id").html().trim()
	
	dataBus.deleteItem "Skill", data, (res)->
		if res.errCode == 0
			alert "删除成功"
			$parent.fadeOut()
		else
			alert res.message

delWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()
	
	data = 
		id: $parent.find(".id").html().trim()
	
	dataBus.deleteItem "WorkExperience", data, (res)->
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
	
	dataBus.deleteItem "EduExperience", data, (res)->
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
	
	dataBus.deleteItem "Award", data, (res)->
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

	dataBus.saveChanges "About", data, (res)->
		if res.errCode == 0
			alert "修改成功"
			$aboutText.html data.content
		else
			alert res.message
		$aboutText.removeClass("hidden")
		$aboutTextarea.addClass("hidden")
		$parent.find(".edit-btn").removeClass("hidden").siblings().addClass("hidden")

saveSkill = (e)->
	# need to continue...
	# need to continue...
	
saveWorkExperience = (e)->
	$target = $(e.currentTarget)
	$parent = $target.parent().parent()

	data = 
		id: parseInt $parent.find(".id").html()
		start_time: $parent.find(".start-time input").val().trim()
		end_time: $parent.find(".end-time input").val().trim()
		description: $parent.find(".description input").val().trim()

	dataBus.saveChanges "WorkExperience", data, (data)->
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

	dataBus.saveChanges "EduExperience", data, (data)->
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

	dataBus.saveChanges "Award", data, (data)->
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

	dataBus.saveChanges "Contact", data, (data)->
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

###
# 工具函数
###
dataBus = 
	saveChanges: (name, data, callback)->
		$.post '/user/update' + name, data, (data)->
			callback(data)

	addItem: (name, data, callback)->
		$.post '/user/add' + name, data, (data)->
			callback(data)

	deleteItem: (name, data, callback)->
		$.post '/user/delete' + name, data, (data)->
			callback(data)

	addFriend: (data, callback)->
		$.post '/friend/add', data, (data)->
			callback(data)

	deleteFriend: (data, callback)->
		$.post '/friend/delete', data, (data)->
			callback(data)

	checkIsFriend: (data, callback)->
		$.get "/friend/checkIsFriend", data, (data)->
			callback(data)

