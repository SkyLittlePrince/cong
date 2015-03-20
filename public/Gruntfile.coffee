module.exports = (grunt)->

    stringify = require 'stringify'

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
            dist: 
                files: 
                  'dev/js/index.js': ['src/js/a.js', 'src/js/b.js']

        watch:
            compile:
                options:
                    livereload: 1337
                files: ['src/**/*.less', 'src/**/*.js']
                tasks: ['browserify', 'less', 'copy']

        less:
            dev:
                files:
                    'dev/css/index.css': ['src/less/index.less']

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

