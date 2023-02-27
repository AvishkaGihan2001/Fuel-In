<?php
    include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
</head>

<body>
<form action="verify.php" method="POST" name="dashboard">
<br>
    <h1 style="text-align: center ; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;" > Verification</h1>

    
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

                    $sql = "SELECT * FROM payment Where pay_method = 'Bank transfer' ";
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

                        <td><a href=' view.php?ID=$payId'>View</a></td>
                        <td><a href= 'payapprove.php?ID=$payId'  >Approve</a></td>
                        <td><a href= 'payreject.php?ID=$payId'  >Reject</a></td>
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