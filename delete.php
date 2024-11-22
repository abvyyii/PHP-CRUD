<?php
require 'conn.php';
require 'filech.php';

$del_email = $_POST['del_email'] ?? null;


if (!$del_email) {
    die("Email is required.");
}
$sql = "DELETE FROM $tbname WHERE email = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $del_email);
    if ($stmt->execute()) {
        echo "Deleted successfully.";
    } else {
        echo "Couldn't delete data: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Query preparation failed: " . $conn->error;
}

$conn->close();
?>
