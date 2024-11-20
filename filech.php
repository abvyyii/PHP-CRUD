<?php
require "conn.php";
$dbname="register_desk";
$tbname="register_book";

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE){
    echo "Database has been created/Database exists <br>";
}
else{
    echo "Database couldn't be checked or created".$conn->error;
}
$conn->select_db($dbname);

$sql2 = "CREATE TABLE IF NOT EXISTS $tbname (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    dob DATE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    gender VARCHAR(10) NOT NULL,
    phno VARCHAR(15) NOT NULL
)";

if ($conn->query($sql2) === TRUE) {
    echo "Table '$tbname' checked/created successfully.<br>";
} else {
    echo "Error checking/creating table: " . $conn->error . "<br>";
}
?>