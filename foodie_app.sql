-- Create Database
CREATE DATABASE foodie_app;
USE foodie_app;
-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Menu Items Table
CREATE TABLE menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category ENUM('all', 'burger', 'pizza') NOT NULL,
    image_url VARCHAR(255)
);
-- Cart Table
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    item_id INT,
    quantity INT DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (item_id) REFERENCES menu_items(id)
);
-- Sample Menu Items
INSERT INTO menu_items (name, description, price, category, image_url)
VALUES (
        'Hamburger',
        'Big meat and seasoned with sage, topped with smoky barbecue sauce',
        5.00,
        'burger',
        'hamburger.jpg'
    ),
    (
        'Cheese Pizza',
        'Classic pizza with mozzarella cheese',
        8.00,
        'pizza',
        'cheese-pizza.jpg'
    );