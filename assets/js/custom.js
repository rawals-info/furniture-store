/*!
 * New Stylo Furniture Theme - Custom JavaScript
 * Interactive features and animations
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {
        
        // Initialize all functions
        initMobileMenu();
        initSearchOverlay();
        initHeroSlider();
        initScrollAnimations();
        initSmoothScrolling();
        initNewsletterForm();
        initProductHover();
        
    });

    // Mobile Menu Toggle
    function initMobileMenu() {
        $('.mobile-menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.mobile-nav').toggleClass('active');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.mobile-nav').length && !$(e.target).closest('.mobile-menu-toggle').length) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.mobile-nav').removeClass('active');
            }
        });

        // Close menu when clicking on a menu item
        $('.mobile-menu a').on('click', function() {
            $('.mobile-menu-toggle').removeClass('active');
            $('.mobile-nav').removeClass('active');
        });
    }

    // Search Overlay
    function initSearchOverlay() {
        $('.search-toggle').on('click', function() {
            $('.search-overlay').addClass('active');
            $('.search-field').focus();
        });

        $('.search-close').on('click', function() {
            $('.search-overlay').removeClass('active');
        });

        // Close on escape key
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27) { // ESC key
                $('.search-overlay').removeClass('active');
            }
        });

        // Close on overlay click
        $('.search-overlay').on('click', function(e) {
            if (e.target === this) {
                $(this).removeClass('active');
            }
        });
    }

    // Hero Slider
    function initHeroSlider() {
        let currentSlide = 0;
        const slides = $('.hero-slide');
        const totalSlides = slides.length;

        if (totalSlides > 1) {
            // Auto-rotate slides
            setInterval(function() {
                slides.removeClass('active');
                currentSlide = (currentSlide + 1) % totalSlides;
                slides.eq(currentSlide).addClass('active');
            }, 5000);
        }
    }

    // Scroll Animations
    function initScrollAnimations() {
        // Add animation class when elements come into view
        function checkAnimation() {
            $('.category-card, .product-card, .feature-item').each(function() {
                const elementTop = $(this).offset().top;
                const elementBottom = elementTop + $(this).outerHeight();
                const viewportTop = $(window).scrollTop();
                const viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('fade-in-up');
                }
            });
        }

        // Check on scroll
        $(window).on('scroll', function() {
            checkAnimation();
        });

        // Initial check
        checkAnimation();
    }

    // Smooth Scrolling
    function initSmoothScrolling() {
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
                location.hostname === this.hostname) {
                
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 1000);
                    return false;
                }
            }
        });
    }

    // Newsletter Form
    function initNewsletterForm() {
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            
            const email = $(this).find('input[type="email"]').val();
            
            if (email) {
                // Show success message
                $(this).html('<div class="newsletter-success"><h4>Thank you for subscribing!</h4><p>We\'ll keep you updated with our latest furniture trends and offers.</p></div>');
                
                // Here you would typically send the email to your server
                console.log('Newsletter subscription:', email);
            }
        });
    }

    // Product Hover Effects - Disabled for better UX
    function initProductHover() {
        // Hover effects removed - no transform/scale on product cards
    }

    // Header Scroll Effect
    $(window).on('scroll', function() {
        const scrollTop = $(window).scrollTop();
        
        if (scrollTop > 100) {
            $('.site-header').addClass('scrolled');
        } else {
            $('.site-header').removeClass('scrolled');
        }
    });

    // Lazy Loading for Images
    function initLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }
    }

    // Initialize lazy loading
    initLazyLoading();

    // WooCommerce Specific Functions
    if (typeof wc_add_to_cart_params !== 'undefined') {
        
        // Custom add to cart handling for catalog mode
        $(document).on('click', '.single_add_to_cart_button', function(e) {
            e.preventDefault();
            
            // Show contact form or redirect to contact page
            if (confirm('This item is for display only. Would you like to contact us for more information?')) {
                window.location.href = '/contact';
            }
        });
        
        // Remove add to cart buttons in catalog mode
        $('.single_add_to_cart_button').each(function() {
            $(this).replaceWith('<a href="/contact" class="btn btn-outline">Contact for Price</a>');
        });
    }

    // Category Filter Animation
    function initCategoryFilter() {
        $('.category-filter a').on('click', function(e) {
            e.preventDefault();
            
            const category = $(this).data('category');
            
            $('.category-filter a').removeClass('active');
            $(this).addClass('active');
            
            if (category === 'all') {
                $('.product-card').fadeIn();
            } else {
                $('.product-card').hide();
                $('.product-card[data-category="' + category + '"]').fadeIn();
            }
        });
    }

    // Initialize category filter if it exists
    if ($('.category-filter').length) {
        initCategoryFilter();
    }

    // Back to Top Button
    function initBackToTop() {
        // Add back to top button
        $('body').append('<button id="back-to-top" class="back-to-top"><i class="fas fa-chevron-up"></i></button>');
        
        // Show/hide button based on scroll position
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        });
        
        // Scroll to top when clicked
        $('#back-to-top').on('click', function() {
            $('html, body').animate({scrollTop: 0}, 800);
        });
    }

    // Initialize back to top
    initBackToTop();

})(jQuery);

// Additional CSS for JavaScript effects
const additionalCSS = `
<style>
.site-header.scrolled {
    background-color: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
}

.back-to-top {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 50px;
    height: 50px;
    background-color: var(--primary-color);
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.back-to-top.show {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    background-color: var(--accent-color);
    transform: translateY(-2px);
}

.newsletter-success {
    text-align: center;
    padding: 40px 20px;
}

.newsletter-success h4 {
    color: var(--white);
    margin-bottom: 15px;
}

.newsletter-success p {
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
}

@media (max-width: 768px) {
    .back-to-top {
        bottom: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
        font-size: 16px;
    }
}
</style>
`;

// Add the additional CSS to the head
document.head.insertAdjacentHTML('beforeend', additionalCSS);
