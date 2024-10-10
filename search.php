<?php get_header('notitle'); ?>

<div class="section wrapper">

    <?php

    if (have_posts()) {
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'archive');
        }
    }

    the_posts_pagination(array('mid_size'  => 2, 'prev_next' => false));

    ?>

</div>

<?php get_footer(); ?>