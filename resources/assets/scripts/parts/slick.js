export class Slick {
    init() {
        this.HistorySlider();
        this.TestimonialSlider();
        this.RangeSlider();
        this.TeamSlider();
        this.BenefitSlider();
        this.ReuseIdeaSlider();
        this.LogoSlider();
        this.ImageSlider();
        this.PeopleSlider();
        this.LeftSlider();
        this.RightSlider();
        this.SingleProductSlider();
        this.SlickArrowWrap();
        this.RangeSlickArrowWrap();
    }

    HistorySlider() {
        $('.history-data-slider').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            prevArrow: '<button class="slick--prev position-absolute start-0 rounded-circle z-3 bg-013945 border-0 d-flex"><img src="/wp-content/uploads/2025/02/left-arrow.png" class="h-100"></button>',
            nextArrow: '<button class="slick--next position-absolute end-0 rounded-circle z-3 bg-013945 border-0 d-flex"><img src="/wp-content/uploads/2025/02/right-arrow.png" class="h-100"></button>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    TestimonialSlider() {
        $(".testimonial-slider").slick({
            dots: true,
            autoplay: false,
            arrows: false,
            slideToShow: 2,
            slideToScroll: 1,
            infinite: true,
            draggable: true,
        });
    }
    RangeSlider() {
        $(".range-slider").slick({
            dots: true,
            autoplay: false,
            arrows: true,
            slideToShow: 2,
            slideToScroll: 1,
            infinite: true,
            draggable: true,
            prevArrow: '<button class="slick--prev d-flex align-items-center border-0 bg-transparent me-lg-0 me-2"><img src="/wp-content/uploads/2025/02/top-slider-arrow.svg" class="h-100"></button>',
            nextArrow: '<button class="slick--next d-flex align-items-center border-0 bg-transparent ms-lg-0 ms-2"><img src="/wp-content/uploads/2025/02/bottom-slider-arrow.svg" class="h-100"></button>',
        });
    }
    TeamSlider() {
        $('.team-member-slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            prevArrow: '<button class="slick--prev z-3 bg-transparent border-0 p-0 d-flex me-3"><img src="/wp-content/uploads/2025/02/team-left-arrow.svg" class="h-100"></button>',
            nextArrow: '<button class="slick--next z-3 bg-transparent border-0 p-0 d-flex ms-3"><img src="/wp-content/uploads/2025/02/team-right-arrow.svg" class="h-100"></button>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $(document).ready(function () {
            const $newDiv = $('.team-arrow-wrapper');

            const $slickPrev = $('.team-member-slider .slick--prev');
            const $slickNext = $('.team-member-slider .slick--next');
            const $slickDots = $('.team-member-slider .slick-dots');

            $newDiv.append($slickPrev).append($slickDots).append($slickNext);
        });
    }
    BenefitSlider() {
        $(".benefit-slider").slick({
            dots: false,
            autoplay: false,
            arrows: true,
            slideToShow: 3,
            slideToScroll: 1,
            infinite: false,
            draggable: true,
        });
    }
    ReuseIdeaSlider() {
        $(".reuse-idea-slider").slick({
            dots: true,
            autoplay: false,
            arrows: true,
            slideToShow: 3,
            slideToScroll: 1,
            infinite: false,
            draggable: true,
        });
    }
    LogoSlider() {
        $('.logo-slider').slick({
            dots: false,
            infinite: true,
            arrows: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    ImageSlider() {
        $('.image-slider').slick({
            dots: false,
            infinite: true,
            arrows: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
    PeopleSlider() {
        $(".people-slider").slick({
            dots: true,
            autoplay: false,
            arrows: true,
            slideToShow: 1,
            slideToScroll: 1,
            infinite: false,
            draggable: true,
            prevArrow: '<button class="slick--prev d-flex border-0 bg-transparent mb-lg-2 me-lg-0 me-2 position-absolute z-3"><img src="/wp-content/uploads/2025/02/top-slider-arrow.svg" class="h-100"></button>',
            nextArrow: '<button class="slick--next d-flex border-0 bg-transparent mt-lg-2 ms-lg-0 ms-2 position-absolute z-3"><img src="/wp-content/uploads/2025/02/bottom-slider-arrow.svg" class="h-100"></button>',
        });
    }
    LeftSlider() {
        $(".left-slider-part .leftright-slider").slick({
            dots: true,
            autoplay: false,
            arrows: true,
            slideToShow: 1,
            slideToScroll: 1,
            infinite: false,
            draggable: true,
            prevArrow: '<button class="slick--prev d-flex align-items-center border-0 bg-transparent me-lg-0 me-2"><img src="/wp-content/uploads/2025/02/top-slider-arrow.svg" class="h-100"></button>',
            nextArrow: '<button class="slick--next d-flex align-items-center border-0 bg-transparent ms-lg-0 ms-2"><img src="/wp-content/uploads/2025/02/bottom-slider-arrow.svg" class="h-100"></button>',
        });
    }
    RightSlider() {
        $(".right-slider-part .leftright-slider").slick({
            dots: true,
            autoplay: false,
            arrows: true,
            slideToShow: 1,
            slideToScroll: 1,
            infinite: false,
            draggable: true,
            prevArrow: '<button class="slick--prev d-flex align-items-center border-0 bg-transparent me-lg-0 me-2"><img src="/wp-content/uploads/2025/02/top-slider-arrow.svg" class="h-100"></button>',
            nextArrow: '<button class="slick--next d-flex align-items-center border-0 bg-transparent ms-lg-0 ms-2"><img src="/wp-content/uploads/2025/02/bottom-slider-arrow.svg" class="h-100"></button>',
        });
    }
    SingleProductSlider() {
        $(".single-product-slider").slick({
            dots: true,
            autoplay: false,
            arrows: false,
            slideToShow: 1,
            slideToScroll: 1,
        });
    }
    SlickArrowWrap() {
        $(document).ready(function () {
            $(document).ready(function () {
                const sliderSelectors = ['.left-slider-part', '.right-slider-part'];

                sliderSelectors.forEach(selector => {
                    $(`.leftright-slider-section${selector}`).each(function (index, element) {
                        const $sliderWrapper = $(element).find('.slick-arrows-wrapper');
                        const $slickPrev = $(element).find('.leftright-slider .slick--prev');
                        const $slickNext = $(element).find('.leftright-slider .slick--next');
                        const $slickDots = $(element).find('.leftright-slider .slick-dots');

                        $sliderWrapper.append($slickPrev).append($slickDots).append($slickNext);
                    });
                });
            });
        });
    }
    RangeSlickArrowWrap() {
        $(document).ready(function () {
            $(document).ready(function () {
                const sliderSelectors = ['.range-section'];

                sliderSelectors.forEach(selector => {
                    $(`.range-section${selector}`).each(function (index, element) {
                        const $sliderWrapper = $(element).find('.range-slick-arrows-wrapper');
                        const $slickPrev = $(element).find('.range-slider .slick--prev');
                        const $slickNext = $(element).find('.range-slider .slick--next');
                        const $slickDots = $(element).find('.range-slider .slick-dots');

                        $sliderWrapper.append($slickPrev).append($slickDots).append($slickNext);
                    });
                });
            });
        });
    }
}