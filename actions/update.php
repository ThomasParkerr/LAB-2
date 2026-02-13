<?php
/**
 * Update Record Endpoint
 * POST request to update an existing book by ID
 */

require_once '../config/database.php';

// Check if required fields are provided
if (!isset($_POST['id']) || empty($_POST['id'])) {
    sendError('ID is required');
}

if (!isset($_POST['name']) || empty(trim($_POST['name']))) {
    sendError('Name is required');
}

if (!isset($_POST['phone']) || empty(trim($_POST['phone']))) {
    sendError('Phone is required');
}

$id = intval($_POST['id']);
$name = trim($_POST['name']);
$phone = trim($_POST['phone']);

if ($id <= 0) {
    sendError('Invalid ID');
}

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    sendError('Database connection failed');
}

// Update query
$sql = "UPDATE books SET name = ?, phone = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    $conn->close();
    sendError('Query preparation failed');
}

$stmt->bind_param('ssi', $name, $phone, $id);

if (!$stmt->execute()) {
    $stmt->close();
    $conn->close();
    sendError('Failed to update record');
}

// Check if any row was affected
if ($stmt->affected_rows === 0) {
    $stmt->close();
    $conn->close();
    sendError('Record not found or no changes made');
}

$stmt->close();
$conn->close();

// Send success response
sendSuccess();
?>
