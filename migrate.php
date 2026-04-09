<?php
// migrate.php - Automatic Database Setup Script

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'real_estate_db';
$charset = 'utf8mb4';

echo "<h1>Starting Database Migration...</h1>";

try {
    // 1. Connect to MySQL (without selecting a DB)
    $pdo = new PDO("mysql:host=$host;charset=$charset", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Create the Database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET $charset COLLATE utf8mb4_unicode_ci");
    echo "<p style='color: green;'>✔ Database '$db' checked/created.</p>";

    // 3. Switch to the new Database
    $pdo->exec("USE `$db`");

    // 4. Read the SQL file
    $sql_file = 'setup_db.sql';
    if (!file_exists($sql_file)) {
        die("<p style='color: red;'>✘ Error: '$sql_file' not found in root directory.</p>");
    }

    $sql = file_get_contents($sql_file);

    // 5. Execute the SQL commands
    // Split by semicolon (basic splitting, enough for this setup script)
    $queries = explode(';', $sql);
    $count = 0;
    foreach ($queries as $query) {
        $query = trim($query);
        if (!empty($query)) {
            $pdo->exec($query);
            $count++;
        }
    }
    
    echo "<p style='color: green;'>✔ $count SQL queries executed successfully.</p>";

    // 6. Explicitly ensure the admin password is correct (Avoid SQL encoding/delimiter issues)
    $passwordHash = password_hash('admin123', PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE username = 'admin'");
    $stmt->execute([$passwordHash]);
    echo "<p style='color: green;'>✔ Admin password explicitly verified/reset.</p>";
    
    echo "<div style='background: #CBFF54; color: #063231; padding: 20px; border-radius: 12px; margin-top: 30px; font-family: sans-serif;'>";
    echo "<h3>Migration Successful!</h3>";
    echo "<p>You can now log in at: <a href='login.php'>login.php</a></p>";
    echo "<p><strong>Username:</strong> admin | <strong>Password:</strong> admin123</p>";
    echo "</div>";

} catch (PDOException $e) {
    echo "<p style='color: red;'>✘ Migration Failed: " . $e->getMessage() . "</p>";
}
?>
