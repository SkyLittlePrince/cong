# @author: cyrilzhao
# @date: 2015-04-15

'''
	调用示例：

	process = new Process({
		container: "#process"
		color: ["red", "yellow", "blue"]
		width: [50, 100, 150]
	}).show().active(2)
'''

_defaultConfig = {
	container: "",				# 外部容器，使用者预先写好，与本插件无关
	length: 3,					# 插件内el元素个数
	color: "#face00",			# 插件内每个el元素的颜色，可直接指定所有元素颜色，也可通过数组指定每个元素的颜色
	defaultWidth: 50			# 插件内每个元素的默认长度
	defaultColor: "#dcdcdc",	# 插件内每个元素的默认颜色
	width: 50,					# 插件内每个元素的长度，可直接指定所有元素长度，也可通过数组指定每个元素的长度
	height: 5					# 插件高度
}


class Process
	constructor: (userConfig)->
		config = $.extend {}, _defaultConfig, userConfig
		this.init config

	init: (config)->
		this.config = config
		this.container = $ config.container

		# 根据用户传入的参数创建插件主体及内部元素
		this.content = $ "<div id='process-content'></div>"
		for i in [0...config.length]
			$el = $ "<div class='process-el'></div>"
			this.content.append $el

		# 设置插件的基本样式
		this.content.css {
			"float": "left",
			"display": "none"
		}
		this.content.find(".process-el").css {
			"width": config.width + "px",
			"height": config.height + "px",
			"background-color": config.defaultColor,
			"float": "left"
		}

		# 判断是要设定所有元素的长度还是根据数组设置每个元素的长度
		if config.width.length
			this.content.find(".process-el").each (index, elem)->
				$elem = $ elem
				if config.width[index]
					$elem.css "width", config.width[index] + "px"
				else
					$elem.css "width", config.defaultWidth + "px"
		else 
			this.content.find(".process-el").css "width", config.width + "px"

		# 判断是要设定所有元素的颜色还是根据数组设置每个元素的颜色
		if $.isArray(config.color)
			this.content.find(".process-el").each (index, elem)->
				if config.color[index]
					elem.dataset.color = config.color[index]
				else
					elem.dataset.color = config.defaultColor
		else
			this.content.find(".process-el").attr "data-color", config.color

		this.container.append this.content

		return this

	# @desc 	从左至右激活插件中的元素，未被激活的元素将显示默认颜色
	# @param activeLength 	要激活的元素个数 	
	active: (activeLength)->
		$els = this.content.find(".process-el")

		for i in [0..activeLength-1]
			console.log i
			color = $($els[i]).attr("data-color")
			$($els[i]).css("background-color", color)

		return this

	show: ()->
		this.content.show()

		return this

	hide: ()->
		this.content.hide()

		return this

module.exports = Process

