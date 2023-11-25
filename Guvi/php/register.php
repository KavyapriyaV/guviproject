<?php

include("database.php");

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; 
$dob = $_POST['dob'];
$age = $_POST['age'];
$contact = $_POST['contact'];

$stmt = $conn->prepare("INSERT INTO users (username, email, password, dob, age, contact) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssis", $username, $email, $password, $dob, $age, $contact);

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

$stmt->close();
$conn->close();
?>
