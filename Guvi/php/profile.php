<?php

include('database.php');

$id = $_POST['id']; 

$stmt = $conn->prepare("SELECT id, username, email, age, contact, dob FROM users WHERE id = ?");
$stmt->bind_param("i", $id); 

$stmt->execute();

$stmt->bind_result($userID, $username, $email, $age, $contact, $dob);

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

$stmt->close();
$conn->close();
?>
