<div class="banner-wrapper" style="background-image: url(<?php the_post_thumbnail_url(); ?>); background-size: cover; background-position: center;"></div>

<section class="section">
    <div class="wrapper">
        <div class="post-wrapper">

            <h1><?php the_title(); ?></h1>

            <?php

            the_content();

            ?>

        </div>
    </div>
</section>