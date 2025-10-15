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

    <header id="masthead" class="site-header" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1); position: fixed; top: 0; left: 0; right: 0; z-index: 1000; width: 100%; backdrop-filter: blur(10px);">
        <!-- Top Bar -->
        <div class="top-bar" style="background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); color: #ffffff; padding: 12px 0; font-size: 14px; position: relative;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <!-- Contact info removed - TEST MARKER 12345 -->
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="social-links" style="display: flex; gap: 15px; justify-content: flex-end;">
                            <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background-color: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; transition: all 0.3s ease;"><i class="fab fa-facebook"></i></a>
                            <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background-color: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; transition: all 0.3s ease;"><i class="fab fa-instagram"></i></a>
                            <a href="#" style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background-color: rgba(255,255,255,0.2); color: #ffffff; border-radius: 50%; transition: all 0.3s ease;"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Header -->
        <div class="main-header" style="background-color: #ffffff; padding: 25px 0; border-bottom: 1px solid rgba(139, 69, 19, 0.1);">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="site-branding">
                            <div class="logo-container" style="display: flex; align-items: center; gap: 15px;">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" style="text-decoration: none;">
                                    <img src="<?php echo esc_url(home_url('/wp-content/uploads/2025/10/logo_stylo.png')); ?>" alt="<?php bloginfo('name'); ?>" style="height: 60px; width: auto; max-width: 200px; object-fit: contain;">
                                </a>
                                <div class="brand-text" style="display: flex; flex-direction: column;">
                                    <h1 class="site-title" style="margin: 0; font-family: 'Playfair Display', serif; font-size: 24px; font-weight: 700; line-height: 1.1; color: #2C2C2C;">
                                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" style="text-decoration: none; color: #2C2C2C;">
                                            New Stylo Furniture & Mattress
                                        </a>
                                    </h1>
                                    <p style="margin: 5px 0 0 0; color: #8B4513; font-size: 12px; font-weight: 500; text-transform: uppercase; letter-spacing: 1px;">Premium Furniture & Home Decor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" style="display: none; background: none; border: none; font-size: 20px; cursor: pointer;">
                                <span style="display: block; width: 25px; height: 3px; background-color: #2C2C2C; margin: 5px 0; transition: all 0.3s ease;"></span>
                                <span style="display: block; width: 25px; height: 3px; background-color: #2C2C2C; margin: 5px 0; transition: all 0.3s ease;"></span>
                                <span style="display: block; width: 25px; height: 3px; background-color: #2C2C2C; margin: 5px 0; transition: all 0.3s ease;"></span>
                            </button>
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
                    
                    <div class="col-lg-2 text-end">
                        <div class="header-actions" style="display: flex; align-items: center; gap: 20px; justify-content: flex-end;">
                            <div class="search-toggle" style="cursor: pointer; padding: 10px; border-radius: 50%; background-color: #f8f9fa; transition: all 0.3s ease;">
                                <i class="fas fa-search" style="font-size: 18px; color: #8B4513;"></i>
                            </div>
                            <div class="contact-btn" style="background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); padding: 12px 24px; border-radius: 25px; transition: all 0.3s ease;">
                                <a href="/contact" style="color: #ffffff; text-decoration: none; font-weight: 500; font-size: 14px;">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

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
