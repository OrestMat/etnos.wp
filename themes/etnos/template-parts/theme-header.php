<?php
global $woocommerce;

$logo = get_field('logo', 'option');




// if (class_exists('WooCommerce')) :

//   <?php wc_get_template('cart/mini-cart.php'); 


// endif;
?>




<div class="etnos-main">
  <header class="etnos-header">
    <div class="etnos-header__top">
      <div class="container">
        <div class="etnos-header__top-wrap">

          <div class="etnos-header__top-phone">
            <a href="+38 111 22 33">+38 111 22 33</a>
            <a href="+38 111 22 33">+38 111 22 33</a>
          </div>
          <a class="etnos-header__top-callback" href="#">Замовити дзвінок</a>
        </div>
      </div>
    </div>

    <div class="etnos-header__main">
      <div class="container">
        <div class="etnos-header__main-wrap">
          <a class="etnos-header__main-logo" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($logo); ?>" title="<?php echo get_option('blogname'); ?>" alt="<?php echo get_option('blogname'); ?>">
          </a>



          <div class="etnos-header__main-menu">
            <?php
            if (has_nav_menu('primary-menu')) {
              $args                   = array('container' => '');
              $args['theme_location'] = 'primary-menu';
              wp_nav_menu($args);
            }
            ?>
          </div>

          <div class="etnos-header__main-toolbar">

            <button>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 512 512" enable-background="new 0 0 512 512">
                <g>
                  <path fill="#222222" d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5   S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9   C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z" />
                </g>
              </svg>
            </button>

            <a href="/cart/" class="etnos-header__main-toolbar-cart">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 208.955 208.955" style="enable-background:new 0 0 208.955 208.955;" xml:space="preserve">
                <path class="icon" fill="#222222" d="M190.85,200.227L178.135,58.626c-0.347-3.867-3.588-6.829-7.47-6.829h-26.221V39.971c0-22.04-17.93-39.971-39.969-39.971
                            C82.437,0,64.509,17.931,64.509,39.971v11.826H38.27c-3.882,0-7.123,2.962-7.47,6.829L18.035,200.784
                            c-0.188,2.098,0.514,4.177,1.935,5.731s3.43,2.439,5.535,2.439h157.926c0.006,0,0.014,0,0.02,0c4.143,0,7.5-3.358,7.5-7.5
                            C190.95,201.037,190.916,200.626,190.85,200.227z M79.509,39.971c0-13.769,11.2-24.971,24.967-24.971
                            c13.768,0,24.969,11.202,24.969,24.971v11.826H79.509V39.971z M33.709,193.955L45.127,66.797h19.382v13.412
                            c0,4.142,3.357,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5V66.797h49.936v13.412c0,4.142,3.357,7.5,7.5,7.5c4.143,0,7.5-3.358,7.5-7.5
                            V66.797h19.364l11.418,127.158H33.709z"></path>
              </svg>

              <?php echo '<span class="etnos-header__main-toolbar-cart-count">' . esc_html($woocommerce->cart->get_cart_contents_count()) . '</span>'; ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>