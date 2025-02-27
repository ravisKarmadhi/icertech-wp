export class Accordion {
    init() {
        this.Accordion();
    }
    Accordion() {
        $(document).ready(function () {
            $('.closet-item.active .closet-content').show();
            $('.closet-header , .product-closet-header').click(function () {
                $(this).toggleClass('active').next('.closet-content').slideToggle();
                $('.closet-header , .product-closet-header').not(this).removeClass('active').next('.closet-content').slideUp();
            });
        });
    }
}