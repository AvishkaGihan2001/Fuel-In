<?php
    include 'connect/connection.php';
    include 'navbar.php';
?>


<!DOCTYPE html>
<html>

<head>
  <title>Fuel Request Form</title>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />

  <br>

</head>

<body>

  <form action="print.php" method="Post">
    <main class="login-form">
      <div class="cotainer">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">Genarate receipt</div>
              <div class="card-body">
                <form action="#" method="POST" name="receipt">

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

                    $sql = "SELECT * FROM payment Where status = 'Approved' ";
                    $result = mysqli_query($connect, $sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $email=$row['email'];
                            echo "<tr>
                        <td>" . $row["pay_id"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["pay_amount"] . "</td>
                        <td>" . $row["pay_method"] . "</td>
                        <td>" . $row["status"] . "</td>

                        <td><a href= 'print.php?email=$email'  >Print receipt</a></td>
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

                      



              
                </form>

              </div>


            </div>
          </div>
        </div>
        
</body>

</html>