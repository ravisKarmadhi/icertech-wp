<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
$current_cat = get_queried_object();

if (is_shop()) :
    $page_id = wc_get_page_id('shop');
    $description = get_field('description', $page_id);
    $tab_link = get_field('tab_link', $page_id);
else :
    $description = get_field('description', $current_cat);
    $tab_link = get_field('tab_link', $current_cat);
endif; ?>

<div class="spacing dpb-205 tpb-180"></div>
    <section class="shop-section dmb-30" >
        <div class="container px-p-p">
        <?php if (apply_filters('woocommerce_show_page_title', true)): ?>
			<div class="red-hat font48 text-013945 text-center fw-medium res-font30 dmb-50 tmb-25" data-aos="fade-up" data-aos-duration="1000"><?php woocommerce_page_title(); ?></div>
		<?php endif; ?>
		<?php if(!empty($tab_link)): ?>
        	<div class="tab-container" data-aos="fade-up" data-aos-duration="1000">
                <div class="tab-menu">
                    <div class="row">
						<?php foreach($tab_link as $key => $tab_link_custom):?>
                        <div class="col-lg-4 col-md-4 tmb-25">
							<div class="col-11 mx-auto">
								<a href="<?php echo $tab_link_custom['link']['url']; ?>"
									class="w-100 tab-btn tab text-decoration-none d-inline-flex align-items-center justify-content-center red-hat text-capitalize rounded-pill font20 res-font20 fw-medium transition">
									<?php echo $tab_link_custom['link']['title']; ?> </a>
							</div>
                        </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
		<?php endif; ?>
            <div class="box-description bg-f2f3f4 dmt-55 tmt-0 radius30 dpt-100 tpb-30 tpt-25 dpb-100 px-lg-5 px-3 tab tab-active"
                    data-id="tab1" data-aos="fade-up" data-aos-duration="1000">
			<?php if(!empty($description)): ?>
            <div class="dmb-75 tmb-25">
                <div class="font22 red-hat fw-normal text-center text-013945 dmb-15">
                    <?php echo $description; ?>
                </div>
            </div>
			<?php endif; ?>
            <div class="box-card-section">
      	<?php
		if (woocommerce_product_loop()) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action('woocommerce_before_shop_loop');

			woocommerce_product_loop_start();

			if (wc_get_loop_prop('total')) {
				?>
				<div class="row">
					<?php
					while (have_posts()) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');

						wc_get_template_part('content', 'product');
					}
					?>
				</div>
			<?php }

			woocommerce_product_loop_end();
			$total = wc_get_loop_prop('total_pages');
            $current = isset($current) ? $current : wc_get_loop_prop('current_page');
            $base = isset($base) ? $base : esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false))));
            $format = isset($format) ? $format : '';

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}


		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');

		/**
		 * Hook: woocommerce_sidebar.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		// do_action( 'woocommerce_sidebar' );
		?>
      </div>
      </div>
   	</div>
</section>



