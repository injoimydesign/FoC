-- Flag Subscription Application Database Setup
-- MySQL Database Schema

-- Create database
CREATE DATABASE IF NOT EXISTS flag_subscription CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE flag_subscription;

-- Users table
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NULL,
    role ENUM('customer', 'admin', 'staff') DEFAULT 'customer',
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Flags table
CREATE TABLE flags (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    base_price DECIMAL(8, 2) NOT NULL,
    image_url VARCHAR(500) NOT NULL,
    flag_type ENUM('us_flag', 'military_flag') DEFAULT 'us_flag',
    military_branch VARCHAR(100) NULL,
    active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Flag events table
CREATE TABLE flag_events (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Routes table
CREATE TABLE routes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    assigned_to BIGINT UNSIGNED NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Locations table
CREATE TABLE locations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    address VARCHAR(500) NOT NULL,
    lat DECIMAL(10, 8) NULL,
    lng DECIMAL(11, 8) NULL,
    notes TEXT NULL,
    route_id BIGINT UNSIGNED NULL,
    last_served TIMESTAMP NULL,
    active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (route_id) REFERENCES routes(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Subscriptions table
CREATE TABLE subscriptions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    flag_id BIGINT UNSIGNED NOT NULL,
    location_id BIGINT UNSIGNED NOT NULL,
    stripe_customer_id VARCHAR(255) NULL,
    stripe_subscription_id VARCHAR(255) NULL,
    subscription_type ENUM('one_time', 'yearly') DEFAULT 'yearly',
    subscription_tier ENUM('Basic', 'Premium', 'Enterprise') NULL,
    price DECIMAL(8, 2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NULL,
    active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (flag_id) REFERENCES flags(id) ON DELETE CASCADE,
    FOREIGN KEY (location_id) REFERENCES locations(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Payments table
CREATE TABLE payments (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    subscription_id BIGINT UNSIGNED NULL,
    stripe_payment_intent_id VARCHAR(255) NULL,
    stripe_session_id VARCHAR(255) NULL,
    amount DECIMAL(10, 2) NOT NULL,
    processing_fee DECIMAL(10, 2) DEFAULT 0.00,
    status ENUM('pending', 'completed', 'failed', 'refunded') DEFAULT 'pending',
    payment_type ENUM('one_time', 'subscription') DEFAULT 'one_time',
    metadata TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (subscription_id) REFERENCES subscriptions(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- Create indexes for better query performance
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_users_role ON users(role);
CREATE INDEX idx_flags_type ON flags(flag_type);
CREATE INDEX idx_flags_active ON flags(active);
CREATE INDEX idx_flag_events_date ON flag_events(date);
CREATE INDEX idx_locations_user ON locations(user_id);
CREATE INDEX idx_locations_route ON locations(route_id);
CREATE INDEX idx_subscriptions_user ON subscriptions(user_id);
CREATE INDEX idx_subscriptions_active ON subscriptions(active);
CREATE INDEX idx_payments_user ON payments(user_id);
CREATE INDEX idx_payments_status ON payments(status);

-- Insert initial data

-- Admin user (password: password)
INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'admin@flagservice.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
('Test Customer', 'customer@example.com', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'customer');

-- Insert flags
INSERT INTO flags (name, description, base_price, image_url, flag_type, military_branch, active) VALUES
('American Flag', 'Standard U.S. flag for yard display, 3'' x 5''', 45.00, 'https://images.unsplash.com/photo-1593352216840-1aee13f45818?w=800', 'us_flag', NULL, TRUE),
('Army Flag', 'United States Army flag for yard display', 50.00, 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/United_States_Army_flag.svg/800px-United_States_Army_flag.svg.png', 'military_flag', 'Army', TRUE),
('Navy Flag', 'United States Navy flag for yard display', 50.00, 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Flag_of_the_United_States_Navy.svg/800px-Flag_of_the_United_States_Navy.svg.png', 'military_flag', 'Navy', TRUE),
('Air Force Flag', 'United States Air Force flag for yard display', 50.00, 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Flag_of_the_United_States_Air_Force.svg/800px-Flag_of_the_United_States_Air_Force.svg.png', 'military_flag', 'Air Force', TRUE),
('Marines Flag', 'United States Marine Corps flag for yard display', 50.00, 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d6/Flag_of_the_United_States_Marine_Corps.svg/800px-Flag_of_the_United_States_Marine_Corps.svg.png', 'military_flag', 'Marines', TRUE);

-- Insert flag events (patriotic holidays)
INSERT INTO flag_events (name, date, description) VALUES
('Memorial Day', '2025-05-26', 'Honor and remember military personnel who died in service'),
('Flag Day', '2025-06-14', 'Commemorates the adoption of the U.S. flag'),
('Independence Day', '2025-07-04', 'Celebration of United States independence'),
('Labor Day', '2025-09-01', 'Honors the American labor movement'),
('Veterans Day', '2025-11-11', 'Honors military veterans who served in the United States Armed Forces');

-- Create a sample route
INSERT INTO routes (name, assigned_to) VALUES
('Main Street Route', 1);
