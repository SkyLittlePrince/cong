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
            src: ['src/common/common.coffee', 'src/main.coffee']
            dest: 'dist/js/'
            ext: '.js'

          components:
            options:
              preBundleCB: (b)->
                b.transform(coffeeify)
                b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
            expand: true
            flatten: true
            src: ['src/components/**/*.coffee']
            dest: 'dist/js/components/'
            ext: '.js'

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

