<?php
/**
 * Furniture Stylo Theme
 * A modern, elegant theme for furniture stores
 * 
 * @package FurnitureStylo
 * @version 1.0.1
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function furniture_stylo_setup() {
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'furniture-stylo'),
        'footer' => __('Footer Menu', 'furniture-stylo'),
    ));
}
add_action('after_setup_theme', 'furniture_stylo_setup');

// Enqueue styles and scripts
function furniture_stylo_scripts() {
    // Main stylesheet
    wp_enqueue_style('furniture-stylo-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Bootstrap CSS - Load BEFORE custom CSS so our overrides work
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0');
    
    // Custom CSS - Load AFTER Bootstrap so our styles override Bootstrap defaults
    wp_enqueue_style('furniture-stylo-custom', get_template_directory_uri() . '/assets/css/custom.css', array('bootstrap'), '1.0.1');
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');
    
    // Custom JavaScript
    wp_enqueue_script('furniture-stylo-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true);
    
    // Bootstrap JS
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'furniture_stylo_scripts');

// Register widget areas
function furniture_stylo_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'furniture-stylo'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'furniture-stylo'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer Widgets', 'furniture-stylo'),
        'id'            => 'footer-widgets',
        'description'   => __('Add footer widgets here.', 'furniture-stylo'),
        'before_widget' => '<div class="col-md-3"><div class="footer-widget">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'furniture_stylo_widgets_init');

// Custom excerpt length
function furniture_stylo_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'furniture_stylo_excerpt_length');

// Custom excerpt more
function furniture_stylo_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'furniture_stylo_excerpt_more');

// WooCommerce customizations
function furniture_stylo_woocommerce_setup() {
    if (function_exists('is_woocommerce')) {
        // Remove default WooCommerce styles
        add_filter('woocommerce_enqueue_styles', '__return_empty_array');
    }
}
add_action('after_setup_theme', 'furniture_stylo_woocommerce_setup');

// Add custom body classes
function furniture_stylo_body_classes($classes) {
    if (function_exists('is_woocommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) {
        $classes[] = 'woocommerce-page';
    }
    return $classes;
}
add_filter('body_class', 'furniture_stylo_body_classes');

// Fallback menu for when no menu is set
function furniture_stylo_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . home_url('/') . '">Home</a></li>';
    
    // Get WooCommerce product categories
    $categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));
    
    if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
            echo '<li><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
        }
    }
    
    echo '<li><a href="/about">About</a></li>';
    echo '</ul>';
}
