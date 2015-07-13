<!doctype html>
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
	<body <?php body_class(); ?>>

		<div class="page-wrapper">

			<div class="header">

				<a href="/" class="logo"><img src="<?php echo THEME_IMAGES; ?>logo.png" alt=""></a>

				<div class="main-menu-container">

					<div id="pull" class="pull"></div>

					<?php main_menu(); ?>

				</div><!-- END main-menu-container -->

			</div><!-- END header -->

			<!--Header content goes here-->

			<div class="content">