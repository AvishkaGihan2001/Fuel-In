<?php
include 'navbar.php';
include '.././admin./config/db.php';

$pendingQuery = "SELECT Count(*) as PendingCount FROM fuelrequest WHERE status= 'Pending'";
$pendingResult = mysqli_fetch_assoc(mysqli_query($con, $pendingQuery));

$pendingCount = $pendingResult['PendingCount'];

$approvalQuery = "SELECT Count(*) as ApprovalCount FROM fuelrequest WHERE status= ' Approval'";
$approvalResult = mysqli_fetch_assoc(mysqli_query($con, $approvalQuery));

$approvalCount = $approvalResult['ApprovalCount'];

$rejectQuery = "SELECT Count(*) as RejectCount FROM fuelrequest WHERE status= ' Reject'";
$rejectResult = mysqli_fetch_assoc(mysqli_query($con, $rejectQuery));

$rejectCount = $rejectResult['RejectCount'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>

  #container {
    width: 100%;

  }

  #container02 {
    width: 100%;

  }


  #left {
    float: left;
    width: 100px;
  }

  #right {
    float: right;
    width: 100px;
  }

  #center {
    margin: 0 auto;
    width: 100px;
  }

  #size {
    font-size: larger;
  }

  .font {
    text-align: center;
    font-family: sans-serif;
    font-size: large;
    text-decoration: underline;
    padding-top: 20px;

  }

  .font1 {
    text-align: center;
    font-family: sans-serif;
    font-size: large;
    text-decoration: underline;

  }


  .box-shawdow {
    -webkit-box-shadow: 0px 0px 67px -11px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: 0px 0px 67px -11px rgba(0, 0, 0, 0.75);
    box-shadow: 0px 0px 67px -11px rgba(0, 0, 0, 0.75);
  }

  .box-shawdowin {
    -webkit-box-shadow: inset 0px 0px 69px -2px rgba(0, 0, 0, 0.98);
    -moz-box-shadow: inset 0px 0px 69px -2px rgba(0, 0, 0, 0.98);
    box-shadow: inset 0px 0px 69px -2px rgba(0, 0, 0, 0.98);
  }

  .box-shawdowinw {
    -webkit-box-shadow: inset 0px 0px 77px -34px rgba(255, 255, 255, 1);
    -moz-box-shadow: inset 0px 0px 77px -34px rgba(255, 255, 255, 1);
    box-shadow: inset 0px 0px 77px -34px rgba(255, 255, 255, 1);
  }
</style>
</head>

<body>
<div class='card mb-4 box-shawdow back' style="text-align: center;">
  <div id="container02">
    <div class="font">
      <h5>Fuel Request Summary</h5>
    </div>
    <br />
    <br />
    <main style="text-align: center; " style="text-align: center;">
      <div class="container-fluid px-4">
        <div class="row">
          <div class="col-xl-3 col-md-6" id="left">
            <div class="card box-shawdow bg-primary text-white mb-4">
              <div class="card-body">Pending Fuel Requests </div>
              <div class=' row mx-0 d-flex jusitify-content-center'>
                <div class='col-md-12 d-flex justify-content-center'>
                  <label class="text-center " id="size"><?php echo $pendingCount ?></label>
                </div>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-center">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6" id="center">
            <div class="card box-shawdow bg-success text-white mb-4">
              <div class="card-body">Approval Fuel Requests</div>
              <div class=' row mx-0 d-flex jusitify-content-center'>
                <div class='col-md-12 d-flex justify-content-center'>
                  <label class="text-center"><?php echo $approvalCount ?></label>
                </div>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-center">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card box-shawdow bg-danger text-white mb-4">
              <div class="card-body">
                Reject Fuel Requests
              </div>
              <div class=' row mx-0 d-flex jusitify-content-center'>
                <div class='col-md-12 d-flex justify-content-center'>
                  <label class="text-center"><?php echo $rejectCount ?></label>
                </div>
              </div>
              <div class="card-footer d-flex align-items-center justify-content-center">
                <a class="small text-white stretched-link" href="#">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<br />
<br />

    <form action="dashboard.php" method="POST" name="dashboard">
        <br>
        <h1 style="text-align: center ; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Dashboard</h1>


        <div style="  margin : 100px">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full name</th>
                        <th>Email address</th>
                        <th>NIC</th>
                        <th>Required fuel amount (leters)</th>
                        <th>Fuel type</th>
                        <th>Fuel station</th>
                        <th>Date</th>
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

        $sql = "SELECT * FROM req_fuel ";
        $result = mysqli_query($connect, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $redId=$row['req_id'];
                echo "<tr>

                        <td>" . $row["req_id"] . "</td>
                        <td>" . $row["full_name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["nic"] . "</td>
                        <td>" . $row["fuel_amount"] . "</td>
                        <td>" . $row["fuel_type"] . "</td>
                        <td>" . $row["station"] . "</td>
                        <td>" . $row["date"] . "</td>
                        <td>" . $row["status"] . "</td>";

                      //  echo   "<td><a href= 'approve.php?ID=$redId'  >Approve</a></td>";
                       // echo "<td><a href= 'reject.php?ID=$redId'>Reject</a></td>";
                        echo "</tr>";
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