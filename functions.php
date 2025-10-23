<?php
/**
 * Layout Theme functions and definitions
 */

if ( ! defined( 'LAYOUT_THEME_VERSION' ) ) {
    define( 'LAYOUT_THEME_VERSION', '1.0.0' );
}

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 60,
        'width'  => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    register_nav_menus([
        'primary' => __('Primary Menu', 'layout-theme'),
        'footer'  => __('Footer Menu', 'layout-theme'),
    ]);
});

/**
 * Enqueue styles and scripts
 */
add_action('wp_enqueue_scripts', function () {
    // main theme stylesheet (style.css in theme root)
    wp_enqueue_style('layout-theme-style', get_stylesheet_uri(), [], LAYOUT_THEME_VERSION);
    // custom assets
    wp_enqueue_style('layout-custom', get_template_directory_uri() . '/assets/css/style.css', [], LAYOUT_THEME_VERSION);
    wp_enqueue_script('layout-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], LAYOUT_THEME_VERSION, true);
});

/**
 * Include Customizer controls
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Helper to echo theme image URL (inside assets/images)
 */
function layout_asset($path) {
    echo esc_url( get_template_directory_uri() . '/' . ltrim($path, '/') );
}
