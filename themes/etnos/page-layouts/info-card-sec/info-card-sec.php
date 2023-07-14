<?php
global $page_block;


?>

<section class="etnos-info-card-sec container-out">
  <div class="container">
    <div class="etnos-info-card-sec__wrap">
      <div class="etnos-info-card-sec-flexbox">
        <div class="etnos-info-card-sec__img">
          <?php echo wp_get_attachment_image($page_block['image']['id'], 'full'); ?>
        </div>
        <?php echo $page_block['text'] ?>
      </div>
      <div class="etnos-info-card-sec__btn">
        <?php echo isLink($page_block['button'], 'btn') ?>
      </div>
    </div>
  </div>
</section>