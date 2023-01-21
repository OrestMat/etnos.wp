<?php


// Customize ACF path
add_filter('acf/settings/path', 'orthalign_acf_settings_path');

function orthalign_acf_settings_path( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf/';

    // return
    return $path;

}


// Customize ACF dir
add_filter('acf/settings/dir', 'orthalign_acf_settings_dir');

function orthalign_acf_settings_dir( $dir ) {

    // update path
    $dir = get_stylesheet_directory_uri() . '/acf/';

    // return
    return $dir;

}

// Customize JSON save path
add_filter('acf/settings/save_json', 'orthalign_acf_json_save_point');

function orthalign_acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/acf-json';

    // return
    return $path;

}

// Customize JSON load path
add_filter('acf/settings/load_json', 'orthalign_acf_json_load_point');

function orthalign_acf_json_load_point( $paths ) {

    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';

    // return
    return $paths;

}


// Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );

//Add an Options Page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'orthalign General Settings',
		'menu_title'	=> 'orthalign Settings',
		'menu_slug' 	=> 'orthalign-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));



}

if (!function_exists('display_page_blocks')) {

    function display_page_blocks($page_content = array())
    {
        if (is_array($page_content) && !empty($page_content)) {

            global $page_block;

            foreach ($page_content as $page_block) {
                $block_slug = $page_block['acf_fc_layout'];
				
                get_template_part("/template-parts/blocks/" . $block_slug);
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