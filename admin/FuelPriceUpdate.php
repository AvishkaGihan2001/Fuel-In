<?php
if (isset($_POST["Fuelt"]) && $_POST["Fuelt"] != NULL) {

    $FuelType = $_POST["Fuelt"];
    $Fuelprice = $_POST["FPrice"];
    $id=$_POST["sid"];

    include 'mysqldbconnection.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "UPDATE fueltype Set 
        fuaname ='$FuelType',
        price='$Fuelprice' 
        Where id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('Price is Successfully Update');</script>";
            $_POST["Fuelt"] = NULL;
              header("Location: FuelPrice.php");
              

            exit();
        } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
        $conn->close();
    }
}
?>





    }
}
?>
