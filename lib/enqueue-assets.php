<?php 

function mws_scripts(){	

	
    wp_enqueue_style( 'googlefont-raleway', 'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,500;1,600;1,700&display=swap', array(), '1.0.0' );

    wp_enqueue_style( 'googlefont-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), '1.0.0' );

    wp_enqueue_style( 'googlefont-lato','https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap&subset=latin-ext', array(), '1.0.0' );

     wp_enqueue_style( 'googlefont-pt-serif','https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap', array(), '1.0.0' );
    

	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css' , array(), '4.0.0');
	
    wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri().'/css/bootstrap-grid.css', array(), '4.0.0' );
    wp_enqueue_style( 'main-styles', get_template_directory_uri().'/dist/assets/css/bundle.css', array(), '1.0.0' );
    
	
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri() , array(), '1.0.1');

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap-bundle', get_template_directory_uri().'/js/bootstrap.bundle.min.js', array('jquery'), '4.1.3',true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '4.1.3',true );
    wp_enqueue_script( 'scripts', get_template_directory_uri().'/js/scripts.js', array('jquery'), '1.0.1',true );
    wp_enqueue_script( 'slick', get_template_directory_uri().'/js/slick.js', array('jquery'), '1.8.1',true );
    wp_enqueue_script( 'slick-plugin', get_template_directory_uri().'/js/slick-plugin.js', array('jquery'), '1.0.0',true );
   
    wp_enqueue_script( 'jquery-mixitup', get_template_directory_uri().'/js/jquery.mixitup.min.js', array('jquery'), '2.1.11',true );
    wp_enqueue_script( 'mixitup-plugin', get_template_directory_uri().'/js/mixitup-plugin.js', array('jquery'), '1.0.0',true );
    wp_enqueue_script( 'search-plugin', get_template_directory_uri().'/js/search.js', array('jquery'), '1.0.0',true );
    

}


add_action('wp_enqueue_scripts','mws_scripts');