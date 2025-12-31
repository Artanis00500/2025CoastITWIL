-- Create database
CREATE DATABASE IF NOT EXISTS shopsmart;
USE shopsmart;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT
);

-- Insert initial products
INSERT INTO products (name, price, description) VALUES
('Laptop', 8999.99, 'Powerful laptop'),
('Phone', 4999.99, 'Smartphone device'),
('Headphones', 999.99, 'Noise cancelling');
