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

-- Create events table
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    event_date DATETIME NOT NULL,
    location VARCHAR(255),
    image_url VARCHAR(255),
    status ENUM('upcoming', 'completed', 'cancelled') DEFAULT 'upcoming',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Seed Events
INSERT INTO events (title, description, event_date, location, image_url) VALUES 
('Luxury Villa Site Visit', 'Join us for an exclusive walkthrough of our latest luxury villa project in Skyline Heights. Experience premium living firsthand.', '2026-04-12 10:00:00', 'Skyline Heights, Mumbai', 'about1.png'),
('Oceanfront Apartment Launch', 'Be the first to see our new oceanfront smart apartments. Refreshments will be served.', '2026-04-15 11:30:00', 'Marine Drive, Mumbai', 'service2.png'),
('Investment Webinar', 'A session on the future of real estate investments in urban areas. Experts will share insights on ROI.', '2026-04-20 18:00:00', 'Online / Zoom', 'service3.png');

-- Create properties table
CREATE TABLE IF NOT EXISTS properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255),
    location VARCHAR(255),
    amenities TEXT,
    status ENUM('Available', 'Not Available') DEFAULT 'Available',
    category ENUM('Completed', 'Recent') DEFAULT 'Recent',
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create property_images table
CREATE TABLE IF NOT EXISTS property_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (property_id) REFERENCES properties(id) ON DELETE CASCADE
);

-- Seed Properties
INSERT INTO properties (name, location, amenities, status, category, image_url, description) VALUES 
('Skyline Luxury Villa', 'Downtown Mumbai', 'Pool, Gym, Smart Home, Garden', 'Available', 'Completed', 'hero.png', 'Focusing on structural integrity and spacious design. This completed residential project features premium sustainable glass.'),
('Vista Heights', 'Andheri West', 'Sky Garden, Office Hub, High Speed Internet', 'Available', 'Recent', 'service2.png', 'Redefining the skyline with commercial excellence. This upcoming landmark features Net Zero energy architecture.'),
('Urban Oasis', 'Bandra East', 'Retail Mall, Rooftop Lounge, Security', 'Not Available', 'Completed', 'service3.png', 'A flagship mixed-use achievement in the cultural district. Features rooftop leisure zones.'),
('Digital Plaza', 'Navi Mumbai', 'Tech Lab, Data Hub, Parking', 'Available', 'Recent', 'about1.png', 'Connecting global tech districts with net-zero infrastructure. Planned construction starting in late 2025.');
