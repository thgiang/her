<?php get_header(); ?>
    <div id="content">
        <section id="main-content">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php get_template_part('content', get_post_format()); ?>
            <?php endwhile; ?>
                <?php get_template_part('author-bio'); ?>
                <?php //comments_template(); ?>

            <?php else : ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>
        </section>
        <section id="sidebar">

        </section>
    </div>
<?php get_footer(); ?>