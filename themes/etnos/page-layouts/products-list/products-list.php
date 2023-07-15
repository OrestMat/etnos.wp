<?php
global $page_block;


?>


<div class="etnos-products-list container-out">
  <h2> <?php echo $page_block['title']; ?></h2>

  <div class="etnos-products-list__wrap">
    <?php foreach ($page_block['products'] as $id) {
      $product = wc_get_product($id);
      $permalink = $product->get_permalink();
      $image = $product->get_image('full');
      $name = $product->get_name();
      $price = $product->get_price();

    ?>
      <div class="etnos-products-list__item">
        <a class="etnos-products-list__media media-fit" href="<?php echo $permalink; ?>">
          <?php echo $image; ?>
        </a>

        <h5>
          <a href="<?php echo $permalink; ?>">
            <?php echo $name; ?>
          </a>
        </h5>

        <?php if (!empty($price)) { ?>
          <span><?php echo $price; ?>грн</span>
        <?php } ?>

      </div>
    <?php } ?>
  </div>
</div>