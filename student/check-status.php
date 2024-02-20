<?php
$request_id = $_POST['request_id'];

// Database connection
$mysqli = new mysqli("localhost", "username", "password", "pass_management");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the request exists and retrieve its status
$sql = "SELECT status FROM pass_requests WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $request_id);
$stmt->execute();
$stmt->bind_result($status);

if ($stmt->fetch()) {
    // Request exists
    echo "Your pass request (ID: $request_id) status is: $status";
} else {
    // Request does not exist
    echo "No pass request found with ID: $request_id";
}

$stmt->close();
$mysqli->close();
?>
