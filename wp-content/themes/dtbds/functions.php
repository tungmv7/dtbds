<?php

require_once('wp_bootstrap_navwalker.php');

function dtbds_setup() {
//    /*
//     * Make theme available for translation.
//     * Translations can be filed in the /languages/ directory.
//     * If you're building a theme based on Twenty Sixteen, use a find and replace
//     * to change 'twentysixteen' to the name of your theme in all the template files
//     */
//    load_theme_textdomain( 'dtbds', get_template_directory() . '/languages' );
//
//    // Add default posts and comments RSS feed links to head.
//    add_theme_support( 'automatic-feed-links' );
//
//    /*
//     * Let WordPress manage the document title.
//     * By adding theme support, we declare that this theme does not use a
//     * hard-coded <title> tag in the document head, and expect WordPress to
//     * provide it for us.
//     */
//    add_theme_support( 'title-tag' );
//
//    /*
//     * Enable support for Post Thumbnails on posts and pages.
//     *
//     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
//     */
//    add_theme_support( 'post-thumbnails' );
//    set_post_thumbnail_size( 1200, 9999 );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'top_menu' => __( 'Primary Menu', 'dtbds' ),
    ) );

//    /*
//     * Switch default core markup for search form, comment form, and comments
//     * to output valid HTML5.
//     */
//    add_theme_support( 'html5', array(
//        'search-form',
//        'comment-form',
//        'comment-list',
//        'gallery',
//        'caption',
//    ) );

}
add_action( 'after_setup_theme', 'dtbds_setup' );