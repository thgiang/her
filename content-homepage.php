<div class="her-homepage-post">
    <div class="her-homepage-post-thumbnail">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php echo the_post_thumbnail('ogimage'); ?>
        </a>
    </div>
    <h3 class="her-homepage-post-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php echo the_title(); ?>
        </a>
    </h3>
    <p class="her-homepage-post-content">
        <?php echo get_the_excerpt();?>
    </p>
</div>