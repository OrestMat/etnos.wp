<?php
/**
 * 404 Page
 */

get_header(); ?>

    <div class="etnos-error--wrap">

        <div class="etnos-error--big-title"><?php esc_html_e( 'OOPS!', 'etnos' ); ?></div>

        <div class="etnos-error--small-title"><?php esc_html_e( '404', 'etnos' ); ?></div>

        <h1 class="etnos-error--title"><?php esc_html_e( 'Page not found', 'etnos' ); ?></h1>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="etnos-error--button"><?php esc_html_e( 'Go home', 'etnos' ); ?></a>

    </div>

<?php get_footer();
