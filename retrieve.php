<?php
require "conn.php";
require "filech.php";
require "insert.php";
$sql = "SELECT * FROM $tbname";
echo "Retrieving data..";
echo "<br><br><br>";
$result = $conn->query($sql);
echo "id------------------------------firstname------------------------------lastname------------------------------dob------------------------------email------------------------------gender<br>";
if ($result -> num_rows>0){
    while($row = $result->fetch_assoc()) {
        echo $row["id"]. "------------------------------" . $row["firstname"]."------------------------------" . $row["lastname"]."------------------------------" . $row["dob"]."------------------------------" . $row["email"]."------------------------------" . $row["gender"]."<br>";
      }
    } else {
      echo "0 results";
    }
?>