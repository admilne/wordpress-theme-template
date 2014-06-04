<?php
	
/* ENABLE CUSTOM MENUS
------------------------------------------------------------------------------------ */

	add_theme_support('menus');


/* LOAD THEME'S CSS FILES
------------------------------------------------------------------------------------ */

	function theme_styles() {
		// These add the style sheets to every single page. Configure them as necessary
		// wp_enqueue_style( 'normalize', get_template_directory_uri() . '/a/css/normalize.css'  );

		//This is an example of adding google fonts to your theme
		//wp_enqueue_style( 'googlefonts','http://fonts.googleapis.com?famil=font+name');

		//This adds your main CSS file into your theme
		wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css'  );
		
		// This will register a style sheet, and then using the if statement, only load the style sheet for a
		// particular page
		// wp_register_style ('individualPageStyle',  get_template_directory_uri() . '/css/individualPageStyle.css');
		// if ( is_page( 'individualPage') ) {
		// 	wp_enqueue_style( ' individualPageStyle' );
		// }
	}
	// This function is used to tell the wp_enqueue_scripts hook to load our theme stylesheet files
	add_action( 'wp_enqueue_scripts', 'theme_styles' );


/* ADD STYLESHEET FOR WORDPRESS TEXT EDITOR
------------------------------------------------------------------------------------ */

	function add_text_editor_styles() {
	    add_editor_style( 'editor-styleS.css' );
	}
	add_action( 'init', 'add_text_editor_styles' );


/* LOAD THEME'S JAVASCRIPT FILES
------------------------------------------------------------------------------------ */

	function theme_js() {
		// This function registers a javascript file with the path name given, informs it that it relies on jquery to work , we aren't 
		// concerned with a version and that we want the javascript to appear at the bottom of the page.
		// wp_register_script( 'individual_JS_File',  get_template_directory_uri() . '/a/js/individual_JS_File.js', array('jquery'), '', true);
		// if ( is_page( 'individualPage') ) {
		// 	wp_enqueue_script( ' individualPageStyle' );
		// }
		wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/a/js/theme.js', array('jquery'), '', true );
	}
	// This function is used to tell the wp_enqueue_scripts hook to load our theme javascript files
	add_action( 'wp_enqueue_scripts', 'theme_js' );


/* CREATE WIDGET AREAS
------------------------------------------------------------------------------------ */
/*
	function create_widget( $name, $id, $description ) {
		$args = array(
			'name'          => __( $name ),
			'id'            => $id,
			'description'   => __( $description ),
			'before_widget' => '', // this allows you to add html content before the widget
			'after_widget' => '', // this allows you to add html content after the widget
			'before_title' => '', // this allows you to add html content before the widget title
			'after_title' => '', // this allows you to add html content before the widget title
		);
		
		// This bit of code will then use your arguments to register your widget. Its called a sidebar
		// in WordPress because of its history with blogs
		register_sidebar( $args );
	}
	
	// This can now be called as many times as you like to create as many widgets as you need
	// PLEASE NOTE THE ID MUST BE IN LOWECASE
	create_widget( 'Widget Name', 'lowercase_id', 'Widget Description');
*/

/* ENABLE SUPPORT FOR THUMBNAILS
------------------------------------------------------------------------------------ */
/*
	add_theme_support( 'post-thumbnails' ); 
*/


/* ENABLE SELECTION OF FRONT END STYLES TO BE SELECTED IN POST / PAGE EDITOR
------------------------------------------------------------------------------------ */
/*
	// Add stylesheet for wordpress text editor
	function add_text_editor_styles() {
	    add_editor_style( 'custom-editor-style.css' );
	}
	add_action( 'init', 'add_text_editor_styles' );


	// Callback function to insert 'styleselect' into the $buttons array
	function my_mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
	// Register our callback to the appropriate filter
	add_filter('mce_buttons_2', 'my_mce_buttons_2');

	// Callback function to filter the MCE settings
	function my_mce_before_init_insert_formats( $init_array ) {  
		// Define the style_formats array
		$style_formats = array(  
			// Each array child is a format with it's own settings
			array(  
				'title' => 'Price',  
				'block' => 'h2',  
				'classes' => 'price',
				'wrapper' => false,
			),
			array(  
				'title' => 'Green Text',  
				'inline' => 'span',
				'classes' => 'green',
			),
		);  
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );  
		
		return $init_array;  
	  
	} 
	// Attach callback to 'tiny_mce_before_init' 
	add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
*/
?>