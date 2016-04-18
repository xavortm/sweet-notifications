module.exports = function (grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				options: {
					style: 'compressed',
					sourcemap: 'none',
					cacheLocation: 'assets/.sass-cache/',
				},
				files: [{
					'assets/css/admin.min.css': 'assets/sass/admin.scss',
				}],
			},
		},

		autoprefixer:{
			dist: {
				files: {
					'assets/css/admin.min.css': 'assets/css/admin.min.css',
				},
			},
		},

		watch: {
			scripts: {
				files: ['assets/**/*.js'],
				tasks: ['jshint'],
			},
			css: {
				files: 'assets/**/*.scss',
				tasks: ['sass', 'autoprefixer'],
			},
		},

		jshint: {
			all: ['Gruntfile.js', 'assets/scripts/scripts.js'],
		},
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-autoprefixer');

	grunt.registerTask('default', ['watch']);
	grunt.registerTask('render-critical', ['criticalcss']);
};
