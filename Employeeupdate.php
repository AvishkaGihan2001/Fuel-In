

<?php

if (isset($_POST["stname"]) && $_POST["stname"] != null) {
    $staffname = $_POST["stname"];
    $staffnic = $_POST["stnic"];
    $stafftype = $_POST["sttype"];
    $stafftel = $_POST["sttel"];
    $staffemail = $_POST["stemail"];
    $id=$_POST["sid"];

    include 'mysqldbconnection.php';
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "UPDATE  employee set 
        name='$staffname',nic='$staffnic',type='$stafftype',tel='$stafftel',email='$staffemail'Where id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('station details update successfully');</script>";
            $_POST["staffname"] = NULL;
            header("Location: Employeereg.php");
            exit();
        } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
        $conn->close();
    }
}
?>