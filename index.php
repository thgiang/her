<?php get_header(); ?>
<div class="her-home-slider">
    <?php echo do_shortcode('[smartslider3 slider="2"]'); ?>
</div>

<?php her_discount_banner(); ?>

<div class="her-home-category">
    <div class="container">
        <h2 class="her-title-h2 her-title-bg1 text-center pt-5 pb-4">BỘ SƯU TẬP NHÀ HER</h2>
        <?php echo do_shortcode('[product_categories ids="17,18,19," columns="3"]'); ?>
    </div>
</div>

<div class="her-home-featured-products">
    <div class="container">
        <h2 class="her-title-h2 text-center her-title-bg2 pt-3 pb-4">SẢN PHẨM NỔI BẬT</h2>
        <?php
        echo do_shortcode('[products limit="4" visibility="featured" ]');
        ?>
    </div>
</div>

<div class="her-home-collection">
    <img src="<?php echo get_template_directory_uri(); ?>/images/desktop/vienanhtop.png"
         atl="<?php get_bloginfo('sitename'); ?>" width="100%"/>
    <div class="container">
        <h3 class="her-home-collection-title mb-3">Bộ sưu tập mùa thu 2020</h3>
        <p class="mt-2" style="font-size: 18px; font-family: 'Playfair Display'">Gái hư em không cần phải diễn, gái
            ngoan em phải vào vai</p>
        <a class="her-btn" href="#">Xem thêm</a>
    </div>
    <img src="<?php echo get_template_directory_uri(); ?>/images/desktop/vienanh.png"
         atl="<?php get_bloginfo('sitename'); ?>" width="100%"/>
</div>

<div class="her-home-new-products">
    <div class="container pt-5">
        <h2 class="her-title-h2  her-title-bg3 text-center pt-5 pb-4">SẢN PHẨM MỚI</h2>
        <?php
        echo do_shortcode('[products]');
        ?>
    </div>
</div>

<div class="her-testimonial pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="her-title-h2 her-title-bg3  text-center pt-5 pb-4">Feedback nhà Her</h2>
            </div>
            <div class="col-sm-4">
                <div class="her-testimonial-card p-4 bg-white mb-2">
                    <div class="her-testimonial-avatar text-center mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-small.png"
                             atl="<?php get_bloginfo('sitename'); ?>"/>
                    </div>
                    <div class="her-testimonial-content mb-1">
                        "Cho Her ảnh nè, sao bộ nào em cũng mặc vừa như in, như dành ra đã cho nhau thế"
                    </div>
                    <div class="her-testimonial-name text-right">
                        - Diệu Anh Phạm -
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="her-testimonial-card p-4 bg-white mb-2">
                    <div class="her-testimonial-avatar text-center mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-small.png"
                             atl="<?php get_bloginfo('sitename'); ?>"/>
                    </div>
                    <div class="her-testimonial-content mb-1">
                        "Chồng chị mê lắm, lâu lắm 2 vợ chồng mới có thời gian hâm nóng. Cảm ơn Her vì chiếc váy"
                    </div>
                    <div class="her-testimonial-name text-right">
                        - Chị Thu Dung -
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="her-testimonial-card p-4 bg-white mb-2">
                    <div class="her-testimonial-avatar text-center mb-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-small.png"
                             atl="<?php get_bloginfo('sitename'); ?>"/>
                    </div>
                    <div class="her-testimonial-content mb-1">
                        "Yêu từ cái nhìn đầu tiên, các bạn tư vấn nhiệt tình. Nhập thêm nhiều hàng lên nữa nhé :D"
                    </div>
                    <div class="her-testimonial-name text-right">
                        - Kate -
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if (have_posts()) : ?>
    <div class="her-home-posts">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="her-title-h2 her-title-bg5 text-center pt-5 pb-4">BLOGS</h2>
                </div>
                <?php
                $args = array('posts_per_page' => 3);
                $query = new WP_Query($args);
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-md-4">
                        <?php
                        get_template_part('content-homepage');
                        ?>
                    </div>
                <?php endwhile; ?>
                <div class="col-12 text-center">
                    <a class="btn btn-outline-her">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="her-home-showcases mt-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="her-title-h2 her-title-bg3 text-center pt-5 pb-4">#HER.SECRETS</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <?php for($i = 1; $i <= 6; $i++) { ?>
            <div class="col-md-2 col-sm-4 p-0 m-0">
                <img class="her-homepage-showcase-image"  src="<?php echo get_template_directory_uri(); ?>/images/showcases/<?php echo $i;?>.jpg"
                     atl="<?php get_bloginfo('sitename'); ?>"/>
            </div>
        <?php } ?>
    </div>
</div>

<?php get_footer(); ?>

