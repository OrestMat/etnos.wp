<?php
global $page_block;

?>


<section class="etnos-banner-slider">

  <div class="swiper">
    <div class="swiper-wrapper">
      <?php foreach ($page_block['items'] as $item) { ?>
        <div class="swiper-slide">
          <div class="etnos-banner-slider__item">
            <a href="<?php echo esc_url($item['link']) ?>">

              <?php echo wp_get_attachment_image($item['background'], 'full', '', ['class' => 'img-cover']); ?>

            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>