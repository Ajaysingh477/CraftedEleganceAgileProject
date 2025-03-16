<?php
session_start(); 

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo '<script>localStorage.setItem("isLoggedIn", "true");</script>';
} else {
    echo '<script>localStorage.removeItem("isLoggedIn");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Crafted Elegance</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="sofa.png">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;600&family=Teko:wght@400;500&family=Nunito:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .contact-hero {
            height: 40vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                        url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6');
            background-size: cover;
            background-position: center;
        }

        #scroll-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    background: var(--color-desert-sand);
    color: white;
    border: none;
    border-radius: 50%;
    font-size: 20px;
    cursor: pointer;
    display: none; /* Initially hidden */
    transition: all 0.3s;
}

.logo a {
    text-decoration: none; 
    color: inherit; 
}

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }

        .contact-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .contact-form {
            background: var(--color-bone);
            padding: 2rem;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--color-ebony);
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--color-ash-gray);
            border-radius: 4px;
            font-family: 'Nunito', sans-serif;
        }

        .form-group textarea {
            height: 150px;
            resize: vertical;
        }

        .store-locations {
            margin-top: 4rem;
        }

        .store-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .store-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .store-card h3 {
            color: var(--color-desert-sand);
            margin-bottom: 1rem;
        }

        .store-hours {
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--color-ash-gray);
        }

        .contact-info-item {
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .contact-info-item strong {
            color: var(--color-desert-sand);
            min-width: 100px;
        }

        @media (max-width: 768px) {
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Dark Mode Variables */
:root {
    --color-bone: #e6dfcc;
    --color-ash-gray: #b6c3b2;
    --color-desert-sand: #cca793;
    --color-ebony: #5e6960;
    --background-color: #ffffff;
    --text-color: #333333;
    --header-bg: rgba(255, 255, 255, 0.95);
    --footer-bg: var(--color-ebony);
    --footer-text: white;
}

/* Dark Mode Overrides */
[data-theme="dark"] {
    --background-color: #1a1a1a;
    --text-color: #e6e6e6;
    --header-bg: rgba(26, 26, 26, 0.95);
    --footer-bg: #121212;
    --footer-text: #e6e6e6;
}

/* Apply Dark Mode Styles */
body {
    background-color: var(--background-color);
    color: var(--text-color);
}

header {
    background: var(--header-bg);
}

footer {
    background: var(--footer-bg);
    color: var(--footer-text);
}

/* Dark Mode Toggle Button */
.dark-mode-btn {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.2rem;
    transition: transform 0.3s;
}

.dark-mode-btn:hover {
    transform: scale(1.1);
}
    </style>
</head>
<body>
    <button id="scroll-btn">⬇</button>

    <header>
    <nav>
        <div class="logo">
            <a href="index.php">Crafted Elegance</a>
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <div class="dropdown">
                <a href="products.html" class="dropdown-trigger">Shop by Category <span class="arrow">▼</span></a>
                <div class="dropdown-content">
                    <a href="products.html?category=sofas">Sofas</a>
                    <a href="products.html?category=beds">Beds</a>
                    <a href="products.html?category=tables">Tables</a>
                    <a href="products.html?category=chairs">Chairs</a>
                    <a href="products.html?category=desks">Desks</a>
                    <a href="products.html?category=shelves">Shelves</a>
                </div>
            </div>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a>
            <div id="auth-links">
                <a href="login.php" id="login-link">Login</a>
                <a href="signup.php" id="signup-link">Sign Up</a>
                <a href="logout.php" id="logout-link" style="display: none;">Logout</a>
            </div>
        </div>
        <div class="nav-actions">
            <div class="search-container">
                <input type="text" placeholder="Search...">
                <button class="search-btn">🔍</button>
            </div>
            <button id="dark-mode-toggle" class="dark-mode-btn">🌙</button>
            <button class="cart-btn">🛒</button>
        </div>
    </nav>
</header>

    <section class="contact-hero hero">
        <div class="hero-content">
            <h1>Get in Touch</h1>
            <h2>We'd Love to Hear from You</h2>
        </div>
    </section>

    <div class="contact-container">
        <div class="contact-grid">
            <div class="contact-card">
                <h2>Contact Information</h2>
                <div class="contact-info">
                    <div class="contact-info-item">
                        <strong>Head Office:</strong>
                        <span>Crafted Elegance Tower, 123 Furniture Market, MG Road, Bangalore - 560001</span>
                    </div>
                    <div class="contact-info-item">
                        <strong>Phone:</strong>
                        <span>
                            +91 80 4567 8900 (General Inquiries)<br>
                            +91 80 4567 8901 (Customer Support)
                        </span>
                    </div>
                    <div class="contact-info-item">
                        <strong>Email:</strong>
                        <span>
                            info@craftedelegance.in<br>
                            support@craftedelegance.in
                        </span>
                    </div>
                    <div class="contact-info-item">
                        <strong>Hours:</strong>
                        <span>
                            Monday - Saturday: 10:00 AM - 8:00 PM<br>
                            Sunday: 11:00 AM - 6:00 PM
                        </span>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h2>Send Us a Message</h2>
                <form id="contactForm" onsubmit="return handleSubmit(event)">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="10-digit mobile number" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn primary">Send Message</button>
                </form>
            </div>
        </div>

        <div class="store-locations">
            <h2>Our Showrooms</h2>
            <div class="store-grid">
                <div class="store-card">
                    <h3>Bangalore Flagship Store</h3>
                    <p>123 Furniture Market, MG Road<br>Bangalore - 560001</p>
                    <p>Phone: +91 80 4567 8902</p>
                    <div class="store-hours">
                        <p><strong>Store Hours:</strong><br>
                        Mon-Sat: 10:00 AM - 8:00 PM<br>
                        Sun: 11:00 AM - 6:00 PM</p>
                    </div>
                </div>

                <div class="store-card">
                    <h3>Mumbai Experience Center</h3>
                    <p>456 Luxury Mall, Bandra West<br>Mumbai - 400050</p>
                    <p>Phone: +91 22 4567 8903</p>
                    <div class="store-hours">
                        <p><strong>Store Hours:</strong><br>
                        Mon-Sat: 11:00 AM - 9:00 PM<br>
                        Sun: 11:00 AM - 7:00 PM</p>
                    </div>
                </div>

                <div class="store-card">
                    <h3>Delhi Design Studio</h3>
                    <p>789 Home Boulevard, South Extension<br>New Delhi - 110049</p>
                    <p>Phone: +91 11 4567 8904</p>
                    <div class="store-hours">
                        <p><strong>Store Hours:</strong><br>
                        Mon-Sat: 10:30 AM - 8:30 PM<br>
                        Sun: 11:00 AM - 7:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: info@craftedelegance.in</p>
                <p>Phone: +91 80 4567 8900</p>
                <p>Address: 123 Furniture Market, MG Road, Bangalore - 560001</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <a href="index.html">Home</a>
                <a href="#">Shop</a>
                <a href="#">About Us</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#">Instagram</a>
                    <a href="#">Pinterest</a>
                    <a href="#">Facebook</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Crafted Elegance. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function handleSubmit(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData.entries());
            
         
            alert('Thank you for your message! We will get back to you soon.');
            
            event.target.reset();
            
            return false;
        }

        let lastScroll = 0;
        const header = document.querySelector('header');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll <= 0) {
                header.style.transform = 'translateY(0)';
                return;
            }
            
            if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
                header.style.transform = 'translateY(-100%)';
            } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
                header.style.transform = 'translateY(0)';
            }
            
            lastScroll = currentScroll;
        });

const darkModeToggle = document.getElementById('dark-mode-toggle');
const body = document.body;

const savedTheme = localStorage.getItem('theme');
if (savedTheme) {
    body.setAttribute('data-theme', savedTheme);
    if (savedTheme === 'dark') {
        darkModeToggle.textContent = '☀️'; 
    }
}

darkModeToggle.addEventListener('click', () => {
    if (body.getAttribute('data-theme') === 'dark') {
        body.setAttribute('data-theme', 'light');
        darkModeToggle.textContent = '🌙'; \
        localStorage.setItem('theme', 'light');
    } else {
        body.setAttribute('data-theme', 'dark');
        darkModeToggle.textContent = '☀️'; 
        localStorage.setItem('theme', 'dark');
    }
});
    </script>
    <script src="script.js"></script>
</body>
</html>
