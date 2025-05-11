<?php
// Disable comments site-wide
function cmca_disable_comments() {
    // Disable support for comments and trackbacks in post types
    foreach ( get_post_types() as $post_type ) {
        remove_post_type_support( $post_type, 'comments' );
        remove_post_type_support( $post_type, 'trackbacks' );
    }
    
    // Close comments on the front-end
    add_filter( 'comments_open', '__return_false', 20, 2 );
    add_filter( 'pings_open', '__return_false', 20, 2 );

    // Hide existing comments
    add_filter( 'comments_array', '__return_empty_array', 10, 2 );
}
add_action( 'init', 'cmca_disable_comments' );
