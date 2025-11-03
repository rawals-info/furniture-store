<?php
/**
 * The homepage template
 * 
 * @package FurnitureStylo
 */

get_header(); ?>

<!-- Local SEO Content Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "New Stylo Furniture & Mattress - Premium Furniture in Mississauga",
    "description": "Premium furniture and mattresses in Mississauga. Quality dining tables, beds, living room sets, and home decor. Visit our showroom at 1456 Dundas St E.",
    "url": "<?php echo home_url(); ?>",
    "mainEntity": {
        "@type": "FurnitureStore",
        "name": "New Stylo Furniture & Mattress",
        "description": "Premium furniture and mattresses in Mississauga. Quality dining tables, beds, living room sets, and home decor.",
        "url": "<?php echo home_url(); ?>",
        "telephone": "(905) 270-0666",
        "email": "stylofurniture1456@gmail.com",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "1456 Dundas St E",
            "addressLocality": "Mississauga",
            "addressRegion": "ON",
            "postalCode": "L4X 1L4",
            "addressCountry": "CA"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "43.6532",
            "longitude": "-79.3832"
        },
        "openingHours": [
            "Mo-Th 10:30-20:30",
            "Fr-Su 11:00-19:00"
        ],
        "areaServed": [
            {
                "@type": "City",
                "name": "Mississauga"
            },
            {
                "@type": "City", 
                "name": "Toronto"
            },
            {
                "@type": "City",
                "name": "Brampton"
            },
            {
                "@type": "City",
                "name": "Oakville"
            }
        ]
    }
}
</script>

<main id="main" class="site-main" style="padding-top: 0 !important; margin-top: 0 !important;">
    <!-- Hero Section -->
    <section class="hero-section" style="margin-top: 0 !important; padding-top: 0 !important;">
        <div class="hero-slider">
            <div class="hero-slide active">
                <div class="hero-image" style="background: linear-gradient(135deg, rgba(139, 69, 19, 0.8), rgba(160, 82, 45, 0.6)), url('https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'); background-size: cover; background-position: center;"></div>
                <div class="hero-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="hero-title">Transform Your Space</h1>
                                <p class="hero-subtitle">Discover our curated collection of premium furniture and home decor that brings style and comfort to your home.</p>
                                <div class="hero-buttons">
                                    <a href="<?php echo function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/shop'); ?>" class="btn btn-primary">Shop Now</a>
                                    <a href="#featured-products" class="btn btn-outline">View Collection</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="featured-categories">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Shop by Category</h2>
                <p class="section-subtitle">Explore our carefully curated furniture collections</p>
            </div>
            
            <div class="row">
                <?php
                // Get WooCommerce product categories (excluding Shop All)
                $categories = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'number' => 4, // Limit to 4 categories for homepage
                    'exclude' => array(), // We'll filter out 'shop-all' if it exists
                ));
                
                // Filter out 'shop-all' category if it exists
                $filtered_categories = array();
                foreach ($categories as $category) {
                    if (strtolower($category->slug) !== 'shop-all' && strtolower($category->name) !== 'shop all') {
                        $filtered_categories[] = $category;
                    }
                }
                $categories = $filtered_categories;
                
                $category_images = array(
                    'bed' => get_template_directory_uri() . '/assets/images/beds.jpg',
                    'beds' => get_template_directory_uri() . '/assets/images/beds.jpg',
                    'dining-table' => get_template_directory_uri() . '/assets/images/dining-table.png',
                    'dining-tables' => get_template_directory_uri() . '/assets/images/dining-table.png',
                    'sofa' => get_template_directory_uri() . '/assets/images/living-room.jpg',
                    'sofas' => get_template_directory_uri() . '/assets/images/living-room.jpg',
                    'living-room' => get_template_directory_uri() . '/assets/images/living-room.jpg',
                    'living-rooms' => get_template_directory_uri() . '/assets/images/living-room.jpg',
                    'living-room-set' => get_template_directory_uri() . '/assets/images/living-room.jpg',
                    'seating' => get_template_directory_uri() . '/assets/images/living-room.jpg',
                    'coffee-table' => get_template_directory_uri() . '/assets/images/coffee-table.jpg',
                    'coffee-tables' => get_template_directory_uri() . '/assets/images/coffee-table.jpg',
                    'mattress' => 'https://images.unsplash.com/photo-1540932239986-30128078f3c5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
                );
                
                $category_descriptions = array(
                    'bed' => 'Comfortable beds and bed frames for a perfect night\'s sleep',
                    'dining-table' => 'Elegant dining tables and chairs for family gatherings',
                    'sofa' => 'Elegant sofas and seating solutions for your living space',
                    'coffee-table' => 'Stylish coffee tables and side tables to complement your space',
                    'mattress' => 'Premium mattresses for ultimate comfort and support'
                );
                
                if (!empty($categories) && !is_wp_error($categories)) :
                    foreach ($categories as $category) :
                        $slug = $category->slug;
                        // Debug: Show category slug (remove this line after debugging)
                        // echo '<!-- Category slug: ' . $slug . ' -->';
                        $image = isset($category_images[$slug]) ? $category_images[$slug] : 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                        $description = isset($category_descriptions[$slug]) ? $category_descriptions[$slug] : 'Quality furniture for your home';
                ?>
                    <div class="col-lg-3 col-md-6">
                        <a href="<?php echo get_term_link($category); ?>" class="category-card-link">
                            <div class="category-card">
                                <div class="category-image">
                                    <img src="<?php echo $image; ?>" alt="<?php echo $category->name; ?>">
                                </div>
                                <div class="category-content">
                                    <h3><?php echo $category->name; ?></h3>
                                    <p><?php echo $description; ?></p>
                                    <div class="category-link">Shop <?php echo $category->name; ?> <i class="fas fa-arrow-right"></i></div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php 
                    endforeach;
                else :
                ?>
                    <div class="col-12 text-center">
                        <p>No product categories found. Please add some categories in WordPress admin.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="featured-products" class="featured-products">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-title">Featured Products</h2>
                <p class="section-subtitle">Handpicked pieces that define modern living</p>
            </div>
            
            <div class="row">
                <?php
                // Get featured products using the proper WooCommerce method
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 8,
                    'meta_query' => array(
                        array(
                            'key' => '_featured',
                            'value' => 'yes',
                            'compare' => '='
                        )
                    ),
                    'post_status' => 'publish'
                );
                
                // Try the new method first (WooCommerce 3.0+)
                $featured_products = function_exists('wc_get_featured_product_ids') ? wc_get_featured_product_ids() : array();
                
                if (!empty($featured_products)) {
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 8,
                        'post__in' => $featured_products,
                        'post_status' => 'publish'
                    );
                }
                
                $products = new WP_Query($args);
                
                if ($products->have_posts()) :
                    while ($products->have_posts()) : $products->the_post();
                        global $product;
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 product-item">
                        <div class="product-card">
                            <div class="product-image" style="position: relative;">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php 
                                    if (has_post_thumbnail()) {
                                        echo get_the_post_thumbnail(get_the_ID(), 'large', array('class' => 'img-fluid'));
                                    } else {
                                        echo '<img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=90" alt="Product Image" class="img-fluid">';
                                    }
                                    ?>
                                </a>
                                <?php if (furniture_stylo_is_aclass_brand($product)) : ?>
                                    <div style="position: absolute; top: 15px; left: 15px; z-index: 2;">
                                                        <span class="badge canadian-made" style="display: inline-block; padding: 6px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; background: linear-gradient(135deg, #D4AF37, #B8860B); color: white; border: 2px solid #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">100% Canadian-Made</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="product-content">
                                <div class="product-category">
                                    <?php 
                                    $categories = get_the_terms(get_the_ID(), 'product_cat');
                                    if ($categories && !is_wp_error($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </div>
                                <h3 class="product-title">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="product-price">
                                    <?php echo $product->get_price_html(); ?>
                                </div>
                                <div class="product-buttons">
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary">
                                        VIEW DETAILS
                                    </a>
                                    <a href="/contact" class="btn btn-outline">
                                        CONTACT
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback: Show recent products if no featured products found
                    $fallback_args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 8,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    
                    $fallback_products = new WP_Query($fallback_args);
                    
                    if ($fallback_products->have_posts()) :
                        while ($fallback_products->have_posts()) : $fallback_products->the_post();
                            global $product;
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6 product-item">
                        <div class="product-card">
                            <div class="product-image">
                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                    <?php 
                                    if (has_post_thumbnail()) {
                                        echo get_the_post_thumbnail(get_the_ID(), 'large', array('class' => 'img-fluid'));
                                    } else {
                                        echo '<img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=90" alt="Product Image" class="img-fluid">';
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="product-category">
                                    <?php 
                                    $categories = get_the_terms(get_the_ID(), 'product_cat');
                                    if ($categories && !is_wp_error($categories)) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </div>
                                <h3 class="product-title">
                                    <a href="<?php echo esc_url(get_permalink()); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <div class="product-price">
                                    <?php echo $product->get_price_html(); ?>
                                </div>
                                <div class="product-buttons">
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary">
                                        VIEW DETAILS
                                    </a>
                                    <a href="/contact" class="btn btn-outline">
                                        CONTACT
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                ?>
                    <div class="col-12 text-center">
                        <p>No products found. Please add some products in WordPress admin.</p>
                    </div>
                <?php 
                    endif;
                endif; ?>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>Why Choose New Stylo Furniture?</h2>
                        <p>We believe that furniture should be more than just functional—it should be a reflection of your personal style and a source of comfort in your daily life.</p>
                        
                        <div class="features">
                            <div class="feature-item">
                                <i class="fas fa-award"></i>
                                <div>
                                    <h4>Premium Quality</h4>
                                    <p>Handcrafted pieces made from the finest materials</p>
                                </div>
                            </div>
                            
                            <div class="feature-item">
                                <i class="fas fa-shipping-fast"></i>
                                <div>
                                    <h4>Fast Delivery</h4>
                                    <p>Quick and reliable shipping to your doorstep</p>
                                </div>
                            </div>
                            
                            <div class="feature-item">
                                <i class="fas fa-headset"></i>
                                <div>
                                    <h4>Expert Support</h4>
                                    <p>Dedicated customer service team to help you</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="about-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us.jpg" alt="About Us">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    /* Featured Products - Use same styling as shop page */
    .featured-products .product-item {
        padding: 0 15px !important;
        margin-bottom: 30px !important;
    }
    
    .featured-products .product-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .featured-products .product-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    }
    
    .featured-products .product-image {
        height: 350px;
        overflow: hidden;
        position: relative;
        background: #f8f9fa;
    }
    
    .featured-products .product-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    
    .featured-products .product-content {
        padding: 15px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .featured-products .product-category {
        font-size: 12px;
        color: #8B4513;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
    
    .featured-products .product-title {
        font-size: 15px;
        line-height: 1.3;
        margin-bottom: 8px;
        font-weight: 600;
        flex: 1;
    }
    
    .featured-products .product-title a {
        color: #2C2C2C;
        text-decoration: none;
    }
    
    .featured-products .product-title a:hover {
        color: #8B4513;
    }
    
    .featured-products .product-price {
        font-size: 18px;
        font-weight: 700;
        color: #8B4513;
        margin-bottom: 10px;
    }
    
    .featured-products .product-buttons {
        display: flex;
        gap: 10px;
        margin-top: auto;
    }
    
    .featured-products .product-buttons .btn {
        flex: 1;
        padding: 10px 15px;
        font-size: 12px;
        border-radius: 6px;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        border: none;
        font-weight: 600;
    }
    
    .featured-products .product-buttons .btn-primary {
        background: #8B4513;
        color: #fff;
    }
    
    .featured-products .product-buttons .btn-primary:hover {
        background: #A0522D;
    }
    
    .featured-products .product-buttons .btn-outline {
        background: transparent;
        color: #8B4513;
        border: 2px solid #8B4513;
    }
    
    .featured-products .product-buttons .btn-outline:hover {
        background: #8B4513;
        color: #fff;
    }
    
    /* Responsive for Featured Products */
    @media (max-width: 991px) {
        .featured-products .product-image {
            height: 300px;
        }
    }
    
    @media (max-width: 767px) {
        .featured-products .product-image {
            height: 220px;
        }
        
        .featured-products .product-content {
            padding: 12px;
        }
        
        .featured-products .product-title {
            font-size: 13px;
        }
        
        .featured-products .product-buttons {
            flex-direction: column;
            gap: 6px;
        }
    }
    </style>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2>Stay Updated</h2>
                    <p>Subscribe to our newsletter for the latest furniture trends and exclusive offers</p>
                    
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email address">
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
