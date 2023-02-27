<?php
include 'connect\connection.php';

$req_id = $_REQUEST["ID"];

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

$sql = "UPDATE req_fuel SET status ='Rejected'  where req_id = $req_id";

if ($connect->query($sql) === TRUE) {
    echo "<script> alert('Request rejected successfully');
    window.location.href='dashboard.php';
    </script>";

} else {
    echo "<script> alert('Error updating record: " . $connect->error . "');
    window.location.href='dashboard.php';
    </script>";
}

$connect->close();
?>