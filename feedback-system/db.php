<?php
$host = 'localhost';  // Hostname
$dbname = 'feedback_system';  // Database name (Make sure this matches your database in MAMP)
$username = 'root';  // MySQL username
$password = 'root';  // MySQL password (default for MAMP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
