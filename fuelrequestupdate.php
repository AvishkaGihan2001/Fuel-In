<?php

if (isset($_POST["servicestationname"])&& $_POST["servicestationname"] != null) {
    $servicestationname = $_POST['servicestationname'];
    $fuel_type = $_POST['fueltype'];
    $reqQty = $_POST['reqQty'];
    $date = $_POST['reqDate'];
    $resdate = $_POST["resdate"];
    $status = $_POST["status"];
    $id=$_POST["sid"];


    include 'mysqldbconnection.php';
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "UPDATE  fuelrequest set 
        servicestationname='$servicestationname',
        fueltype='$fuel_type',
        reqQty='$reqQty',
        reqDate='$date',
        resdate= '$resdate',
        status=' $status'
        Where id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('station request update successfully');</script>";
            $_POST["servicestationname"] = NULL;
            header("Location: fuelrequest.php");
            exit();
        } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
        $conn->close();
    }
}
?>