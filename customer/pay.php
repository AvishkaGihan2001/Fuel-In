<?php
    include 'connect\connection.php';
    include 'navbar.php';
    session_start();
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
<div style="  margin : 100px">
        <table id="payment" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Email address</th>
                    <th>Fuel type</th>
                    <th>Fuel quantity</th>
                    <th> Fuel price</th>
                    <th>Total amount</th>
                    <th>Date and time</th>
                    <th>Message</th>


                </tr>
            </thead>
            <tbody>

                <?php
                //   $email = $_POST['email'];
                $SessEmail   =  $_SESSION['SessEmail'];

                if (!$connect) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {

                    $sql = "SELECT * FROM customermsg  WHERE email = '" . $SessEmail . "'";
                    $result = mysqli_query($connect, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $email=$row['email'];
                            echo "<tr>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["Fuel_type"] . "</td>
                        <td>" . $row["fuel_amount"] . "</td>
                        <td>" . $row["fuel_price"] . "</td>
                        <td>" . $row["totalamount"] . "</td>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["message"] . "</td>

                        <td><a href= 'payment.php?ID=$email'  > PAY NOW </a></td>;
    
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