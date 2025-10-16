<?php
/**
 * The template for displaying contact page
 * 
 * @package FurnitureStylo
 */

get_header(); ?>

<!-- Local Business Schema for Contact Page -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "name": "Contact New Stylo Furniture & Mattress",
    "description": "Contact New Stylo Furniture in Mississauga. Visit our showroom at 1456 Dundas St E or call (905) 270-0666. Free delivery within 25 miles.",
    "url": "<?php echo get_permalink(); ?>",
    "mainEntity": {
        "@type": "FurnitureStore",
        "name": "New Stylo Furniture & Mattress",
        "description": "Premium furniture and mattresses in Mississauga. Quality dining tables, beds, living room sets, and home decor.",
        "url": "<?php echo home_url(); ?>",
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
        "areaServed": [
            {
                "@type": "City",
                "name": "Mississauga"
            },
            {
                "@type": "City", 
                "name": "Toronto"
            },
            {
                "@type": "City",
                "name": "Brampton"
            },
            {
                "@type": "City",
                "name": "Oakville"
            }
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Furniture & Mattresses",
            "itemListElement": [
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Product",
                        "name": "Dining Tables"
                    }
                },
                {
                    "@type": "Offer", 
                    "itemOffered": {
                        "@type": "Product",
                        "name": "Beds & Mattresses"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Product", 
                        "name": "Living Room Furniture"
                    }
                },
                {
                    "@type": "Offer",
                    "itemOffered": {
                        "@type": "Product",
                        "name": "Home Decor"
                    }
                }
            ]
        }
    }
}
</script>

<main id="main" class="site-main contact-page" style="padding-top: 0 !important; margin-top: 0 !important;">
    <!-- Contact Hero -->
    <section class="contact-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="page-title">Contact Us</h1>
                    <p class="page-subtitle">Get in touch with our furniture experts</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <div class="contact-content" style="padding: 60px 0; background: #f8f9fa;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
            <div class="contact-layout" style="display: flex; gap: 40px; align-items: flex-start;">
                
                <!-- Contact Info Panel -->
                <div class="contact-info-panel" style="flex: 0 0 35%; background: #fff; border-radius: 15px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); position: relative;">
                    <h3 style="font-size: 28px; color: #2C2C2C; margin-bottom: 20px; font-family: 'Playfair Display', serif;">Get In Touch</h3>
                    <p style="color: #666; margin-bottom: 30px; line-height: 1.6;">We're here to help you find the perfect furniture for your home. Contact us for personalized assistance.</p>
                    
                    <div class="contact-item" style="display: flex; gap: 20px; margin-bottom: 30px; align-items: flex-start;">
                        <div class="contact-icon" style="width: 50px; height: 50px; background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; flex-shrink: 0;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                            <h4 style="color: #2C2C2C; margin-bottom: 8px; font-size: 18px;">Visit Our Showroom</h4>
                            <p style="color: #666; margin: 0; line-height: 1.5;">
                                <a href="https://maps.google.com/?q=1456+Dundas+St+E,+Mississauga,+ON+L4X+1L4" target="_blank" style="color: #8B4513; text-decoration: none; transition: color 0.3s ease;">
                                    1456 Dundas St E<br>Mississauga, ON L4X 1L4
                                </a>
                            </p>
                            </div>
                        </div>
                        
                    <div class="contact-item" style="display: flex; gap: 20px; margin-bottom: 30px; align-items: flex-start;">
                        <div class="contact-icon" style="width: 50px; height: 50px; background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; flex-shrink: 0;">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                            <h4 style="color: #2C2C2C; margin-bottom: 8px; font-size: 18px;">Call Us</h4>
                            <p style="color: #666; margin: 0; line-height: 1.5;">
                                <a href="tel:+19052700666" style="color: #8B4513; text-decoration: none; transition: color 0.3s ease; font-weight: 600;">(905) 270-0666</a><br>
                                Mon-Thu: 10:30AM-8:30PM<br>Fri-Sun: 11AM-7PM
                            </p>
                            </div>
                        </div>
                        
                    <div class="contact-item" style="display: flex; gap: 20px; margin-bottom: 30px; align-items: flex-start;">
                        <div class="contact-icon" style="width: 50px; height: 50px; background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 20px; flex-shrink: 0;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                            <h4 style="color: #2C2C2C; margin-bottom: 8px; font-size: 18px;">Email Us</h4>
                            <p style="color: #666; margin: 0; line-height: 1.5;">
                                <a href="mailto:stylofurniture1456@gmail.com" style="color: #8B4513; text-decoration: none; transition: color 0.3s ease; font-weight: 600;">stylofurniture1456@gmail.com</a><br>
                                We'll respond within 24 hours
                            </p>
                            </div>
                        </div>
                        
                    <div class="social-links" style="margin-top: 30px; padding-top: 30px; border-top: 1px solid #eee;">
                        <h4 style="color: #2C2C2C; margin-bottom: 15px;">Follow Us</h4>
                        <div class="social-icons" style="display: flex; gap: 15px; flex-wrap: wrap;">
                            <a href="https://www.instagram.com/newstylofurniture" target="_blank" style="width: 40px; height: 40px; background: #f8f9fa; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B4513; transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.tiktok.com/@newstylofurniture" target="_blank" style="width: 40px; height: 40px; background: #f8f9fa; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #8B4513; transition: all 0.3s ease; text-decoration: none;"><i class="fab fa-tiktok"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form Panel -->
                <div class="contact-form-panel" style="flex: 0 0 60%; background: #fff; border-radius: 15px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); position: relative;">
                    <h3 style="font-size: 28px; color: #2C2C2C; margin-bottom: 30px; font-family: 'Playfair Display', serif;">Send Us a Message</h3>
                    
                    <form class="contact-form" id="contact-form" style="position: relative;">
                        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 25px;">
                            <div class="form-group" style="flex: 1; position: relative;">
                                <label for="name" style="display: block; margin-bottom: 10px; color: #2C2C2C; font-weight: 500; font-size: 14px;">Full Name *</label>
                                <input type="text" id="name" name="name" required style="width: 100%; padding: 15px; border: 2px solid #e5e5e5; border-radius: 8px; font-size: 16px; background-color: #fff; box-sizing: border-box;">
                                    </div>
                            <div class="form-group" style="flex: 1; position: relative;">
                                <label for="email" style="display: block; margin-bottom: 10px; color: #2C2C2C; font-weight: 500; font-size: 14px;">Email Address *</label>
                                <input type="email" id="email" name="email" required style="width: 100%; padding: 15px; border: 2px solid #e5e5e5; border-radius: 8px; font-size: 16px; background-color: #fff; box-sizing: border-box;">
                                    </div>
                                </div>
                        
                        <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 25px;">
                            <div class="form-group" style="flex: 1; position: relative;">
                                <label for="phone" style="display: block; margin-bottom: 10px; color: #2C2C2C; font-weight: 500; font-size: 14px;">Phone Number</label>
                                <input type="tel" id="phone" name="phone" style="width: 100%; padding: 15px; border: 2px solid #e5e5e5; border-radius: 8px; font-size: 16px; background-color: #fff; box-sizing: border-box;">
                            </div>
                            <div class="form-group" style="flex: 1; position: relative;">
                                <label for="subject" style="display: block; margin-bottom: 10px; color: #2C2C2C; font-weight: 500; font-size: 14px;">Subject *</label>
                                <select id="subject" name="subject" required style="width: 100%; padding: 15px; border: 2px solid #e5e5e5; border-radius: 8px; font-size: 16px; background-color: #fff; box-sizing: border-box;">
                                            <option value="">Select a subject</option>
                                            <option value="general">General Inquiry</option>
                                            <option value="product">Product Information</option>
                                            <option value="quote">Request Quote</option>
                                            <option value="delivery">Delivery Information</option>
                                            <option value="support">Customer Support</option>
                                        </select>
                                </div>
                            </div>
                            
                        <div class="form-group" style="margin-bottom: 30px; position: relative;">
                            <label for="message" style="display: block; margin-bottom: 10px; color: #2C2C2C; font-weight: 500; font-size: 14px;">Message *</label>
                            <textarea id="message" name="message" rows="6" required placeholder="Tell us about your furniture needs..." style="width: 100%; padding: 15px; border: 2px solid #e5e5e5; border-radius: 8px; font-size: 16px; background-color: #fff; resize: vertical; min-height: 120px; box-sizing: border-box;"></textarea>
                            </div>
                            
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg" style="background-color: #8B4513; border-color: #8B4513; color: white; padding: 15px 30px; font-size: 16px; border-radius: 8px; transition: all 0.3s ease; border: none; cursor: pointer;">
                                    <i class="fas fa-paper-plane"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="text-center">Find Us</h3>
                    <div class="map-wrapper">
                        <div class="map-placeholder">
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Interactive Map Coming Soon</p>
                            <p>1456 Dundas St E, Mississauga, ON L4X 1L4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3>Frequently Asked Questions</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="faq-items">
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>Do you offer free delivery?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Yes, we offer free delivery within 25 miles of our showroom. Delivery fees may apply for longer distances.</p>
                                <p style="font-size: 12px; color: #8B4513; font-style: italic; margin-top: 5px;">Terms apply</p>
                            </div>
                        </div>
                        
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>Do you provide assembly services?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Yes, our professional team can assemble your furniture for an additional fee. Contact us for pricing.</p>
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>Can I customize furniture pieces?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Absolutely! We offer custom furniture solutions. Contact us to discuss your specific requirements.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
/* Contact Page Specific Styles - Fixed Layout Issues */
.contact-page {
    padding-top: 0px;
}

/* Ensure contact page uses the same header styling as other pages */
.contact-page .site-header {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%) !important;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1) !important;
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    z-index: 1000 !important;
    width: 100% !important;
    backdrop-filter: blur(10px) !important;
}

.contact-page .top-bar {
    background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%) !important;
    color: #ffffff !important;
    padding: 8px 0 !important;
    font-size: 14px !important;
    position: relative !important;
}

.contact-page .main-header {
    background-color: #ffffff !important;
    padding: 15px 0 !important;
    border-bottom: 1px solid rgba(139, 69, 19, 0.1) !important;
}

/* Force contact info styling in header */
.contact-page .contact-info {
    display: flex !important;
    gap: 20px !important;
    align-items: center !important;
    font-size: 14px !important;
}

.contact-page .contact-info span {
    display: flex !important;
    align-items: center !important;
    gap: 5px !important;
}

.contact-page .contact-info a {
    color: #ffffff !important;
    text-decoration: none !important;
}

.contact-page .contact-info i {
    color: #D2B48C !important;
}

/* Force footer contact info styling on contact page */
.contact-page .site-footer .footer-widget .contact-info p {
    color: #ffffff !important;
    margin-bottom: 10px !important;
    background: transparent !important;
}

.contact-page .site-footer .footer-widget .contact-info a {
    color: #ffffff !important;
    text-decoration: none !important;
}

.contact-page .site-footer .footer-widget .contact-info i {
    color: #D2B48C !important;
    margin-right: 8px !important;
}

.contact-page .site-footer .footer-widget .contact-info {
    background: transparent !important;
}

.contact-page .site-footer {
    background: #2C2C2C !important;
    color: #ffffff !important;
}

.contact-hero {
    background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
    color: white;
    padding: 80px 0 60px 0;
    margin-top: 140px;
    margin-bottom: 60px;
}

.page-title {
    font-size: 48px;
    font-weight: 700;
    margin-bottom: 20px;
    font-family: 'Playfair Display', serif;
}

.page-subtitle {
    font-size: 20px;
    opacity: 0.9;
    margin: 0;
}

.contact-content {
    margin-bottom: 80px;
}

/* FIXED: Contact Info Panel - Proper positioning and spacing */
.contact-content .contact-info {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    height: fit-content;
    position: relative;
    z-index: 1;
}

.contact-content .contact-info h3 {
    font-size: 28px;
    color: #2C2C2C;
    margin-bottom: 20px;
    font-family: 'Playfair Display', serif;
}

.contact-content .contact-info > p {
    color: #666;
    margin-bottom: 30px;
    line-height: 1.6;
}

.contact-content .contact-item {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    align-items: flex-start;
    position: relative;
    z-index: 2;
}

.contact-content .contact-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #8B4513 0%, #A0522D 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    flex-shrink: 0;
}

.contact-content .contact-details h4 {
    color: #2C2C2C;
    margin-bottom: 8px;
    font-size: 18px;
}

.contact-content .contact-details p {
    color: #666;
    margin: 0;
    line-height: 1.5;
}

/* FIXED: Social Links - Proper positioning and isolation */
.contact-content .social-links {
    margin-top: 30px;
    padding-top: 30px;
    border-top: 1px solid #eee;
    position: relative;
    z-index: 3;
}

.contact-content .social-links h4 {
    color: #2C2C2C;
    margin-bottom: 15px;
}

.contact-content .social-icons {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.contact-content .social-icons a {
    width: 40px;
    height: 40px;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8B4513;
    transition: all 0.3s ease;
    text-decoration: none;
}

.contact-content .social-icons a:hover {
    background: #8B4513;
    color: white;
    transform: translateY(-2px);
}

/* FIXED: Contact Form Wrapper - Proper grid layout and spacing */
.contact-content .contact-form-wrapper {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    position: relative;
    z-index: 1;
}

.contact-content .contact-form-wrapper h3 {
    font-size: 28px;
    color: #2C2C2C;
    margin-bottom: 30px;
    font-family: 'Playfair Display', serif;
}

/* FIXED: Form Groups - Proper spacing and no overlapping */
.contact-content .form-group {
    margin-bottom: 25px;
    position: relative;
    z-index: 2;
}

.contact-content .form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2C2C2C;
    font-weight: 500;
    position: relative;
    z-index: 3;
}

.contact-content .form-group input,
.contact-content .form-group select,
.contact-content .form-group textarea {
    width: 100%;
    padding: 15px;
    border: 2px solid #e5e5e5;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
    position: relative;
    z-index: 2;
    background-color: #fff;
}

.contact-content .form-group input:focus,
.contact-content .form-group select:focus,
.contact-content .form-group textarea:focus {
    outline: none;
    border-color: #8B4513;
}

.contact-content .form-group textarea {
    resize: vertical;
    min-height: 120px;
}

/* FIXED: Bootstrap Grid Overrides for Contact Form */
.contact-content .row {
    margin-left: -15px;
    margin-right: -15px;
}

.contact-content .col-md-6 {
    padding-left: 15px;
    padding-right: 15px;
    position: relative;
    z-index: 2;
}

/* FIXED: Button Styling */
.contact-content .btn-primary {
    background-color: #8B4513;
    border-color: #8B4513;
    color: white;
    padding: 15px 30px;
    font-size: 16px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.contact-content .btn-primary:hover {
    background-color: #A0522D;
    border-color: #A0522D;
    transform: translateY(-2px);
}

.map-section {
    margin-bottom: 80px;
}

.map-section h3 {
    font-size: 32px;
    color: #2C2C2C;
    margin-bottom: 40px;
    font-family: 'Playfair Display', serif;
}

.map-wrapper {
    background: #f8f9fa;
    border-radius: 15px;
    padding: 60px 20px;
    text-align: center;
}

.map-placeholder {
    color: #666;
}

.map-placeholder i {
    font-size: 48px;
    color: #8B4513;
    margin-bottom: 20px;
}

.map-placeholder p {
    margin: 10px 0;
    font-size: 18px;
}

.faq-section {
    margin-bottom: 80px;
}

.faq-section h3 {
    font-size: 32px;
    color: #2C2C2C;
    margin-bottom: 50px;
    font-family: 'Playfair Display', serif;
}

.faq-items {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.faq-item {
    border-bottom: 1px solid #eee;
}

.faq-item:last-child {
    border-bottom: none;
}

.faq-question {
    padding: 25px 30px;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.3s ease;
}

.faq-question:hover {
    background-color: #f8f9fa;
}

.faq-question h4 {
    color: #2C2C2C;
    margin: 0;
    font-size: 18px;
}

.faq-question i {
    color: #8B4513;
    transition: transform 0.3s ease;
}

.faq-item.active .faq-question i {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 30px;
    max-height: 0;
    overflow: hidden;
    transition: all 0.3s ease;
}

.faq-item.active .faq-answer {
    padding: 0 30px 25px;
    max-height: 200px;
}

.faq-answer p {
    color: #666;
    margin: 0;
    line-height: 1.6;
}

/* FIXED: Mobile Responsive Design */
@media (max-width: 768px) {
    .page-title {
        font-size: 36px;
    }
    
    .contact-content .contact-info,
    .contact-content .contact-form-wrapper {
        padding: 25px;
        margin-bottom: 30px;
    }
    
    .contact-content .contact-item {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }
    
    .contact-content .social-icons {
        justify-content: center;
    }
    
    .faq-question {
        padding: 20px;
    }
    
    .faq-answer {
        padding: 0 20px;
    }
    
    .faq-item.active .faq-answer {
        padding: 0 20px 20px;
    }
}

/* CRITICAL: Prevent any overlapping issues - ULTRA HIGH SPECIFICITY */
body.contact-page .contact-content * {
    box-sizing: border-box !important;
}

body.contact-page .contact-content .row {
    display: flex !important;
    flex-wrap: wrap !important;
    margin-left: -15px !important;
    margin-right: -15px !important;
    width: 100% !important;
}

body.contact-page .contact-content .col-lg-4,
body.contact-page .contact-content .col-lg-8 {
    position: relative !important;
    width: 100% !important;
    padding-left: 15px !important;
    padding-right: 15px !important;
    float: none !important;
    clear: none !important;
}

/* FORCE PROPER LAYOUT - OVERRIDE ALL BOOTSTRAP CONFLICTS */
body.contact-page .contact-content .container {
    max-width: 1200px !important;
    margin: 0 auto !important;
    padding: 0 15px !important;
}

body.contact-page .contact-content .row {
    margin: 0 -15px !important;
    display: flex !important;
    flex-wrap: wrap !important;
}

body.contact-page .contact-content .col-lg-4 {
    flex: 0 0 33.333333% !important;
    max-width: 33.333333% !important;
    padding: 0 15px !important;
    margin-bottom: 30px !important;
}

body.contact-page .contact-content .col-lg-8 {
    flex: 0 0 66.666667% !important;
    max-width: 66.666667% !important;
    padding: 0 15px !important;
}

/* FORCE CONTACT INFO PANEL LAYOUT */
body.contact-page .contact-content .contact-info {
    background: #fff !important;
    border-radius: 15px !important;
    padding: 40px !important;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1) !important;
    height: auto !important;
    position: relative !important;
    z-index: 1 !important;
    margin-bottom: 0 !important;
    overflow: visible !important;
}

/* FORCE CONTACT FORM LAYOUT */
body.contact-page .contact-content .contact-form-wrapper {
    background: #fff !important;
    border-radius: 15px !important;
    padding: 40px !important;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1) !important;
    position: relative !important;
    z-index: 1 !important;
    margin-bottom: 0 !important;
    overflow: visible !important;
}

/* FORCE FORM ELEMENTS TO NOT OVERLAP */
body.contact-page .contact-content .form-group {
    margin-bottom: 25px !important;
    position: relative !important;
    z-index: 2 !important;
    clear: both !important;
    overflow: visible !important;
}

body.contact-page .contact-content .form-group label {
    display: block !important;
    margin-bottom: 8px !important;
    color: #2C2C2C !important;
    font-weight: 500 !important;
    position: relative !important;
    z-index: 3 !important;
    clear: both !important;
}

body.contact-page .contact-content .form-group input,
body.contact-page .contact-content .form-group select,
body.contact-page .contact-content .form-group textarea {
    width: 100% !important;
    padding: 15px !important;
    border: 2px solid #e5e5e5 !important;
    border-radius: 8px !important;
    font-size: 16px !important;
    transition: border-color 0.3s ease !important;
    position: relative !important;
    z-index: 2 !important;
    background-color: #fff !important;
    margin-bottom: 0 !important;
    clear: both !important;
}

/* FORCE SOCIAL ICONS TO STAY IN PLACE */
body.contact-page .contact-content .social-links {
    margin-top: 30px !important;
    padding-top: 30px !important;
    border-top: 1px solid #eee !important;
    position: relative !important;
    z-index: 3 !important;
    clear: both !important;
    overflow: visible !important;
}

body.contact-page .contact-content .social-icons {
    display: flex !important;
    gap: 15px !important;
    flex-wrap: wrap !important;
    position: relative !important;
    z-index: 3 !important;
}

body.contact-page .contact-content .social-icons a {
    width: 40px !important;
    height: 40px !important;
    background: #f8f9fa !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #8B4513 !important;
    transition: all 0.3s ease !important;
    text-decoration: none !important;
    position: relative !important;
    z-index: 3 !important;
}

/* MOBILE RESPONSIVE FIXES */
@media (max-width: 991px) {
    .contact-layout {
        flex-direction: column !important;
        gap: 30px !important;
    }
    
    .contact-info-panel,
    .contact-form-panel {
        flex: none !important;
        width: 100% !important;
    }
}

@media (max-width: 768px) {
    .contact-content {
        padding: 40px 0 !important;
    }
    
    .container {
        padding: 0 15px !important;
    }
    
    .contact-info-panel,
    .contact-form-panel {
        padding: 25px !important;
    }
    
    .contact-item {
        flex-direction: column !important;
        text-align: center !important;
        gap: 15px !important;
    }
    
    .social-icons {
        justify-content: center !important;
    }
    
    .form-row {
        flex-direction: column !important;
        gap: 0 !important;
    }
    
    .form-group {
        margin-bottom: 20px !important;
    }
}
    /* Contact Links Hover Effects */
    .contact-details a:hover {
        color: #A0522D !important;
        text-decoration: underline !important;
}
</style>

<script>
// FAQ Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', function() {
            // Close other items
            faqItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active');
        });
    });
});

// Contact Form Handling
document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(this);
    
    // Show success message (in real implementation, you'd send this to your server)
    alert('Thank you for your message! We\'ll get back to you soon.');
    
    // Reset form
    this.reset();
});
</script>

<?php get_footer(); ?>
