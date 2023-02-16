

<?php
  
if(isset($_POST["sname"]) && $_POST["sname"]!=NULL){
   
$fuelstation=$_POST["sname"];
$fuelstationaddress=$_POST["saddress"];
$fuelstationcontact=$_POST["scontactno"];
$fuelstationcapacity=$_POST["scapacity"];
$id=$_POST["sid"];
include 'mysqldbconnection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $sql = "UPDATE  fuelstation set name='$fuelstation', address='$fuelstationaddress', contactno = '$fuelstationcontact',capacity='$fuelstationcapacity' Where id = '$id'";
if ($conn->query($sql) === TRUE) {
        echo "<script> alert('station details update successfully');</script>";
        $_POST["Fname"] = NULL;
        header("Location: NewFuelStation.php");
        exit();
    } else {
        echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
    $conn->close();

}

}
?>x