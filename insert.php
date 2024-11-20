<?php
require "conn.php";
require "filech.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phno = $_POST['phno'];


    if (!empty($firstname) && !empty($lastname) && !empty($dob) && !empty($email) && !empty($gender) && !empty($phno)) {
        
        $SELECT = "SELECT email FROM $tbname WHERE email = ? LIMIT 1";
        $INSERT = "INSERT INTO $tbname (firstname, lastname, dob, email, gender, phno) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssi", $firstname, $lastname, $dob, $email, $gender, $phno);
            $stmt->execute();
            echo "New record inserted successfully.";
        } else {
            echo "Someone already registered using this email.";
        }
        
        $stmt->close();
        $conn->close();
    } else {
        echo "All fields are required.";
        die();
    }
}

?>