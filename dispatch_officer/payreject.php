<?php
include 'connect\connection.php';

$pay_id = $_REQUEST["ID"];

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

$sql = "UPDATE payment SET status ='Reject' where pay_id = $pay_id";

if ($connect->query($sql) === TRUE) {
    echo "<script> alert(' Payment rejected successfully');
    window.location.href='verify.php';
    </script>";

} else {
    echo "<script> alert('Error updating record: " . $connect->error . "');
    window.location.href='verify.php';
    </script>";
}

$connect->close();
?>