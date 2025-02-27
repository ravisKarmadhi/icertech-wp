<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}   
    ?>

<!-- Product Info Section START-->
<?php
$product_id = get_the_ID();
$product = new WC_product($product_id);
$attachment_ids = $product->get_gallery_image_ids();
$price = $product->get_price();
$price_htm_1 = '';
$price_hot = get_post_meta($product_id, '_price', true);
if ($product->get_sale_price()) :
  $price_htm_1 .= $product->get_price_html();
 else : 
  $price_htm_1 .=  $product->get_price_html();
endif;
$product_specification = get_field('product_specification');
$product_description = get_field('product_description');
$pricing =  get_post_meta($product_id, '_pricing_rules',true); 
?>
<!-- breadcrumb start -->

<section class="product-open-main dmt-240">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-6 product-left pe-4 tmb-20">
                <div class="single-product-slider bg-f2f3f4 radius30 overflow-hidden">
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>">
                    </div>
                    <?php foreach ($attachment_ids as $attachment_id) : ?>
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="<?php echo $Original_image_url = wp_get_attachment_url($attachment_id); ?>" alt="" >
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-6 product-right">
                <h2 class="product-name red-hat font40 text-013945 dmb-25"><?php the_title(); ?></h2>
                <?php $terms = wp_get_post_terms( get_the_id(), 'product_cat' ); 
                    $term  = reset($terms); 
                    if(!empty($term)): ?>
                    <a href="<?php echo $category_link = get_term_link($term); ?>" class="product-category red-hat font20 text-139cd5 text-decoration-none"> 
                        <?php echo $term->name; ?>
                    </a>
                <?php endif; ?>
                <div class="fsj">
                    <?php // if(!empty(the_excerpt())): ?>
                    <div class="woocommerce-product-details__short-description red-hat font22 text-4d4d4d dmb-50">
                        <?php echo the_excerpt(); ?>
                    </div>
                    <?php // endif;?> 
                </div>
                <?php if(!empty($product_right_info['icon_box_title'])): ?>
                <h3 class="red-hat font22 fw-bold text-4d4d4d dmb-35 col-lg-12 col-10 mx-auto text-lg-start text-center">
                    <i><?php echo $product_right_info['icon_box_title'] ?></i>
                </h3>
                <?php endif; ?>
                <?php if(!empty($product_description['icon_box'])): ?>
                <ul class="d-flex flex-wrap justify-content-between list-unstyled dmb-50">
                	<?php foreach ($product_description['icon_box'] as $icon_box_items): ?>
                	<li class="col-lg-4 col-12 tmb-30">
                        <div class="col-lg-10 col-12">
                            <div class="col-lg-5 col-2 mx-lg-0 mx-auto pe-lg-4 dmb-30">
                                <img src="<?php echo wp_get_attachment_image_url( $icon_box_items['icon'], 'large' ); ?>" class="w-100">
                            </div>
                            <p class="red-hat font18 text-013945 text-lg-start text-center"><?php echo $icon_box_items['heading'] ?></p>
                        </div>
                	</li>
                	<?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <div class="">
                    <?php while ( have_posts() ) : ?>
                        <?php the_post(); ?>

                        <?php wc_get_template_part( 'content', 'single-product' ); ?>

                    <?php endwhile; // end of the loop. ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php if(!empty($pricing)):

?>
<section class="bulk-pricing-section dmt-100">
	<div class="container">
		<h2 class="text-center red-hat font30 text-013945 dmb-20">Bulk Pricing</h2>
		<div class="bulk-pricing-group d-lg-block d-flex radius30 overflow-x-auto">
            <?php foreach ($pricing as $value): 
                $value_master = $value['variation_rules']['args']['variations'][0];
                $variation = new WC_Product_Variation($value_master);
                $variation_image_id = $variation->get_image_id();
                $image_url = wp_get_attachment_url($variation_image_id);
                $variation_attributes = $variation->get_variation_attributes();
                $variation_name = implode(', ', array_values($variation_attributes));
                $variation_description = $variation->get_description();
                ?>
			<div class="bulk-pricing-item d-flex flex-lg-row flex-column align-items-center justify-content-between w-100">
				<div class="bulk-pricing-img p-4 h-100 d-inline-block">
                    <div class="d-flex flex-column align-items-center">
                        <?php if(!empty($image_url)): ?>
                        <img src="<?php echo $image_url; ?>" width="100">
                        <h5 class="text-center red-hat font22 fw-normal text-333333 w-100">
                            <?php echo $variation_description; ?>
                        </h5>
                        <?php else: ?>
                            <img src=" <?php echo $Original_image_url = wp_get_attachment_url($attachment_id); ?>" width="100">
                           
                            <h5 class="text-center red-hat font22 fw-normal text-333333 w-100">
                            <?php the_title(); ?>
                            </h5>
                        <?php endif; ?>
                    </div>
				</div>
				<?php  foreach ($value['rules'] as $key => $value_rules): ?>
				<div class="bulk-pricing-cell p-4 h-100 d-flex align-items-center justify-center w-100">
					<h5 class="text-center red-hat font22 fw-normal text-333333 text-center w-100"><?php echo $value_rules['from']; ?> - <?php echo $value_rules['to']; ?> Lots<br/> Per Box <br/><?php echo wc_price($value_rules['amount']); ?></h5>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="product-description dmt-70">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-12 tmb-20 product-desc-col">
                <div class="bg-f2f3f4 h-100 p-lg-5 p-4 radius30">
                    <h6 class="red-hat font20 text-013945 dmb-20">Description</h6>
                    <div class="description red-hat font22 text-4d4d4d"><?php echo the_content(); ?></div>
                </div>
			</div>
			<div class="col-md-6 col-12 tmb-20 product-desc-col">
                <div class="bg-f2f3f4 h-100 p-lg-5 p-4 radius30">
                    <h6 class="red-hat font20 text-013945 dmb-20">Specification</h6>
                    <?php if(!empty($product_specification)): ?>
                    <?php foreach ($product_specification['specification'] as $specification_items): ?>
                        <div class="d-flex dmb-20">
                            <div class="col-lg-4 col-6 red-hat font22 text-4d4d4d pe-lg-3"><?php echo $specification_items['title'] ?></div>
                            <div class="col-lg-8 col-6 red-hat font22 text-4d4d4d ps-lg-2"><?php echo $specification_items['content'] ?></div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                </div>
			</div>
		</div>
	</div>
</section>

<section class="related-product-section dmt-70 overflow-hidden">
	<div class="container">
		<?php echo do_shortcode('[related_products] '); ?>
	</div>
</section>