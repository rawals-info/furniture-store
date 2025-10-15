<?php
/**
 * The template for displaying single product pages
 * 
 * @package FurnitureStylo
 */

// Remove WooCommerce breadcrumbs
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

get_header(); ?>

<main id="main" class="site-main single-product-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php while (have_posts()) : the_post(); ?>
                    <?php global $product; ?>
                    
                    <div class="product-detail-wrapper">
                        <div class="row">
                            <!-- Product Images -->
                            <div class="col-lg-6">
                                <div class="product-images">
                                    <div class="main-image">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" class="img-fluid lightbox-trigger" data-src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-product.jpg" alt="Product Image" class="img-fluid lightbox-trigger" data-src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder-product.jpg">
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php
                                    $gallery_images = $product->get_gallery_image_ids();
                                    if ($gallery_images) :
                                    ?>
                                        <div class="gallery-thumbnails">
                                            <?php foreach ($gallery_images as $image_id) : ?>
                                                <div class="thumbnail">
                                                    <img src="<?php echo wp_get_attachment_image_url($image_id, 'thumbnail'); ?>" alt="Gallery Image" class="img-fluid lightbox-trigger" data-src="<?php echo wp_get_attachment_image_url($image_id, 'full'); ?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Product Info -->
                            <div class="col-lg-6">
                                <div class="product-info">
                                    
                                    <h1 class="product-title"><?php the_title(); ?></h1>
                                    
                                    <div class="product-price">
                                        <?php echo $product->get_price_html(); ?>
                                    </div>
                                    
                                    <div class="product-description">
                                        <?php the_content(); ?>
                                    </div>
                                    
                                    <div class="product-meta">
                                        <?php if ($product->get_sku()) : ?>
                                            <p><strong>SKU:</strong> <?php echo $product->get_sku(); ?></p>
                                        <?php endif; ?>
                                        
                                        <?php if ($product->get_weight()) : ?>
                                            <p><strong>Weight:</strong> <?php echo $product->get_weight() . ' ' . get_option('woocommerce_weight_unit'); ?></p>
                                        <?php endif; ?>
                                        
                                        <?php if ($product->get_dimensions()) : ?>
                                            <p><strong>Dimensions:</strong> <?php echo $product->get_dimensions(); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="product-actions">
                                        <a href="/contact" class="btn btn-primary btn-lg">
                                            <i class="fas fa-phone"></i> Contact for Price
                                        </a>
                                        <a href="/contact" class="btn btn-outline btn-lg">
                                            <i class="fas fa-envelope"></i> Request Quote
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Related Products -->
                    <div class="related-products">
                        <h3>You Might Also Like</h3>
                        <div class="row">
                            <?php
                            $related_products = wc_get_related_products($product->get_id(), 4);
                            foreach ($related_products as $related_id) :
                                $related_product = wc_get_product($related_id);
                            ?>
                                <div class="col-lg-3 col-md-6">
                                    <div class="related-product-card">
                                        <div class="product-image">
                                            <a href="<?php echo get_permalink($related_id); ?>">
                                                <?php echo get_the_post_thumbnail($related_id, 'medium'); ?>
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <h4><a href="<?php echo get_permalink($related_id); ?>"><?php echo get_the_title($related_id); ?></a></h4>
                                            <div class="price"><?php echo $related_product->get_price_html(); ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox-modal" class="lightbox-modal">
    <div class="lightbox-content">
        <span class="lightbox-close">&times;</span>
        <img id="lightbox-image" src="" alt="">
        <div class="lightbox-controls">
            <button id="lightbox-zoom-in" class="lightbox-btn">+</button>
            <button id="lightbox-zoom-out" class="lightbox-btn">-</button>
            <button id="lightbox-reset" class="lightbox-btn">Reset</button>
        </div>
    </div>
</div>

<style>
.lightbox-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    backdrop-filter: blur(5px);
}

.lightbox-content {
    position: relative;
    margin: auto;
    padding: 20px;
    width: 90%;
    height: 90%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox-content img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease;
    cursor: grab;
}

.lightbox-content img:active {
    cursor: grabbing;
}

.lightbox-close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10000;
}

.lightbox-close:hover {
    color: #ccc;
}

.lightbox-controls {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
}

.lightbox-btn {
    background: rgba(255, 255, 255, 0.2);
    border: 2px solid #fff;
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: all 0.3s ease;
}

.lightbox-btn:hover {
    background: rgba(255, 255, 255, 0.3);
}

.lightbox-trigger {
    cursor: pointer;
    transition: transform 0.3s ease;
}

.lightbox-trigger:hover {
    transform: scale(1.02);
}

.gallery-thumbnails .thumbnail img {
    cursor: pointer;
    transition: transform 0.3s ease;
}

.gallery-thumbnails .thumbnail img:hover {
    transform: scale(1.05);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('lightbox-modal');
    const modalImg = document.getElementById('lightbox-image');
    const closeBtn = document.querySelector('.lightbox-close');
    const zoomInBtn = document.getElementById('lightbox-zoom-in');
    const zoomOutBtn = document.getElementById('lightbox-zoom-out');
    const resetBtn = document.getElementById('lightbox-reset');
    
    let currentScale = 1;
    let isDragging = false;
    let startX, startY, translateX = 0, translateY = 0;
    
    // Open lightbox
    document.querySelectorAll('.lightbox-trigger').forEach(img => {
        img.addEventListener('click', function() {
            modal.style.display = 'block';
            modalImg.src = this.getAttribute('data-src');
            modalImg.alt = this.alt;
            currentScale = 1;
            translateX = 0;
            translateY = 0;
            updateTransform();
        });
    });
    
    // Close lightbox
    closeBtn.addEventListener('click', closeLightbox);
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeLightbox();
        }
    });
    
    // Keyboard controls
    document.addEventListener('keydown', function(e) {
        if (modal.style.display === 'block') {
            switch(e.key) {
                case 'Escape':
                    closeLightbox();
                    break;
                case '+':
                case '=':
                    zoomIn();
                    break;
                case '-':
                    zoomOut();
                    break;
                case '0':
                    resetZoom();
                    break;
            }
        }
    });
    
    // Zoom controls
    zoomInBtn.addEventListener('click', zoomIn);
    zoomOutBtn.addEventListener('click', zoomOut);
    resetBtn.addEventListener('click', resetZoom);
    
    // Mouse wheel zoom
    modalImg.addEventListener('wheel', function(e) {
        e.preventDefault();
        if (e.deltaY < 0) {
            zoomIn();
        } else {
            zoomOut();
        }
    });
    
    // Drag functionality
    modalImg.addEventListener('mousedown', startDrag);
    modalImg.addEventListener('mousemove', drag);
    modalImg.addEventListener('mouseup', endDrag);
    modalImg.addEventListener('mouseleave', endDrag);
    
    function closeLightbox() {
        modal.style.display = 'none';
    }
    
    function zoomIn() {
        currentScale = Math.min(currentScale * 1.2, 5);
        updateTransform();
    }
    
    function zoomOut() {
        currentScale = Math.max(currentScale / 1.2, 0.5);
        updateTransform();
    }
    
    function resetZoom() {
        currentScale = 1;
        translateX = 0;
        translateY = 0;
        updateTransform();
    }
    
    function updateTransform() {
        modalImg.style.transform = `scale(${currentScale}) translate(${translateX}px, ${translateY}px)`;
    }
    
    function startDrag(e) {
        if (currentScale > 1) {
            isDragging = true;
            startX = e.clientX - translateX;
            startY = e.clientY - translateY;
        }
    }
    
    function drag(e) {
        if (isDragging) {
            e.preventDefault();
            translateX = e.clientX - startX;
            translateY = e.clientY - startY;
            updateTransform();
        }
    }
    
    function endDrag() {
        isDragging = false;
    }
});
</script>

<?php endwhile; ?>
            </div>
        </div>
    </div>
</main>

<style>
.single-product-page {
    padding: 120px 0 80px;
}

.product-detail-wrapper {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    margin-bottom: 60px;
}

.product-images .main-image {
    margin-bottom: 20px;
    border-radius: 10px;
    overflow: hidden;
}

.product-images .main-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.gallery-thumbnails {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.gallery-thumbnails .thumbnail {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.gallery-thumbnails .thumbnail:hover {
    transform: scale(1.05);
}

.gallery-thumbnails .thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.breadcrumb {
    margin-bottom: 20px;
    font-size: 14px;
    color: #666;
}

.breadcrumb a {
    color: #8B4513;
    text-decoration: none;
}

.product-title {
    font-size: 36px;
    font-weight: 700;
    color: #2C2C2C;
    margin-bottom: 15px;
    font-family: 'Playfair Display', serif;
}

.product-price {
    font-size: 28px;
    font-weight: 600;
    color: #8B4513;
    margin-bottom: 25px;
}

.product-description {
    margin-bottom: 30px;
    line-height: 1.8;
    color: #555;
}

.product-meta {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
}

.product-meta p {
    margin-bottom: 8px;
    color: #666;
}

.product-actions {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.product-features {
    background: #fff;
    border: 2px solid #8B4513;
    border-radius: 10px;
    padding: 25px;
}

.product-features h4 {
    color: #8B4513;
    margin-bottom: 15px;
    font-size: 20px;
}

.product-features ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.product-features li {
    padding: 8px 0;
    color: #555;
    display: flex;
    align-items: center;
    gap: 10px;
}

.product-features i {
    color: #8B4513;
    font-size: 16px;
}

.related-products {
    margin-top: 60px;
}

.related-products h3 {
    text-align: center;
    font-size: 32px;
    margin-bottom: 40px;
    color: #2C2C2C;
    font-family: 'Playfair Display', serif;
}

.related-product-card {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
    margin-bottom: 30px;
}

.related-product-card:hover {
    transform: translateY(-5px);
}

.related-product-card .product-image {
    height: 200px;
    overflow: hidden;
}

.related-product-card .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.related-product-card:hover .product-image img {
    transform: scale(1.1);
}

.related-product-card .product-content {
    padding: 20px;
}

.related-product-card h4 {
    margin-bottom: 10px;
}

.related-product-card h4 a {
    color: #2C2C2C;
    text-decoration: none;
    font-size: 18px;
}

.related-product-card .price {
    color: #8B4513;
    font-weight: 600;
    font-size: 16px;
}

@media (max-width: 768px) {
    .product-detail-wrapper {
        padding: 20px;
    }
    
    .product-title {
        font-size: 28px;
    }
    
    .product-actions {
        flex-direction: column;
    }
    
    .product-actions .btn {
        width: 100%;
    }
}
</style>

<?php get_footer(); ?>
