footerTpl = require './footer.html'

Vue.component 'c-footer',
    template: footerTpl
    methods:
        feedback: ->
            console.log('footer click')