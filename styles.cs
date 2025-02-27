:root {
    --primary-color: #2c3e50;
    --secondary-color: #3498db;
    --accent-color: #e74c3c;
    --light-gray: #f9f9f9;
    --dark-gray: #333;
    --white: #ffffff;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    color: var(--dark-gray);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
}

/* Navbar Styles */
.navbar {
    position: fixed;
    width: 100%;
    background-color: var(--white);
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    z-index: 1000;
}

.nav-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.nav-links a {
    text-decoration: none;
    color: var(--dark-gray);
    transition: color 0.3s ease;
}

.nav-links a:hover {
    color: var(--accent-color);
}

/* Header Styles */
header {
    height: 100vh;
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('images/hero-bg.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: var(--white);
}

.hero-text {
    max-width: 800px;
    padding: 2rem;
}

/* Button Styles */
.btn {
    display: inline-block;
    padding: 1rem 2rem;
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
}

.primary-btn {
    background-color: var(--accent-color);
    color: var(--white);
}

.secondary-btn {
    background-color: var(--secondary-color);
    color: var(--white);
}

/* Destination Cards */
.destination-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 2rem 0;
}

.destination-card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.destination-card:hover {
    transform: translateY(-5px);
}

.card-image img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-content {
    padding: 1.5rem;
}

/* Contact Form */
.contact-wrapper {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 2rem;
    margin-top: 2rem;
}

.form-group {
    margin-bottom: 1rem;
}

input, textarea {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ddd;
    border-radius: 5px;
}

textarea {
    height: 150px;
    resize: vertical;
}

/* Responsive Design */
@media (max-width: 768px) {
    .nav-links {
        display: none;
    }
    
    .contact-wrapper {
        grid-template-columns: 1fr;
    }
    
    .hamburger {
        display: block;
    }
}
