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
})