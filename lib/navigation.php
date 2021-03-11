<?php

//Create the menus
function mws_menus(){
    
    register_nav_menus(array(
        'main-menu' 	=>  esc_html__('Main menu','mws'),
        'footer-menu'	=>	esc_html__('Footer menu','mws'),
        'download-menu'	=>	esc_html__('Download menu','mws'),
        'footer-info'	=>	esc_html__('Footer info','mws')

    ));
}
//Hook

add_action('init', 'mws_menus');