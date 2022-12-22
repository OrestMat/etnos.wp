<?php
/**
 * Archive Template
 */

get_header();

if ( have_posts() ) :
	get_template_part( 'template-parts/blog', 'list-category' );
else : ?>

    <div class="etnos-blog--wrapper etnos-blog--search-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="etnos-blog--search-page__title"><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'etnos' ); ?></h3>
                    <div class="etnos-blog--search-page__search-form">
						<?php get_search_form( true ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;

get_footer();