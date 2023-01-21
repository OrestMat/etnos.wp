<?php
/**
 * Custom Page Template
 */

get_header();

while (have_posts()) : the_post();

    the_content();

endwhile;


echo '<main>';
	$page_content = get_field( 'page_content' );

	display_page_blocks( $page_content ); 
echo '</main>';


get_footer();