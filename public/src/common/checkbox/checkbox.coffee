class Checkbox
    #构造函数
    constructor: (@options)->
        @selector = @options.selector
        @bgPic = @options.bgPic
        @className = if @options.className then @options.className else 'my-self-checkbox-label' 
    # 初始化组件
    init: ->
        @makeCustom()
        @bindHandler()
    # 找到所有需要自定义的checkbox
    getAllCheckBox: ->
        $all = $(@selector).find('input[type="checkbox"]')
    makeCustom: ->
        # 给需要自定义checkbox的最外围父元素加上特殊的class
        self = @
        $(@selector)
            .addClass('my-self-checkbox')
            .find('input[type="checkbox"]')
            .each ->
                $(@).parent().addClass self.className
    # 给自定义checkbox绑定事件处理程序
    bindHandler: ->
        self = @
        $(@selector).delegate '.' + self.className, 'click', ->
            $(@).toggleClass('oncheck');
module.exports = Checkbox