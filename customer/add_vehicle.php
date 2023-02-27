<?php
include('navbar.php');
session_start();
?>

<?php
include('connect/connection.php');

if (isset($_POST['vno'])) {
    $vno = $_POST['vno'];
    $chano = $_POST['chano'];
    $vehicle_type = $_POST['vehicle_type'];
    $SessUserId  = $_SESSION['SessUserId'];
    $SessNameFull = $_SESSION['SessNameFull'];
    $SessStCode   = $_SESSION['SessStCode'];
    $SessEmail   =  $_SESSION['SessEmail'];
    $SessNic   = $_SESSION['SessNic'];

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    } else {
        $is_ok_to_add_product = false;

        $sql = "SELECT * From add_vehicle where vehicle_no ='" . $vno . "'";

        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>alert('There is already a vehicle in this number.. Try again..');</script>";
            $_POST["vehicle_no"] = null;
        } else {
            $is_ok_to_add_product = true;
        }
        $connect->close();
    }
    if ($is_ok_to_add_product) {
        include('connect/connection.php');

        $sql = "insert into add_vehicle (email,vehicle_no,chasse_no,vehicle_type) values ('" . $SessEmail . "','" . $vno . "', '" . $chano . "', '" . $vehicle_type . "') ";

        if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Vehicle added successfully');</script>";
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

    <title>Add vehicle Form</title>
</head>

<body>




    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add vehicle</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="register">

                                

                                <div class="form-group row">
                                    <label for="vno" class="col-md-4 col-form-label text-md-right">Vehicle number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="vno" class="form-control" name="vno">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="chano" class="col-md-4 col-form-label text-md-right">Chassis Number</label>
                                    <div class="col-md-6">
                                        <input type="text" id="chano" class="form-control" name="chano" required autofocus>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Vehicle type</label>
                                    <div class="col-md-6">
                                        <select name="vehicle_type" class="form-control">
                                            <option value="" disabled="disabled" selected="selected">Please select a vehicle type</option>
                                            <option value="Bike">Bike</option>
                                            <option value="Three wheel">Three Wheeler</option>
                                            <option value="Car">Car</option>
                                            <option value="Van">Van</option>
                                        </select>
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
        </div>

    </main>
</body>

</html>