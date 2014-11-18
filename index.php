<?php get_header(); ?>
	<!-- INDEX.PHP -->	
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<h3><?php the_title(); ?></h3>
		<?php the_content(); ?>
		<hr>
		
	<?php endwhile; else: ?>
	
		<p>There are no posts or pages here</p>
	
	<?php endif; ?>



	<?php if( !dynamic_sidebar( 'myWidgetName')): ?>
		<!--Enter HTML code here to let the user know the widget couldn’t be loaded-->
		<p>Your widget has not been created yet. Please go to your wordpress admin > appearence > widgets
	<?php endif; ?>


<?php get_footer(); ?>