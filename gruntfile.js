module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
      },
      build: {
        src: 'assets/lib/<%= pkg.name %>.js',
        dest: 'assets/lib/<%= pkg.name %>.min.js'
      }
    },
    sass: {
        options: {
            sourceMap: true
        },
        dist: {
            files: {
                'library/css/style.css': 'library/scss/style.scss',
                'library/css/admin.css': 'library/scss/admin.scss',
                'library/css/editor-style.css': 'library/scss/editor-style.scss',
                'library/css/ie.css': 'library/scss/ie.scss',                
                'library/css/login.css': 'library/scss/login.scss',                
            }
        }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-sass');

  // Default task(s).
  grunt.registerTask('default', ['sass', 'uglify']);

};