dialogTpl = require './dialog.tpl'
dialogCompiled = _.template dialogTpl

# 调用示例
# content = "<h1>简直犀利</h1>"
# title = "我的消息"
# dialog = new Dialog({
#     title: title
#     content: content       
# })
# dialog.loadDialogToPage()

# 默认参数
_defaultConfig = {
    grayBgSelector: '.gray-bg'      # 灰色背景的选择器
    dialogSelector: '.dialog'       # 弹出框的选择器
    content: ''                     # 弹出框中的文本，字符串格式的html，样式可自定义
    # 弹出框中按钮数组
    # 每一个按钮为一个对象，其中text为按钮的内容，className为改按钮的class，方便自行绑定事件处理程序
    buttons: [
        {text: "确定", className: "dialog-ok close-button"}    
    ],
    title: ""                       # 弹出框的标题
    dialogClass: ''
}
# 页面弹出框组件
# 组件提供下列功能
#   1. 弹出遮罩层和弹出框
#   2. 自定义标题
#   3. 自定义弹出框内容，样式自定义
#   4. 自定义添加按钮和按钮的class
class Dialog
    constructor: (options)->
        @options = $.extend {}, _defaultConfig, options
        @init()
    # 初始化插件
    init: ->
        @bindHandler()

    # 为插件的空间绑定事件处理程序
    bindHandler: ->
        self = @
        $("body").delegate '.dialog .close-button', 'click', ->
            self.closeDialog(self)

    # 将弹出框加载到页面
    loadDialogToPage: ->
        self = @
        $('body').append dialogCompiled({
            dialogClass: self.options.dialogClass
            title: self.options.title
            content:self.options.content
            buttons: self.options.buttons
        })

    # 关闭弹出框
    closeDialog: (self)->
        self.options.content = ''
        $(self.options.grayBgSelector).remove()
        $(self.options.dialogSelector).remove()

module.exports = Dialog
