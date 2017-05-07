<?php

//Rejestracja styli i skryptow
function my_theme_enqueue_styles() {  //funkcja do wykonania

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
	
	//podpinanie styli i skryptow:
	wp_enqueue_style('slick-styles', get_stylesheet_directory_uri().'/css/slick.css');
	
	wp_enqueue_style('fa-styles', get_stylesheet_directory_uri().'/font-awesome-4.7.0/css/font-awesome.min.css');
	
	wp_enqueue_script('slick-script', get_stylesheet_directory_uri().'/js/slick.min.js', array('jquery'), 1.0, true);
	
	wp_enqueue_script('custom-script', get_stylesheet_directory_uri().'/js/main.js', array('jquery'), 1.0, true);
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' ); //wbudowana w wordpressa akcja z dwoma parametrami: 1 paramter to akcja, 2 parametr funkcja - tj. wywolujemy funkcje



//Rejestracja niestandardowych typow postow
function custom_post_news() {
    $args = array( //sposob definiowana zmiennych w PHP: $nazwa-zmiennej = .....
      'public' => true,
      'label'  => 'Wiadomości',
	  'supports' => array( 'title', 'editor', 'thumbnail' ),	//tutaj definiujemy komponenty naszego postu tj. czy np. ma byc tytul, czy ma byc obrazek wyrozniajacy, czy ma byc pole do wpisywania tresci dla edytora
		//thumnail - to jest obrazek wyrozniajacy
	  'menu_icon' => 'dashicons-welcome-write-blog',
    );
    register_post_type( 'news', $args ); //ta funkcja przyjmuje 2 parametry: pierwszy 'news' to nazwa naszych postow, a drugi parametr to tablica konfiguracyjna
}
add_action( 'init', 'custom_post_news' ); //wpinamy się akcją w sam początek ładowania call'a wordpressa i wykonywana jest funkcja custom post news


//funkcja na slider

function custom_post_slides() {
    $args = array( 
      'public' => true,
      'label'  => 'Slides',
	  'supports' => array( 'title', 'editor', 'thumbnail' ),	
	  'menu_icon' => 'dashicons-welcome-write-blog',
    );
    register_post_type( 'slides', $args ); 
}
add_action( 'init', 'custom_post_slides' );





