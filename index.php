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

<div class="her-home-services pt-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="her-home-service col-sm-4 col-xs-12 mb-3">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="box" class="svg-inline--fa fa-box fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M509.5 184.6L458.9 32.8C452.4 13.2 434.1 0 413.4 0H272v192h238.7c-.4-2.5-.4-5-1.2-7.4zM240 0H98.6c-20.7 0-39 13.2-45.5 32.8L2.5 184.6c-.8 2.4-.8 4.9-1.2 7.4H240V0zM0 224v240c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48V224H0z"></path></svg>
                Gói hàng kín đáo
            </div>
            <div class="her-home-service col-sm-4 col-xs-12 mb-3">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shipping-fast" class="svg-inline--fa fa-shipping-fast fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"></path></svg>
                Giao hàng COD siêu tốc
            </div>
            <div class="her-home-service col-sm-4 col-xs-12 mb-3">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-shield" class="svg-inline--fa fa-user-shield fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M622.3 271.1l-115.2-45c-4.1-1.6-12.6-3.7-22.2 0l-115.2 45c-10.7 4.2-17.7 14-17.7 24.9 0 111.6 68.7 188.8 132.9 213.9 9.6 3.7 18 1.6 22.2 0C558.4 489.9 640 420.5 640 296c0-10.9-7-20.7-17.7-24.9zM496 462.4V273.3l95.5 37.3c-5.6 87.1-60.9 135.4-95.5 151.8zM224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm96 40c0-2.5.8-4.8 1.1-7.2-2.5-.1-4.9-.8-7.5-.8h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c6.8 0 13.3-1.5 19.2-4-54-42.9-99.2-116.7-99.2-212z"></path></svg>
                Được xem trước khi nhận
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

