export class Header {
    init() {
        this.HeaderHover();
        this.ResponsiveHeader();
        this.HeaderFixed();
    }

    HeaderHover() {
        $(document).ready(function () {
            function handleWindowResizeDeskSize() {
                var windowWidth = $(window).width();
                if (windowWidth >= 992) {
                    $('.menu-item').each(function () {
                        if ($(this).children(".mega-menu").length === 0) {
                            return;
                        } else {
                            $(this).hover(function () {
                                $(this).addClass('menu-active');
                                $(this).children('.mega-menu');
                            }, function () {
                                $(this).removeClass('menu-active');
                                $(this).children('.mega-menu');
                            });
                        }
                    });
                }
            }
            handleWindowResizeDeskSize();
            $(window).resize(handleWindowResizeDeskSize);
        });
    }

    ResponsiveHeader() {
        $(document).ready(function () {
            function handleWindowResizeMegaMenu() {
                var windowWidth = $(window).width();
                if (windowWidth <= 991) {
                    $('.menu-toggle').click(function (e) {
                        e.preventDefault();
                        $('.burgar-menu').toggleClass('activate');
                        $('.header').toggleClass('header-active');
                        $('.header-btn-end').toggleClass('d-none');
                        $('html').toggleClass('overflow-hidden');
                        $('.header').removeClass('header-megamenu-active');
                        $('.menu-item').removeClass('res-menu-active');
                    });
                    $('.menu-item').appendTo('.menu-items');
                    $('.header-tab-data0').appendTo('.header-tab-item0');
                    $('.header-tab-data1').appendTo('.header-tab-item1');
                    $('.header-tab-data2').appendTo('.header-tab-item2');
                    $('.menu-item').each(function () {
                        if ($(this).children(".mega-menu").length === 0) {
                            return;
                        } else {
                            var menuItem = $(this);
                            menuItem.click(function (e) {
                                e.preventDefault();
                                e.stopPropagation();
                                if (menuItem.hasClass('res-menu-active')) {
                                    $('.header').removeClass('header-megamenu-active') ;
                                    menuItem.removeClass('res-menu-active');
                                } else {
                                    $('.header').removeClass('header-megamenu-active');
                                    $('.res-menu-active').removeClass('res-menu-active');
                                    $('.header').addClass('header-megamenu-active');
                                    menuItem.addClass('res-menu-active');
                                    $('.header .header-tab').removeClass('tab-active');
                                    $('.header .header-tab-item').removeClass('active');
                                }
                            });
                            $('.mega-menu').click(function (e) {
                                e.stopPropagation();
                            })
                        }
                    });
                }
            }
            handleWindowResizeMegaMenu();
            $(window).resize(handleWindowResizeMegaMenu);
        });
    }

    HeaderFixed() {
        var prevScrollPos = window.pageYOffset || document.documentElement.scrollTop;
        $(window).scroll(function () {
            var sticky = $(".header"),
                scroll = $(window).scrollTop();
            if (scroll >= 50) {
                sticky.addClass("header-fixed");
                sticky.removeClass("header-fixed-os");
            }
            else {
                sticky.removeClass("header-fixed");
                sticky.addClass("header-fixed-os");
            }
            var currentScrollPos = window.pageYOffset || document.documentElement.scrollTop;
            if (prevScrollPos > currentScrollPos || currentScrollPos === 0) {
                $(".header").removeClass("hidden");
            } else {
                $(".header").addClass("hidden");
            }
            prevScrollPos = currentScrollPos;
        });
    }
}