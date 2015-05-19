
##
# 调用方式 
# checkbox = (new Checkbox({
#    selector: '.checkbox-wrapper'
#    data: ["acceptance", "finishConfirmed", "addPriceOrDelay", "publishSuccess", "publishFail", "nearDeadline"]
# }))
# 
#
#

_defaultConfig = {
    selector: "",
    className: "my-checkbox",
    data: []
}

class Checkbox
    #构造函数
    constructor: (options)->
        @options = $.extend {}, _defaultConfig, options
        
        @init()

    # 初始化组件
    init: ->
        self = @    

        data = @options.data

        $(@options.selector).each (index, elem)->
            $elem = $(elem)

            str = '<label class="my-checkbox-item">' +
                    '<input type="checkbox" name="' + data[index] + '" class="' + self.options.className + '" value="' + data[index] + '" style="display:none;">' +
                '</label>'

            $checkbox = $(str)
            $elem.html $checkbox

        @bindHandler()

    getCheckedItem: ()->
        checkedBoxes = []
        items = @getAllCheckBox()

        for i in [0...items.length]
            if items[i].checked 
                checkedBoxes.push items[i]

        return checkedBoxes;

    getCheckedInput: ()->
        checkedInput = []
        items = @getAllCheckBox()

        items.each ->
            if $(this).prop('checked')
                checkedInput.push $(this)

        return checkedInput

    setAllItemsSelected: ()->
        items = @getAllCheckBox()

        for i in [0...items.length]
            item = items[i]
            item.checked = "checked"
            $(item).parent().addClass("oncheck")

    resetAllItems: ()->
        items = @getAllCheckBox()

        for i in [0...items.length]
            item = items[i]
            item.checked = false
            $(item).parent().removeClass("oncheck")

    setItemsCheckedByIndexes: (indexes)->
        items = @getAllCheckBox()

        for i in [0...indexes.length]
            item = items[indexes[i]]
            $elem = $(item)
            item.checked = "checked"
            $elem.parent().addClass("oncheck")

    setItemsCheckedByName: (names)->
        isNameExist = {}

        for i in [0...names.length]
            isNameExist[names[i]] = true

        items = @getAllCheckBox()

        for i in [0...items.length]
            item = items[i]
            $elem = $(item)
            name = $elem.attr("name")
            if isNameExist[name]
                item.checked = "checked"
                $elem.parent().addClass("oncheck")

    # 找到所有自定义的checkbox
    getAllCheckBox: ->
        $checkboxes = $(@options.selector).find "." + @options.className

    # 给自定义checkbox绑定事件处理程序
    bindHandler: ->
        self = @

        $(document).on 'click', @options.selector + " .my-checkbox-item", (e)->
            $elem = $(@)

            if $elem.hasClass("oncheck")
                $elem.removeClass ('oncheck')
            else
                $elem.addClass ('oncheck')

            $elem.find("." + self.options.className)[0].checked = "checked"

            return false


module.exports = Checkbox




