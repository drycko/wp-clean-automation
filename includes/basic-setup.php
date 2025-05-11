<?php
// Perform basic setup tasks like setting permalink structure and deleting default content
function cmca_basic_setup() {
    global $wp_rewrite;

    // Set permalink structure to "Post name"
    $wp_rewrite->set_permalink_structure( '/%postname%/' );
    $wp_rewrite->flush_rules();
    
    // Delete sample post
    $sample_post = get_post(1);
    if ( $sample_post && $sample_post->post_title == 'Hello world!' ) {
        wp_delete_post(1, true);
    }
    
    // Delete sample page
    $sample_page = get_post(2);
    if ( $sample_page && $sample_page->post_title == 'Sample Page' ) {
        wp_delete_post(2, true);
    }

    // Set homepage to a static page
    cmca_set_static_homepage();
}
add_action( 'after_switch_theme', 'cmca_basic_setup' );

// Function to set the homepage to a static page if available
function cmca_set_static_homepage() {
    // Query to get a page to use as the static homepage
    $homepage = get_page_by_title( 'Home' );
    
    if ( $homepage ) {
        // Set the static homepage to the page titled 'Home'
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $homepage->ID );
    } else {
        // Optional: create a 'Home' page if none exists
        $new_home = array(
            'post_title'   => 'Home',
            'post_content' => 'Welcome to your homepage!',
            'post_status'  => 'publish',
            'post_type'    => 'page',
        );
        $new_home_id = wp_insert_post( $new_home );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $new_home_id );
    }
}
