<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo json_encode(['error' => 'Please fill in all fields.']);
        exit();
    }

    if ($password !== $confirmPassword) {
        echo json_encode(['error' => 'Passwords do not match.']);
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, NOW())");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $conn->lastInsertId();
            $_SESSION['logged_in'] = true;
            echo json_encode(['success' => true]);
            exit();
        } else {
            echo json_encode(['error' => 'Error creating account. Please try again.']);
            exit();
        }
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') {
            echo json_encode(['error' => 'Email already exists. Please use a different email.']);
        } else {
            // Other database errors
            echo json_encode(['error' => 'Error creating account: ' . $e->getMessage()]);
        }
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Crafted Elegance</title>
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

    <section class="auth-section">
        <div class="auth-container">
            <h2>Sign Up</h2>
            <div id="error-message" style="display: none; color: red; margin-bottom: 1rem;"></div>
            <form id="signup-form" method="POST" action="signup.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" required>
                </div>
                <button type="submit" class="btn primary">Sign Up</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
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
                <a href="products.html">Shop</a>
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