# 调用示例
# 1. 添加包含星星的标签： <p class="score buyer-score">对买家总评分: </p>
# 2. 添加调用代码
	# score = new Score({
	# 	selector: '.buyer-score'
	# 	data: [
	# 		{id: 'seller-score', starNumber: 5},
	# 		{id: 'buyer-score', starNumber: 5}
	# 	]
	# })
# 3. 通过选择器获得分数 $('#seller-score').val()

_defaultConfig =
	selector: '',							# 每一个评分组件的wrapper选择器
	data:[]									# 用户获取每一个组件的分数的隐藏标签的id和每一个评分组件的星星数量
	starClassName: "score-star-class"		# 每一个星星的class值

class Score
	#构造函数
	constructor: (options)->
		@options = $.extend {}, _defaultConfig, options
		@init()

	# 组件初始化
	init: ->
		$Scores = @getAllScoreWrapper()

		data = @options.data
		star = '<span class="' + @options.starClassName + '"></span>'

		$Scores.each (index, item)->
			str = '<input type="hidden" class="score-value" id="' + data[index].id + '" value="" />'
			$(item).append($(str))
			$(item).append $(star) for i in [0...data[index].starNumber]

		@bindEveneListener()

	# 获取所有的评分组件
	getAllScoreWrapper: ->
		return $Scores = $(@options.selector)

	# 为组件中的`星星`绑定事件处理程序
	bindEveneListener: ->
		self = @
		starClassName = '.' + @options.starClassName

		$('body')
		# 为星星绑定鼠标悬浮事件
		.delegate starClassName, 'mouseover', ->
			currentIndex = $(this).index() - 1
			$(this).addClass('active').siblings(starClassName).each (index, item)->
				$(item).addClass('active') if index < currentIndex			
		# 为星星绑定鼠标离开事件
		.delegate starClassName, 'mouseleave', ->
			$currentStar = $(this)
			value = self.getScore($currentStar)
			if not value
				$currentStar.removeClass('active').siblings(starClassName).removeClass('active')
			else
				$currentStar.parent().find(starClassName).each (index, item)->
					if index > value - 1
						$(item).removeClass('active')

		# 为星星绑定鼠标离开点击事件
		.delegate starClassName, 'click', ->
			# 点击的时候和首先和悬浮一样，给当前的星星和之前的兄弟星星加上激活class
			currentIndex = $(this).index()
			$(this).parent().find(starClassName).removeClass('active').each (index, item)->
				$(item).addClass('active') if index <= (currentIndex - 1)	

			self.setScore($(this), currentIndex)

	# 设置组件的`得分`
	setScore: ($currentStar, index)->
		$currentStar.siblings('.score-value').val(index)

	# 获取组件的`分数`
	getScore: ($currentStar)->
		$value = $currentStar.siblings('.score-value').val()

module.exports = Score
