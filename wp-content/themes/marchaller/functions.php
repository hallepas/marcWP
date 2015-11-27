<?php
/**
 * marchaller functions and definitions
 *
 * @package marchaller
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'marchaller_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function marchaller_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on marchaller, use a find and replace
	 * to change 'marchaller' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'marchaller', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'marchaller' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'marchaller_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // marchaller_setup
add_action( 'after_setup_theme', 'marchaller_setup' );

/**
 * Enqueue scripts and styles
 */
function marchaller_scripts() {
   	wp_deregister_script('jquery'); //see footer php

	wp_enqueue_style( 'marchaller-style', get_stylesheet_uri() );

	wp_enqueue_script( 'marchaller-navigation', get_template_directory_uri() . '/js/scripts.js', array(), '20130916', true );

}
add_action( 'wp_enqueue_scripts', 'marchaller_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


function custom_post_zitate() { 
	// creating (registering) the custom type 
	register_post_type( 'mh_zitate', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => 'Zitate', /* This is the Title of the Group */
			'singular_name' => 'Zitat', /* This is the individual type */
			'all_items' => 'Alle anzeigen', /* the all items menu item */
			'add_new' => 'Erstellen', /* The add new menu item */
			'add_new_item' => 'Neues Zitat erstellen', /* Add New Display Title */
			), /* end of arrays */
			//'description' => 'Zitate', /* Custom Type Description */
			'public' => true,
			//'publicly_queryable' => true,
			//'exclude_from_search' => false,
			//'show_ui' => true,
			//'query_var' => true,
			//'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			//'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			//'rewrite'	=> array( 'slug' => 'custom_type', 'with_front' => false ), /* you can specify its url slug */
			//'has_archive' => 'custom_type', /* you can rename the slug here */
			//'capability_type' => 'post',
			//'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
	
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_zitate');


if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 280, 210, true ); // Normal post thumbnails
	add_image_size( 'screen-shot', 720, 540 ); // Full size screen
}


function custom_post_videos() { 
	// creating (registering) the custom type 
	register_post_type( 'mh_videos', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array( 'labels' => array(
					'name' => 'Videos', /* This is the Title of the Group */
					'singular_name' => 'Video', /* This is the individual type */
				), 
			'public' => true,
			'supports' => array('title', 'thumbnail')    
	 	)
	);
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
	
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_videos');


function custom_post_news() { 
	// creating (registering) the custom type 
	register_post_type( 'mh_news', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array( 'labels' => array(
					'name' => 'News', /* This is the Title of the Group */
					'singular_name' => 'News', /* This is the individual type */
				), 
			'public' => true,
			'supports' => array('title', 'editor','thumbnail')    
	 	)
	);
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
	
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_news');

function custom_post_termine() { 
	// creating (registering) the custom type 
	register_post_type( 'mh_termine', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array( 'labels' => array(
					'name' => 'Termine', /* This is the Title of the Group */
					'singular_name' => 'Termin', /* This is the individual type */
				), 
			'public' => true,
			'supports' => array('')    
	 	)
	);
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'custom_type' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'custom_type' );
	
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_termine');

add_filter( 'save_post', 'mh_termine_title' );
function mh_termine_title ( $post_id ){
    //Check to see if post type = athlete
    $post = get_post( $post_id );
    if( $post->post_type != 'mh_termine')
        return;
    //This temporarily removes filter to prevent infinite loops
    remove_filter( 'save_post', 'mh_termine_title' );

    //get first and last name meta
    $first = get_field( 'ort', $post_id ); //meta for first name
    $last = get_field( 'datum', $post_id );   //meta for last name
 $datum_bis = get_field( 'datum_bis', $post_id );   //meta for last name
 if($datum_bis!=$last && $datum_bis!=null){
 	  $title = $first . ' am ' . date('d.m.y', strtotime($last)) . ' - ' . date('d.m.y', strtotime($datum_bis));

 }
 else{
 	 $title = $first . ' am ' . date('d.m.y', strtotime($last));
 }
  
  
    //update title
    wp_update_post( array( 'ID'=>$post_id, 'post_title'=>$title ) );

    //redo filter
    add_filter( 'save_post', 'mh_termine_title' );
}

// CREATE UNIX TIME STAMP FROM DATE PICKER
/*function custom_unixtimesamp ( $post_id ) {
	//if ( get_post_type( $post_id ) == 'mh_termine' ) {
	$startdate = get_post_meta($post_id, 'datum', true);

	    if($startdate) {
	        $dateparts = explode('/', $startdate);
	        $newdate1 = strtotime(date('d.m.Y H:i:s', strtotime($dateparts[1].'/'.$dateparts[0].'/'.$dateparts[2])));
	        update_post_meta($post_id, 'unixstartdate', $newdate1  );
	    }
	//}
}
add_action( 'save_post', 'custom_unixtimesamp', 100, 2);
*/
