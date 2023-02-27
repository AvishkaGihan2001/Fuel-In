<?php
include('navbar.php');
session_start();
?>

<?php
include('connect/connection.php');


if (isset($_POST['fuel_amount'])) {
    $fuel_amount = $_POST['fuel_amount'];
    $fuel_type = $_POST['fuel_type'];
    $station = $_POST['station'];
    $date = $_POST['date'];
    $status = "Pending";

    $SessNameFull = $_SESSION['SessNameFull'];
    $SessEmail   =  $_SESSION['SessEmail'];
    $SessNic   = $_SESSION['SessNic'];


    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    } else {

        $sql = "insert into req_fuel(full_name,email,nic,fuel_amount,fuel_type,station,date,status) values ('" . $SessNameFull . "','" . $SessEmail . "', '" . $SessNic . "', '" . $fuel_amount . "','" . $fuel_type . "', '" . $station . "','" . $date . "','" . $status . "') ";

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

    <title>Request Form</title>
</head>

<body>

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Fuel request</div>
                        <div class="card-body">
                            <form action="fuel_request.php" method="POST" name="request">


                                <div class="form-group row">
                                    <label for="fuel_amount" class="col-md-4 col-form-label text-md-right">Required fuel amount (liters)</label>
                                    <div class="col-md-6">
                                        <select name="fuel_amount" class="form-control">
                                            <option value="" disabled="disabled" selected="selected">Please select a fuel quantity</option>
                                            <option value="5">5 leters</option>
                                            <option value="10">10leters</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fuel_type" class="col-md-4 col-form-label text-md-right">Fuel type</label>
                                    <div class="col-md-6">
                                        <select name="fuel_type" class="form-control">
                                            <option value="" disabled="disabled" selected="selected">Please select a fuel type</option>
                                            <option value="Petrol">Petrol</option>
                                            <option value="Diesel">Diesel</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="station" class="col-md-4 col-form-label text-md-right">Fuel station district</label>
                                    <div class="col-md-6">
                                    <select class="form-control"  name="station" id="station" required>
                                    <option value="" disabled="disabled" selected="selected">Select the District</option>
                                    <option value="Colombo">Colombo</option>
                                    <option value="Gampaha">Gampaha</option>
                                    <option value="Kalutara">Kalutara</option>
                                    <option value="Kandy">Kandy</option>
                                    <option value="Matale">Matale</option>
                                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                                    <option value="Galle">Galle</option>
                                    <option value="Matara">Matara</option>
                                    <option value="Hambantota">Hambantota</option>
                                    <option value="Jaffna">Jaffna</option>
                                    <option value="Kilinochchi">Kilinochchi</option>
                                    <option value="Mannar">Mannar</option>
                                    <option value="Vavuniya">Vavuniya</option>
                                    <option value="Mullaitivu">Mullaitivu</option>
                                    <option value="Batticaloa">Batticaloa</option>
                                    <option value="Ampara">Ampara</option>
                                    <option value="Trincomalee">Trincomalee</option>
                                    <option value="Kurunegala">Kurunegala</option>
                                    <option value="Puttalam">Puttalam</option>
                                    <option value="Anuradhapura">Anuradhapura</option>
                                    <option value="Polonnaruwa">Polonnaruwa</option>
                                    <option value="Badulla">Badulla</option>
                                    <option value="Moneragala">Moneragala</option>
                                    <option value="Ratnapura">Ratnapura</option>
                                </select>
                                    </div>
                                </div>
                               
    

                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                                    <div class="col-md-6">
                                        <input type="date" id="date" class="form-control" name="date" required autofocus>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Done" name="request">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>

</html>