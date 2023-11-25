<?php
include("database.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? and password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            
            $row = $result->fetch_assoc();
            $hashed_password = $row['id'];
            $data = array(
                'email' => $row['email'],
                'id' => $row['id'],
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
    } else {
        $data = array(
            'status' => 'failure'
        );
        echo json_encode($data);
    }
}
?>
