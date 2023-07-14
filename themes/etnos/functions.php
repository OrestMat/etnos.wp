<?php

/**
 * Etnos functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Etnos
 */

defined('ETNOS_T_URI') or define('ETNOS_T_URI', get_template_directory_uri());
defined('ETNOS_T_PATH') or define('ETNOS_T_PATH', get_template_directory());

require_once ABSPATH . 'wp-admin/includes/plugin.php';
require_once ETNOS_T_PATH . '/include/config-acf.php';
require_once ETNOS_T_PATH . '/include/config-actions.php';
require_once ETNOS_T_PATH . '/include/woo-config.php';
// require_once ETNOS_T_PATH . '/include/optimization.php';


if (!function_exists('etnos_setup')) :

  function etnos_setup()
  {

    register_nav_menus(array('primary-menu' => esc_html__('Primary menu', 'etnos')));
    register_nav_menus(array('footer-main-menu' => esc_html__('Footer menu', 'etnos')));

    load_theme_textdomain('etnos', get_template_directory() . '/languages');


    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('post-formats', array(
      'aside',
      'gallery',
      'link',
      'image',
      'quote',
      'status',
      'video',
      'audio',
      'chat'
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('etnos_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ));
  }
endif;

add_action('after_setup_theme', 'etnos_setup');

// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);


if (!class_exists('etnos_top_posts')) {
  class etnos_top_posts extends WP_Widget
  {

    function __construct()
    {

      parent::__construct(

        'etnos_top_posts',

        esc_html__('Etnos Popular Posts', 'etnos'),

        array('description' => __('Popular posts.', 'etnos'),)

      );
    }

    public function widget($args, $instance)
    {

      $title = apply_filters('widget_title', $instance['title']);

      echo $args['before_widget'];

      if (!empty($title)) { ?>
        <h4 class="widget-title"><?php echo esc_html($title); ?></h4>
        <?php }


      $popular = new WP_Query(array(
        'posts_per_page' => 4,
        'meta_key'       => 'post_views_count',
        'orderby'        => 'meta_value_num',
        'order'          => 'DESC'
      ));

      $counter = 1;

      if ($popular->have_posts()) : while ($popular->have_posts()) : $popular->the_post();
          $image_id  = get_post_thumbnail_id(get_the_ID());
          $top_class = !empty($image_id) ? 'image' : ''; ?>
          <div class="etnos-widget-popular--item">
            <div class="etnos-widget-popular--image <?php echo esc_attr($top_class); ?>">
              <span><?php echo esc_html($counter); ?></span>
              <?php if ($image_id) {
                $image     = wp_get_attachment_image_url($image_id, 'thumbnail');
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); ?>

                <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($image_alt); ?>">
              <?php } ?>
            </div>
            <div class="etnos-widget-popular--content">
              <a href="<?php the_permalink(); ?>">
                <h5><?php the_title(); ?></h5>
              </a>
              <div class="etnos-widget-popular--author">
                <span><b><?php echo esc_html(get_the_author()); ?></b></span>
                <span><?php echo sprintf(esc_html__('%s ago', 'etnos'), human_time_diff(get_the_time('U'), current_time('timestamp'))); ?></span>
              </div>
            </div>
          </div>
      <?php
          $counter++;
        endwhile;
      endif;
      wp_reset_query();


      echo $args['after_widget'];
    }

    public function form($instance)
    {

      if (isset($instance['title'])) {
        $title = $instance['title'];
      } else {
        $title = esc_html__('Top Picks', 'etnos');
      } ?>

      <p>

        <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'etnos'); ?></label>

        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />

      </p>

<?php

    }

    public function update($new_instance, $old_instance)
    {

      $instance = array();

      $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

      return $instance;
    }
  }
}

if (!class_exists('etnos_register_widget')) {
  function etnos_register_widget()
  {
    register_widget('etnos_top_posts');
  }

  add_action('widgets_init', 'etnos_register_widget');
}

add_image_size('etnos-post-large', 350, 350, true);

if (!function_exists('etnos_reading_time')) {
  function etnos_reading_time($post_id)
  {
    $content = get_post_field('post_content', $post_id);

    $word_count       = str_word_count(strip_tags($content));
    $readingtime      = ceil($word_count / 200);
    $totalreadingtime = $readingtime . ' min';

    $countKey = 'post_reading_count';
    $count    = get_post_meta($post_id, $countKey, true);
    if ($count == '') {
      delete_post_meta($post_id, $countKey);
      add_post_meta($post_id, $countKey, $totalreadingtime);
    } else {
      update_post_meta($post_id, $countKey, $totalreadingtime);
    }

    return $totalreadingtime;
  }
}


if (!function_exists('etnos_add_rel_preload')) {
  function etnos_add_rel_preload($html, $handle, $href, $media)
  {

    if (is_admin()) {
      return $html;
    }

    $html = <<<EOT
<link rel="preload stylesheet preconnect" as="style" id="$handle" href="$href" type="text/css" media="$media" crossorigin />
EOT;


    return $html;
  }
}

if (!function_exists('etnos_mime_types')) {
  function etnos_mime_types($mimes)
  {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }

  add_filter('upload_mimes', 'etnos_mime_types');
}


function isLink($data)
{
  $el = $data;

  echo $el['is_external'] ? ' target="_blank" ' : ' target="_self" ';
  echo $el['nofollow'] ? ' rel="nofollow" ' : '';
  echo $el['url'] ? ' href="' . esc_url($el['url']) . '" ' : '';
  echo $el['custom_attributes'] ? ' ' . esc_attr($el['custom_attributes']) . ' ' : '';
}


add_image_size('custom-size', 350, 188);





// Додати дію AJAX для отримання кількості товарів у корзині
add_action('wp_ajax_get_cart_count', 'get_cart_count');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count');
function get_cart_count()
{
  $count = WC()->cart->get_cart_contents_count();
  echo json_encode(array('count' => $count));
  wp_die();
}


add_filter('woocommerce_cart_needs_shipping_address', '__return_false');




add_filter('woocommerce_currencies', 'add_my_currency');
function add_my_currency($currencies)
{
  $currencies['UAH'] = __('Українська гривня', 'woocommerce');
  return $currencies;
}


add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol($currency_symbol, $currency)
{
  switch ($currency) {
    case 'UAH':
      $currency_symbol = 'грн';
      break;
  }
  return $currency_symbol;
}
