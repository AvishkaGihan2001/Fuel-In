<?php include 'header.php'; ?>
<form action="fuelrequest.php" method="Post">
  <main class="login-form">
    <div class="cotainer">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Fuel request</div>
            <div class="card-body">
              <form action="#" method="POST" name="register">

                <div class="form-group row">
                  <label for="servicestationname" class="col-md-4 col-form-label text-md-right">Service Station Name</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="servicestationname" name="servicestationname" />
                  </div>
                </div>


                <div class="form-group row">
                  <label for="fueltype" class="col-md-4 col-form-label text-md-right">Fuel Type</label>
                  <div class="col-md-6">
                    <label for="petrol" class="radio-inline"><input type="radio" name="fueltype" value="petrol" id="petrol" />Petrol</label> <br>
                    <label for="diesel" class="radio-inline"><input type="radio" name="fueltype" value="diesel" id="diesel" />Diesel</label>
                  </div>
                </div>




                <div class="form-group row">
                  <label for="reqQty" class="col-md-4 col-form-label text-md-right">Required Quantity</label>
                  <div class="col-md-6">
                    <input type="text" class="form-control" id="reqQty" name="reqQty" />
                  </div>
                </div>

                <div class="form-group row">
                  <label for="reqDate" class=" col-md-4 col-form-label text-md-right">Required Date</label>
                  <div class="col-md-6">
                    <input type="date" class="form-control" id="reqDate" name="reqDate" />
                  </div>

                </div>



                <div class="col-md-6 offset-md-4">
                  <input class="btn btn-success" type="submit" value="Request" />
                </div>
              </form>

            </div>


          </div>
        </div>
      </div>
      <?php
      include 'mysqldbconnection.php';

      if (isset($_POST['servicestationname'])) {
        $servicestationname = $_POST['servicestationname'];
        $fuel_type = $_POST['fueltype'];
        $reqQty = $_POST['reqQty'];
        $date = $_POST['reqDate'];
        $status = "pending";


        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        } else {


          $sql = "insert into fuelrequest (servicestationname,fueltype,reqQty,reqDate,status) values ('" . $servicestationname . "' , '" . $fuel_type . "' , '" . $reqQty . "', '" . $date . "', '" . $status . "') ";

          if ($connect->query($sql) === TRUE) {
            echo "<script> alert('Request sent successfully');</script>";
          } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $connect->error . "');</script>";
          }

          $connect->close();
        }
      }
      ?>

      </body>

      </html>