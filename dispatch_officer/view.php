<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    

<?php
    include 'connect\connection.php';

if (isset($_REQUEST['ID'])) {
    $my_id = $_REQUEST['ID'];

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    } else {

        $sql = "SELECT * FROM payment  where pay_id='$my_id' ";
        $result = mysqli_query($connect, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imag_path="../customer/".$row['img_url'];

                      echo   "
                      <br>
                        <div class='container-fluid'>  
                        <div class='text-center'>
                        <div class='rounded mx-auto d-block'> 
                 
                        <span class= 'border border-dark' >
                      <img src='$imag_path' alt='image' width = '30%' height = '30%' class= 'rounded'    >
                      </span>
                      
                      </div>
                      </div>
                      </div>
                        <br><br>
                        <div class = 'text-center'>
                        <a href='verify.php' class='btn btn-primary'>Back</a>
                        </div>
                      
                      
                      ";
                
            }
      
        } else {
            echo "0 result";
        }
    }

}
?>




</body>
</html>