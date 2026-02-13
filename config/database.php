<?php
/**
 * Database Configuration
 * Update these credentials to match your MySQL server
 */

// Database connection parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');  // Update with your MySQL username
define('DB_PASS', 'your_password');  // Update with your MySQL password
define('DB_NAME', 'books_db');       // Update with your database name

/**
 * Get database connection
 * @return mysqli|null
 */
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        return null;
    }
    
    return $conn;
}

/**
 * Set JSON header for API responses
 */
function setJSONHeader() {
    header('Content-Type: application/json');
}

/**
 * Send JSON response
 * @param array $data
 */
function sendJSON($data) {
    setJSONHeader();
    echo json_encode($data);
    exit;
}

/**
 * Send error response
 * @param string $message
 */
function sendError($message) {
    sendJSON(['success' => false, 'error' => $message]);
}

/**
 * Send success response
 * @param mixed $data
 */
function sendSuccess($data = null) {
    $response = ['success' => true];
    if ($data !== null) {
        $response['data'] = $data;
    }
    sendJSON($response);
}
?>
