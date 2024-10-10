<?php get_header('notitle'); ?>

<?php

if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_template_part('template-parts/content', 'article');
    }
}
?>

<?php
// If comments are open or we have at least one comment, load up the comment template.
if (comments_open() || get_comments_number()) :

    comments_template();
endif;
?>

<?php get_footer(); ?>