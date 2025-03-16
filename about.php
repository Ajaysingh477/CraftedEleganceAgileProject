<?php
session_start(); \


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
    <title>About Us - Crafted Elegance</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="sofa.png">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;600&family=Teko:wght@400;500&family=Nunito:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .about-hero {
            height: 40vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                        url('https://images.unsplash.com/photo-1631679706909-1844bbd07221');
            background-size: cover;
            background-position: center;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }

        .about-section {
            margin-bottom: 4rem;
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            margin-top: 2rem;
        }

        .about-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .about-card h3 {
            color: var(--color-desert-sand);
            margin-bottom: 1rem;
            font-family: 'Crimson Pro', serif;
        }

        .timeline {
            position: relative;
            max-width: 800px;
            margin: 3rem auto;
            padding: 2rem 0;
        }

        .timeline::before {
            content: '';
            position: absolute;
            width: 2px;
            background: var(--color-desert-sand);
            top: 0;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .timeline-item {
            margin-bottom: 2rem;
            position: relative;
            width: 50%;
            padding: 0 2rem;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
        }

        .timeline-content {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .timeline-year {
            color: var(--color-desert-sand);
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .team-section {
            background: var(--color-bone);
            padding: 4rem 2rem;
            margin-top: 4rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .team-member {
            text-align: center;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .team-member h3 {
            color: var(--color-desert-sand);
            margin-bottom: 0.5rem;
        }

        .team-member p {
            color: var(--color-ebony);
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .timeline::before {
                left: 0;
            }

            .timeline-item {
                width: 100%;
                left: 0 !important;
                padding-left: 2rem;
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

/* Dark Mode Togle Btn */
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

.logo a {
    text-decoration: none; 
    color: inherit; 
}
    </style>
</head>
<body>
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

    <section class="about-hero hero">
        <div class="hero-content">
            <h1>Our Story</h1>
            <h2>Crafting Excellence Since 1995</h2>
        </div>
    </section>

    <div class="about-container">
        <div class="about-section">
            <h2>Who We Are</h2>
            <div class="about-grid">
                <div class="about-card">
                    <h3>Our Vision</h3>
                    <p>To be India's most trusted and innovative furniture brand, creating spaces that inspire and enrich lives through timeless design and exceptional craftsmanship.</p>
                </div>
                <div class="about-card">
                    <h3>Our Mission</h3>
                    <p>To deliver exceptional furniture pieces that combine traditional Indian craftsmanship with contemporary design, while maintaining sustainable practices and supporting local artisans.</p>
                </div>
                <div class="about-card">
                    <h3>Our Values</h3>
                    <p>
                        • Excellence in Craftsmanship<br>
                        • Sustainable Practices<br>
                        • Customer-First Approach<br>
                        • Innovation in Design<br>
                        • Supporting Local Artisans
                    </p>
                </div>
            </div>
        </div>

        <div class="about-section">
            <h2>Our Journey</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">1995</div>
                        <h3>The Beginning</h3>
                        <p>Started as a small workshop in Bangalore with a team of skilled artisans.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2000</div>
                        <h3>First Retail Store</h3>
                        <p>Opened our flagship store on MG Road, Bangalore.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2010</div>
                        <h3>National Expansion</h3>
                        <p>Expanded to Mumbai and Delhi with experience centers.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2015</div>
                        <h3>Sustainability Initiative</h3>
                        <p>Launched our eco-friendly furniture line and sustainable practices.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2024</div>
                        <h3>Digital Transformation</h3>
                        <p>Embracing technology with virtual showrooms and online customization.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="team-section">
        <div class="about-container">
            <h2>Leadership Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a" alt="Rajesh Kumar">
                    <h3>Rajesh Kumar</h3>
                    <p class="position">Founder & CEO</p>
                    <p>30+ years of experience in furniture design and manufacturing</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2" alt="Priya Sharma">
                    <h3>Priya Sharma</h3>
                    <p class="position">Head of Design</p>
                    <p>Award-winning furniture designer with international experience</p>
                </div>
                <div class="team-member">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7" alt="Arun Patel">
                    <h3>Arun Patel</h3>
                    <p class="position">Operations Director</p>
                    <p>Expert in sustainable manufacturing practices</p>
                </div>
            </div>
        </div>
    </section>

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
                <a href="about.html">About Us</a>
                <a href="contact.html">Contact</a>
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

    <script src="script.js"></script>
</body>
</html>
