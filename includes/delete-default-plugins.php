<?php
// Delete "Hello Dolly" and "Akismet Anti-Spam" plugins
function cmca_delete_default_plugins() {
    $plugins = array(
        'hello.php',
        'hello-dolly/hello.php',
        'akismet/akismet.php'
    );
    
    foreach ( $plugins as $plugin ) {
        if ( file_exists( WP_PLUGIN_DIR . '/' . $plugin ) ) {
            delete_plugins( array( $plugin ) );
        }
    }
}
add_action( 'admin_init', 'cmca_delete_default_plugins' );
