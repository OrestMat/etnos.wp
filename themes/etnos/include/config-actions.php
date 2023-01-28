<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Etnos
 */

add_action('tgmpa_register', 'etnos_include_required_plugins');
add_action('widgets_init', 'etnos_widgets_init');
add_action('after_setup_theme', 'etnos_content_width', 0);
add_action('wp_enqueue_scripts', 'etnos_enqueue_scripts');
add_action('etnos_search', 'etnos_search_popup', 10);

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function etnos_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'etnos-page';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('etnos-enable-sidebar')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}

add_filter('body_class', 'etnos_body_classes');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function etnos_content_width()
{
	$GLOBALS['content_width'] = apply_filters('etnos_content_width', 1200);
}


/**
 * Register widget area.
 */
function etnos_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'etnos'),
		'id'            => 'etnos-sidebar',
		'description'   => esc_html__('Add widgets here.', 'etnos'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Login', 'etnos'),
		'id'            => 'etnos-login',
		'description'   => esc_html__('Add widgets here.', 'etnos'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}

/**
 * Enqueue scripts and styles.
 */
function etnos_enqueue_scripts()
{

	// general settings
	if ((is_admin())) {
		return;
	}

	if (is_page() || is_home()) {
		$post_id = get_queried_object_id();
	} else {
		$post_id = get_the_ID();
	}



	if (is_404()) {
		wp_enqueue_style('etnos-error-page', ETNOS_T_URI . '/assets/css/error-page/error-page.css');
	}

	if (is_archive() || is_author() || is_category() || is_home() || is_tag() || is_search()) {
		wp_enqueue_style('etnos-blog-list', ETNOS_T_URI . '/assets/css/blog/blog-list.css');
	}

	if (is_single() && !(is_archive() || is_author() || is_category() || is_home() || is_tag())) {
		wp_enqueue_style('etnos-blog-single', ETNOS_T_URI . '/assets/css/blog/blog-single.css');
	}

	if (is_active_sidebar('etnos-sidebar') && !(is_home() || is_front_page())) {
		wp_enqueue_style('etnos-sidebar', ETNOS_T_URI . '/assets/css/blog/sidebar.css');
	}

	// wp_enqueue_style( 'fonts-awesome', ETNOS_T_URI . '/assets/css/lib/awesome.css' );
	wp_enqueue_style('swiper', ETNOS_T_URI . '/assets/css/lib/swiper-bundle.css');
	wp_enqueue_style('fonts-futura', ETNOS_T_URI . '/assets/fonts/Futura/stylesheet.css');
	wp_enqueue_style('etnos-main-style', ETNOS_T_URI . '/assets/css/style.css');
	wp_enqueue_style('etnos-style', ETNOS_T_URI . '/style.css');

	// add TinyMCE style
	add_editor_style();

	// including jQuery plugins
	wp_localize_script(
		'etnos-script',
		'get',
		array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'siteurl' => get_template_directory_uri(),
		)
	);

	if (is_singular()) {
		wp_enqueue_script('comment-reply');
	}

	wp_enqueue_script('swiper', ETNOS_T_URI . '/assets/js/lib/swiper-bundle.js', array('jquery'), '', true);
	wp_enqueue_script('etnos-script', ETNOS_T_URI . '/assets/js/script.min.js', array('jquery'), '', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
