<?php
/**
 * Index Page
 *
 * @package etnos
 * @since 1.0
 *
 */

get_header();

$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
$term  = get_query_var( 's' );

$args = array(
	'post_type' => 'post',
	'paged'     => $paged,
);

if ( is_search() ) {
	$args['s'] = $term;
}

$posts = new WP_Query( $args );

if ( $posts->have_posts() ) :
	get_template_part( 'template-parts/blog', 'list' );
else : ?>

<div class="etnos-blog--wrapper etnos-blog--search-page">
  <div class="container">
    <h3 class="etnos-blog--search-page__title"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'etnos' ); ?>
    </h3>
    <div class="etnos-blog--search-page__search-form">
      <?php get_search_form( true ); ?>
    </div>
  </div>
</div>
<?php endif;

get_footer();