<?php
global $page_block;


?>


<section class="etnos-advantage container-out">
  <div class="container">
    <div class="etnos-advantage__wrapper">
      <?php foreach ($page_block['item'] as $item) { ?>
        <div class="etnos-advantage__item">
          <div class="etnos-advantage__image <?php echo ($item['icon']) ?>"></div>
          <div class="etnos-advantage__content">
            <h4 class="m-0"><?php echo $item['title'] ?></h4>
            <p><?php echo $item['description'] ?></p>
          </div>
        </div>
        <div class="etnos-advantage__decor"></div>
        <div class="etnos-advantage__item">
          <div class="etnos-advantage__image <?php echo ($item['icon_2']) ?>"></div>
          <div class="etnos-advantage__content">
            <h4 class="m-0"><?php echo $item['title_2'] ?></h4>
            <p><?php echo $item['description_2'] ?></p>
          </div>
        </div>
        <div class="etnos-advantage__decor"></div>
        <div class="etnos-advantage__item">
          <div class="etnos-advantage__image <?php echo ($item['icon_3']) ?>"></div>
          <div class="etnos-advantage__content">
            <h4 class="m-0"><?php echo $item['title_3'] ?></h4>
            <p><?php echo $item['description_3'] ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
</section>