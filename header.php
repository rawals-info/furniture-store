<?php
/**
 * The header template
 * 
 * @package FurnitureStylo
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>

    <header id="masthead" class="site-header">
        <!-- Top Bar - Desktop Only -->
        <div class="top-bar desktop-only">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="contact-info">
                            <span><i class="fas fa-phone"></i> <a href="tel:(905) 270-0666">(905) 270-0666</a></span>
                            <span><i class="fas fa-envelope"></i> <a href="mailto:stylofurniture1456@gmail.com">stylofurniture1456@gmail.com</a></span>
                            <span><i class="fas fa-clock"></i> Open 7 days a week</span>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="social-links">
                            <a href="https://www.instagram.com/newstylofurniture" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.tiktok.com/@newstylofurniture" target="_blank"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="main-header">
            <div class="container">
                <!-- Desktop Header -->
                <div class="desktop-header">
                    <div class="header-left">
                        <div class="logo-section">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/10/logo_stylo.png')); ?>" alt="<?php bloginfo('name'); ?>">
                            </a>
                            <div class="brand-text">
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">New Stylo Furniture & Mattress</a>
                                </h1>
                                <p>Premium Furniture & Home Decor</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="header-center">
                        <nav class="desktop-nav">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary',
                                'menu_id'        => 'primary-menu',
                                'menu_class'     => 'nav-menu',
                                'container'      => false,
                                'fallback_cb'    => 'furniture_stylo_fallback_menu',
                            ));
                            ?>
                        </nav>
                    </div>
                    
                    <div class="header-right">
                        <div class="search-toggle">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="contact-btn">
                            <a href="/contact">Contact Us</a>
                        </div>
                    </div>
                </div>

                <!-- Mobile Header -->
                <div class="mobile-header">
                    <div class="mobile-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/10/logo_stylo.png')); ?>" alt="<?php bloginfo('name'); ?>">
                        </a>
                        <div class="mobile-brand">
                            <h1>New Stylo Furniture & Mattress</h1>
                        </div>
                    </div>
                    <div class="mobile-actions">
                        <div class="search-toggle">
                            <i class="fas fa-search"></i>
                        </div>
                        <button class="mobile-menu-toggle">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>

                <!-- Mobile Navigation -->
                <div class="mobile-nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'mobile-menu',
                        'menu_class'     => 'mobile-menu',
                        'container'      => false,
                        'fallback_cb'    => 'furniture_stylo_fallback_menu',
                    ));
                    ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Simple Mobile Header Styles -->
    <style>
    /* Basic Header Styles */
    .site-header {
        background: #ffffff;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        width: 100%;
    }

    .top-bar {
        background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
        color: #ffffff;
        padding: 8px 0;
        font-size: 14px;
    }

    .top-bar .contact-info {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .top-bar .contact-info span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .top-bar .contact-info i {
        color: #D2B48C;
    }

    .top-bar .contact-info a {
        color: #ffffff;
        text-decoration: none;
    }

    .top-bar .social-links {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
    }

    .top-bar .social-links a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 28px;
        height: 28px;
        background-color: rgba(255,255,255,0.2);
        color: #ffffff;
        border-radius: 50%;
        transition: all 0.3s ease;
    }

    .main-header {
        background-color: #ffffff;
        padding: 15px 0;
        border-bottom: 1px solid rgba(139, 69, 19, 0.1);
    }

    /* Desktop Header */
    .desktop-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .header-left {
        flex: 0 0 auto;
    }

    .logo-section {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .logo-section img {
        height: 120px;
        width: auto;
        max-width: 400px;
        object-fit: contain;
    }

    .brand-text h1 {
        margin: 0;
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 700;
        line-height: 1.1;
        color: #2C2C2C;
    }

    .brand-text h1 a {
        text-decoration: none;
        color: #2C2C2C;
    }

    .brand-text p {
        margin: 5px 0 0 0;
        color: #8B4513;
        font-size: 12px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .header-center {
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .desktop-nav .nav-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 25px;
    }

    .desktop-nav .nav-menu a {
        color: #2C2C2C;
        font-weight: 500;
        font-size: 16px;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .desktop-nav .nav-menu a:hover {
        color: #8B4513;
    }

    .header-right {
        flex: 0 0 auto;
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .search-toggle {
        cursor: pointer;
        padding: 10px;
        border-radius: 50%;
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .search-toggle i {
        font-size: 18px;
        color: #8B4513;
    }

    .contact-btn {
        background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
        padding: 12px 24px;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .contact-btn a {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
    }

    /* Mobile Header */
    .mobile-header {
        display: none;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
    }

    .mobile-logo {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .mobile-logo img {
        height: 100px;
        width: auto;
        max-width: 320px;
    }

    .mobile-brand h1 {
        margin: 0;
        font-size: 18px;
        font-weight: 700;
        color: #2C2C2C;
        line-height: 1.2;
    }

    .mobile-actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .mobile-menu-toggle {
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
    }

    .mobile-menu-toggle span {
        display: block;
        width: 25px;
        height: 3px;
        background-color: #2C2C2C;
        margin: 5px 0;
        transition: all 0.3s ease;
    }

    .mobile-menu-toggle.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .mobile-menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }

    .mobile-menu-toggle.active span:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }

    /* Mobile Navigation */
    .mobile-nav {
        display: none;
        background: #ffffff;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        border-radius: 0 0 10px 10px;
        overflow: hidden;
    }

    .mobile-nav.active {
        display: block;
    }

    .mobile-menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .mobile-menu li {
        border-bottom: 1px solid #e5e5e5;
    }

    .mobile-menu li:last-child {
        border-bottom: none;
    }

    .mobile-menu a {
        display: block;
        padding: 15px 20px;
        color: #2C2C2C;
        text-decoration: none;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .mobile-menu a:hover {
        background-color: #f8f9fa;
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .desktop-only {
            display: none !important;
        }
        
        .desktop-header {
            display: none !important;
        }
        
        .mobile-header {
            display: flex !important;
        }
        
        body {
            padding-top: 70px !important;
        }
    }

    @media (max-width: 768px) {
        .mobile-logo img {
            height: 60px;
            max-width: 170px;
        }
        
        .mobile-brand h1 {
            font-size: 28px;
        }
        
        .mobile-actions {
            gap: 10px;
        }
        
        .search-toggle {
            padding: 8px;
        }
        
        .search-toggle i {
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .mobile-brand h1 {
            font-size: 16px;
        }
        
        .mobile-logo img {
            height: 80px;
            max-width: 240px;
        }
    }
    </style>

    <!-- Search Overlay -->
    <div class="search-overlay">
        <div class="search-container">
            <div class="container">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="search" class="search-field" placeholder="Search furniture..." value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="search-submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
                <button class="search-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
