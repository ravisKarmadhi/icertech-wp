<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table">
	<div>
		<div class="d-flex title dpt-15 dpb-15">
			<div class="col-6 ps-3"><div class="product-name red-hat font15 leading24 text-white fw-bold"><?php esc_html_e( 'Product', 'woocommerce' ); ?></div></div>
			<div class="col-6 ps-3"><div class="product-total red-hat font15 leading24 text-white fw-bold"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div></div>
		</div>
	</div>
	<div>
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>

					<div class="d-flex align-items-center <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
						<div class="col-6">
							<div class="product-name ps-3 dpt-15 dpb-15">
								<?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ) . '&nbsp;'; ?>
								<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times;&nbsp;%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</div>
						</div>
						<div class="col-6">
							<div class="product-total ps-3">
								<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
							</div>
						</div>
					</div>
				<?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
		?>
	</div>
	<div>

		<div class="cart-subtotal d-flex align-items-center dpt-15 dpb-15">
			<div class="col-6 red-hat font15 fw-bold text-black ps-3"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></div>
			<div class="col-6 red-hat font15 fw-bold text-black ps-3"><?php wc_cart_totals_subtotal_html(); ?></div>
		</div>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<div><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
				<div><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
			</div>
		<?php endforeach; ?>

		<div class="shipping-checkout d-flex justify-content-between align-items-center">
			<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
	
				<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
	
				<?php wc_cart_totals_shipping_html(); ?>
	
				<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
	
			<?php endif; ?>
		</div>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<div class="fee">
				<div><?php echo esc_html( $fee->name ); ?></div>
				<div><?php wc_cart_totals_fee_html( $fee ); ?></div>
			</div>
		<?php endforeach; ?>

		<div class="tax-checkout d-flex justify-content-between align-items-center">
			<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
				<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
					<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited ?>
						<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
							<th><?php echo esc_html( $tax->label ); ?></th>
							<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<div class="tax-total d-flex+">
						<div><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></div>
						<div><?php wc_cart_totals_taxes_total_html(); ?></div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>


		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<div class="order-total d-flex dpt-15 dpb-15">
			<div class="col-6 red-hat font15 fw-bold text-black ps-3"><?php esc_html_e( 'Total', 'woocommerce' ); ?></div>
			<div class="col-6 red-hat font15 fw-bold text-black ps-3"><?php wc_cart_totals_order_total_html(); ?></div>
		</div>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</div>
</div>
