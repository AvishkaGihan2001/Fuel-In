<?php

if (isset($_POST["full_name"])&& $_POST["full_name"] != null) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $fuel_amount = $_POST['fuel_amount'];
    $station = $_POST['station'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $id=$_POST["sid"];


    include 'mysqldbconnection.php';
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "UPDATE  req_fuel set 
        full_name='$full_name',
        email='$email',
        nic='$nic',
        fuel_amount='$fuel_amount',
        station='$station',
        date='$date',
        status=' $status'
        Where id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('station request update successfully');</script>";
            $_POST["full_name"] = NULL;
            header("Location: CustomerReq.php");
            exit();
        } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
        $conn->close();
    }
}
?>