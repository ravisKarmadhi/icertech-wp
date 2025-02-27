//fancybox js
// require("@fancyapps/ui");

export class Parts {

    init() {
        this.VariationSelect();
    }

    VariationSelect() {
        // $(".woo-variation-items-wrapper").on("click", ".init", function () {
        //     $(this).closest(".woo-variation-items-wrapper").children('li.variable-item:not(.init)').toggle();
        // });

        // var allOptions = $(".woo-variation-items-wrapper").children('li.variable-item:not(.init)');
        // $(".woo-variation-items-wrapper").on("click", "li:not(.init)", function () {
        //     allOptions.removeClass('selected-li');
        //     $(this).addClass('selected-li');
        //     $(".woo-variation-items-wrapper").children('.init').html($(this).html());
        //     allOptions.toggle();
        // });
        jQuery(document).on('click','.woocommerce-variation-description',function(){
            jQuery('.variable-items-wrapper').addClass('active-dropdown');
        })
        jQuery(document).on('click','.variable-items-wrapper li.selected',function(e){
            alert("123");
            e.preventDefault();
            jQuery('.variable-items-wrapper').removeClass('active-dropdown'); 
        });
    }
}