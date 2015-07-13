<?php get_header(); ?>
<!-- INDEX.PHP -->

<?php get_template_part('partials/content', 'wploop'); ?>

<?php if( !dynamic_sidebar( 'myWidgetName')): ?>
	<!-- This widget could not be loaded -->
<?php endif; ?>

<?php get_footer(); ?>