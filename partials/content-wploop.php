<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_content(); ?>

    <!-- Code allowing somone to leave comments on a page can go here -->
    <?php //comments_template(); ?>

<?php endwhile; else: ?>

    <p>There are no posts or pages here</p>

<?php endif; ?>
