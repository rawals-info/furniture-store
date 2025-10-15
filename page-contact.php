<?php
/**
 * The template for displaying contact page
 * 
 * @package FurnitureStylo
 */

get_header(); ?>

<!-- DEBUG: CONTACT PAGE TEMPLATE LOADED - THIS SHOULD BE VISIBLE -->
<div style="background: red; color: white; padding: 10px; text-align: center; font-weight: bold;">
    CONTACT PAGE TEMPLATE IS LOADING - IF YOU SEE THIS, THE TEMPLATE IS WORKING
</div>

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
    <div class="contact-content">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h3>Get In Touch</h3>
                        <p>We're here to help you find the perfect furniture for your home. Contact us for personalized assistance.</p>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Visit Our Showroom</h4>
                                <p>1456 Dundas St E<br>Mississauga, ON L4X 1L4</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Call Us</h4>
                                <p>(905) 270-0666<br>Mon-Thu: 10:30AM-8:30PM<br>Fri-Sun: 11AM-7PM</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email Us</h4>
                                <p>stylofurniture1456@gmail.com<br>We'll respond within 24 hours</p>
                            </div>
                        </div>
                        
                        <div class="social-links">
                            <h4>Follow Us</h4>
                            <div class="social-icons">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="col-lg-8">
                    <div class="contact-form-wrapper">
                        <h3>Send Us a Message</h3>
                        <form class="contact-form" id="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name *</label>
                                        <input type="text" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email Address *</label>
                                        <input type="email" id="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject">Subject *</label>
                                        <select id="subject" name="subject" required>
                                            <option value="">Select a subject</option>
                                            <option value="general">General Inquiry</option>
                                            <option value="product">Product Information</option>
                                            <option value="quote">Request Quote</option>
                                            <option value="delivery">Delivery Information</option>
                                            <option value="support">Customer Support</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" name="message" rows="6" required placeholder="Tell us about your furniture needs..."></textarea>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane"></i> Send Message
                                </button>
                            </div>
                        </form>
                    </div>
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
                            </div>
                        </div>
                        
                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>What is your return policy?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>We offer a 30-day return policy for unused items in original packaging. Custom orders are non-returnable.</p>
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

.contact-info {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    height: fit-content;
}

.contact-info h3 {
    font-size: 28px;
    color: #2C2C2C;
    margin-bottom: 20px;
    font-family: 'Playfair Display', serif;
}

.contact-info > p {
    color: #666;
    margin-bottom: 30px;
    line-height: 1.6;
}

.contact-item {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
    align-items: flex-start;
}

.contact-icon {
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

.contact-details h4 {
    color: #2C2C2C;
    margin-bottom: 8px;
    font-size: 18px;
}

.contact-details p {
    color: #666;
    margin: 0;
    line-height: 1.5;
}

.social-links {
    margin-top: 30px;
    padding-top: 30px;
    border-top: 1px solid #eee;
}

.social-links h4 {
    color: #2C2C2C;
    margin-bottom: 15px;
}

.social-icons {
    display: flex;
    gap: 15px;
}

.social-icons a {
    width: 40px;
    height: 40px;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8B4513;
    transition: all 0.3s ease;
}

.social-icons a:hover {
    background: #8B4513;
    color: white;
    transform: translateY(-2px);
}

.contact-form-wrapper {
    background: #fff;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
}

.contact-form-wrapper h3 {
    font-size: 28px;
    color: #2C2C2C;
    margin-bottom: 30px;
    font-family: 'Playfair Display', serif;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2C2C2C;
    font-weight: 500;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 15px;
    border: 2px solid #e5e5e5;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #8B4513;
}

.form-group textarea {
    resize: vertical;
    min-height: 120px;
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

@media (max-width: 768px) {
    .page-title {
        font-size: 36px;
    }
    
    .contact-info,
    .contact-form-wrapper {
        padding: 25px;
    }
    
    .contact-item {
        flex-direction: column;
        text-align: center;
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
