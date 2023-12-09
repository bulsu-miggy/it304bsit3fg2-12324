<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "sad"; // Replace with your actual database name

    // Connection
    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $connection->prepare("DELETE FROM bookings_record WHERE FIRSTNAME = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();

    // Close the prepared statement and the connection
    $stmt->close();
    $connection->close();
}
header("Location: admin-pages.php");
exit();
?>
// Redirect back to the original page or wherever you want after deletion