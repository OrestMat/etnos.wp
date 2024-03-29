<?php
global $page_block;



if (!empty($page_block['post']) && count($page_block['post'])) {
?>

  <section class="etnos-slider-inst container-out">
    <div class="container">

      <div class="swiper  swiper-feebacks">

        <div class="swiper-wrapper">
          <?php foreach ($page_block['post'] as $item) { ?>
            <div class="swiper-slide">
              <div class="etnos-slider-inst__items">
                <a href="<?php echo $item['link'] ?>">
                  <div class="etnos-slider-inst__img">
                    <div class="etnos-slider-inst__avatar"><?php echo wp_get_attachment_image($item['image']) ?></div>
                    <div class="etnos-slider-inst__icon"><img src="/wp-content/themes/etnos/assets/img/rew-icon.png" alt=""></div>
                  </div>
                </a>
              </div>
              <h4><?php echo $item['name'] ?></h4>
              <p class="p-small">
                <?php echo $item['description'] ?>
              </p>
            </div>
          <?php } ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </section>

<?php }
