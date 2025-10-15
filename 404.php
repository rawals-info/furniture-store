<?php
/**
 * The template for displaying 404 pages
 * 
 * @package FurnitureStylo
 */

get_header(); ?>

<main id="main" class="site-main error-404">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="error-content">
                    <div class="error-number">404</div>
                    <h1 class="error-title">Page Not Found</h1>
                    <p class="error-message">Sorry, the page you're looking for doesn't exist or has been moved.</p>
                    
                    <div class="error-actions">
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg">
                            <i class="fas fa-home"></i> Go Home
                        </a>
                        <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-outline btn-lg">
                            <i class="fas fa-shopping-bag"></i> Browse Products
                        </a>
                    </div>
                    
                    <div class="search-section">
                        <h3>Search Our Site</h3>
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <div class="search-input-group">
                                <input type="search" class="search-field" placeholder="Search for furniture..." value="<?php echo get_search_query(); ?>" name="s" />
                                <button type="submit" class="search-submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="helpful-links">
                        <h3>Popular Pages</h3>
                        <div class="links-grid">
                            <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="link-item">
                                <i class="fas fa-th"></i>
                                <span>Shop All Products</span>
                            </a>
                            <a href="/bed" class="link-item">
                                <i class="fas fa-bed"></i>
                                <span>Beds</span>
                            </a>
                            <a href="/sofa" class="link-item">
                                <i class="fas fa-couch"></i>
                                <span>Sofas</span>
                            </a>
                            <a href="/coffee-table" class="link-item">
                                <i class="fas fa-table"></i>
                                <span>Coffee Tables</span>
                            </a>
                            <a href="/mattress" class="link-item">
                                <i class="fas fa-bed"></i>
                                <span>Mattresses</span>
                            </a>
                            <a href="/contact" class="link-item">
                                <i class="fas fa-phone"></i>
                                <span>Contact Us</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.error-404 {
    padding: 120px 0 80px;
    min-height: 80vh;
    display: flex;
    align-items: center;
}

.error-content {
    max-width: 800px;
    margin: 0 auto;
}

.error-number {
    font-size: 120px;
    font-weight: 900;
    color: #8B4513;
    line-height: 1;
    margin-bottom: 20px;
    font-family: 'Playfair Display', serif;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
}

.error-title {
    font-size: 48px;
    font-weight: 700;
    color: #2C2C2C;
    margin-bottom: 20px;
    font-family: 'Playfair Display', serif;
}

.error-message {
    font-size: 20px;
    color: #666;
    margin-bottom: 40px;
    line-height: 1.6;
}

.error-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 60px;
    flex-wrap: wrap;
}

.search-section {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    margin-bottom: 60px;
}

.search-section h3 {
    font-size: 24px;
    color: #2C2C2C;
    margin-bottom: 25px;
    font-family: 'Playfair Display', serif;
}

.search-input-group {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
    background: #f8f9fa;
    border-radius: 50px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.search-field {
    flex: 1;
    padding: 15px 25px;
    border: none;
    font-size: 16px;
    background: transparent;
    outline: none;
}

.search-submit {
    padding: 15px 25px;
    background: #8B4513;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.search-submit:hover {
    background: #A0522D;
}

.helpful-links {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.helpful-links h3 {
    font-size: 24px;
    color: #2C2C2C;
    margin-bottom: 30px;
    font-family: 'Playfair Display', serif;
    text-align: center;
}

.links-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.link-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 25px 20px;
    background: #f8f9fa;
    border-radius: 10px;
    text-decoration: none;
    color: #2C2C2C;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.link-item:hover {
    background: #8B4513;
    color: white;
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(139, 69, 19, 0.3);
}

.link-item i {
    font-size: 32px;
    margin-bottom: 15px;
    color: #8B4513;
    transition: color 0.3s ease;
}

.link-item:hover i {
    color: white;
}

.link-item span {
    font-weight: 500;
    font-size: 16px;
    text-align: center;
}

@media (max-width: 768px) {
    .error-number {
        font-size: 80px;
    }
    
    .error-title {
        font-size: 36px;
    }
    
    .error-message {
        font-size: 18px;
    }
    
    .error-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .error-actions .btn {
        width: 100%;
        max-width: 300px;
    }
    
    .search-section,
    .helpful-links {
        padding: 25px;
    }
    
    .links-grid {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
    }
    
    .link-item {
        padding: 20px 15px;
    }
    
    .link-item i {
        font-size: 24px;
    }
    
    .link-item span {
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .error-404 {
        padding: 80px 0 40px;
    }
    
    .error-number {
        font-size: 60px;
    }
    
    .error-title {
        font-size: 28px;
    }
    
    .error-message {
        font-size: 16px;
    }
}
</style>

<?php get_footer(); ?>
