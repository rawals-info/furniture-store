<?php
/**
 * The template for displaying product content in the shop loop
 *
 * @package FurnitureStylo
 */

defined('ABSPATH') || exit;

global $product;

if (!$product || !$product->is_visible()) {
    return;
}
?>

<div class="col-lg-4 col-md-6 col-sm-12 product-item" style="flex: 0 0 33.333333% !important; max-width: 33.333333% !important; width: 33.333333% !important; float: none; display: block;">
    <div class="product-card">
        <div class="product-image">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <?php 
                if (has_post_thumbnail()) {
                    echo get_the_post_thumbnail(get_the_ID(), 'medium', array('class' => 'img-fluid'));
                } else {
                    echo '<img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Product Image" class="img-fluid">';
                }
                ?>
            </a>
            <div class="product-badges">
                <?php if ($product->is_featured()) : ?>
                    <span class="badge featured">Featured</span>
                <?php endif; ?>
                <?php if ($product->is_on_sale()) : ?>
                    <span class="badge sale">Sale</span>
                <?php endif; ?>
            </div>
            <div class="product-overlay">
                <div class="overlay-actions">
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="action-btn quick-view" title="Quick View">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="/contact" class="action-btn contact-btn" title="Contact for Price">
                        <i class="fas fa-phone"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-content">
            <div class="product-category">
                <?php
                $categories = get_the_terms(get_the_ID(), 'product_cat');
                if ($categories && !is_wp_error($categories)) {
                    echo '<span>' . $categories[0]->name . '</span>';
                }
                ?>
            </div>
            <h3 class="product-title">
                <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
            </h3>
            <div class="product-price">
                <?php echo $product->get_price_html(); ?>
            </div>
            <div class="product-actions">
                <a href="<?php echo esc_url(get_permalink()); ?>" class="btn btn-primary btn-sm">
                    <i class="fas fa-info-circle"></i> View Details
                </a>
                <a href="/contact" class="btn btn-outline btn-sm">
                    <i class="fas fa-envelope"></i> Contact
                </a>
            </div>
        </div>
    </div>
</div>

<style>
/* Fix Bootstrap grid for WooCommerce products */
.products-grid .row {
    display: flex !important;
    flex-wrap: wrap !important;
    margin-right: -15px !important;
    margin-left: -15px !important;
}

/* Reset WooCommerce default product styles */
.woocommerce ul.products {
    display: block !important;
    margin: 0 !important;
    padding: 0 !important;
    list-style: none !important;
}

.woocommerce ul.products li.product {
    width: auto !important;
    float: none !important;
    margin: 0 !important;
    padding: 0 !important;
    display: block !important;
}

/* Ensure Bootstrap columns work properly */
.product-item {
    margin-bottom: 30px !important;
    display: block !important;
    float: none !important;
    flex: 0 0 auto !important;
}

/* Force products to be half width - 2 per row */
.product-item {
    flex: 0 0 50% !important;
    max-width: 50% !important;
    position: relative !important;
    width: 50% !important;
    padding-right: 15px !important;
    padding-left: 15px !important;
    box-sizing: border-box !important;
}

/* Mobile: 1 product per row */
@media (max-width: 767px) {
    .product-item {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        width: 100% !important;
    }
}

/* Additional fixes for shop page layout */
.shop-content .products-grid .row {
    display: flex !important;
    flex-wrap: wrap !important;
    margin: 0 -15px !important;
}

.shop-content .product-item {
    padding: 0 15px !important;
    margin-bottom: 30px !important;
}

.product-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    height: 100%;
    border: 1px solid #f0f0f0;
    position: relative;
}

.product-card:hover {
    box-shadow: 0 10px 35px rgba(0,0,0,0.12);
    border-color: #8B4513;
}

.product-image {
    position: relative;
    height: 280px;
    overflow: hidden;
    background: #f8f9fa;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.product-badges {
    position: absolute;
    top: 15px;
    left: 15px;
    z-index: 2;
}

.badge {
    display: inline-block;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-right: 8px;
    margin-bottom: 8px;
}

.badge.featured {
    background: linear-gradient(135deg, #8B4513, #A0522D);
    color: white;
}

.badge.sale {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
}

.product-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(139, 69, 19, 0.9), rgba(160, 82, 45, 0.8));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
}

.product-card:hover .product-overlay {
    opacity: 1;
}

.overlay-actions {
    display: flex;
    gap: 15px;
}

.action-btn {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.action-btn.quick-view {
    background: rgba(255,255,255,0.2);
    color: white;
    border: 2px solid rgba(255,255,255,0.3);
}

.action-btn.quick-view:hover {
    background: white;
    color: #8B4513;
    transform: scale(1.1);
}

.action-btn.contact-btn {
    background: white;
    color: #8B4513;
    border: 2px solid white;
}

.action-btn.contact-btn:hover {
    background: transparent;
    color: white;
    transform: scale(1.1);
}

.product-content {
    padding: 25px 20px;
}

.product-category {
    margin-bottom: 8px;
}

.product-category span {
    font-size: 12px;
    color: #8B4513;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.product-title {
    font-size: 18px;
    margin-bottom: 12px;
    line-height: 1.4;
}

.product-title a {
    color: #2C2C2C;
    text-decoration: none;
    transition: color 0.3s ease;
}

.product-title a:hover {
    color: #8B4513;
}

.product-price {
    font-size: 22px;
    font-weight: 700;
    color: #8B4513;
    margin-bottom: 20px;
}

.product-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.product-actions .btn {
    flex: 1;
    min-width: 120px;
    padding: 10px 15px;
    font-size: 14px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.product-actions .btn-primary {
    background: linear-gradient(135deg, #8B4513, #A0522D);
    color: white;
    border: none;
}

.product-actions .btn-primary:hover {
    background: linear-gradient(135deg, #A0522D, #8B4513);
}

.product-actions .btn-outline {
    background: transparent;
    color: #8B4513;
    border: 2px solid #8B4513;
}

.product-actions .btn-outline:hover {
    background: #8B4513;
    color: white;
}

@media (max-width: 768px) {
    .product-item {
        margin-bottom: 20px;
    }
    
    .product-image {
        height: 220px;
    }
    
    .product-content {
        padding: 20px 15px;
    }
    
    .product-title {
        font-size: 16px;
    }
    
    .product-price {
        font-size: 20px;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .product-actions .btn {
        min-width: auto;
        width: 100%;
    }
    
    .overlay-actions {
        gap: 10px;
    }
    
    .action-btn {
        width: 45px;
        height: 45px;
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .product-image {
        height: 200px;
    }
    
    .product-content {
        padding: 15px 12px;
    }
    
    .product-title {
        font-size: 15px;
    }
    
    .product-price {
        font-size: 18px;
    }
}

/* SUPER SPECIFIC OVERRIDE - MUST BE LAST */
body .shop-page .products-grid .row .product-item,
body .shop-content .products-grid .row .product-item,
body .woocommerce-page .products-grid .row .product-item {
    flex: 0 0 50% !important;
    max-width: 50% !important;
    width: 50% !important;
    position: relative !important;
    padding-right: 15px !important;
    padding-left: 15px !important;
    box-sizing: border-box !important;
    float: none !important;
    display: block !important;
}

/* Mobile override */
@media (max-width: 767px) {
    body .shop-page .products-grid .row .product-item,
    body .shop-content .products-grid .row .product-item,
    body .woocommerce-page .products-grid .row .product-item {
        flex: 0 0 100% !important;
        max-width: 100% !important;
        width: 100% !important;
    }
}
</style>