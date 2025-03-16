
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
    <title>Crafted Elegance - Timeless Furniture</title>
    <link rel="icon" type="image/x-icon" href="sofa.png">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@400;600&family=Teko:wght@400;500&family=Nunito:wght@400;600&display=swap" rel="stylesheet">
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

    <section class="hero">
        <div class="hero-content">
            <h1>Transform Your Home with Timeless Elegance</h1>
            <h2>Minimalism Meets Functionality</h2>
            <div class="cta-buttons">
                <a href="products.html" class="btn primary">Shop Now</a>
                <button class="btn secondary" onclick="scrollToCategories()">Explore Categories</button>
            </div>
        </div>
    </section>

    <section id="categories" class="categories">
        <h2>Our Collections</h2>
        <div class="category-grid">
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc" alt="Sofa">
                <div class="category-overlay">
                    <h3>Sofas</h3>
                </div>
            </div>
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd" alt="Desk">
                <div class="category-overlay">
                    <h3>Desks</h3>
                </div>
            </div>
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1595428774223-ef52624120d2" alt="Shelf">
                <div class="category-overlay">
                    <h3>Shelves</h3>
                </div>
            </div>
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85" alt="Bed">
                <div class="category-overlay">
                    <h3>Beds</h3>
                </div>
            </div>
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1503602642458-232111445657" alt="Chair">
                <div class="category-overlay">
                    <h3>Chairs</h3>
                </div>
            </div>
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1533090161767-e6ffed986c88" alt="Table">
                <div class="category-overlay">
                    <h3>Tables</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="featured-products">
        <h2>Featured Collection</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c" alt="Modern Sofa">
                <div class="product-info">
                    <h3>Modern Comfort Sofa</h3>
                    <p>Elegant design meets ultimate comfort</p>
                    <span class="price">₹12,999</span>
                </div>
            </div>
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85" alt="Wooden Chair">
                <div class="product-info">
                    <h3>Artisan Wooden Chair</h3>
                    <p>Handcrafted excellence</p>
                    <span class="price">₹3,999</span>
                </div>
            </div>
            <div class="product-card">
                <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126" alt="Dining Table">
                <div class="product-info">
                    <h3>Classic Dining Table</h3>
                    <p>Timeless elegance for your dining room</p>
                    <span class="price">₹8,999</span>
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
                <a href="index.php">Home</a>
                <a href="product.html">Shop</a>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact</a>
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