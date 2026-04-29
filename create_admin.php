<?php
require_once 'config/db.php';

// Credentials provided by the user
$username = 'admin';
$password = '123456';
$full_name = 'Administrative User';
$email = 'admin@realestate.com';

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {
    // Check if user already exists
    $checkStmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $checkStmt->execute([$username]);
    $existingUser = $checkStmt->fetch();

    if ($existingUser) {
        // Update existing user
        $updateStmt = $pdo->prepare("UPDATE users SET password = ?, full_name = ?, email = ? WHERE username = ?");
        $updateStmt->execute([$hashedPassword, $full_name, $email, $username]);
        echo "Admin user updated successfully!<br>";
    } else {
        // Insert new user
        $insertStmt = $pdo->prepare("INSERT INTO users (username, password, full_name, email) VALUES (?, ?, ?, ?)");
        $insertStmt->execute([$username, $hashedPassword, $full_name, $email]);
        echo "Admin user created successfully!<br>";
    }
    
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Password: " . htmlspecialchars($password) . "<br>";
    echo "<b>Security Warning:</b> Please delete this file after use.";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
