<?php
// Your database connection code
include('database.php');
// Get the ID from the URL or wherever it's coming from
$id = $_POST['id']; // This should be sanitized to prevent SQL injection in a real scenario

// Prepare SQL statement using prepared statements
$stmt = $conn->prepare("SELECT id, username, email, age, contact, dob FROM users WHERE id = ?");
$stmt->bind_param("i", $id); // 'i' specifies the type of parameter (integer)

// Execute prepared statement
$stmt->execute();

// Bind result variables
$stmt->bind_result($userID, $username, $email, $age, $contact, $dob);

// Fetch and display result
if ($stmt->fetch()) {
    $data = array(
        'email' => $email,
        'username' => $username ,
        'age' => $age,
        'contact' => $contact,
        'dob' => $dob,
        'id' => $userID,
        'status' => 'success'
    );
        echo json_encode($data);
} else {
    echo "No user found with ID: $id";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
