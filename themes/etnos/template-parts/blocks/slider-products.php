<?php
global $page_block;


$flag_red = $page_block['red-template'] ? 'etnos-red' : '';


$random_number =  rand(5, 15);
$random_id = 'etnos-slider-products__'. $random_number;
?>

<section class="etnos-slider-products container-out <?php echo $flag_red; ?>">
  <div class="container">
    <div class="etnos-slider-products__wrap">
      <div class="etnos-slider-products__heading">
        <h2><?php echo $page_block['title']; ?></h2>
        <?php echo get_acf_link($page_block['button_link'], 'btn'); ?>
      </div>

      <div class="etnos-slider-products__slider">
        <div class="swiper" id="<?php echo $random_id; ?>">
          <div class="swiper-wrapper">

            <?php foreach($page_block['products'] as $item) {?>

            <div class="swiper-slide">
              <div class="etnos-slider-products__slider-item">
                <div class="etnos-slider-products__slider-img">
                  <?php echo wp_get_attachment_image( $item['img'], 'full','' ,['class' => 'img-cover']); ?>
                </div>
                <h5> <?php echo esc_html($item['title']); ?></h5>
                <span><?php echo esc_html($item['price']); ?></span>
              </div>
            </div>

            <?php }?>

          </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>
    </div>
  </div>
</section>


<script defer>
(function($, window, document, undefined) {

  new Swiper("<?php echo '#'. $random_id; ?>", {
    slidesPerView: 5,
    spaceBetween: 15,
    loop: true,
    keyboard: {
      enabled: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: "  .swiper-button-prev",
    },
  });

})(jQuery, window, document);
</script>