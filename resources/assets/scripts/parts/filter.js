export class Filter {
    init() {
        this.NewsFilter();
    }

    NewsFilter() {
        $(document).ready(function () {
            $(".news-filter-btn").click(function () {
                var value = $(this).attr('data-filter');
                if (value == "all") {
                    $('.news-filter').show('500');
                }
                else {
                    $('.news-filter').not('.' + value).hide('1000');
                    $('.news-filter').filter('.' + value).show('1000');
                }
            });

            $(".news-filter-btn").click(function () {
                $(this).addClass("active").siblings().removeClass("active");
            });
        });

        $(document).ready(function () {
            var currentUrl = window.location.href; // Get the current URL
            $('a').each(function () {
                if (this.href === currentUrl) {
                    $(this).addClass('active'); // Add 'active' class if href matches the current URL
                }
            });
            if (window.location.pathname === '/shop/') {
                $('.shop-section .tab-menu > .row > .col-lg-4:nth-child(1) .tab-btn').addClass('tab-active');
            } else {
                $('.shop-section .tab-menu > .row > .col-lg-4:nth-child(1) .tab-btn').removeClass('tab-active');
            }
        });
    }
}