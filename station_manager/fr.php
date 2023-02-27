<?php
session_start();
$con = mysqli_connect("localhost","root","","fuelindb");

if(isset($_POST['save_date']))
{
    $servicestationname = $_POST['servicestationname'];
	$fueltype = $_POST['fueltype'];
	$reqQty = $_POST['reqQty'];
    $reqDate = date('Y-m-d', strtotime($_POST['reqDate']));

    $query = "INSERT INTO demo (servicestationname,fueltype,reqQty,reqDate) VALUES ('$servicestationname','$fueltype','$reqQty','$reqDate')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Successfully Submitted";
        header("Location: fuelrequest.php");
    }
    else
    {
        $_SESSION['status'] = "Failed";
        header("Location: fuelrequest.php");
    }
}
?>