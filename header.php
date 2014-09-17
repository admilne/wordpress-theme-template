<!-- HEADER.PHP -->	
<html>
	<head>
		<title>
			<?php 
				wp_title(' - ', true, 'right');
				bloginfo('name');
			?>
		</title>
		<?php wp_head(); ?>

		<!-- Allows 18a website check each install to make sure they are running the latest version -->
		<meta name="generator" content="WordPress <?php echo bloginfo('version'); ?>" />
		
		<!--html5shiv allows you to use HTML 5 elements for versions of IE which do not recognise HTML 5 elements. See http://en.wikipedia.org/wiki/HTML5_Shiv for more details-->
		<!--[if lt IE 9]><script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	</head>
	<body>

	<?php
		
		$args = array(
			'theme_location'	=> '', // (string) (optional) The location in the theme to be used--must be registered with register_nav_menu() in order to be selectable by the user
			'menu'				=> 'menu-name', // (string) (optional) The menu that is desired; accepts (matching in order) id, slug, name
			'container'			=> 'div', // (string) (optional) Whether to wrap the ul, and what to wrap it with. Allowed tags are div and nav. Use false for no container
			'container_class'	=> '', // (string) (optional) The class that is applied to the container
			'container_id'		=> '', // (string) (optional) The ID that is applied to the container
			'menu_class'		=> 'menu', // (string) (optional) The class that is applied to the ul element which encloses the menu items. Multiple classes can be separated with spaces.
			'menu_id'			=> '', // (string) (optional) The ID that is applied to the ul element which encloses the menu items.
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
		
	?>

		<!--Header content goes here-->