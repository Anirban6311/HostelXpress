<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $mysqli = new mysqli("localhost", "username", "password", "pass_management");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Update the request status to 'Approved'
    $sql = "UPDATE pass_requests SET status = 'Approved' WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Move the request to the approved_passes table
    $sql = "INSERT INTO approved_passes (reason) SELECT reason FROM pass_requests WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    $mysqli->close();
}

header("Location: approve-pass.php");
?>
