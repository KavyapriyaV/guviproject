<?php
// Establish a connection to MySQL (replace these variables with your database credentials)
include("database.php");


// Get values from the form submission
$username = $_POST['username'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$id = $_POST['id'];

// Prepare and bind the SQL statement with placeholders for data insertion
$stmt = $conn->prepare("UPDATE users SET username = ?, dob = ?, age = ?, contact = ? WHERE id = ? ");
$stmt->bind_param("ssisi", $username,$dob, $age, $contact, $id);
// Execute the prepared statement
if ($stmt->execute()) {
    echo "updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
