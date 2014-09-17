<?php get_header(); ?>
	<!-- HOME.PHP -->	
		
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php the_content(); ?>
		<hr>
		
	<?php endwhile; else: ?>
	
		<p>There are no posts or pages here</p>
	
	<?php endif; ?>

<?php get_footer(); ?>