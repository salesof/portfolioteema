<div class="timeline-item">
    <div class="timeline-marker"></div>
    <div class="timeline-content timeline-card">
        <a class="timeline-link" href="<?php the_permalink(); ?>">
            <div class="timeline-img-wrapper">
                <div class="timeline-img" style="background: linear-gradient(rgba(0,0,0,0), rgba(0,0,0, .9)), url('<?php the_post_thumbnail_url('large'); ?>') center center no-repeat; background-size: cover;">
                </div>
            </div>
            <h3 class="timeline-title"><?php the_title(); ?></h3>

            <?php

            $date = get_post_meta($post->ID, 'valmistumisaika', true);

            if ($date) { ?>

                <div class="date"><?php echo $date; ?></div>

            <?php

            } else {
                // do nothing;
            }

            ?>
        </a>
    </div>
</div>