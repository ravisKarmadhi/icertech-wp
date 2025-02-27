export class Tabs {
    init() {
        this.tab();
        this.ResHeaderTab();
        this.SelectTo();
        this.sampleTab();
        this.headerTab();

    }
    SelectTo() {
        $(document).ready(function () {
            $(".js-select2").select2({
                closeOnSelect: true,
                minimumResultsForSearch: Infinity,
                allowClear: false,
                dropdownCssClass: "categories-select2"
            });

            $('.js-select2').on('change', function () {
                var selectedTab = $(this).find(':selected').data('id');
                $('.tab').removeClass('tab-active');
                $('.tab[data-id="' + selectedTab + '"]').addClass('tab-active');
            });
        });
    }
    tab() {
        $(document).ready(function () {
            $(".tab").first().addClass("tab-active");
            $(".tab-item").first().addClass("active");
            $("#backButton").hide();

            $('.tab-item').click(function (e) {
                debugger
                e.preventDefault();

                $(".tab").removeClass('tab-active');
                $(".tab-item").removeClass('active');

                var tabId = $(this).attr('data-id');
                $(".tab[data-id='" + tabId + "']").addClass("tab-active");
                $(this).addClass('active');

                if (tabId === 'tab1') {
                    $('#backButton').hide();
                } else {
                    $('#backButton').show();
                }
            });
        })
    }
    sampleTab() {
        $(document).ready(function () {
            $(".sample-tab").first().addClass("tab-active");
            $(".sample-tab-item").first().addClass("active");

            $('.sample-tab-item').click(function (e) {
                e.preventDefault();

                $(".sample-tab").removeClass('tab-active');
                $(".sample-tab-item").removeClass('active');

                var tabId = $(this).attr('data-id');
                $(".sample-tab[data-id='" + tabId + "']").addClass("tab-active");
                $(this).addClass('active');
            });
        })
    }
    headerTab() {
        $(document).ready(function () {
            $('.header-tab-item').click(function (e) {
                e.preventDefault();

                $(".header-tab").removeClass('tab-active');
                $(".header-tab-item").removeClass('active');

                var tabId = $(this).attr('data-id');
                $(".header-tab[data-id='" + tabId + "']").addClass("tab-active");
                $(this).addClass('active');
            });
        })
    }

    ResHeaderTab() {
        $(document).ready(function () {
            function handleWindowResizeMegaMenu() {
                var windowWidth = $(window).width();
                if (windowWidth >= 0 && windowWidth <= 992) {
                    if ($('.header .tab').hasClass('tab-active')) {
                        $('.header .tab').removeClass('tab-active');
                    }
                    if ($('.header .tab-item').hasClass('active')) {
                        $('.header .tab-item').removeClass('active');
                    }
                }
            }
            handleWindowResizeMegaMenu();
            $(window).resize(handleWindowResizeMegaMenu);
        });
    }


}