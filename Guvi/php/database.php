<?php
// Establish a connection to MySQL (replace these variables with your database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guvi";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>