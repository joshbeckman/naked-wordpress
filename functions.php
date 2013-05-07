<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be called every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );


/*-----------------------------------------------------------------------------------*/
/* register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'naked' ),
	)
);

/*-----------------------------------------------------------------------------------*/
/* ACTIVATE SIDEBAR for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => 'Sidebar',
		'description' => 'Take it on the side...',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="side-title">',
		'after_title' => '</h3>',
		'empty_title'=> '',
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enque Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style( 'naked-style', get_template_directory_uri() . '/style.css', '10000', 'all' );
			
	// add fitvid
	wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );
  
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header