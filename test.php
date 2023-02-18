<?php
   include('connect/connection.php');
   
   if (isset($_POST['full_name'])) {
       $full_name = $_POST['full_name'];
       $email = $_POST['email'];
       $nic = $_POST['nic'];
       $fuel_amount = $_POST['fuel_amount'];
       $station = $_POST['station'];
       $date = $_POST['date'];

       
       if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
      
    } else {


        $sql = "insert into req_fuel (full_name,email,nic,fuel_amount,station,date) values ('" . $full_name . "','". $email . "', '" . $nic . "', '" .$fuel_amount . "', '" . $station . "','". $date ."') ";

        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Request sent successfully');</script>";
          } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $connect->error . "');</script>";
          }
          
          $connect->close();
        }




}
?>
