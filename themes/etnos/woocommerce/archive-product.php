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

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */



if (is_product_category()) {
  $category_id = get_queried_object_id();

  $image_id = get_term_meta($category_id, 'thumbnail_id', true);
  $image_url = wp_get_attachment_url($image_id);
  $style_image_url = 'style="background: url(' . $image_url . ') center / cover no-repeat;"';
}



?>
<div class="etnos-category-page">
  <div class="woocommerce-products-header" <?php echo $style_image_url; ?>>
    <div class="container">
      <div class="woocommerce-products-header__wrap">
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
          <!-- <h1><?php woocommerce_page_title(); ?></h1> -->
          <h1><?php woocommerce_breadcrumb(); ?></h1>
        <?php endif; ?>


        <?php

        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action('woocommerce_archive_description');
        ?>
      </div>
    </div>
  </div>
  <?php
  if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
  ?>

    <div class="products__toolbar">
      <div class="container">

        <?php
        woocommerce_result_count();
        woocommerce_catalog_ordering();
        // do_action('woocommerce_before_shop_loop');

        ?>
      </div>
    </div>
    <?php

    woocommerce_product_loop_start(); ?>
    <div class="container">
      <div class="products__wrap">
        <aside>
          <?php dynamic_sidebar('category-page'); ?>
        </aside>

        <div class="products__main">

          <?php

          if (wc_get_loop_prop('total')) {
            while (have_posts()) {
              the_post();

              /**
               * Hook: woocommerce_shop_loop.
               */
              do_action('woocommerce_shop_loop');

              wc_get_template_part('content', 'product-category');
            }
          } ?>
        </div>
      </div>
    </div>
  <?php
    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
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
  ?>
</div>

<?php

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */


get_footer('shop');
