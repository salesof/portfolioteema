<div class="outer-wrapper">
    <div class="flex-wrapper">
        <div class="inner-block">
            <img src="<?php the_post_thumbnail_url(); ?>" />
        </div>
        <div class="inner-block inner-text">
            <h3><?php the_title(); ?></h3>
            <p>
                <?php the_excerpt(); ?>
                </br>
                <a href="<?php the_permalink(); ?>"><button>Lue lisää</button></a>
            </p>
        </div>
    </div>
</div>