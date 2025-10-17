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

<!-- Modern Zoom Overlay -->
<div id="zoom-overlay" class="zoom-overlay">
    <button class="zoom-close" id="zoom-close">&times;</button>
    <div class="zoom-container">
        <img id="zoom-image" class="zoom-image" src="" alt="">
        
        <!-- Navigation Controls -->
        <button class="nav-btn nav-prev" id="nav-prev" title="Previous Image">‹</button>
        <button class="nav-btn nav-next" id="nav-next" title="Next Image">›</button>
        
        <!-- Zoom Controls -->
        <div class="zoom-controls">
            <button class="zoom-btn" id="zoom-in" title="Zoom In">+</button>
            <button class="zoom-btn" id="zoom-out" title="Zoom Out">-</button>
            <button class="zoom-btn" id="zoom-reset" title="Reset">⌂</button>
        </div>
        
        <!-- Image Counter -->
        <div class="image-counter" id="image-counter">1 / 1</div>
        
        <!-- Instructions -->
        <div class="zoom-info" id="zoom-info">Click and drag to move • Scroll to zoom • Press ESC to close</div>
    </div>
</div>

<style>
/* Modern Image Zoom Styles */
.product-images {
    position: relative;
}

.main-image {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    cursor: zoom-in;
    background: #f8f9fa;
}

.main-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.main-image:hover img {
    transform: scale(1.05);
}

/* Zoom Overlay */
.zoom-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.95);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
}

.zoom-container {
    position: relative;
    width: 90%;
    height: 90%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.zoom-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    transition: transform 0.2s ease-out;
    cursor: grab;
    user-select: none;
}

.zoom-image:active {
    cursor: grabbing;
}

/* Navigation Controls */
.nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 30px;
    color: #333;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    z-index: 10000;
}

.nav-prev {
    left: 20px;
}

.nav-next {
    right: 20px;
}

.nav-btn:hover {
    background: #fff;
    transform: translateY(-50%) scale(1.1);
}

.nav-btn:disabled {
    opacity: 0.3;
    cursor: not-allowed;
    transform: translateY(-50%);
}

.nav-btn:disabled:hover {
    background: rgba(255, 255, 255, 0.9);
    transform: translateY(-50%);
}

/* Zoom Controls */
.zoom-controls {
    position: absolute;
    top: 20px;
    right: 20px;
    display: flex;
    gap: 10px;
    z-index: 10000;
}

.zoom-btn {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 20px;
    color: #333;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.zoom-btn:hover {
    background: #fff;
    transform: scale(1.1);
}

.zoom-close {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 24px;
    color: #333;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    z-index: 10000;
}

.zoom-close:hover {
    background: #fff;
    transform: scale(1.1);
}

/* Image Counter */
.image-counter {
    position: absolute;
    top: 20px;
    left: 20px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 600;
    z-index: 10000;
}

/* Zoom Info */
.zoom-info {
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    font-size: 14px;
    z-index: 10000;
}

/* Gallery Thumbnails */
.gallery-thumbnails {
    display: flex;
    gap: 10px;
    margin-top: 15px;
    overflow-x: auto;
    padding: 5px 0;
}

.gallery-thumbnails .thumbnail {
    flex-shrink: 0;
    width: 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    cursor: pointer;
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.gallery-thumbnails .thumbnail:hover {
    border-color: #8B4513;
    transform: scale(1.05);
}

.gallery-thumbnails .thumbnail.active {
    border-color: #8B4513;
    box-shadow: 0 0 0 2px rgba(139, 69, 19, 0.3);
}

.gallery-thumbnails .thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Mobile Optimizations */
@media (max-width: 768px) {
    .nav-btn {
        width: 50px;
        height: 50px;
        font-size: 24px;
    }
    
    .nav-prev {
        left: 10px;
    }
    
    .nav-next {
        right: 10px;
    }
    
    .zoom-controls {
        top: 10px;
        right: 10px;
        gap: 5px;
    }
    
    .zoom-btn {
        width: 40px;
        height: 40px;
        font-size: 16px;
    }
    
    .zoom-close {
        top: 10px;
        left: 10px;
        width: 40px;
        height: 40px;
        font-size: 20px;
    }
    
    .image-counter {
        top: 10px;
        left: 10px;
        font-size: 12px;
        padding: 6px 12px;
    }
    
    .zoom-info {
        bottom: 10px;
        font-size: 12px;
        padding: 8px 16px;
    }
    
    .gallery-thumbnails .thumbnail {
        width: 60px;
        height: 60px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.getElementById('zoom-overlay');
    const zoomImage = document.getElementById('zoom-image');
    const closeBtn = document.getElementById('zoom-close');
    const zoomInBtn = document.getElementById('zoom-in');
    const zoomOutBtn = document.getElementById('zoom-out');
    const resetBtn = document.getElementById('zoom-reset');
    const zoomInfo = document.getElementById('zoom-info');
    const navPrevBtn = document.getElementById('nav-prev');
    const navNextBtn = document.getElementById('nav-next');
    const imageCounter = document.getElementById('image-counter');
    
    let currentScale = 1;
    let isDragging = false;
    let startX, startY, translateX = 0, translateY = 0;
    let lastTouchDistance = 0;
    
    // Image gallery data
    let imageGallery = [];
    let currentImageIndex = 0;
    
    // Initialize image gallery
    function initializeImageGallery() {
        imageGallery = [];
        
        // Add main product image
        const mainImage = document.querySelector('.main-image img');
        if (mainImage) {
            imageGallery.push({
                src: mainImage.getAttribute('data-src'),
                alt: mainImage.alt
            });
        }
        
        // Add gallery images
        document.querySelectorAll('.gallery-thumbnails .thumbnail img').forEach(img => {
            imageGallery.push({
                src: img.getAttribute('data-src'),
                alt: img.alt
            });
        });
    }
    
    // Open zoom overlay
    document.querySelectorAll('.lightbox-trigger').forEach((img, index) => {
        img.addEventListener('click', function() {
            currentImageIndex = index;
            openZoom(this.getAttribute('data-src'), this.alt);
        });
    });
    
    // Close zoom overlay
    closeBtn.addEventListener('click', closeZoom);
    overlay.addEventListener('click', function(e) {
        if (e.target === overlay) {
            closeZoom();
        }
    });
    
    // Navigation controls
    navPrevBtn.addEventListener('click', showPreviousImage);
    navNextBtn.addEventListener('click', showNextImage);
    
    // Keyboard controls
    document.addEventListener('keydown', function(e) {
        if (overlay.style.display === 'flex') {
            switch(e.key) {
                case 'Escape':
                    closeZoom();
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
                case 'ArrowLeft':
                    showPreviousImage();
                    break;
                case 'ArrowRight':
                    showNextImage();
                    break;
            }
        }
    });
    
    // Zoom controls
    zoomInBtn.addEventListener('click', zoomIn);
    zoomOutBtn.addEventListener('click', zoomOut);
    resetBtn.addEventListener('click', resetZoom);
    
    // Mouse wheel zoom
    zoomImage.addEventListener('wheel', function(e) {
        e.preventDefault();
        const delta = e.deltaY > 0 ? 0.9 : 1.1;
        currentScale = Math.max(0.5, Math.min(5, currentScale * delta));
        updateTransform();
        updateInfo();
    });
    
    // Mouse drag functionality
    zoomImage.addEventListener('mousedown', startDrag);
    document.addEventListener('mousemove', drag);
    document.addEventListener('mouseup', endDrag);
    
    // Touch events for mobile
    zoomImage.addEventListener('touchstart', handleTouchStart, { passive: false });
    zoomImage.addEventListener('touchmove', handleTouchMove, { passive: false });
    zoomImage.addEventListener('touchend', handleTouchEnd);
    
    function openZoom(src, alt) {
        // Initialize gallery if not done yet
        if (imageGallery.length === 0) {
            initializeImageGallery();
        }
        
        overlay.style.display = 'flex';
        zoomImage.src = src;
        zoomImage.alt = alt;
        currentScale = 1;
        translateX = 0;
        translateY = 0;
        updateTransform();
        updateInfo();
        updateNavigation();
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }
    
    function showPreviousImage() {
        if (imageGallery.length <= 1) return;
        
        currentImageIndex = (currentImageIndex - 1 + imageGallery.length) % imageGallery.length;
        const image = imageGallery[currentImageIndex];
        zoomImage.src = image.src;
        zoomImage.alt = image.alt;
        resetZoom();
        updateNavigation();
    }
    
    function showNextImage() {
        if (imageGallery.length <= 1) return;
        
        currentImageIndex = (currentImageIndex + 1) % imageGallery.length;
        const image = imageGallery[currentImageIndex];
        zoomImage.src = image.src;
        zoomImage.alt = image.alt;
        resetZoom();
        updateNavigation();
    }
    
    function updateNavigation() {
        // Update image counter
        imageCounter.textContent = `${currentImageIndex + 1} / ${imageGallery.length}`;
        
        // Update navigation buttons
        if (imageGallery.length <= 1) {
            navPrevBtn.style.display = 'none';
            navNextBtn.style.display = 'none';
            imageCounter.style.display = 'none';
        } else {
            navPrevBtn.style.display = 'flex';
            navNextBtn.style.display = 'flex';
            imageCounter.style.display = 'block';
            
            // Disable buttons at boundaries
            navPrevBtn.disabled = currentImageIndex === 0;
            navNextBtn.disabled = currentImageIndex === imageGallery.length - 1;
        }
    }
    
    function closeZoom() {
        overlay.style.display = 'none';
        document.body.style.overflow = ''; // Restore scrolling
    }
    
    function zoomIn() {
        currentScale = Math.min(currentScale * 1.3, 5);
        updateTransform();
        updateInfo();
    }
    
    function zoomOut() {
        currentScale = Math.max(currentScale / 1.3, 0.5);
        updateTransform();
        updateInfo();
    }
    
    function resetZoom() {
        currentScale = 1;
        translateX = 0;
        translateY = 0;
        updateTransform();
        updateInfo();
    }
    
    function updateTransform() {
        zoomImage.style.transform = `scale(${currentScale}) translate(${translateX}px, ${translateY}px)`;
    }
    
    function updateInfo() {
        const scalePercent = Math.round(currentScale * 100);
        if (imageGallery.length > 1) {
            zoomInfo.textContent = `${scalePercent}% • Click and drag to move • Scroll to zoom • Use ← → arrows to navigate • Press ESC to close`;
        } else {
            zoomInfo.textContent = `${scalePercent}% • Click and drag to move • Scroll to zoom • Press ESC to close`;
        }
    }
    
    function startDrag(e) {
        if (currentScale > 1) {
            isDragging = true;
            startX = e.clientX - translateX;
            startY = e.clientY - translateY;
            zoomImage.style.cursor = 'grabbing';
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
        zoomImage.style.cursor = currentScale > 1 ? 'grab' : 'zoom-in';
    }
    
    // Touch handling for mobile
    function handleTouchStart(e) {
        if (e.touches.length === 1) {
            // Single touch - start drag
            if (currentScale > 1) {
                isDragging = true;
                startX = e.touches[0].clientX - translateX;
                startY = e.touches[0].clientY - translateY;
            }
        } else if (e.touches.length === 2) {
            // Two touches - start pinch zoom
            const touch1 = e.touches[0];
            const touch2 = e.touches[1];
            lastTouchDistance = Math.sqrt(
                Math.pow(touch2.clientX - touch1.clientX, 2) +
                Math.pow(touch2.clientY - touch1.clientY, 2)
            );
        }
    }
    
    function handleTouchMove(e) {
        e.preventDefault();
        
        if (e.touches.length === 1 && isDragging) {
            // Single touch drag
            translateX = e.touches[0].clientX - startX;
            translateY = e.touches[0].clientY - startY;
            updateTransform();
        } else if (e.touches.length === 2) {
            // Two touch pinch zoom
            const touch1 = e.touches[0];
            const touch2 = e.touches[1];
            const currentDistance = Math.sqrt(
                Math.pow(touch2.clientX - touch1.clientX, 2) +
                Math.pow(touch2.clientY - touch1.clientY, 2)
            );
            
            if (lastTouchDistance > 0) {
                const scaleChange = currentDistance / lastTouchDistance;
                currentScale = Math.max(0.5, Math.min(5, currentScale * scaleChange));
                updateTransform();
                updateInfo();
            }
            
            lastTouchDistance = currentDistance;
        }
    }
    
    function handleTouchEnd(e) {
        isDragging = false;
        lastTouchDistance = 0;
    }
    
    // Gallery thumbnail functionality
    document.querySelectorAll('.gallery-thumbnails .thumbnail img').forEach((thumb, index) => {
        thumb.addEventListener('click', function() {
            // Update main image
            const mainImage = document.querySelector('.main-image img');
            mainImage.src = this.getAttribute('data-src');
            mainImage.setAttribute('data-src', this.getAttribute('data-src'));
            
            // Update active thumbnail
            document.querySelectorAll('.gallery-thumbnails .thumbnail').forEach(t => t.classList.remove('active'));
            this.parentElement.classList.add('active');
        });
    });
    
    // Set first thumbnail as active
    const firstThumbnail = document.querySelector('.gallery-thumbnails .thumbnail');
    if (firstThumbnail) {
        firstThumbnail.classList.add('active');
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
