# 缓存DOM节点变量
$title = $('#title')
$price = $('#price')
$month = $('month')
$day = $('day')
$hour = $('hour')
$year = $('year')
$people = $('input[name="people"]')
$detail = $('#detail')
$step1SaveBtn = $('#step-1-save-btn')

step1SaveBtnHandler = ->
	
$ ->
	$step1SaveBtn.bind 'click', step1SaveBtnHandler