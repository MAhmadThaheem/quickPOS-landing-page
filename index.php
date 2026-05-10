<?php
// Contact Form Processing
$success_msg = '';
$error_msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_contact'])) {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_msg = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = "Please provide a valid email address.";
    } else {
        // In a real app, send email here. For now, simulate success.
        $success_msg = "Thank you, $name! Your message has been sent successfully. We will get back to you soon.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuickPOS - The Last POS System You'll Ever Need</title>
    <meta name="description" content="QuickPOS is a modern, clean, and professional Point of Sale system designed to streamline your business operations.">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/hero.css">
</head>
<body>
    <!-- Background Elements -->
    <div class="bg-glow bg-glow-blue"></div>
    <div class="bg-glow bg-glow-purple"></div>

    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <main class="hero-section" id="home">
        <div class="container hero-container">
            <div class="hero-content">
                <div class="hero-badge">✨ The Next Generation POS</div>
                <h1 class="hero-title">Manage Your Business <span>Brilliantly</span></h1>
                <p class="hero-desc">Experience lightning-fast transactions, powerful analytics, and seamless multi-store management with our stunningly intuitive glassmorphism interface.</p>
                <div class="hero-cta">
                    <a href="#pricing" class="btn btn-primary">Start Free Trial</a>
                    <a href="#features" class="btn btn-outline">Explore Features</a>
                </div>
            </div>
            
            <div class="hero-graphic">
                <div class="hero-glow"></div>
                <div class="glass-card-main">
                    <div class="glass-card-header">
                        <span class="glass-card-title">Dashboard Overview</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--text-muted);"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </div>
                    <div class="glass-stats">
                        <div class="glass-stat-box">
                            <div class="stat-label">Total Sales Today</div>
                            <div class="stat-value">$4,289.50</div>
                            <div class="chart-line"></div>
                        </div>
                        <div class="glass-stat-box">
                            <div class="stat-label">Active Orders</div>
                            <div class="stat-value" style="color: var(--primary);">24</div>
                            <div class="chart-line" style="background: linear-gradient(90deg, transparent, var(--primary));"></div>
                        </div>
                    </div>
                    <div style="margin-top: 1.5rem;">
                        <div class="stat-label">Recent Transactions</div>
                        <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--glass-border);">
                            <span>Order #1042</span>
                            <span style="color: #34d399; font-weight: 500;">+$120.00</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                            <span>Order #1043</span>
                            <span style="color: #34d399; font-weight: 500;">+$85.50</span>
                        </div>
                    </div>
                </div>
                
                <div class="glass-card-floating float-1">
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        <span style="font-weight: 600; font-size: 0.9rem;">Payment Success</span>
                    </div>
                    <p style="font-size: 0.8rem; color: var(--text-muted); margin: 0;">Card ending in 4242</p>
                </div>
                
                <div class="glass-card-floating float-2">
                    <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        <span style="font-weight: 600; font-size: 0.9rem;">Revenue Target</span>
                    </div>
                    <div style="width: 100%; height: 6px; background: rgba(255,255,255,0.1); border-radius: 3px; overflow: hidden; margin-top: 0.5rem;">
                        <div style="width: 78%; height: 100%; background: var(--accent); border-radius: 3px;"></div>
                    </div>
                    <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.5rem; text-align: right; margin-bottom: 0;">78% Reached</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Powerful Features</h2>
                <p class="section-subtitle">Everything you need to run your business efficiently, packed into one intuitive platform.</p>
            </div>
            
            <div class="features-grid">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                    </div>
                    <h3 class="feature-title">Real-time Inventory</h3>
                    <p class="feature-desc">Track stock levels across all your locations instantly. Never run out of your best-selling items again.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <h3 class="feature-title">Advanced Analytics</h3>
                    <p class="feature-desc">Gain actionable insights with comprehensive sales reports, profit margins, and performance metrics.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </div>
                    <h3 class="feature-title">Multi-store Management</h3>
                    <p class="feature-desc">Control all your physical stores and online channels from a single, unified dashboard seamlessly.</p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    </div>
                    <h3 class="feature-title">Customer Loyalty</h3>
                    <p class="feature-desc">Build lasting relationships with built-in rewards programs, targeted promotions, and customer profiles.</p>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    </div>
                    <h3 class="feature-title">Seamless Integrations</h3>
                    <p class="feature-desc">Connect with your favorite accounting, marketing, and e-commerce platforms effortlessly.</p>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    </div>
                    <h3 class="feature-title">24/7 Support</h3>
                    <p class="feature-desc">Get help whenever you need it with our dedicated customer success team available around the clock.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Pricing Section -->
    <section id="pricing" class="pricing-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Transparent Pricing</h2>
                <p class="section-subtitle">Choose the perfect plan for your business size and needs.</p>
            </div>
            
            <div class="pricing-grid">
                <!-- Starter Tier -->
                <div class="pricing-card">
                    <div class="tier-name">Starter</div>
                    <div class="price"><span>$</span>29<span>/mo</span></div>
                    <p class="tier-desc">Perfect for small shops just getting started.</p>
                    <ul class="feature-list">
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> 1 Store Location</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Basic Inventory</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Standard Reporting</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Email Support</li>
                    </ul>
                    <a href="#" class="btn btn-outline">Get Started</a>
                </div>

                <!-- Professional Tier (Popular) -->
                <div class="pricing-card popular">
                    <div class="popular-badge">Most Popular</div>
                    <div class="tier-name">Professional</div>
                    <div class="price"><span>$</span>79<span>/mo</span></div>
                    <p class="tier-desc">Advanced features for growing businesses.</p>
                    <ul class="feature-list">
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Up to 5 Store Locations</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Advanced Inventory & Alerts</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Custom Analytics Dashboard</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Customer Loyalty Program</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> 24/7 Priority Support</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Start Free Trial</a>
                </div>

                <!-- Enterprise Tier -->
                <div class="pricing-card">
                    <div class="tier-name">Enterprise</div>
                    <div class="price" style="font-size: 2.5rem; display: block; padding: 0.5rem 0;">Custom</div>
                    <p class="tier-desc">Tailored solutions for large scale operations.</p>
                    <ul class="feature-list">
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Unlimited Locations</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Dedicated Account Manager</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Custom API Integrations</li>
                        <li><svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> On-site Training</li>
                    </ul>
                    <a href="#" class="btn btn-outline">Contact Sales</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Get In Touch</h2>
                <p class="section-subtitle">Have questions? Our team is ready to help you elevate your business.</p>
            </div>
            
            <div class="contact-container">
                <div class="contact-info">
                    <h3 class="contact-heading">Contact Information</h3>
                    <p class="contact-desc">Fill out the form and our team will get back to you within 24 hours.</p>
                    
                    <div class="info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                        <span>+1 (555) 123-4567</span>
                    </div>
                    <div class="info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <span>support@quickpos.com</span>
                    </div>
                    <div class="info-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        <span>123 Commerce St, Tech City</span>
                    </div>
                </div>

                <div class="contact-form-wrapper">
                    <?php if (!empty($success_msg)): ?>
                        <div class="alert alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                            <?php echo $success_msg; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($error_msg)): ?>
                        <div class="alert alert-error">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            <?php echo $error_msg; ?>
                        </div>
                    <?php endif; ?>

                    <form action="#contact" method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" class="form-control" required placeholder="John Doe" value="<?php echo isset($_POST['name']) && empty($success_msg) ? htmlspecialchars($_POST['name']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" class="form-control" required placeholder="john@company.com" value="<?php echo isset($_POST['email']) && empty($success_msg) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" class="form-control" required placeholder="How can we help?" value="<?php echo isset($_POST['subject']) && empty($success_msg) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" class="form-control" rows="5" required placeholder="Tell us more about your needs..."><?php echo isset($_POST['message']) && empty($success_msg) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                        </div>
                        <button type="submit" name="submit_contact" class="btn btn-primary btn-submit">
                            Send Message
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 8px;"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>
