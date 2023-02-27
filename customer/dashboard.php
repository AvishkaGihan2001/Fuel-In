<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect the user to login page if he is not logged in.
if (!isset($_SESSION['SessUserId'])) {
    header('Location:index.php');
    exit();
}

$SessUserId  = $_SESSION['SessUserId'];
$SessNameFull = $_SESSION['SessNameFull'];
$SessStCode   = $_SESSION['SessStCode'];
$SessEmail   =  $_SESSION['SessEmail'];
$SessNic   = $_SESSION['SessNic'];

include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="dashboard.php" method="POST" name="dashboard">
        <br>
        <?php
        echo "<h4 style='text-align: center ; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif'>Welcome " . $SessNameFull . "</h4>";
        ?>
        <br>
        <h1 style="text-align: center ; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Dashboard</h1>
        <br>

        <div style="  margin : 100px;">
        <table id="example" class="table table-striped" style="width:100%;">
            <thead>
                <tr>
                    <th>Payment ID</th>
                    <th>Email address</th>
                    <th>Payment amount</th>
                    <th>Payment method</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
</form>

                <?php

                include 'connect\connection.php';
                ?>

                <?php

                if (!$connect) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {

                    $sql = "SELECT * FROM payment Where email = '$SessEmail' ";
                    $result = mysqli_query($connect, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $payId=$row['pay_id'];
                            echo "<tr>
                        <td>" . $row["pay_id"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["pay_amount"] . "</td>
                        <td>" . $row["pay_method"] . "</td>
                        <td>" . $row["status"] . "</td>

                        </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 result";
                    }
                }
                ?>


                <script>
                    $(document).ready(function() {
                        $('#example').DataTable();
                    });
                </script>



        <div style="  margin : 100px">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vehicle number</th>
                        <th>Chasse number</th>
                        <th>Vehicle type</th>

                    </tr>
                </thead>
                <tbody>
    </form>

    <?php

    include 'connect\connection.php';
    ?>

    <?php
    // $email = $_POST['email'];

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    } else {

        $sql = "SELECT * FROM add_vehicle  WHERE email = '" . $SessEmail . "' ";
        $result = mysqli_query($connect, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["vehicle_id"] . "</td>
                        <td>" . $row["vehicle_no"] . "</td>
                        <td>" . $row["chasse_no"] . "</td>
                        <td>" . $row["vehicle_type"] . "</td>
                    
                        </tr>";
            }
            echo "</table>";
        } else {
            echo "0 result";
        }
    }
    ?>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <div style="  margin : 100px">
        <table id="fuel_req" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full name</th>
                    <th>NIC</th>
                    <th>Fuel quantity</th>
                    <th> Fuel type</th>
                    <th>Station</th>
                    <th>Date</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody>

                <?php
                //   $email = $_POST['email'];

                if (!$connect) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {

                    $sql = "SELECT * FROM req_fuel  WHERE email = '" . $SessEmail . "'";
                    $result = mysqli_query($connect, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                        <td>" . $row["req_id"] . "</td>
                        <td>" . $row["full_name"] . "</td>
                        <td>" . $row["nic"] . "</td>
                        <td>" . $row["fuel_amount"] . "</td>
                        <td>" . $row["fuel_type"] . "</td>
                        <td>" . $row["station"] . "</td>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["status"] . "</td>
    
                        </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 result";
                    }
                }
                ?>
                <script>
                    $(document).ready(function() {
                        $('#example').DataTable();
                    });
                </script>
</body>

</html>