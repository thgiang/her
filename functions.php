<?php

/**
 * @ Thiết lập các hằng dữ liệu quan trọng
 * @ THEME_URL = get_stylesheet_directory() - đường dẫn tới thư mục theme
 * @ CORE = thư mục /core của theme, chứa các file nguồn quan trọng.
 **/
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');

/**
 * @ Load file /core/init.php
 * @ Đây là file cấu hình ban đầu của theme mà sẽ không nên được thay đổi sau này.
 **/

require_once(CORE . '/init.php');

/**
 * @ Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung
 **/
if (!isset($content_width)) {
    /*
     * Nếu biến $content_width chưa có dữ liệu thì gán giá trị cho nó
     */
    $content_width = 620;
}

/**
 * @ Thiết lập các chức năng sẽ được theme hỗ trợ
 **/
if (!function_exists('her_theme_setup')) {
    /*
     * Nếu chưa có hàm her_theme_setup() thì sẽ tạo mới hàm đó
     */
    function her_theme_setup()
    {
        /*
         * Thiết lập theme có thể dịch được
         */
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('her', $language_folder);

        /*
         * Tự chèn RSS Feed links trong <head>
         */
        add_theme_support('automatic-feed-links');

        /*
         * Thêm chức năng post thumbnail
         */
        add_theme_support('post-thumbnails');

        /*
         * Thêm chức năng title-tag để tự thêm <title>
         */
        add_theme_support('title-tag');

        /*
         * Thêm chức năng post format
         */
        add_theme_support('post-formats',
            array(
                'video',
                'image',
                'audio',
                'gallery'
            )
        );

        /*
         * Thêm chức năng custom background
         */
        $default_background = array(
            'default-color' => '#e8e8e8',
        );
        add_theme_support('custom-background', $default_background);

        /*
         * Tạo menu cho theme
         */
        register_nav_menu('primary-menu', __('Primary Menu', 'her'));

        /*
         * Tạo sidebar cho theme
         */
        $sidebar = array(
            'name' => __('Main Sidebar', 'her'),
            'id' => 'main-sidebar',
            'description' => 'Main sidebar for her theme',
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettitle">',
            'after_sidebar' => '</h3>'
        );
        register_sidebar($sidebar);
    }

    add_action('init', 'her_theme_setup');
}

/**
 * @ Thiết lập hàm hiển thị logo
 * @ her_logo()
 **/
if (!function_exists('her_logo')) {
    function her_logo()
    { ?>
        <div class="logo">
            <a href="<?php echo get_bloginfo('url'); ?>" title="<?php get_bloginfo('sitename'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-medium.png"
                     title="<?php get_bloginfo('sitename'); ?>"/>
            </a>
            <!--
            <div class="site-description"><?php// bloginfo('description');
            ?></div>
            -->
        </div>
    <?php }
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}

add_action('after_setup_theme', 'register_navwalker');

if (!function_exists('her_menu')) {
    function her_menu($name)
    {
        ?>
        <nav class="navbar navbar-expand-lg navbar-light py-2 py-sm-3 m-0">
            <div class="mobile-menu row col-12 p-0 m-0">
                <div class="col-4 text-left my-auto">
                    <div class="mobile-collapse" data-toggle="collapse" data-target="#navbar-primary"
                         aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="mobile-collapse-button">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-center my-auto">
                    <a class="mobile-logo d-block" href="<?php echo get_bloginfo('url'); ?>"
                       title="<?php get_bloginfo('sitename'); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-medium.png"
                             title="<?php get_bloginfo('sitename'); ?>"/>
                    </a>
                </div>
                <div class="col-4 text-right my-auto">
                    Card
                    <i class="fa fa-cart"></i>
                </div>
            </div>
            <?php
            wp_nav_menu(array(
                    'theme_location' => $name,
                    'depth' => 1, // 1 = no dropdowns, 2 = with dropdowns.
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse text-left',
                    'container_id' => 'navbar-primary',
                    'menu_class' => 'navbar-nav mx-auto primary-menu',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                )
            );
            ?>
        </nav>
        <?php
    }
}
/**
 * @ Hàm hiển thị ảnh thumbnail của post.
 * @ Ảnh thumbnail sẽ không được hiển thị trong trang single
 * @ Nhưng sẽ hiển thị trong single nếu post đó có format là Image
 * @ her_thumbnail( $size )
 **/
if (!function_exists('her_thumbnail')) {
    function her_thumbnail($size)
    {
        // Chỉ hiển thumbnail với post không có mật khẩu
        if (!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) : ?>
            <figure class="post-thumbnail"><?php the_post_thumbnail($size); ?></figure><?php
        endif;
    }
}

/**
 * @ Hàm hiển thị tiêu đề của post trong .entry-header
 * @ Tiêu đề của post sẽ là nằm trong thẻ <h1> ở trang single
 * @ Còn ở trang chủ và trang lưu trữ, nó sẽ là thẻ <h2>
 * @ her_entry_header()
 **/
if (!function_exists('her_entry_header')) {
    function her_entry_header()
    {
        if (is_single()) : ?>

            <h1 class="entry-title">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php the_title(); ?>
                </a>
            </h1>
        <?php else : ?>
            <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
            </h2><?php

        endif;
    }
}

/**
 * @ Hàm hiển thị thông tin của post (Post Meta)
 * @ her_entry_meta()
 **/
if (!function_exists('her_entry_meta')) {
    function her_entry_meta()
    {
        if (!is_page()) :
            echo '<div class="entry-meta">';

            // Hiển thị tên tác giả, tên category và ngày tháng đăng bài
            printf(__('<span class="author">Posted by %1$s</span>', 'her'),
                get_the_author());

            printf(__('<span class="date-published"> at %1$s</span>', 'her'),
                get_the_date());

            printf(__('<span class="category"> in %1$s</span>', 'her'),
                get_the_category_list(', '));

            // Hiển thị số đếm lượt bình luận
            if (comments_open()) :
                echo ' <span class="meta-reply">';
                comments_popup_link(
                    __('Leave a comment', 'her'),
                    __('One comment', 'her'),
                    __('% comments', 'her'),
                    __('Read all comments', 'her')
                );
                echo '</span>';
            endif;
            echo '</div>';
        endif;
    }
}

/*
 * Thêm chữ Read More vào excerpt
 */
function her_readmore()
{
    return '...<a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'her') . '</a>';
}

add_filter('excerpt_more', 'her_readmore');

/**
 * @ Hàm hiển thị nội dung của post type
 * @ Hàm này sẽ hiển thị đoạn rút gọn của post ngoài trang chủ (the_excerpt)
 * @ Nhưng nó sẽ hiển thị toàn bộ nội dung của post ở trang single (the_content)
 * @ her_entry_content()
 **/
if (!function_exists('her_entry_content')) {
    function her_entry_content()
    {

        if (!is_single()) :
            the_excerpt();
        else :
            the_content();

            /*
             * Code hiển thị phân trang trong post type
             */
            $link_pages = array(
                'before' => __('<p>Page:', 'her'),
                'after' => '</p>',
                'nextpagelink' => __('Next page', 'her'),
                'previouspagelink' => __('Previous page', 'her')
            );
            wp_link_pages($link_pages);
        endif;

    }
}

/**
 * @ Hàm hiển thị tag của post
 * @ her_entry_tag()
 **/
if (!function_exists('her_entry_tag')) {
    function her_entry_tag()
    {
        if (has_tag()) :
            echo '<div class="entry-tag">';
            printf(__('Tagged in %1$s', 'her'), get_the_tag_list('', ', '));
            echo '</div>';
        endif;
    }
}
/**
 * @ Tạo hàm phân trang cho index, archive.
 * @ Hàm này sẽ hiển thị liên kết phân trang theo dạng chữ: Newer Posts & Older Posts
 * @ her_pagination()
 **/
if (!function_exists('her_pagination')) {
    function her_pagination()
    {
        /*
         * Không hiển thị phân trang nếu trang đó có ít hơn 2 trang
         */
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return '';
        }
        ?>

        <nav class="pagination" role="navigation">
        <?php if (get_next_post_link()) : ?>
        <div class="prev"><?php next_posts_link(__('Bài cũ hơn', 'her')); ?></div>
    <?php endif; ?>

        <?php if (get_previous_post_link()) : ?>
        <div class="next"><?php previous_posts_link(__('Bài mới hơn', 'her')); ?></div>
    <?php endif; ?>

        </nav><?php
    }
}

/**
 * @ Chèn CSS và Javascript vào theme
 * @ sử dụng hook wp_enqueue_scripts() để hiển thị nó ra ngoài front-end
 **/
function her_styles()
{
    /*
     * Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
     * Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
     */
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', 'all');
    wp_register_style('my-style', get_template_directory_uri() . '/style.css', 'all');
    $dependencies = array('jquery');
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', $dependencies);
    wp_register_script('my-js', get_template_directory_uri() . '/custom.js', 'all');


    wp_enqueue_style('bootstrap');
    wp_enqueue_style('my-style');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('my-js');
}

add_action('wp_enqueue_scripts', 'her_styles');