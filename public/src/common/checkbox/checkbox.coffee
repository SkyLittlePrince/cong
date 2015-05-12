
_defaultConfig = {
    selector: "",
    className: "my-checkbox"
}

<input type="checkbox" name="acceptance" value="acceptance" style="display:none;">


class Checkbox
    #构造函数
    constructor: (options)->
        @options = $.extend {}, _defaultConfig, options
        
        @init()

    # 初始化组件
    init: ->
        @bindHandler()

    # 找到所有需要自定义的checkbox
    getAllCheckBox: ->
        $checkboxes = $(@selector).find @options.className

    # 给自定义checkbox绑定事件处理程序
    bindHandler: ->
        self = @
        $(document).on @options.selector + ' ' + @options.className, 'click', (e)->
            $(@).toggleClass('oncheck');

module.exports = Checkbox




