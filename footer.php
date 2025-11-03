<?php
/**
 * The footer template
 * 
 * @package FurnitureStylo
 */
?>

    <footer id="colophon" class="site-footer">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <div class="footer-logo" style="margin-bottom: 20px;">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo_stylo.png'); ?>" alt="<?php bloginfo('name'); ?>" style="height: 60px; width: auto; max-width: 200px; object-fit: contain;">
                            </div>
                            <p style="color: #ccc; margin-bottom: 20px;">We provide high-quality furniture and home decor solutions for modern living. Our curated collection brings style and comfort to your home.</p>
                            <div class="social-links">
                                <a href="https://www.instagram.com/newstylofurniture" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background-color: rgba(255,255,255,0.1); color: #ccc; border-radius: 50%; margin-right: 10px; transition: all 0.3s ease;"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.tiktok.com/@newstylofurniture" target="_blank" style="display: inline-flex; align-items: center; justify-content: center; width: 35px; height: 35px; background-color: rgba(255,255,255,0.1); color: #ccc; border-radius: 50%; margin-right: 10px; transition: all 0.3s ease;"><i class="fab fa-tiktok"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Quick Links</h4>
                            <ul class="footer-menu">
                                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                                <li><a href="<?php echo wc_get_page_permalink('shop'); ?>">Shop</a></li>
                                <li><a href="/living-room">Living Room</a></li>
                                <li><a href="/bedroom">Bedroom</a></li>
                                <li><a href="/dining-room">Dining Room</a></li>
                                <li><a href="/about">About Us</a></li>
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Product Categories</h4>
                            <ul class="footer-categories">
                                <?php
                                // Get WooCommerce product categories
                                $categories = get_terms(array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => true,
                                    'orderby' => 'name',
                                    'order' => 'ASC',
                                    'number' => 4
                                ));
                                
                                if (!empty($categories) && !is_wp_error($categories)) :
                                    foreach ($categories as $category) :
                                ?>
                                    <li><a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></li>
                                <?php 
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-widget-title">Contact Info</h4>
                            <div class="contact-info">
                                <p><i class="fas fa-map-marker-alt"></i> <a href="https://maps.google.com/?q=1456+Dundas+St+E,+Mississauga,+ON+L4X+1L4" target="_blank" style="color: #ffffff; text-decoration: none;">1456 Dundas St E, Mississauga, ON L4X 1L4</a></p>
                                <p><i class="fas fa-phone"></i> <a href="tel:(905) 270-0666" style="color: #ffffff; text-decoration: none;">(905) 270-0666</a></p>
                                <p><i class="fas fa-envelope"></i> <a href="mailto:stylofurniture1456@gmail.com" style="color: #ffffff; text-decoration: none;">stylofurniture1456@gmail.com</a></p>
                                <p><i class="fas fa-clock"></i> Mon-Fri: 10:30AM-8:30PM</p>
                                <p><i class="fas fa-clock"></i> Sat-Sun: 11AM-7PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="copyright">
                            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="footer-links">
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms of Service</a>
                            <a href="#">Sitemap</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
