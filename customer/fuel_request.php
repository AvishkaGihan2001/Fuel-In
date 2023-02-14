<?php
    include('navbar.php');
?>

<?php
   include('connect/connection.php');
   
   if (isset($_POST['full_name'])) {
       $full_name = $_POST['full_name'];
       $nic = $_POST['nic'];
       $fuel_amount = $_POST['fuel_amount'];
       $station = $_POST['station'];

       
       if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
      
    } else {


        $sql = "insert into req_fuel (full_name,nic,fuel_amount,station) values ('" . $full_name . "', '" . $nic . "', '" .$fuel_amount . "', '" . $station . "') ";

        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Request sent successfully');</script>";
          } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $connect->error . "');</script>";
          }
          
          $connect->close();





        }




}
?>



       



<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
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

    <title>Register Form</title>
</head>
<body>



<form action="fuel_request.php" method="Post">
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fuel request</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="register">

                        <div class="form-group row">
                                <label for="full_name" class="col-md-4 col-form-label text-md-right">Full name</label>
                                <div class="col-md-6">
                                    <input type="text" id="full_name" class="form-control" name="full_name" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nic" class="col-md-4 col-form-label text-md-right">NIC</label>
                                <div class="col-md-6">
                                    <input type="text" id="nic" class="form-control" name="nic" required autofocus >
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="fuel_amount" class="col-md-4 col-form-label text-md-right">Required fuel amount (liters)</label>
                                <div class="col-md-6">
                                    <input type="text" id="fuel_amount" class="form-control" name="fuel_amount" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="station" class="col-md-4 col-form-label text-md-right">Fuel station location</label>
                                <div class="col-md-6">
                                    <input type="text" id="station" class="form-control" name="station" required autofocus >
                                </div>
                            </div>

                           

                            <div class="col-md-6 offset-md-4">
                                <input class="btn btn-success" type="submit" value="Request"  />
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</form>
</body>
</html>