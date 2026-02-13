<?php
/**
 * Read One Record Endpoint
 * GET request to retrieve a single book by ID
 */

require_once '../config/database.php';

// Check if ID parameter is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    sendError('ID parameter is required');
}

$id = intval($_GET['id']);

if ($id <= 0) {
    sendError('Invalid ID');
}

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    sendError('Database connection failed');
}

// Query to get book by ID
$sql = "SELECT id, name, phone FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    $conn->close();
    sendError('Query preparation failed');
}

$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $stmt->close();
    $conn->close();
    sendError('not found');
}

$book = $result->fetch_assoc();
$stmt->close();
$conn->close();

// Send success response with data
sendSuccess([
    'id' => (int)$book['id'],
    'name' => $book['name'],
    'phone' => $book['phone']
]);
?>
