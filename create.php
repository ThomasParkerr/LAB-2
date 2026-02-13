<?php
/**
 * Create Record Endpoint
 * POST request to insert a new book into database
 */

require_once '../config/database.php';

// Check if required fields are provided
if (!isset($_POST['name']) || empty(trim($_POST['name']))) {
    sendError('Name is required');
}

if (!isset($_POST['phone']) || empty(trim($_POST['phone']))) {
    sendError('Phone is required');
}

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    sendError('Database connection failed');
}

// Insert query
$sql = "INSERT INTO books (name, phone) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    $conn->close();
    sendError('Query preparation failed');
}

$stmt->bind_param('ss', $name, $phone);

if (!$stmt->execute()) {
    $stmt->close();
    $conn->close();
    sendError('Failed to create record');
}

// Get the inserted ID
$insertedId = $stmt->insert_id;

$stmt->close();
$conn->close();

// Send success response with new ID
sendSuccess(['id' => $insertedId]);
?>
