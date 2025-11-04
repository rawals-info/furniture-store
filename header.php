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
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>">
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>">
    <meta name="theme-color" content="#8B4513">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php 
        if (is_home() || is_front_page()) {
            echo 'Premium furniture and mattresses in Mississauga. Quality dining tables, beds, living room sets, and home decor. Visit our showroom at 1456 Dundas St E. Call (905) 270-0666.';
        } elseif (is_product_category()) {
            $category = get_queried_object();
            echo 'Shop ' . $category->name . ' furniture in Mississauga. Premium quality ' . strtolower($category->name) . ' at New Stylo Furniture. Free delivery within 25 miles.';
        } elseif (is_page('about')) {
            echo 'About New Stylo Furniture & Mattress in Mississauga. Premium furniture store with quality beds, dining tables, and living room sets. Family-owned business since 2020.';
        } elseif (is_page('contact')) {
            echo 'Contact New Stylo Furniture in Mississauga. Visit our showroom at 1456 Dundas St E or call (905) 270-0666. Free delivery within 25 miles. Open 7 days a week.';
        } else {
            echo 'Premium furniture and mattresses in Mississauga. Quality dining tables, beds, living room sets, and home decor at New Stylo Furniture.';
        }
    ?>">
    
    <meta name="keywords" content="furniture Mississauga, dining tables, beds, mattresses, living room furniture, home decor, furniture store Mississauga, New Stylo Furniture, premium furniture, quality furniture">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php 
        if (is_home() || is_front_page()) {
            echo 'New Stylo Furniture & Mattress - Premium Furniture in Mississauga';
        } elseif (is_product_category()) {
            $category = get_queried_object();
            echo $category->name . ' Furniture - New Stylo Furniture Mississauga';
        } else {
            echo wp_get_document_title();
        }
    ?>">
    
    <meta property="og:description" content="<?php 
        if (is_home() || is_front_page()) {
            echo 'Premium furniture and mattresses in Mississauga. Quality dining tables, beds, living room sets, and home decor. Visit our showroom at 1456 Dundas St E.';
        } elseif (is_product_category()) {
            $category = get_queried_object();
            echo 'Shop ' . $category->name . ' furniture in Mississauga. Premium quality ' . strtolower($category->name) . ' at New Stylo Furniture.';
        } else {
            echo 'Premium furniture and mattresses in Mississauga. Quality furniture store with showroom at 1456 Dundas St E.';
        }
    ?>">
    
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo home_url($_SERVER['REQUEST_URI']); ?>">
    <meta property="og:site_name" content="New Stylo Furniture & Mattress">
    <meta property="og:locale" content="en_CA">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo wp_get_document_title(); ?>">
    <meta name="twitter:description" content="<?php 
        if (is_home() || is_front_page()) {
            echo 'Premium furniture and mattresses in Mississauga. Quality dining tables, beds, living room sets, and home decor.';
        } else {
            echo 'Premium furniture and mattresses in Mississauga. Quality furniture store with showroom at 1456 Dundas St E.';
        }
    ?>">
    
    <!-- Local Business Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FurnitureStore",
        "name": "New Stylo Furniture & Mattress",
        "description": "Premium furniture and mattresses in Mississauga. Quality dining tables, beds, living room sets, and home decor.",
        "url": "<?php echo home_url(); ?>",
        "logo": "<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>",
        "image": "<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>",
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
        "priceRange": "$$",
        "paymentAccepted": "Cash, Credit Card, Debit Card",
        "currenciesAccepted": "CAD",
        "areaServed": {
            "@type": "City",
            "name": "Mississauga"
        },
        "sameAs": [
            "https://www.instagram.com/newstylofurniture",
            "https://www.tiktok.com/@newstylofurniture"
        ]
    }
    </script>
    
    <!-- Website Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "New Stylo Furniture & Mattress",
        "url": "<?php echo home_url(); ?>",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "<?php echo home_url(); ?>/?s={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
    </script>
    
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
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>" alt="<?php bloginfo('name'); ?>">
                            </a>
                            <div class="brand-text">
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">New Stylo Furniture & Mattress</a>
                                </h1>
                                <p>Premium Furniture & Home Decor</p>
                                <p class="customization-text">We Specialize in Custom Sizes & Designs</p>
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
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>" alt="<?php bloginfo('name'); ?>">
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

    .brand-text .customization-text {
        margin: 3px 0 0 0;
        color: #A0522D;
        font-size: 11px;
        font-weight: 600;
        font-style: italic;
        text-transform: none;
        letter-spacing: 0.5px;
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

    /* Dropdown Menu Styles */
    .desktop-nav .nav-menu li {
        position: relative;
    }

    .desktop-nav .nav-menu .menu-item-has-children > a::after {
        content: '\f107';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        margin-left: 5px;
        font-size: 12px;
        transition: transform 0.3s ease;
    }

    .desktop-nav .nav-menu .menu-item-has-children:hover > a::after {
        transform: rotate(180deg);
    }

    .desktop-nav .nav-menu .sub-menu {
        position: absolute;
        top: 100%;
        left: 0;
        background: #ffffff;
        min-width: 200px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        border-radius: 8px;
        padding: 10px 0;
        margin-top: 10px;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 999;
        list-style: none;
        margin-left: 0;
    }

    .desktop-nav .nav-menu .menu-item-has-children:hover .sub-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .desktop-nav .nav-menu .sub-menu li {
        margin: 0;
        padding: 0;
    }

    .desktop-nav .nav-menu .sub-menu a {
        display: block;
        padding: 10px 20px;
        color: #2C2C2C;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.3s ease;
        border-bottom: 1px solid #f0f0f0;
    }

    .desktop-nav .nav-menu .sub-menu li:last-child a {
        border-bottom: none;
    }

    .desktop-nav .nav-menu .sub-menu a:hover {
        background-color: #f8f9fa;
        color: #8B4513;
        padding-left: 25px;
    }

    /* Mobile Dropdown Styles */
    .mobile-menu .menu-item-has-children > a {
        position: relative;
    }

    .mobile-menu .menu-item-has-children > a::after {
        content: '\f107';
        font-family: 'Font Awesome 6 Free';
        font-weight: 900;
        position: absolute;
        right: 20px;
        transition: transform 0.3s ease;
    }

    .mobile-menu .menu-item-has-children.active > a::after {
        transform: rotate(180deg);
    }

    .mobile-menu .sub-menu {
        display: none;
        list-style: none;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    .mobile-menu .menu-item-has-children.active .sub-menu {
        display: block;
    }

    .mobile-menu .sub-menu li {
        border-bottom: 1px solid #e5e5e5;
    }

    .mobile-menu .sub-menu a {
        padding-left: 40px;
        font-size: 14px;
        color: #666;
    }

    .mobile-menu .sub-menu a:hover {
        background-color: #e9ecef;
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
