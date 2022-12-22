
<div class="etnos-preloader"></div>

<div class="etnos-main-wrapper <?php echo !isset($_COOKIE['notification']) ? 'etnos-notification-active' : '';?>">
  <header class="etnos-header" id="etnos-header">
    <div class="etnos-header__wrap">

      <?php if($аlert_flag && !empty($аlert) && !isset($_COOKIE['notification'])):?>
      <div class="etnos-header__notification">
        <div class="container">
          <div class="etnos-header__notification-wrap">
            <i class="fas fa-exclamation"></i>

            <div class="etnos-header__notification-des">
              <?php echo wp_kses_post($аlert ); ?>
            </div>

            <button class="etnos-header__notification-close">×</button>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <div class="etnos-header__top">
        <div class="container">
          <div class="etnos-header__top-wrap">
            <?php if(!empty($notify)) {?>
            <div class="etnos-header__notify">
              <a href="<?php echo esc_url($notify_link ); ?>">
                <?php echo wp_kses_post($notify)?>
              </a>
            </div>
            <?php }?>

            <div class="etnos-header__login">
              <?php if ( is_active_sidebar( 'etnos-login' ) ){?>
              <i class="fas fa-user"></i>
              <?php dynamic_sidebar('etnos-login'); 
              } ?>
            </div>

            <div class="etnos-header__dropdown" id="etnos-header__dropdown">
              <span>
                ETNOS Websites
                <i class="fas fa-angle-down"></i>
              </span>

              <?php if(!empty($dropdown)) {?>
              <div class="etnos-header__dropdown-wrap">
                <ul>
                  <?php foreach($dropdown as $item ) { ?>
                  <li>
                    <a href="<?php echo esc_url($item['etnos_header_top_dropdown_link']); ?>"
                      target="_blank"><?php echo esc_html( $item['etnos_header_top_dropdown_name'] ); ?></a>
                  </li>
                  <?php }?>
                </ul>
              </div>
              <?php }?>

            </div>
          </div>
        </div>
      </div>

      <div class="etnos-header__main">
        <div class="container">
          <div class="etnos-header__main-wrap">
            <?php if(!empty($logo_header)) {?>
            <a class="etnos-header__main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <img height=64 width=64 src="<?php echo $logo_header; ?>" title="<?php echo get_option( 'blogname' ); ?>"
                alt="<?php echo get_option( 'blogname' ); ?>">
            </a>
            <?php }?>


            <div class="etnos-header__main-menu">
              <?php 
            if ( has_nav_menu( 'primary-menu' ) ) {
									$args                   = array( 'container' => '' );
									$args['theme_location'] = 'primary-menu';
									wp_nav_menu( $args );
								} 
            ?>
            </div>

            <div class="etnos-header__main-search">
              <button>
                <i class="fas fa-search"></i>
              </button>
              <input type="search" placeholder="Input your search">
            </div>

            <div class="etnos-header__main-hamburger">
              <div id="etnos-header__main-hamburger-btn">
                <span><i class="fas fa-bars"></i>Menu</span>
                <span>Close Menu<i class="fas fa-times"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="etnos-header__mega-menu" id="etnos-header__mega-menu">
        <div class="etnos-header__mega-menu-wrap">
          <?php 
            if ( has_nav_menu( 'mega-menu' ) ) {
									$args                   = array( 'container' => '' );
									$args['theme_location'] = 'mega-menu';
									wp_nav_menu( $args );
								} 
            ?>
        </div>
      </div>
    </div>

  </header>