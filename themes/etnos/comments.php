<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Etnos
 */


if ( post_password_required() ) {
	return;
} ?>

<?php // Comment list
$comment_list = get_comments_number( get_the_id() );
if( $comment_list > 0 ) : ?>
    <h3 class="etnos-blog--single__comments-title"><?php printf( _nx( '1 comment', '<span class="count">%1$s Comments</span>', get_comments_number(), 'comments', 'etnos' ),
			number_format_i18n( get_comments_number() ) ); ?></h3>
	<?php wp_list_comments( array( 'callback' => 'etnos_comment', 'style' => 'div' ) ); ?>


<?php endif; ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'etnos' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older comments', 'etnos' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer comments &rarr;', 'etnos' ) ); ?></div>
    </nav>
<?php endif; ?>


<?php

$fields = array(
	'author' => '<input required id="name" type="text" name="author" placeholder="' . esc_attr__( 'Your name', 'etnos' ) . '" size="30" tabindex="1" />',
	'email'  => '<input required id="email" type="email" name="email" placeholder="' . esc_attr__( 'Your email', 'etnos' ) . '" size="30" tabindex="2" />',
);

$comments_args = array(
	'id_form'              => 'contactform',
	'fields'               => $fields,
	'comment_field'        => '<div class="form-group"><textarea required id="comment" name="comment" placeholder="' . esc_attr__( 'Your comment', 'etnos' ) . '" rows="8" cols="60" tabindex="3"></textarea>',
	'must_log_in'          => '',
	'logged_in_as'         => '',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'title_reply'          => sprintf( esc_html__( 'Leave a comment', 'etnos' ) ),
	'title_reply_to'       => esc_html__( 'Leave a reply to %s', 'etnos' ),
	'cancel_reply_link'    => esc_html__( 'Cancel', 'etnos' ),
	'label_submit'         => esc_html__( 'Submit Now', 'etnos' ),
	'submit_field'         => '</div><div class="input-wrapper clearfix">%1$s %2$s<span id="message"></span></div>',
);
?>
<div class="etnos-blog--single__comments-form">
	<?php comment_form( $comments_args ); ?>
</div>
