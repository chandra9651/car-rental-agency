CREATE DATABASE car_rental;

USE car_rental;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100),
email VARCHAR(100) UNIQUE,
password VARCHAR(255),
role ENUM('customer','agency'),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cars (
id INT AUTO_INCREMENT PRIMARY KEY,
agency_id INT,
model VARCHAR(100),
vehicle_number VARCHAR(50),
seating_capacity INT,
rent_per_day INT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE bookings (
id INT AUTO_INCREMENT PRIMARY KEY,
customer_id INT,
car_id INT,
start_date DATE,
end_date DATE,
days INT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);