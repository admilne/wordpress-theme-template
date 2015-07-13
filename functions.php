<?php

/* THEME CONSTANTS */

	define('THEME_IMAGES', get_template_directory_uri() . "/a/img/");
	
/* ENABLE CUSTOM MENUS
------------------------------------------------------------------------------------ */

	add_theme_support('menus');


/* LOAD THEME'S CSS FILES
------------------------------------------------------------------------------------ */

	function theme_styles() {
		// Format should be wp_enqueue_style( '{{ handle-name }}', '{{ path/to/css/file.css }}'  );
		
			wp_enqueue_style( 'template', get_template_directory_uri() . '/style.css' );
			wp_enqueue_style( 'styles', get_template_directory_uri() . '/a/css/screen.css' );
			// wp_enqueue_style( 'googlefonts','http://fonts.googleapis.com?famil=font+name');

		// You can register a style sheet to only load for a particular page as follows
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
	function create_widget( $name, $id, $description, $before_widget = '', $after_widget = '', $before_title = '', $after_title = '' ) {
		$args = array(
			'name'          => __( $name ),
			'id'            => $id,
			'description'   => __( $description ),
			'before_widget' => $before_widget, // this allows you to add html content before the widget
			'after_widget' => $after_widget, // this allows you to add html content after the widget
			'before_title' => $before_title, // this allows you to add html content before the widget title
			'after_title' => $after_title, // this allows you to add html content before the widget title
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
	set_post_thumbnail_size( 478, 264, true );
*/

/* ENABLE SUPPORT FOR PAGE EXCERPTS
------------------------------------------------------------------------------------ */
/*
	function my_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}

	add_action( 'init', 'my_add_excerpts_to_pages' );
*/

/* ENABLE SELECTION OF FRONT END STYLES TO BE SELECTED IN POST / PAGE EDITOR
------------------------------------------------------------------------------------ */
/*
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

/* WP Gallery Output Configuration
------------------------------------------------------------------------------------ */
/*
	add_filter('post_gallery', 'my_post_gallery', 10, 2);
	function my_post_gallery($output, $attr) {
		global $post;

		if (isset($attr['orderby'])) {
			$attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
			if (!$attr['orderby'])
				unset($attr['orderby']);
		}

		extract(shortcode_atts(array(
			'order' => 'ASC',
			'orderby' => 'menu_order ID',
			'id' => $post->ID,
			'itemtag' => 'dl',
			'icontag' => 'dt',
			'captiontag' => 'dd',
			'columns' => 3,
			'size' => 'thumbnail',
			'include' => '',
			'exclude' => ''
		), $attr));

		$id = intval($id);
		if ('RAND' == $order) $orderby = 'none';

		if (!empty($include)) {
			$include = preg_replace('/[^0-9,]+/', '', $include);
			$_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

			$attachments = array();
			foreach ($_attachments as $key => $val) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		}

		if (empty($attachments)) return '';

		// Here's your actual output, you may customize it to your need
		$output = "<div class=\"cycle-slideshow\" data-cycle-fx=\"scrollHorz\">\n";

		// Now you loop through each attachment
		foreach ($attachments as $id => $attachment) {
			// Fetch the thumbnail (or full image, it's up to you)
			//      $img = wp_get_attachment_image_src($id, 'medium');
			//      $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
			$img = wp_get_attachment_image_src($id, 'full');

			$output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" />\n";
		}

		$output .= "<div class=\"caption\"><h1>" . get_the_title( $post->ID ) . "</h1></div><!-- END caption -->\n";
		$output .= "</div>\n";

		return $output;
	}
*/


/* Utility Functions
------------------------------------------------------------------------------------ */

	// Function to limit the number of words in a string
	function string_limit_words($string, $word_limit)
	{
		$words = explode(' ', $string, ($word_limit + 1));
		if(count($words) > $word_limit) {
			array_pop($words);
			return implode(' ', $words);
		}
	}

	// Get all sub pages
	function get_sub_pages($page_id)
	{
		$args = array(
			'sort_order' => 'DESC',
			'sort_column' => 'post_date',
			'child_of' => $page_id,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		return get_pages($args);
	}

	// Display the cookie message if necessary
	function cookie_message()
	{
		if(empty($_SESSION['cookie_message_shown'])) {
			$_SESSION['cookie_message_shown'] = 1;
			echo('<div class="cookie-message" id="cookie-message">This site uses cookies, your continued use implies you agree with our cookie policy. <a href="#" id="dismiss">Dismiss</a></div>');
		}
	}

	// Display the main menu
	function main_menu()
	{
		$args = array(
			'theme_location'	=> '', // (string) (optional) The location in the theme to be used--must be registered with register_nav_menu() in order to be selectable by the user
			'menu'				=> 'main', // (string) (optional) The menu that is desired; accepts (matching in order) id, slug, name
			'container'			=> 'false', // (string) (optional) Whether to wrap the ul, and what to wrap it with. Allowed tags are div and nav. Use false for no container
			'container_class'	=> '', // (string) (optional) The class that is applied to the container
			'container_id'		=> '', // (string) (optional) The ID that is applied to the container
			'menu_class'		=> 'main-menu', // (string) (optional) The class that is applied to the ul element which encloses the menu items. Multiple classes can be separated with spaces.
			'menu_id'			=> 'main-menu', // (string) (optional) The ID that is applied to the ul element which encloses the menu items.
			'echo'				=> true, // (boolean) (optional) Whether to echo the menu or return it. For returning menu use false
			'fallback_cb'		=> 'wp_page_menu', // (string) (optional) If the menu doesn't exist, the fallback function to use. Set to false for no fallback
			'before'			=> '', // (string) (optional) Output text before the <a> of the link
			'after'				=> '', // (string) (optional) Output text after the </a> of the link
			'link_before'		=> '', // (string) (optional) Output text before the link text
			'link_after'		=> '', // (string) (optional) Output text after the link text
			'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>', // (string) (optional) Evaluated as the format string argument of a sprintf() expression. The format string incorporates the other parameters by numbered token. %1$s is expanded to the value of the 'menu_id' parameter, %2$s is expanded to the value of the 'menu_class' parameter, and %3$s is expanded to the value of the list items. If a numbered token is omitted from the format string, the related parameter is omitted from the menu markup. Note: To exclude the items wrap (for instance, if the wrap is built into your theme), you still need to pass %3$s as the parameter. If you pass an empty string, your menu won't display at all.
			'depth'				=> 0, // (integer) (optional) How many levels of the hierarchy are to be included where 0 means all. -1 displays links at any depth and arranges them in a single, flat list.
			'walker'			=> '' // (object) (optional) Custom walker object to use (Note: You must pass an actual object to use, not a string)
		);

		wp_nav_menu ($args);
	}

	// Get meta information about an image when provided with the id
	function wp_get_attachment( $attachment_id ) {

		$attachment = get_post( $attachment_id );
		return array(
			'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
			'caption' => $attachment->post_excerpt,
			'description' => $attachment->post_content,
			'href' => get_permalink( $attachment->ID ),
			'src' => $attachment->guid,
			'title' => $attachment->post_title
		);
	}

	// Get the distance between two lat/long positions
	function distance($lat1, $lon1, $lat2, $lon2, $unit = "M") {

		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
			return ($miles * 1.609344);
		} else if ($unit == "N") {
			return ($miles * 0.8684);
		} else {
			return $miles;
		}
	}

	function get_lat_and_long($address, $postcode) {
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&sensor=false";

		$result = file_get_contents($url);
		$resultArray = json_decode($result, true);

		$lat_and_long['latitude'] = $resultArray['results'][0]['geometry']['location']['lat'];
		$lat_and_long['longitude'] = $resultArray['results'][0]['geometry']['location']['lng'];

		// Get the town based purely on postcode for more accurate result:
		$address_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($postcode) . "&sensor=false";
		$address_json = json_decode(file_get_contents($address_url));
		$address_data = $address_json->results[0]->address_components;

		$lat_and_long['google_town'] = $address_data[2]->long_name;

		return $lat_and_long;
	}
?>