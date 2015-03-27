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
                    {expand: true, flatten: true, src: ["dev/css/*"], dest: 'bin/css/'}
                    {expand: true, flatten: true, src: ["dev/js/*"], dest: 'bin/js/'}
                ]

        clean:
            dev: ['dev']
            bin: ['bin']

        browserify: 
          common:
            options:
              preBundleCB: (b)->
                b.transform(coffeeify)
                b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
            expand: true
            flatten: true
            src: ['src/common/common.coffee', 'src/main.coffee']
            dest: 'bin/js/'
            ext: '.js'

          components: 
            options:
              preBundleCB: (b)->
                b.transform(coffeeify)
                b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
            expand: true
            flatten: true
            src: ['src/components/**/*.coffee']
            dest: 'bin/js/components/'
            ext: '.js'

          pages: 
            options:
              preBundleCB: (b)->
                b.transform(coffeeify)
                b.transform(stringify({extensions: ['.hbs', '.html', '.tpl', '.txt']}))
            expand: true
            flatten: true
            src: ['src/pages/**/*.coffee']
            dest: 'bin/js/pages/'
            ext: '.js'

        watch:
            compile:
                options:
                    livereload: 1337
                files: ['src/**/*.scss', 'src/**/*.coffee']
                tasks: ['browserify', 'less']

        less:    
          dev:
            files:
              'bin/style.css': ['src/**/*.less']

        cssmin: 
            compress: 
                files: 
                    'bin/css/index.css': [ "dev/css/index.css"]

        uglify:
            build:
                files:
                    'bin/js/main.js': ['dev/js/index.js']

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
            'browserify'
            'less'
            'copy:dev'
            'watch'
        ]

    grunt.registerTask 'prod', ->
        grunt.task.run [
            'clean:dev'
            'browserify'
            'less'
            'clean:bin'
            'uglify'
            'cssmin'
        ]

