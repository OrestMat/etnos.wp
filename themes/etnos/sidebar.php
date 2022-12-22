<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Etnos
 */

if ( ! is_active_sidebar( 'etnos-sidebar' ) ) {
	return;
}
?>

<div class="col-12 col-lg-4">
    <div class="etnos-blog--sidebar">
		<?php dynamic_sidebar( 'etnos-sidebar' ); ?>
    </div>
</div>

