<?php
/**
 * Read All Records Endpoint
 * GET request to retrieve all books from database
 */

require_once '../config/database.php';

// Get database connection
$conn = getDBConnection();

if (!$conn) {
    sendError('Database connection failed');
}

// Query to get all books
$sql = "SELECT id, name, phone FROM books ORDER BY id ASC";
$result = $conn->query($sql);

if ($result === false) {
    $conn->close();
    sendError('Query execution failed');
}

// Fetch all records
$books = [];
while ($row = $result->fetch_assoc()) {
    $books[] = [
        'id' => (int)$row['id'],
        'name' => $row['name'],
        'phone' => $row['phone']
    ];
}

$conn->close();

// Send success response with data
sendSuccess($books);
?>
