<?php
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your MySQL password if set
$dbname = "registration"; // Ensure this database exists
$socket = "/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock"; // Replace with your socket path

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, null, $socket);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Prepare SQL query
    $sql = "INSERT INTO applications (name, email, phone, address) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $phone, $address);

    // Execute the query
    if ($stmt->execute()) {
        echo "<h2>Application submitted successfully!</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Address:</strong> $address</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
