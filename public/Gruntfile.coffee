module.exports = (grunt)->

    stringify = require 'stringify'
    coffeeify = require 'coffeeify'

    grunt.initConfig
        concurrent:
            dev:
                tasks: ["nodemon", "watch"]
                options:
                    logConcurrentOutput: true
        copy:
            dev:
                files: [
                    {expand: true, flatten: true, src: ["lib/js/jquery/*"], dest: 'dist/js/lib/jquery/'}
                ]

        clean:
            dist: ['dist']

        browserify:
            common:
                options:
                  preBundleCB: (b)->
                    b.transform(coffeeify)
                    b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
                expand: true
                flatten: true

                src: ['src/common/common.coffee']
                dest: 'dist/js/'
                ext: '.js'

            components:
                options:
                  preBundleCB: (b)->
                    b.transform(coffeeify)
                    b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
                expand: true
                flatten: true
                files: {
                    'dist/js/components.js': ['src/components/**/*.coffee'],
                }

            pages:
                options:
                  preBundleCB: (b)->
                    b.transform(coffeeify)
                    b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
                expand: true
                flatten: true
                src: ['src/pages/**/*.coffee']
                dest: 'dist/js/pages/'
                ext: '.js'

        watch:
            compile:
                options:
                    livereload: 1337
                files: ['src/**/*.less', 'src/**/*.coffee']
                tasks: ['browserify', 'less']

        less:
            components:
                files:
                    'dist/css/components.css': ['src/components/**/*.less']
                    'dist/css/home.css': ['src/pages/home/*.less']
                    'dist/css/login.css': ['src/pages/login/*.less']
                    'dist/css/register.css': ['src/pages/register/*.less']
                    'dist/css/common.css': ['src/common/*.less']
                    'dist/css/checkbox/checkbox.css': ['src/common/checkbox/*.less']
                    'dist/css/bountyHunter/index.css': ['src/pages/bountyHunter/index.less']
                    'dist/css/bountyHunter/rewardtask/step-1.css': ['src/pages/bountyHunter/rewardtask/step-1.less']
                    'dist/css/bountyHunter/rewardtask/step-2.css': ['src/pages/bountyHunter/rewardtask/step-2.less']
                    'dist/css/bountyHunter/rewardtask/step-3.css': ['src/pages/bountyHunter/rewardtask/step-3.less']
                    'dist/css/bountyHunter/rewardtask/step-4.css': ['src/pages/bountyHunter/rewardtask/step-4.less']
                    'dist/css/bountyHunter/rewardtask/step-5.css': ['src/pages/bountyHunter/rewardtask/step-5.less']
                    'dist/css/bountyHunter/auction/step-1.css': ['src/pages/bountyHunter/auction/step-1.less']
                    'dist/css/bountyHunter/auction/step-2.css': ['src/pages/bountyHunter/auction/step-2.less']
                    'dist/css/bountyHunter/auction/step-3.css': ['src/pages/bountyHunter/auction/step-3.less']
                    'dist/css/bountyHunter/auction/step-4.css': ['src/pages/bountyHunter/auction/step-4.less']
                    'dist/css/bountyHunter/auction/step-5.css': ['src/pages/bountyHunter/auction/step-5.less']
                    'dist/css/tradingCenter/employer/index.css': ['src/pages/tradingCenter/employer/index.less']
                    'dist/css/tradingCenter/account/index.css': ['src/pages/tradingCenter/account/index.less']
                    'dist/css/tradingCenter/account/info.css': ['src/pages/tradingCenter/account/info.less']
                    'dist/css/tradingCenter/layout.css': ['src/pages/tradingCenter/layout.less']
                    'dist/css/tradingCenter/mynews/messagenotification.css': ['src/pages/tradingCenter/mynews/messagenotification.less']

        cssmin:
            compress:
                files:
                    'dist/components.min.css': [ "dist/components.css"]

        uglify:
            build:
                files:
                    'dist/js/main.min.js': ['dist/js/**/*.js']

    grunt.loadNpmTasks 'grunt-browserify'
    grunt.loadNpmTasks 'grunt-contrib-less'
    grunt.loadNpmTasks 'grunt-contrib-copy'
    grunt.loadNpmTasks 'grunt-contrib-clean'
    grunt.loadNpmTasks 'grunt-contrib-watch'
    grunt.loadNpmTasks 'grunt-contrib-uglify'
    grunt.loadNpmTasks 'grunt-contrib-cssmin'
    grunt.loadNpmTasks 'grunt-contrib-less'

    grunt.registerTask 'default', ->
        grunt.task.run [
            'clean'
            'copy'
            'browserify'
            'less'
            'watch'
        ]

    grunt.registerTask 'prod', ->
        grunt.task.run [
            'clean'
            'copy'
            'browserify'
            'less'
            'uglify'
            'cssmin'
        ]

