module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
          options: {
            banner: '/*! <%= pkg.name %> - date: <%= grunt.template.today("yyyy-mm-dd") %> */\n'
          },
          dist: {
            files: [{
                src: 'assets/javascripts/**/*.js',
                dest: 'public/javascripts/',
                expand: true,
                flatten: true,
                ext: '.min.js'
            }]
          }
        },
        jshint: {
          files: ['Gruntfile.js', 'test/**/*.js', 'assets/javascripts/**/*.js'],
          options: {
            globals: {
              jQuery: true,
              console: true,
              module: true,
              document: true
            }
          }
        },
        sass: {
            dist: {
                options: {
                    style: 'expanded'
                },
                files: [{
                    expand: true,
                    flatten: true,
                    src: ['assets/styles/**/*.scss'],
                    dest: 'public/css',
                    ext: '.css'
                }]
            }
        },
        watch: {
            /*uglifyWatch: {
                files: ['<%= uglify.dist.files[0].src %>'],
                tasks: ['uglify']
            },*/
            jshintWatch: {
                files: ['<%= jshint.files %>'],
                tasks: ['jshint']
            },
            sassWatch: {
                files: ['<%= sass.dist.files[0].src %>'],
                tasks: ['sass']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-sass');

    grunt.registerTask('test', ['jshint']);

    grunt.registerTask('default', ['jshint', 'uglify', 'sass']);
};
