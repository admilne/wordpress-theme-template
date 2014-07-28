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
			'menu' => 'menu-name'
		);
		
		wp_nav_menu ($args);
		
	?>

		<!--Header content goes here-->