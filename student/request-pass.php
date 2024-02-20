<!DOCTYPE html>
<html>
<head>
    <title>Request Pass</title>
    <style>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        p {
            background-color: #ecf0f1;
            padding: 10px;
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #3498db;
        }
    </style>

</head>
<body>
    <h1>Request a Pass</h1>
    <?php
    // Check for a session message and display it
    session_start();
    if (isset($_SESSION['message'])) {
        echo '<p>' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']); // Clear the message after displaying it
    }
    ?>
    
    <!-- Display the ID of the last requested pass -->
    <?php
    $mysqli = new mysqli("localhost", "username", "password", "pass_management");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Fetch the ID of the last requested pass
    $sql = "SELECT MAX(id) AS last_request_id FROM pass_requests";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastRequestId = $row['last_request_id'];
        echo "The ID of your last requested pass is: " . $lastRequestId;
    }

    $mysqli->close();
    ?>

    <form method="POST" action="process-request.php">
        Reason: <input type="text" name="reason" required>
        <button type="submit">Submit Request</button>
    </form>
    
    <!-- Link to check pass status page -->
    <a href="check-pass-status.php">Check Pass Status</a>
</body>
</html>
