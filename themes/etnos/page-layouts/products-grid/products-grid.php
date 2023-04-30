<?php
global $page_block;

$limit = $page_block['limit'];
$limit = !empty($page_block['limit']) ? $page_block['limit'] : -1;

$cat_arr = $page_block['cat'];
$cat_arr_id = [];

foreach ($cat_arr as $cat_slug) {
  $category = get_term_by('slug', $cat_slug, 'product_cat');

  $cat_arr_id[] = $category->term_id;
}

$args = array(
  'post_type' => 'product',
  'posts_per_page' => $limit,
  'orderby' => 'date',
  'order' => 'DESC',
);

if (!empty($cat_arr_id) && count($cat_arr_id)) {
  $args['tax_query'][] = array(
    'taxonomy' => 'product_cat',
    'field' => 'term_id',
    'terms' => $cat_arr_id,
  );
}


$loop = new WP_Query($args);


if ($loop->have_posts()) { ?>
  <section class="etnos-product-grid container-out">
    <div class="container">
      <div class="etnos-product-grid__wrap">
        <?php
        while ($loop->have_posts()) : $loop->the_post();
          wc_get_template_part('content', 'product');
        endwhile; ?>
      </div>
    </div>
  </section>
<?php
} else {
  echo __('No products found');
}
wp_reset_postdata();
