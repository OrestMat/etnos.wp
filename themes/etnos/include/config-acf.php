<?php


// Customize ACF path
add_filter('acf/settings/path', 'etnos_acf_settings_path');

function etnos_acf_settings_path($path)
{

    // update path
    $path = get_stylesheet_directory() . '/acf/';

    // return
    return $path;
}


// Customize ACF dir
add_filter('acf/settings/dir', 'etnos_acf_settings_dir');

function etnos_acf_settings_dir($dir)
{

    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';

    // return
    return $dir;
}

// Customize JSON save path
add_filter('acf/settings/save_json', 'etnos_acf_json_save_point');

function etnos_acf_json_save_point($path)
{

    // update path
    $path = get_stylesheet_directory() . '/acf-json';

    // return
    return $path;
}

// Customize JSON load path
add_filter('acf/settings/load_json', 'etnos_acf_json_load_point');

function etnos_acf_json_load_point($paths)
{

    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';

    // return
    return $paths;
}


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
}



// Include ACF
include_once(get_stylesheet_directory() . '/acf/acf.php');

/**
 * Check page content blocks
 * @param array $page_content - array with page blocks
 * @param string $block_slug - slug with needed block
 * @return html
 **/

if (!function_exists('display_page_blocks')) {
    function display_page_blocks($page_content = array())
    {
        if (is_array($page_content) && !empty($page_content)) {
            global $page_block;
            foreach ($page_content as $page_block) {
                $block_slug = $page_block['acf_fc_layout'];

                get_template_part("/page-layouts/" . $block_slug . "/" . $block_slug);


                $file_path_css = "/page-layouts/" . $block_slug . "/assets/css/" . $block_slug  . ".css";
                $file_path_js = "/page-layouts/" . $block_slug . "/assets/js/" . $block_slug  . ".js";
                if (file_exists(get_stylesheet_directory() . $file_path_css)) {
                    wp_enqueue_style('etnos-layout-css-' . $block_slug, ETNOS_T_URI . $file_path_css);
                }

                if (file_exists(get_template_directory() . $file_path_js)) {
                    wp_enqueue_script('etnos-layout-js-' . $block_slug, ETNOS_T_URI . $file_path_js, array('jquery'), '', true);
                }
            }
        }
    }
}

/**
 * Get link
 * @param array $link - acf link object
 * @param string $link_class - class added to link
 * @return html
 */
if (!function_exists('get_acf_link')) {

    function get_acf_link($link = '', $link_class = '')
    {

        if (empty($link))
            return;

        (empty($link['target'])) ? $target = '' : $target = 'target="' . $link['target'] . '"';
        (empty($link_class)) ? $class = '' : $class = 'class="' . $link_class . '"';
        return '<a href="' . $link['url'] . '" ' . $class . ' ' . $target . '>' . $link['title'] . '</a>';
    }
}
