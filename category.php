<?php get_header('notitle'); ?>

<section class="section">
    <div class="wrapper">

        <h1><?php single_cat_title(); ?></h1>

        <p><?php echo category_description(); ?></p>

    </div>
</section>

<section class="timeline">
    <div class="section wrapper">

        <?php

        if (have_posts()) {
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content', 'category');
            }
        }

        ?>
    </div>

</section>

<section class="pagination-wrapper">
    <div class="wrapper">
        <?php the_posts_pagination(array('mid_size'  => 2, 'prev_next' => false)); ?>
    </div>
</section>

<?php get_footer(); ?>