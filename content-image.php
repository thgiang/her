<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php her_thumbnail( 'large' ); ?>
        <?php her_entry_header(); ?>
    </header>
    <div class="entry-content">
        <?php her_entry_content(); ?>
        <?php ( is_single() ? her_entry_tag() : '' ); ?>
    </div>
</article>