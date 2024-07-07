CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    role ENUM('admin', 'committer') DEFAULT 'committer' NOT NULL,
    profile_picture VARCHAR(255),
    confirmed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Table for bookings
CREATE TABLE IF NOT EXISTS `bookings` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `location` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `date` DATE NOT NULL,
    `time` TIME NOT NULL,
    `payment_method` VARCHAR(50) NOT NULL,
    `pickup_stage` VARCHAR(255) NOT NULL,
    `status` ENUM('paid', 'not_paid') NOT NULL DEFAULT 'not_paid'
)

-- Table for bookings
CREATE TABLE IF NOT EXISTS `trips` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `location` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `date` DATE NOT NULL,
    `time` TIME NOT NULL,
    `payment_method` VARCHAR(50) NOT NULL,
    `pickup_stage` VARCHAR(255) NOT NULL,
    `status` ENUM('paid', 'not_paid') NOT NULL DEFAULT 'paid'
)