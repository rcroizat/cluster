module.exports = function(grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        // configuration des tâches grunt
        
        // Permet de concaténer les fichiers .js se trouvant dans le dossier javascript dans le fichier production.js
        concat: {
        	dist: {
        		src: ['javascript/*.js'],
        		dest: 'js/production.js'
        	}
        },

        // Va minimifier le fichier production.js dans production.min.js
        uglify: {
        	build: {
        		src: 'js/production.js',
        		dest: 'js/production.min.js'
        	}
        },

        // Prend les images dans le dossier images et va les compresser et les mettre dans le dossier img sous le même nom
        imagemin: {
        	dynamic: {
        		files: [{
        			expand: true,
        			cwd: 'images/',
        			src: '**/*.{png,jpg,jpeg,gif}',
        			dest: 'img/'
        		}]
        	}
        },

        // Va compresser tous les fichiers scss importer dans starter.css et le mettre dans global.css
        sass: {
        	dist: {
        		options: {
        			style: 'compressed'
        		},
        		files: {
        			'css/global.css': 'css/starter.scss'
        		}
        	}
        },

        // Va de manière dynamique relancer les tasks (tâches) précédentes, si erreur il y a, elle est visible dans le terminal ou les lignes de commande (ne pas le quitter, sinon relancer)
        watch: {
        	scripts: {
        		files: ['javascript/*.js'],
        		tasks: ['concat', 'uglify'],
        		options: {
        			spawn: false,
        		}
        	},
        	css: {
				files: ['css/*.scss', 'css-admin/*.scss'],
        		tasks: ['sass'],
        		options: {
        			spawn: false,
        		}        		
        	},
        	image: {
        		files: ['images/*.{png,jpg,jpeg,gif}'],
        		tasks: ['imagemin'],
        		options: {
        			spawn: false,
        		}
        	}
        }

    });

    // Load contrib --> Appel les lib installer pour permettre de lancer les différentes tasks
    grunt.loadNpmTasks('grunt-sass-globbing');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Les tâches sont enregistrées ici
    grunt.registerTask('default', ['concat', 'uglify', 'imagemin', 'sass', 'watch']);

};