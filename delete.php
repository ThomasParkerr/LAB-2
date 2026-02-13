<?php
/**
 * Delete Record Endpoint
 * POST request to delete a book by ID
 */

require_once '../config/database.php';

// Check if ID is provided
if (!isset($_POST['id']) || empty($_POST['id'])) {
    sendError('ID is required');
}

$id = intval($_POST['id']);

if ($id <= 0) {
    sendError('Invalid ID');
}

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    sendError('Database connection failed');
}

// Delete query
$sql = "DELETE FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    $conn->close();
    sendError('Query preparation failed');
}

$stmt->bind_param('i', $id);

if (!$stmt->execute()) {
    $stmt->close();
    $conn->close();
    sendError('Failed to delete record');
}

// Check if any row was affected
if ($stmt->affected_rows === 0) {
    $stmt->close();
    $conn->close();
    sendError('Record not found');
}

$stmt->close();
$conn->close();

// Send success response
sendSuccess();
?>
