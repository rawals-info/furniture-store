<?php
/**
 * New Stylo Furniture Theme
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
    
    // Set custom image sizes for better quality
    set_post_thumbnail_size(800, 800, true); // Default thumbnail size
    add_image_size('product-card', 800, 800, false); // Product card size - high quality
    add_image_size('product-large', 1200, 1200, false); // Product detail page
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'furniture-stylo'),
        'footer' => __('Footer Menu', 'furniture-stylo'),
    ));
}
add_action('after_setup_theme', 'furniture_stylo_setup');

// Override WooCommerce default image sizes for higher quality
add_filter('woocommerce_get_image_size_thumbnail', function($size) {
    return array(
        'width'  => 800,
        'height' => 800,
        'crop'   => 0,
    );
});

add_filter('woocommerce_get_image_size_single', function($size) {
    return array(
        'width'  => 1200,
        'height' => 1200,
        'crop'   => 0,
    );
});

add_filter('woocommerce_get_image_size_gallery_thumbnail', function($size) {
    return array(
        'width'  => 300,
        'height' => 300,
        'crop'   => 0,
    );
});

// Increase upload file size limit
function furniture_stylo_increase_upload_size($size) {
    return 64 * 1024 * 1024; // 64MB
}
add_filter('upload_size_limit', 'furniture_stylo_increase_upload_size');
add_filter('site_upload_size_limit', 'furniture_stylo_increase_upload_size');

// Increase maximum file upload size
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

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
    
    // Get only parent WooCommerce product categories (parent = 0)
    $parent_categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => 0
    ));
    
    if (!empty($parent_categories) && !is_wp_error($parent_categories)) {
        foreach ($parent_categories as $parent_category) {
            // Get child categories for this parent
            $child_categories = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
                'orderby' => 'name',
                'order' => 'ASC',
                'parent' => $parent_category->term_id
            ));
            
            // Check if this category has children
            if (!empty($child_categories) && !is_wp_error($child_categories)) {
                // Parent with children - add dropdown
                echo '<li class="menu-item-has-children">';
                echo '<a href="' . get_term_link($parent_category) . '">' . esc_html($parent_category->name) . '</a>';
                echo '<ul class="sub-menu">';
                
                // Add parent category link as first item in dropdown
                echo '<li><a href="' . get_term_link($parent_category) . '">All ' . esc_html($parent_category->name) . '</a></li>';
                
                // Add child categories
                foreach ($child_categories as $child_category) {
                    echo '<li><a href="' . get_term_link($child_category) . '">' . esc_html($child_category->name) . '</a></li>';
                }
                
                echo '</ul>';
                echo '</li>';
            } else {
                // Parent without children - simple link
                echo '<li><a href="' . get_term_link($parent_category) . '">' . esc_html($parent_category->name) . '</a></li>';
            }
        }
    }
    
    echo '<li><a href="/about">About</a></li>';
    echo '</ul>';
}

// SEO Optimized Page Titles
function furniture_stylo_document_title_parts($title) {
    if (is_home() || is_front_page()) {
        $title['title'] = 'New Stylo Furniture & Mattress - Premium Furniture in Mississauga';
        $title['tagline'] = 'Quality Dining Tables, Beds & Living Room Sets';
    } elseif (is_product_category()) {
        $category = get_queried_object();
        $title['title'] = $category->name . ' Furniture - New Stylo Furniture Mississauga';
        $title['tagline'] = 'Premium ' . $category->name . ' Collection';
    } elseif (is_page('about')) {
        $title['title'] = 'About Us - New Stylo Furniture & Mattress Mississauga';
        $title['tagline'] = 'Premium Furniture Store Since 2020';
    } elseif (is_page('contact')) {
        $title['title'] = 'Contact Us - New Stylo Furniture Mississauga';
        $title['tagline'] = 'Visit Our Showroom at 1456 Dundas St E';
    } elseif (is_shop()) {
        $title['title'] = 'Shop All Furniture - New Stylo Furniture Mississauga';
        $title['tagline'] = 'Premium Furniture & Mattresses';
    }
    
    return $title;
}
add_filter('document_title_parts', 'furniture_stylo_document_title_parts');

// Add SEO title separator
function furniture_stylo_document_title_separator($separator) {
    return ' | ';
}
add_filter('document_title_separator', 'furniture_stylo_document_title_separator');

// Add canonical URLs for better SEO
function furniture_stylo_canonical_url() {
    if (is_home() || is_front_page()) {
        echo '<link rel="canonical" href="' . home_url() . '" />' . "\n";
    } elseif (is_product_category()) {
        $category = get_queried_object();
        echo '<link rel="canonical" href="' . get_term_link($category) . '" />' . "\n";
    } elseif (is_page()) {
        echo '<link rel="canonical" href="' . get_permalink() . '" />' . "\n";
    }
}
add_action('wp_head', 'furniture_stylo_canonical_url');

// Add hreflang for Canadian market
function furniture_stylo_hreflang() {
    echo '<link rel="alternate" hreflang="en-ca" href="' . home_url() . '" />' . "\n";
}
add_action('wp_head', 'furniture_stylo_hreflang');

// Optimize images with proper alt tags
function furniture_stylo_optimize_images($content) {
    // Add alt tags to images that don't have them
    $content = preg_replace_callback('/<img([^>]*?)(?:\s+alt\s*=\s*["\']([^"\']*)["\'])?([^>]*?)>/i', function($matches) {
        $before_alt = $matches[1];
        $alt_text = isset($matches[2]) ? $matches[2] : '';
        $after_alt = $matches[3];
        
        // If no alt text, add descriptive alt text
        if (empty($alt_text)) {
            $alt_text = 'Premium furniture from New Stylo Furniture & Mattress in Mississauga';
        }
        
        return '<img' . $before_alt . ' alt="' . esc_attr($alt_text) . '"' . $after_alt . '>';
    }, $content);
    
    return $content;
}
add_filter('the_content', 'furniture_stylo_optimize_images');

// Add breadcrumb schema
function furniture_stylo_breadcrumb_schema() {
    if (is_product_category()) {
        $category = get_queried_object();
        echo '<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [
                {
                    "@type": "ListItem",
                    "position": 1,
                    "name": "Home",
                    "item": "' . home_url() . '"
                },
                {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "Shop",
                    "item": "' . wc_get_page_permalink('shop') . '"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "' . esc_js($category->name) . '",
                    "item": "' . get_term_link($category) . '"
                }
            ]
        }
        </script>';
    }
}
add_action('wp_head', 'furniture_stylo_breadcrumb_schema');

// Add robots.txt content
function furniture_stylo_robots_txt($output) {
    $output .= "Sitemap: " . home_url() . "/sitemap.xml\n";
    $output .= "Disallow: /wp-admin/\n";
    $output .= "Disallow: /wp-includes/\n";
    $output .= "Allow: /wp-content/uploads/\n";
    return $output;
}
add_filter('robots_txt', 'furniture_stylo_robots_txt');

// Add image optimization and lazy loading
function furniture_stylo_add_image_attributes($attr, $attachment, $size) {
    // Add loading="lazy" for better performance
    if (!isset($attr['loading'])) {
        $attr['loading'] = 'lazy';
    }
    
    // Add proper alt text if missing
    if (empty($attr['alt'])) {
        $attr['alt'] = 'Premium furniture from New Stylo Furniture & Mattress in Mississauga';
    }
    
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'furniture_stylo_add_image_attributes', 10, 3);

// Add preload for critical resources
function furniture_stylo_preload_resources() {
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/custom.css" as="style">' . "\n";
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" as="style">' . "\n";
}
add_action('wp_head', 'furniture_stylo_preload_resources', 1);

// Add meta viewport for mobile optimization
function furniture_stylo_viewport_meta() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">' . "\n";
}
add_action('wp_head', 'furniture_stylo_viewport_meta', 1);

// Generate XML Sitemap
function furniture_stylo_generate_sitemap() {
    // Check if this is a sitemap request
    if (isset($_GET['sitemap']) && $_GET['sitemap'] === 'xml') {
        // Set proper headers
        header('Content-Type: application/xml; charset=utf-8');
        
        // Start XML output
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";
        
        // Homepage
        echo '<url>' . "\n";
        echo '<loc>' . home_url() . '</loc>' . "\n";
        echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
        echo '<changefreq>weekly</changefreq>' . "\n";
        echo '<priority>1.0</priority>' . "\n";
        echo '</url>' . "\n";
        
        // Shop Page
        if (function_exists('wc_get_page_permalink')) {
            echo '<url>' . "\n";
            echo '<loc>' . wc_get_page_permalink('shop') . '</loc>' . "\n";
            echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
            echo '<changefreq>weekly</changefreq>' . "\n";
            echo '<priority>0.9</priority>' . "\n";
            echo '</url>' . "\n";
        }
        
        // About Page
        echo '<url>' . "\n";
        echo '<loc>' . home_url('/about') . '</loc>' . "\n";
        echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
        echo '<changefreq>monthly</changefreq>' . "\n";
        echo '<priority>0.8</priority>' . "\n";
        echo '</url>' . "\n";
        
        // Contact Page
        echo '<url>' . "\n";
        echo '<loc>' . home_url('/contact') . '</loc>' . "\n";
        echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
        echo '<changefreq>monthly</changefreq>' . "\n";
        echo '<priority>0.8</priority>' . "\n";
        echo '</url>' . "\n";
        
        // Product Categories
        if (function_exists('get_terms')) {
            $categories = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
            ));
            
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    echo '<url>' . "\n";
                    echo '<loc>' . get_term_link($category) . '</loc>' . "\n";
                    echo '<lastmod>' . date('Y-m-d') . '</lastmod>' . "\n";
                    echo '<changefreq>weekly</changefreq>' . "\n";
                    echo '<priority>0.7</priority>' . "\n";
                    echo '</url>' . "\n";
                }
            }
        }
        
        // Individual Products
        if (function_exists('wc_get_products')) {
            $products = wc_get_products(array(
                'limit' => -1,
                'status' => 'publish'
            ));
            
            if (!empty($products)) {
                foreach ($products as $product) {
                    echo '<url>' . "\n";
                    echo '<loc>' . $product->get_permalink() . '</loc>' . "\n";
                    echo '<lastmod>' . $product->get_date_modified()->date('Y-m-d') . '</lastmod>' . "\n";
                    echo '<changefreq>monthly</changefreq>' . "\n";
                    echo '<priority>0.6</priority>' . "\n";
                    
                    // Add product image
                    if ($product->get_image_id()) {
                        echo '<image:image>' . "\n";
                        echo '<image:loc>' . wp_get_attachment_image_url($product->get_image_id(), 'large') . '</image:loc>' . "\n";
                        echo '<image:title>' . esc_html($product->get_name()) . '</image:title>' . "\n";
                        echo '<image:caption>' . esc_html($product->get_short_description() ?: $product->get_description()) . '</image:caption>' . "\n";
                        echo '</image:image>' . "\n";
                    }
                    
                    echo '</url>' . "\n";
                }
            }
        }
        
        echo '</urlset>';
        exit;
    }
}
add_action('init', 'furniture_stylo_generate_sitemap');

/**
 * Check if a product's brand equals 'aclass'
 * Checks multiple possible brand storage methods
 * 
 * @param WC_Product|int $product Product object or product ID
 * @return bool True if brand equals 'aclass' (case-insensitive)
 */
function furniture_stylo_is_aclass_brand($product) {
    // If product ID is passed, get the product object
    if (is_numeric($product)) {
        $product = wc_get_product($product);
    }
    
    if (!$product) {
        return false;
    }
    
    $product_id = $product->get_id();
    
    // Check various possible brand storage locations
    $brand = '';
    
    // 1. Check custom field (post meta) - common field names
    $brand_meta_keys = array('brand', '_brand', 'product_brand', '_product_brand', 'pa_brand');
    foreach ($brand_meta_keys as $meta_key) {
        $meta_value = get_post_meta($product_id, $meta_key, true);
        if (!empty($meta_value)) {
            $brand = $meta_value;
            break;
        }
    }
    
    // 2. Check product attribute 'brand'
    if (empty($brand)) {
        $brand_attr = $product->get_attribute('brand');
        if (!empty($brand_attr)) {
            $brand = $brand_attr;
        }
    }
    
    // 3. Check pa_brand taxonomy (product attribute taxonomy)
    if (empty($brand)) {
        $brand_terms = wp_get_post_terms($product_id, 'pa_brand', array('fields' => 'names'));
        if (!empty($brand_terms) && !is_wp_error($brand_terms)) {
            $brand = $brand_terms[0];
        }
    }
    
    // 4. Check for any taxonomy with 'brand' in the name
    if (empty($brand)) {
        $taxonomies = get_object_taxonomies('product', 'names');
        foreach ($taxonomies as $taxonomy) {
            if (stripos($taxonomy, 'brand') !== false) {
                $terms = wp_get_post_terms($product_id, $taxonomy, array('fields' => 'names'));
                if (!empty($terms) && !is_wp_error($terms)) {
                    $brand = $terms[0];
                    break;
                }
            }
        }
    }
    
    // Compare brand (case-insensitive)
    return !empty($brand) && strtolower(trim($brand)) === 'aclass';
}
