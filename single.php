<?php get_header(); ?>
<!-- SINGLE.PHP -->

<div class="blog-posts primary-content">
	<?php get_template_part('partials/content', 'wploop'); ?>
</div><!-- END blog-posts -->

<div class="sidebar">
	<?php if( !dynamic_sidebar( 'Blog sidebar')): ?>
		<!-- This widget could not be loaded -->
	<?php endif; ?>
</div>

<?php get_footer(); ?>
