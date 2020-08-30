<?php get_header(); ?>
<div id="slider">
    <div class="container">
        <?php
        echo do_shortcode('[smartslider3 slider="2"]');
        ?>
    </div>
</div>
<div id="discount">

</div>
<div id="content">
    <section id="main-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile; ?>
            <?php her_pagination(); ?>
        <?php else : ?>
            <?php get_template_part('content', 'none'); ?>
        <?php endif; ?>
    </section>
    <section id="sidebar">

    </section>
</div>
<?php get_footer(); ?>

