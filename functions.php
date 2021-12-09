<?php
// Refresh Permalinks after updates
// function cf_add_styles() {
// if (is_page('contact-us') || ('contact')) {
// wp_enqueue_style( 'cafefaucher-contact-css',get_template_directory_uri() . '/css/contact.css', 1);}
// if (is_page('about')) {
// wp_enqueue_style( 'cafefaucher-slider-css',get_template_directory_uri() . '/css/slider.css', 1);}
// }
// add_action( "wp_head", "cf_add_styles" );
function cf_scripts() {
// Add ajax
if (is_front_page()) {
    // Add Jquery 
wp_enqueue_script( 'custom-jquery', get_template_directory_uri() . '/js/jquery-1.12.3.min.js', array( 'jquery' ), '1.12.3', false );

wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/cf-ajax.js', array('jquery') );

wp_localize_script( 'ajax-script', 'cf_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
}
add_action( "wp_footer", "cf_scripts" );

//https://stackoverflow.com/questions/45661276/wordpress-ajax-load-posts-content-in-popup-div
function prefix_ajax_single_post() {
$pid = $_REQUEST['pID'];
global $post;
$post = get_post($pid);
setup_postdata($post);
if ( $pid == $post->ID) {
echo the_content();
} else {    
}
exit();
}
add_action('wp_ajax_prefix_ajax_single_post', 'prefix_ajax_single_post');
add_action('wp_ajax_nopriv_prefix_ajax_single_post', 'prefix_ajax_single_post');

/* =Clean up the WordPress head
------------------------------------------------- */

    // remove header links
    add_action('init', 'tjnz_head_cleanup');
    function tjnz_head_cleanup() {
        remove_action( 'wp_head', 'feed_links_extra', 3 );                      // Category Feeds
        remove_action( 'wp_head', 'feed_links', 2 );                            // Post and Comment Feeds
        remove_action( 'wp_head', 'rsd_link' );                                 // EditURI link
        remove_action( 'wp_head', 'wlwmanifest_link' );                         // Windows Live Writer
        remove_action( 'wp_head', 'index_rel_link' );                           // index link
        remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              // previous link
        remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               // start link
        remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   // Links for Adjacent Posts
        remove_action( 'wp_head', 'wp_generator' );                             // WP version
        if (!is_admin()) {
            wp_deregister_script('jquery');                                     // De-Register jQuery
            wp_register_script('jquery', '', '', '', true);                     // Register as 'empty', because we manually insert our script in header.php
        }
    }

    // remove WP version from RSS
    add_filter('the_generator', 'tjnz_rss_version');
    function tjnz_rss_version() { return ''; }



// Move Yoast to bottom
function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');