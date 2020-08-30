<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php her_thumbnail( 'thumbnail' ); ?>
    </div>
    <header class="entry-header">
        <?php her_entry_header(); ?>
        <?php her_entry_meta() ?>
    </header>
    <div class="entry-content">
        <?php her_entry_content(); ?>
        <?php ( is_single() ? her_entry_tag() : '' ); ?>
    </div>
</article>