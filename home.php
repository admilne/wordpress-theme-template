<?php get_header(); ?>
	<!-- HOME.PHP -->	
		
	<div class="blog-posts">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<div class="blog-post">
				
				<?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				<?php } else { ?>
					<a href="<?php the_permalink(); ?>"><img src="<?php echo THEME_IMAGES; ?>blog-thumbnail-placeholder.jpg"></a>
				<?php } ?>

				<div class="blog-content">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo string_limit_words(get_the_content(), 28) . "..."; ?></p>
					<a href="<?php the_permalink(); ?>">Read More >></a>
				</div><!-- END blog-content -->
			</div><!-- END blog-post -->
			
		<?php endwhile; else: ?>
		
			<p>There are no posts or pages here</p>
		
		<?php endif; ?>
	</div><!-- END blog-posts -->

	<!-- Blog post pagination -->
	<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
	<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>

<?php get_footer(); ?>