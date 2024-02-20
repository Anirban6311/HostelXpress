<!DOCTYPE html>
<html>
<head>
    <title>Approve Pass Requests</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #3498db;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #3498db;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #fff;
        }
        a {
            text-decoration: none;
            color: #3498db;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Approve Pass Requests</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Reason</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php
        $mysqli = new mysqli("localhost", "username", "password", "pass_management");

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "SELECT id, reason, created_at FROM pass_requests WHERE status = 'Pending'";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["reason"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo '<td><a href="approve-request.php?id=' . $row["id"] . '">Approve</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No pending requests</td></tr>";
        }

        $mysqli->close();
        ?>
    </table>
</body>
</html>
