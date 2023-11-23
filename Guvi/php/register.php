<?php
// Establish a connection to MySQL (replace these variables with your database credentials)
include("database.php");


// Get values from the form submission
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; // Hash the password for security
$dob = $_POST['dob'];
$age = $_POST['age'];
$contact = $_POST['contact'];

// Prepare and bind the SQL statement with placeholders for data insertion
$stmt = $conn->prepare("INSERT INTO users (username, email, password, dob, age, contact) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssis", $username, $email, $password, $dob, $age, $contact);
// Execute the prepared statement
if ($stmt->execute()) {
    $data = array(
        'status' => 'success'
    );
    echo json_encode($data);

} else {
    $data = array(
        'status' => 'failure'
    );
    echo json_encode($data);

}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
