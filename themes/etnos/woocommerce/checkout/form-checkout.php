<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */


if (!defined('ABSPATH')) {
  exit;
}

wc_print_notices();

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
  echo apply_filters('woocommerce_checkout_must_be_logged_in_message', esc_html__('You must be logged in to checkout.', 'etnos'));
  return;
}

?>
<div class="checkout-area pb-30">
  <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <?php if ($checkout->get_checkout_fields()) : ?>

      <?php do_action('woocommerce_checkout_before_customer_details'); ?>

      <div class="row" id="customer_details">
        <div class="col-xs-12 col-md-7">
          <div class="checkbox-form">
            <?php do_action('woocommerce_checkout_billing'); ?>
            <?php do_action('woocommerce_checkout_shipping'); ?>
          </div>
        </div>
        <div class="col-xs-12 col-md-5">
          <h3 id="order_review_heading"><?php _e('Your order', 'etnos'); ?></h3>
          <div class="your-order">
            <?php do_action('woocommerce_checkout_after_customer_details'); ?>
            <?php do_action('woocommerce_checkout_before_order_review'); ?>

            <div id="order_review" class="woocommerce-checkout-review-order your-order-table">
              <?php do_action('woocommerce_checkout_order_review'); ?>
            </div>

            <?php do_action('woocommerce_checkout_after_order_review'); ?>
          </div>
        </div>
      </div>

    <?php endif; ?>

  </form>
</div>
<?php do_action('woocommerce_after_checkout_form', $checkout); ?>