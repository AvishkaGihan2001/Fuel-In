<?php

include('connect/connection.php');
session_start() ;


if(isset($_POST["pay_amo"])){

$pay_amount = $_POST["pay_amo"];
$pay_method = $_POST["pay_method"];
$status = "Pending"	;
//$redId = $_GET["ID"];

$SessEmail   =  $_SESSION['SessEmail'];


$recipt = "";
//------------------------------------------------------Pic upload

  // Check if file was uploaded without errors
  if(isset($_FILES["recipt"]) && $_FILES["recipt"]["error"] == 0){
      $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
      $filename = $_FILES["recipt"]["name"];
      $filetype = $_FILES["recipt"]["type"];
      $filesize = $_FILES["recipt"]["size"];
  
      // Verify file extension
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
  
      // Verify file size - 5MB maximum
      $maxsize = 5 * 1024 * 1024;
      if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
  
      // Verify MYME type of the file
      if(in_array($filetype, $allowed)){
          // Check whether file exists before uploading it
          if(file_exists("pic/" . $filename)){
              echo $filename . " is already exists.";
          } else{
              move_uploaded_file($_FILES["recipt"]["tmp_name"], "pic/" . $filename);           
              $recipt = "pic/" . $filename;
          } 
      } else{
          echo "Error: There was a problem uploading your file. Please try again."; 
      }
  } else{
      echo "Error: " . $_FILES["recipt"]["error"];
  }


//------------------------------------------------------Pic upload
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}else{


  $sql = "INSERT INTO payment (email, pay_amount, pay_method, img_url, status) VALUES ('".$SessEmail."', '".$pay_amount."', '".$pay_method."', '".$recipt."',  '".$status."')";

  if ($connect->query($sql) === TRUE) {
    echo "<script>alert('Payment request sent successfully');</script>";
      $_POST["SessEmail"] = null;
      
  } else {
      echo "<script>alert('Error: " . $sql . " " . $connect->error."');</script>";
  }

  $connect->close();
  header("Location: pay.php");
}

}else{
    header("Location: pay.php");
}


?>