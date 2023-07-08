<?php
include('database.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create a new mysqli object
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_errno) {
    die('Failed to connect to MySQL: ' . $mysqli->connect_error);
}



// Prepare the SQL statement
$query = "INSERT INTO posts (title, body, image) VALUES (?, ?, ?)";

// Prepare the statement
$stmt = $mysqli->prepare($query);

// Bind the parameters
$stmt->bind_param("sss", $_POST['title'], $_POST['body'], $_POST['image']);

// Execute the statement
if (!$stmt->execute()) {
    die('Error executing the statement: ' . $stmt->error);
}

// Close the statement and the connection
$stmt->close();
$mysqli->close();

echo 'Post saved successfully!';
header('Location: index.php');
