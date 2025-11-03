<?php
/**
 * The template for displaying product archives (shop page)
 * 
 * @package FurnitureStylo
 */

// Handle products per page
$products_per_page = isset($_GET['posts_per_page']) ? intval($_GET['posts_per_page']) : 50;
if ($products_per_page < 1 || $products_per_page > 200) {
    $products_per_page = 50;
}

// Modify WooCommerce products per page
add_filter('loop_shop_per_page', function() use ($products_per_page) {
    return $products_per_page;
});

get_header(); 

// Get current category for SEO
$current_category = get_queried_object();
?>

<!-- Product Category Schema -->
<?php if ($current_category && !is_wp_error($current_category)): ?>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "<?php echo esc_js($current_category->name); ?> Furniture - New Stylo Furniture",
    "description": "Shop premium <?php echo esc_js(strtolower($current_category->name)); ?> furniture in Mississauga. Quality <?php echo esc_js(strtolower($current_category->name)); ?> at New Stylo Furniture & Mattress.",
    "url": "<?php echo esc_url(get_term_link($current_category)); ?>",
    "mainEntity": {
        "@type": "ItemList",
        "name": "<?php echo esc_js($current_category->name); ?> Furniture Collection",
        "description": "Premium <?php echo esc_js(strtolower($current_category->name)); ?> furniture available at New Stylo Furniture in Mississauga",
        "numberOfItems": "<?php echo $current_category->count; ?>",
        "itemListElement": [
            <?php
            $products = wc_get_products(array(
                'category' => array($current_category->slug),
                'limit' => 10,
                'status' => 'publish'
            ));
            
            $product_schemas = array();
            foreach ($products as $index => $product) {
                $product_schemas[] = '{
                    "@type": "Product",
                    "name": "' . esc_js($product->get_name()) . '",
                    "description": "' . esc_js(wp_strip_all_tags($product->get_short_description() ?: $product->get_description())) . '",
                    "url": "' . esc_url($product->get_permalink()) . '",
                    "image": "' . esc_url(wp_get_attachment_image_url($product->get_image_id(), 'large')) . '",
                    "brand": {
                        "@type": "Brand",
                        "name": "New Stylo Furniture"
                    },
                    "offers": {
                        "@type": "Offer",
                        "price": "' . $product->get_price() . '",
                        "priceCurrency": "CAD",
                        "availability": "' . ($product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock') . '",
                        "seller": {
                            "@type": "Organization",
                            "name": "New Stylo Furniture & Mattress"
                        }
                    }
                }';
            }
            echo implode(',', $product_schemas);
            ?>
        ]
    }
}
</script>
<?php endif; ?>

<main id="main" class="site-main shop-page woocommerce-page" style="padding-top: 0 !important; margin-top: 0 !important;">
    <!-- Shop Hero Section -->
    <section class="shop-hero" style="margin-top: 0 !important; padding-top: 80px !important; padding-bottom: 60px !important;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="shop-title">Our Furniture Collection</h1>
                    <p class="shop-subtitle">Discover our curated selection of premium furniture and home decor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Shop Content -->
    <div class="shop-content">
        <div class="container-fluid" style="max-width: 95%; padding: 0 20px;">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-2">
                    <div class="shop-sidebar" style="padding-right: 30px;">
                        <!-- Categories -->
                        <div class="widget categories-widget">
                            <h3>Categories</h3>
                            <ul class="category-list">
                                <li><a href="<?php echo wc_get_page_permalink('shop'); ?>">All Products</a></li>
                                <?php
                                $categories = get_terms(array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => true,
                                ));
                                
                                // Get current category if we're on a category page
                                $current_category = null;
                                if (is_product_category()) {
                                    $current_category = get_queried_object();
                                }
                                
                                foreach ($categories as $category) :
                                    // Skip the current category if we're viewing it
                                    if ($current_category && $category->term_id === $current_category->term_id) {
                                        continue;
                                    }
                                ?>
                                    <li><a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <!-- Contact Info -->
                        <div class="widget contact-widget">
                            <h3>Need Help?</h3>
                            <p>Our experts are here to help you find the perfect furniture for your space.</p>
                            <a href="/contact" class="btn btn-primary">Contact Us</a>
                        </div>
                    </div>
                </div>
                
                <!-- Products Grid -->
                <div class="col-lg-10">
                    <div class="shop-toolbar">
                        <div class="toolbar-content">
                            <div class="results-section">
                                <p class="results-count">
                                    <?php
                                        // This will be updated after the query is created
                                        echo "Loading products...";
                                    ?>
                                </p>
                            </div>
                            <div class="controls-section">
                                    <div class="products-per-page">
                                        <label for="products-per-page">Products per page:</label>
                                        <select id="products-per-page" class="sort-dropdown" onchange="changeProductsPerPage(this.value)">
                                            <option value="12" <?php echo (isset($_GET['posts_per_page']) && $_GET['posts_per_page'] == 12) ? 'selected' : ''; ?>>12</option>
                                            <option value="24" <?php echo (isset($_GET['posts_per_page']) && $_GET['posts_per_page'] == 24) ? 'selected' : ''; ?>>24</option>
                                            <option value="50" <?php echo (!isset($_GET['posts_per_page']) || $_GET['posts_per_page'] == 50) ? 'selected' : ''; ?>>50 (Default)</option>
                                            <option value="100" <?php echo (isset($_GET['posts_per_page']) && $_GET['posts_per_page'] == 100) ? 'selected' : ''; ?>>100</option>
                                            <option value="200" <?php echo (isset($_GET['posts_per_page']) && $_GET['posts_per_page'] == 200) ? 'selected' : ''; ?>>200</option>
                                    </select>
                                    </div>
                                    <div class="pagination-controls">
                                        <div class="page-dropdown">
                                            <label for="page-select">Page:</label>
                                            <select id="page-select" class="sort-dropdown" onchange="changePage(this.value)">
                                                <option value="1">1</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="products-grid">
                        <div class="row" style="display: flex !important; flex-wrap: wrap !important; margin: 0 -15px !important; width: 100% !important;">
                            <?php 
                            // Create a new query with our products per page setting
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => $products_per_page,
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                                'post_status' => 'publish'
                            );
                            
                            // Add category filter if we're on a category page
                            if (is_product_category()) {
                                $args['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'slug',
                                        'terms'    => get_queried_object()->slug,
                                    ),
                                );
                            }
                            
                            $products_query = new WP_Query($args);
                            
                            // Update the results count with actual numbers
                            $displayed_count = $products_query->post_count;
                            $total_count = $products_query->found_posts;
                            ?>
                            
                            <script>
                            // Update the results count and pagination display
                            document.addEventListener('DOMContentLoaded', function() {
                                const resultsCount = document.querySelector('.results-count');
                                const pageSelect = document.getElementById('page-select');
                                const paginationControls = document.querySelector('.pagination-controls');
                                
                                if (resultsCount) {
                                    resultsCount.textContent = 'Showing <?php echo $displayed_count; ?> of <?php echo $total_count; ?> products';
                                }
                                
                                if (pageSelect && paginationControls) {
                                    const currentPage = <?php echo get_query_var('paged') ? get_query_var('paged') : 1; ?>;
                                    const maxPages = <?php echo $products_query->max_num_pages; ?>;
                                    
                                    // Clear existing options
                                    pageSelect.innerHTML = '';
                                    
                                    // Add page options
                                    for (let i = 1; i <= maxPages; i++) {
                                        const option = document.createElement('option');
                                        option.value = i;
                                        option.textContent = i;
                                        if (i === currentPage) {
                                            option.selected = true;
                                        }
                                        pageSelect.appendChild(option);
                                    }
                                    
                                    // Add Previous/Next buttons
                                    let paginationHTML = '';
                                    
                                    if (currentPage > 1) {
                                        paginationHTML += '<a href="<?php echo add_query_arg('paged', (get_query_var('paged') ? get_query_var('paged') : 1) - 1); ?>" class="pagination-btn prev-btn"><i class="fas fa-chevron-left"></i> Previous</a>';
                                    }
                                    
                                    paginationHTML += '<div class="page-dropdown"><label for="page-select">Page:</label><select id="page-select" class="sort-dropdown" onchange="changePage(this.value)">';
                                    for (let i = 1; i <= maxPages; i++) {
                                        paginationHTML += '<option value="' + i + '"' + (i === currentPage ? ' selected' : '') + '>' + i + '</option>';
                                    }
                                    paginationHTML += '</select></div>';
                                    
                                    if (currentPage < maxPages) {
                                        paginationHTML += '<a href="<?php echo add_query_arg('paged', (get_query_var('paged') ? get_query_var('paged') : 1) + 1); ?>" class="pagination-btn next-btn">Next <i class="fas fa-chevron-right"></i></a>';
                                    }
                                    
                                    paginationControls.innerHTML = paginationHTML;
                                }
                            });
                            
                            function changePage(pageNumber) {
                                const url = new URL(window.location);
                                url.searchParams.set('paged', pageNumber);
                                window.location.href = url.toString();
                            }
                            </script>
                            
                            <?php if ($products_query->have_posts()) : ?>
                                <?php while ($products_query->have_posts()) : $products_query->the_post(); ?>
                                    <?php 
                                    global $product;
                                    if (!$product || !$product->is_visible()) {
                                        continue;
                                    }
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 product-item">
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
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php else : ?>
                                <div class="col-12">
                                    <div class="no-products">
                                        <div class="no-products-icon">
                                            <i class="fas fa-search"></i>
                                        </div>
                                        <h3>No Products Found</h3>
                                        <p>We couldn't find any products matching your criteria. Try adjusting your search or browse our categories.</p>
                                        <div class="no-products-actions">
                                            <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-primary">View All Products</a>
                                            <a href="/contact" class="btn btn-outline">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="pagination-wrapper">
                            <?php
                            the_posts_pagination(array(
                                'prev_text' => '<i class="fas fa-chevron-left"></i> Previous',
                                'next_text' => 'Next <i class="fas fa-chevron-right"></i>',
                            ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
/* Shop Toolbar Layout */
.shop-toolbar {
    background: #fff;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.toolbar-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

.results-section {
    flex: 1;
    min-width: 200px;
}

.controls-section {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.products-per-page {
    display: flex;
    align-items: center;
    gap: 10px;
}

.products-per-page label {
    font-weight: 600;
    color: #2C2C2C;
    white-space: nowrap;
    font-size: 14px;
}

.pagination-controls {
    display: flex;
    align-items: center;
    gap: 10px;
}

.page-dropdown {
    display: flex;
    align-items: center;
    gap: 8px;
}

.page-dropdown label {
    font-weight: 600;
    color: #2C2C2C;
    white-space: nowrap;
    font-size: 14px;
}

/* Product Grid Layout */
.shop-page .products-grid .row {
    display: flex !important;
    flex-wrap: wrap !important;
    margin: 0 -15px !important;
    width: 100% !important;
}

.shop-page .products-grid .product-item {
    padding: 0 15px !important;
    margin-bottom: 30px !important;
    box-sizing: border-box !important;
}

/* Product Card Styling */
.shop-page .product-item {
    flex: 0 0 33.333333% !important;
    max-width: 33.333333% !important;
    position: relative !important;
    width: 33.333333% !important;
}

.shop-page .product-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.shop-page .product-image {
    height: 350px;
    overflow: hidden;
    position: relative;
    background: #f8f9fa;
}

.shop-page .product-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.shop-page .product-content {
    padding: 15px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.shop-page .product-category {
    font-size: 12px;
    color: #8B4513;
    font-weight: 600;
    text-transform: uppercase;
    margin-bottom: 5px;
}

.shop-page .product-title {
    font-size: 15px;
    line-height: 1.3;
    margin-bottom: 8px;
    font-weight: 600;
    flex: 1;
}

.shop-page .product-title a {
    color: #2C2C2C;
    text-decoration: none;
}

.shop-page .product-title a:hover {
    color: #8B4513;
}

.shop-page .product-price {
    font-size: 18px;
    font-weight: 700;
    color: #8B4513;
    margin-bottom: 10px;
}

.shop-page .product-buttons {
    display: flex;
    gap: 10px;
    margin-top: auto;
}

.shop-page .product-buttons .btn {
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

.shop-page .product-buttons .btn-primary {
    background: #8B4513;
    color: #fff;
}

.shop-page .product-buttons .btn-primary:hover {
    background: #A0522D;
}

.shop-page .product-buttons .btn-outline {
    background: transparent;
    color: #8B4513;
    border: 2px solid #8B4513;
}

.shop-page .product-buttons .btn-outline:hover {
    background: #8B4513;
    color: #fff;
}

/* Desktop: 3 products per row */
@media (min-width: 992px) {
    .shop-page .product-item {
    flex: 0 0 33.333333% !important;
    max-width: 33.333333% !important;
    width: 33.333333% !important;
    }
}

/* Tablet: 2 products per row */
@media (max-width: 991px) and (min-width: 768px) {
    .shop-page .product-item {
        flex: 0 0 50% !important;
        max-width: 50% !important;
        width: 50% !important;
    }
    
    .shop-page .product-image {
        height: 300px;
    }
}

/* Mobile: 2 products per row with square images */
@media (max-width: 767px) {
    .shop-page .product-item {
        flex: 0 0 50% !important;
        max-width: 50% !important;
        width: 50% !important;
    }
    
    .shop-page .product-image {
        height: 220px;
    }
    
    .shop-page .product-content {
        padding: 12px;
    }
    
    .shop-page .product-title {
        font-size: 13px;
    }
    
    .shop-page .product-price {
        font-size: 16px;
    }
    
    .shop-page .product-buttons {
        flex-direction: column;
        gap: 6px;
    }
    
    .shop-page .product-buttons .btn {
        padding: 8px 12px;
        font-size: 11px;
    }
    
    /* Mobile toolbar adjustments */
    .toolbar-content {
        flex-direction: column;
        align-items: stretch;
        gap: 15px;
    }
    
    .controls-section {
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .products-per-page {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
    
    .pagination-controls {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }
}

/* Extra small mobile: 1 product per row */
@media (max-width: 480px) {
    .shop-page .product-item {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        width: 100% !important;
    }
    
    .shop-page .product-image {
        height: 280px;
    }
}

/* Shop page styles */
.shop-page {
    padding-top: 120px;
}

.shop-hero {
    background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
    color: white;
    padding: 80px 0;
    margin-bottom: 60px;
}

.shop-title {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 20px;
    font-family: 'Playfair Display', serif;
}

.shop-subtitle {
    font-size: 20px;
    opacity: 0.9;
    margin: 0;
}

.shop-sidebar {
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.widget {
    margin-bottom: 40px;
}

.widget:last-child {
    margin-bottom: 0;
}

.widget h3 {
    font-size: 20px;
    color: #2C2C2C;
    margin-bottom: 20px;
    font-family: 'Playfair Display', serif;
    border-bottom: 2px solid #8B4513;
    padding-bottom: 10px;
}

.category-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-list li {
    margin-bottom: 10px;
}

.category-list a {
    color: #666;
    text-decoration: none;
    padding: 8px 0;
    display: block;
    transition: color 0.3s ease;
}

.category-list a:hover {
    color: #8B4513;
}

.contact-widget p {
    color: #666;
    margin-bottom: 20px;
}

.shop-toolbar {
    background: #fff;
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.results-count {
    margin: 0;
    color: #666;
    font-size: 16px;
    font-weight: 500;
}

.sort-options {
    display: flex;
    align-items: center;
    gap: 10px;
}

.sort-options label {
    color: #666;
    font-weight: 500;
    margin: 0;
    font-size: 14px;
}

.sort-dropdown {
    background: #fff;
    border: 2px solid #e5e5e5;
    border-radius: 10px;
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 500;
    color: #2C2C2C;
    min-width: 180px;
    cursor: pointer;
    transition: all 0.3s ease;
    appearance: none;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%238B4513' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 15px center;
    background-repeat: no-repeat;
    background-size: 18px;
    padding-right: 45px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.sort-dropdown:focus {
    outline: none;
    border-color: #8B4513;
    box-shadow: 0 0 0 3px rgba(139, 69, 19, 0.15), 0 4px 12px rgba(139, 69, 19, 0.1);
    transform: translateY(-1px);
}

.sort-dropdown:hover {
    border-color: #8B4513;
    box-shadow: 0 4px 12px rgba(139, 69, 19, 0.15);
    transform: translateY(-1px);
}

.products-per-page {
    display: flex;
    align-items: center;
    gap: 12px;
}

.products-per-page label {
    font-weight: 600;
    color: #2C2C2C;
    white-space: nowrap;
    font-size: 14px;
}

.sort-options label {
    font-weight: 600;
    color: #2C2C2C;
    white-space: nowrap;
    font-size: 14px;
}

.pagination-controls {
    display: flex;
    align-items: center;
    gap: 15px;
}

.pagination-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 8px 16px;
    background: #8B4513;
    color: #ffffff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 500;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.pagination-btn:hover {
    background: #A0522D;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
    color: #ffffff;
    text-decoration: none;
}

.page-info {
    font-size: 13px;
    font-weight: 500;
    color: #2C2C2C;
    padding: 8px 12px;
    background: #f8f9fa;
    border-radius: 6px;
    border: 1px solid #e5e5e5;
}

.page-dropdown {
    display: flex;
    align-items: center;
    gap: 8px;
}

.page-dropdown label {
    font-weight: 600;
    color: #2C2C2C;
    white-space: nowrap;
    font-size: 13px;
}

.products-grid {
    margin-bottom: 60px;
    width: 100%;
}

.no-products {
    text-align: center;
    padding: 80px 20px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.no-products-icon {
    margin-bottom: 30px;
}

.no-products-icon i {
    font-size: 64px;
    color: #8B4513;
    opacity: 0.7;
}

.no-products h3 {
    color: #2C2C2C;
    margin-bottom: 15px;
    font-size: 28px;
}

.no-products p {
    color: #666;
    margin-bottom: 30px;
    font-size: 16px;
    line-height: 1.6;
}

.no-products-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.pagination-wrapper {
    text-align: center;
    margin-top: 40px;
}

@media (max-width: 768px) {
    .shop-title {
        font-size: 36px;
    }
    
    .shop-sidebar {
        margin-bottom: 30px;
    }
    
    .shop-toolbar {
        padding: 15px 20px;
    }
    
    .sort-options {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }
    
    .sort-dropdown {
        min-width: 100%;
        width: 100%;
    }
    
    .results-count {
        text-align: center;
        margin-bottom: 15px;
    }
}
</style>

<script>
function changeProductsPerPage(value) {
    const url = new URL(window.location);
    url.searchParams.set('posts_per_page', value);
    url.searchParams.delete('paged'); // Reset to first page
    window.location.href = url.toString();
}
</script>

<?php get_footer(); ?>
