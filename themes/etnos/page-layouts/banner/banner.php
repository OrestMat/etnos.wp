<?php
global $page_block;



?>


<section class="etnos-banner">
  <div class="container">
    <div class="etnos-banner__wrap">

      <?php foreach ($page_block['item'] as $item) { ?>
        <div class="etnos-banner__wrap-item">
          <?php echo wp_get_attachment_image($item['background'], 'full', '', ['class' => 'img-cover']); ?>

          <div class="etnos-banner__wrap-btn">
            <a href="<?php echo esc_url($item['button_link']) ?>" class="btn"><?php echo esc_html($item['button_name']) ?></a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>