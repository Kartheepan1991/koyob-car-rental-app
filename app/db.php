<?php
// No Dotenv needed. Environment variables are injected directly by ECS Task Definition.

$conn = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASSWORD'],
    $_ENV['DB_NAME']
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
