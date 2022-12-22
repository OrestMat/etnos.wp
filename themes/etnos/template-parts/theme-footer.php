

</div>

<footer class="etnos-footer">
  <div class="container">
    <div class="etnos-footer__wrap">
      <div class="etnos-footer__top">
        <div class="etnos-footer__top-header">
          <?php if(!empty($etnos_footer_social_title)) {?>
          <h3><?php echo esc_html($etnos_footer_social_title); ?></h3>
          <?php }?>
        </div>

        <ul class="etnos-footer__top-social">
          <?php if(!empty($social)) {?>
          <?php foreach($social as $item ) { ?>
          <li>
            <a href="<?php echo esc_url($item['etnos_footer_social_link']); ?>"
              class="<?php echo esc_attr($item['etnos_footer_social_icon'])?>"
              title="<?php echo esc_html($item['etnos_footer_social_name']); ?>"
              aria-label="<?php echo esc_html($item['etnos_footer_social_name']); ?>" target="_blank" rel="noopener"></a>
          </li>
          <?php }?>
          <?php }?>
        </ul>
      </div>

      <div class="etnos-footer__menu">
        <?php 
            if ( has_nav_menu( 'footer-main-menu' ) ) {
									$args                   = array( 'container' => '' );
									$args['theme_location'] = 'footer-main-menu';
									wp_nav_menu( $args );
								} 
            ?>
      </div>


      <div class="etnos-footer__content">
        <?php if(!empty($logo)) {?>
        <div class="etnos-footer__content-logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img height=64 width=64 src="<?php echo $logo; ?>" title="<?php echo get_option( 'blogname' ); ?>"
              alt="<?php echo get_option( 'blogname' ); ?>">
          </a>
        </div>
        <?php }?>

        <div class="etnos-footer__content-wrap">
          <div class="etnos-footer__content-mobile-menu">

            <?php 
            if ( has_nav_menu( 'footer-mobile-menu' ) ) {
									$args                   = array( 'container' => '' );
									$args['theme_location'] = 'footer-mobile-menu';
									wp_nav_menu( $args );
								} 
            ?>

          </div>
          <div class="etnos-footer__content-about">
            <?php echo wp_kses_post($about); ?>
          </div>
          <div class="etnos-footer__content-location">
            <?php echo wp_kses_post($location); ?>
          </div>
          <div class="etnos-footer__content-websites ">
            <?php echo wp_kses_post($websites); ?>
          </div>
        </div>
      </div>

      <div class="etnos-footer__bottom">
        <p class="etnos-footer__bottom-copyright"><?php echo wp_kses_post($copyright); ?></p>

        <?php 
            if ( has_nav_menu( 'footer-second-menu' ) ) {
									$args                   = array( 'container' => '' );
									$args['theme_location'] = 'footer-second-menu';
									wp_nav_menu( $args );
								} 
            ?>

        <ul class=" etnos-footer__bottom-social">
          <?php if(!empty($social)) {?>
          <?php foreach($social as $item ) { ?>
          <li>
            <a href="<?php echo esc_url($item['etnos_footer_social_link']); ?>"
              class="<?php echo esc_attr($item['etnos_footer_social_icon'])?>"
              title="<?php echo esc_html($item['etnos_footer_social_name']); ?>"
              aria-label="<?php echo esc_html($item['etnos_footer_social_name']); ?>" target="_blank" rel="noopener"></a>
          </li>
          <?php }?>
          <?php }?>
        </ul>
      </div>
    </div>
  </div>
</footer>