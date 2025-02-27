<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
$pro_id = $product->get_id();
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-lg-4 col-sm-6 col-12 dmt-35">
    <a href="<?php the_permalink(); ?>" class="shop-card d-flex justify-content-center align-items-end bg-white text-decoration-none w-100 radius30 transition p-5" data-aos="fade-up" data-aos-duration="1500">
        <div>
            <div class="shop-card-img dmb-15 overflow-hidden d-flex justify-content-center align-items-center">
                <?php if (get_the_post_thumbnail_url($pro_id, 'medium_large')){
                    $image = get_the_post_thumbnail_url($pro_id, 'medium_large');
                } else {
                    $image = '/wp-content/uploads/woocommerce-placeholder.png';
                }?>
                <img src="<?php echo $image; ?>" class="transition" alt="<?= $product->get_name(); ?>" />
            </div>
            <div class="red-hat font22 res-font18 fw-medium text-013945 text-capitalize text-center shop-card-title transition">
                <?= $product->get_name(); ?>
            </div>
        </div>
    </a>
</div>
