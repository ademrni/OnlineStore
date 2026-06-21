<?php
$host = 'thomas.proxy.rlwy.net';
$port = 58868;
$user = 'root';
$password = 'wjSABaWUIwXTOaRYZHxJEYioNdYTTRqj';
$database = 'railway';

$mysqli = new mysqli($host, $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

$result = $mysqli->query("SELECT id, name, email FROM users");

if ($result) {
    echo "Total users: " . $result->num_rows . "\n";
    while ($row = $result->fetch_assoc()) {
        echo "ID: {$row['id']}, Name: {$row['name']}, Email: {$row['email']}\n";
    }
} else {
    echo "Error: " . $mysqli->error . "\n";
}

$mysqli->close();
