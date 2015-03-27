headerTpl = require './header.html'

Vue.component 'c-header',
    template: headerTpl
    methods:
        test: (event)->
            console.log(123)
    create: ->
        console.log('header loaded')
