<?php
include("database.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

     

        // Prepare SQL statement using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? and password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // User found, verify password
            $row = $result->fetch_assoc();
            $hashed_password = $row['id'];
            $data = array(
                'email' => $row['email'],
                'id' => $row['id'],
                'status' => 'success'
            );
                echo json_encode($data);
                // You can set session variables or perform other actions here
            } else {
                $data = array(
                    'status' => 'failure'
                );
                echo json_encode($data);

            }
        

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } else {
        $data = array(
            'status' => 'failure'
        );
        echo json_encode($data);
    }
}
?>
