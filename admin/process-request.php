<?php
$reason = $_POST['reason'];

// Database connection
$mysqli = new mysqli("localhost", "username", "password", "pass_management");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Insert the request
$sql = "INSERT INTO pass_requests (reason) VALUES (?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $reason);
if ($stmt->execute()) {
    // Request submitted successfully
    session_start();
    $_SESSION['message'] = 'Pass request submitted successfully. Please wait for approval.';
} else {
    // Request submission failed
    session_start();
    $_SESSION['message'] = 'Pass request submission failed. Please try again.';
}
$stmt->close();

$mysqli->close();

header("Location: request-pass.php");
?>
