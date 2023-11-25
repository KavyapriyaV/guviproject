<?php

include("database.php");

$username = $_POST['username'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$contact = $_POST['contact'];
$id = $_POST['id'];

$stmt = $conn->prepare("UPDATE users SET username = ?, dob = ?, age = ?, contact = ? WHERE id = ? ");
$stmt->bind_param("ssisi", $username,$dob, $age, $contact, $id);

if ($stmt->execute()) {
    echo "updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
