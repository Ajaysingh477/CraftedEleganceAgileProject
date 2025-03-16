// Smooth scroll to categories section
function scrollToCategories() {
    const categoriesSection = document.getElementById('categories');
    categoriesSection.scrollIntoView({ behavior: 'smooth' });
}

// Header scroll effect
let lastScroll = 0;
const header = document.querySelector('header');

window.addEventListener('scroll', () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll <= 0) {
        header.style.transform = 'translateY(0)';
        return;
    }

    if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
        // Scroll down
        header.style.transform = 'translateY(-100%)';
    } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
        // Scroll up
        header.style.transform = 'translateY(0)';
    }

    lastScroll = currentScroll;
});

// Initialize intersection observer for fade-in animations
const observerOptions = {
    root: null,
    threshold: 0.1,
    rootMargin: '0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Apply fade-in animation to sections
document.querySelectorAll('section').forEach(section => {
    section.style.opacity = '0';
    section.style.transform = 'translateY(20px)';
    section.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
    observer.observe(section);
});

// Add hover effect to product cards
document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-10px)';
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
    });
});

// Scroll Button Handling
document.addEventListener("DOMContentLoaded", function () {
    const scrollBtn = document.getElementById("scroll-btn");

    window.addEventListener("scroll", () => {
        const scrollPos = window.scrollY;
        const windowHeight = window.innerHeight;
        const documentHeight = document.body.scrollHeight;

        // Show the button when user scrolls down a little and keep it visible in between
        if (scrollPos > 100 && scrollPos < documentHeight - windowHeight - 100) {
            scrollBtn.style.display = "block";
            scrollBtn.innerHTML = "⬇"; // Default: Scroll to bottom
        } else if (scrollPos >= documentHeight - windowHeight - 100) {
            scrollBtn.innerHTML = "⬆"; // Change icon to up arrow when near the bottom
        } else {
            scrollBtn.style.display = "none"; // Hide at the very top
        }
    });

    // Scroll action
    scrollBtn.addEventListener("click", () => {
        if (window.scrollY + window.innerHeight >= document.body.scrollHeight) {
            window.scrollTo({ top: 0, behavior: "smooth" });
            scrollBtn.innerHTML = "⬇";
        } else {
            window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
            scrollBtn.innerHTML = "⬆";
        }
    });
});

// Dark Mode Toggle
const darkModeToggle = document.getElementById('dark-mode-toggle');
const body = document.body;

// Check for saved user preference in localStorage
const savedTheme = localStorage.getItem('theme');
if (savedTheme) {
    body.setAttribute('data-theme', savedTheme);
    if (savedTheme === 'dark') {
        darkModeToggle.textContent = '☀️'; // Sun icon for light mode
    }
}

// Toggle Dark Mode
darkModeToggle.addEventListener('click', () => {
    if (body.getAttribute('data-theme') === 'dark') {
        body.setAttribute('data-theme', 'light');
        darkModeToggle.textContent = '🌙'; // Moon icon for dark mode
        localStorage.setItem('theme', 'light');
    } else {
        body.setAttribute('data-theme', 'dark');
        darkModeToggle.textContent = '☀️'; // Sun icon for light mode
        localStorage.setItem('theme', 'dark');
    }
});

// Login Form Handling
const loginForm = document.getElementById('login-form');
if (loginForm) {
    loginForm.addEventListener('submit', async function (e) {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Basic validation
        if (!email || !password) {
            alert('Please fill in all fields.');
            return;
        }

        // Send login request to the server
        try {
            const formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);

            const response = await fetch('login.php', {
                method: 'POST',
                body: formData, // Send as FormData
            });

            const data = await response.json();

            if (response.ok) {
                // Login successful
                localStorage.setItem('isLoggedIn', 'true');
                alert(`Logged in as ${email}`);
                window.location.href = 'index.php'; // Redirect to homepage
            } else {
                // Login failed
                alert(data.error || 'Login failed. Please try again.');
            }
        } catch (error) {
            console.error('Error during login:', error);
            alert('An error occurred. Please try again.');
        }
    });
}

// Signup Form Handling
const signupForm = document.getElementById('signup-form');
if (signupForm) {
    signupForm.addEventListener('submit', async function (e) {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        // Basic validation
        if (!name || !email || !password || !confirmPassword) {
            displayError('Please fill in all fields.');
            return;
        }

        if (password !== confirmPassword) {
            displayError('Passwords do not match.');
            return;
        }

        // Send signup request to the server
        try {
            const formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('password', password);
            formData.append('confirm-password', confirmPassword);

            const response = await fetch('signup.php', {
                method: 'POST',
                body: formData, // Send as FormData
            });

            const data = await response.json();

            if (response.ok) {
                // Signup successful
                localStorage.setItem('isLoggedIn', 'true');
                alert('Signup successful! Redirecting to homepage...');
                window.location.href = 'index.php'; // Redirect to homepage
            } else {
                // Signup failed
                displayError(data.error || 'Signup failed. Please try again.');
            }
        } catch (error) {
            console.error('Error during signup:', error);
            displayError('An error occurred. Please try again.');
        }
    });
}

// Function to display error messages
function displayError(message) {
    const errorDiv = document.getElementById('error-message');
    if (errorDiv) {
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
    }
}

// Update Navbar Based on Login Status
document.addEventListener("DOMContentLoaded", function () {
    const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
    const loginLink = document.getElementById('login-link');
    const signupLink = document.getElementById('signup-link');
    const logoutLink = document.getElementById('logout-link');

    if (isLoggedIn) {
        if (loginLink) loginLink.style.display = 'none';
        if (signupLink) signupLink.style.display = 'none';
        if (logoutLink) logoutLink.style.display = 'block';
    } else {
        if (loginLink) loginLink.style.display = 'block';
        if (signupLink) signupLink.style.display = 'block';
        if (logoutLink) logoutLink.style.display = 'none';
    }
});

// Fetch and display products
document.addEventListener('DOMContentLoaded', function () {
    const productGrid = document.querySelector('.product-grid');

    // Fetch products from products.json
    fetch('products.json')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(products => {
            // Clear existing products
            productGrid.innerHTML = '';

            // Display each product
            products.forEach(product => {
                const productCard = document.createElement('div');
                productCard.classList.add('product-card');
                productCard.innerHTML = `
                    <img src="${product.image}" alt="${product.name}">
                    <div class="product-info">
                        <h3>${product.name}</h3>
                        <p>${product.description}</p>
                        <span class="price">₹${product.price}</span>
                    </div>
                `;
                productGrid.appendChild(productCard);
            });
        })
        .catch(error => {
            console.error('Error fetching products:', error);
            // Display an error message to the user
            productGrid.innerHTML = '<p>Failed to load products. Please try again later.</p>';
        });
});