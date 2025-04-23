<?php
// Replace with your hosting credentials
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$database = "your_db_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch bookings
$sql = "SELECT * FROM turf_bookings ORDER BY date DESC, time ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manager View - Turf Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-success fw-bold">Manager Dashboard - Turf Bookings</h2>
        <?php if ($result->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover bg-white">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Turf Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>AM/PM</th>
                            <th>Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["turf_name"] ?></td>
                            <td><?= $row["username"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["mobile"] ?></td>
                            <td><?= $row["date"] ?></td>
                            <td><?= $row["time"] ?></td>
                            <td><?= $row["ampm"] ?></td>
                            <td><?= $row["hours"] ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No bookings found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
