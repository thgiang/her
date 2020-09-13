jQuery(document).ready(function ($) {
    setInterval(function () {
        let end_time = $('.discount-end-time').text();
        let now = Math.floor(Date.now() / 1000);
        if (now <= end_time) {
            let time_left = end_time - now;
            $('.discount-banner .days').text(parseInt(time_left / (24 * 60 * 60)));
            time_left = time_left % (24 * 60 * 60);

            $('.discount-banner .hours').text(parseInt(time_left / (60 * 60)));
            time_left = time_left % (60 * 60);

            $('.discount-banner .mins').text(parseInt(time_left / (60)));
            time_left = time_left % (60);

            $('.discount-banner .seconds').text(time_left);
        }
    }, 1000);

    $('.add_to_cart_button').text('Mua hàng');
    $('body').on('click', '.her_chat_now', function(e) {
        e.preventDefault();
        /*
        $('.her-back-drop').show();
         */
        $('.her-chat-notice').addClass('d-block animate__animated animate__wobble');


        /*
        setTimeout(function() {
            $('.her-back-drop').hide();
        }, 1000);
        */
        let timeout = setTimeout(function() {
            clearTimeout(timeout);
            $('.her-chat-notice').removeClass('d-block animate__animated animate__wobble');
        }, 2000);
    });

});