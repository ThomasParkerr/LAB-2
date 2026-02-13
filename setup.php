<?php
/**
 * Database Setup Script
 * Run this file once to create the books table
 */

require_once '../config/database.php';

// Create connection without database selected
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql)) {
    echo "Database created successfully or already exists.\n";
}

// Select the database
$conn->select_db(DB_NAME);

// Create books table
$sql = "CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql)) {
    echo "Table 'books' created successfully or already exists.\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert sample data
$sql = "INSERT INTO books (name, phone) VALUES 
    ('The Great Gatsby', '0240111111'),
    ('To Kill a Mockingbird', '0240222222'),
    ('1984', '0240333333')";

if ($conn->query($sql)) {
    echo "Sample data inserted successfully.\n";
} else {
    // If data already exists, that's fine
    echo "Note: Sample data may already exist.\n";
}

$conn->close();
echo "\nSetup complete! Your API is ready to use.\n";
?>
