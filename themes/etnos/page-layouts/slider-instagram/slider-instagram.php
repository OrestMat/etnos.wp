<?php
global $page_block;


?>


<section class="etnos-slider-inst ">
  <div class="container">

    <div class="swiper  swiper-feebacks">

      <div class="swiper-wrapper">
        <?php foreach ($page_block['post'] as $item) { ?>
          <div class="swiper-slide">
            <div class="items">
              <a href="<?php echo $item['link'] ?>">
                <div class="images">
                  <div class="avatar"><?php echo wp_get_attachment_image($item['image']) ?></div>
                  <div class="icon"><img src="/wp-content/themes/etnos/assets/img/rew-icon.png" alt=""></div>
                </div>
              </a>
            </div>
            <div class="title">
              <h3><?php echo $item['name'] ?></h3>
            </div>
            <div class="content">
              <p>
                <?php echo $item['description'] ?>
              </p>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
</section>

<script defer>
  (function($, window, document, undefined) {
    "use strict";
  })(jQuery, window, document);
</script>