<?php

if (isset($_POST["full_name"])&& $_POST["full_name"] != null) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $fuel_amount = $_POST['fuel_amount'];
    $fuel_type =$_POST['fuel_type'];
    $station = $_POST['station'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    $id=$_POST["sid"];
    $fuelprice =$_POST['price'];

    $fuel_Li_Count = $fuelprice * $fuel_amount;


    include 'mysqldbconnection.php';
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "UPDATE  req_fuel set 
        full_name='$full_name',
        email='$email',
        nic='$nic',
        fuel_amount='$fuel_amount',
        fuel_type='$fuel_type',
        station='$station',
        date='$date',
        status='$status'
        Where req_id = '$id'";
        if ($conn->query($sql) === TRUE) {

            if( $status == 'Approval'){
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d-m-y h:i:s');
        
                $sql = "INSERT INTO `fuel_in`.`customermsg`(`CusnotId`,`email`,`status`,`Fuel_type`,`fuel_amount`,`fuel_price`,`totalamount`,`date`,`message`)VALUES(0,'$email','$status','$fuel_type','$fuel_amount','$fuelprice','$fuel_Li_Count','$date','Your request is approved. please proceed the payment by follwing this bank details(account number 124586587429853 sampath bank) ')";
                if ($conn->query($sql) === TRUE) {
                 
                echo "<script> alert('station request update successfully');</script>";
                $_POST["full_name"] = NULL;
                header("Location: CustomerReq.php");
                
                exit();
                }
            }else{
                 echo "<script> alert('station request update successfully');</script>";
                $_POST["full_name"] = NULL;
                header("Location: CustomerReq.php");
                
                exit();
                
            }
           
            
        } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
        $conn->close();

       
    }
}
