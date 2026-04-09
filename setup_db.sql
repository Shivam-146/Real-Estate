-- Setup Database for Real Estate Admin Panel

-- Create database if not exists
CREATE DATABASE IF NOT EXISTS real_estate_db;
USE real_estate_db;

-- Create users table for authentication
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert or Update default admin user (Username: admin, Password: admin123)
INSERT INTO users (username, password, full_name, email) 
VALUES ('admin', '$2y$10$hw6hA52Rr.3R7KkCGNhcbq25VN.RChrv9XY//TYeAxnaLNub', 'System Admin', 'admin@realestate.com')
ON DUPLICATE KEY UPDATE password = VALUES(password);

-- Create leads table for future use
CREATE TABLE IF NOT EXISTS leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_name VARCHAR(255),
    full_name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    message TEXT,
    status ENUM('new', 'contacted', 'closed') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
