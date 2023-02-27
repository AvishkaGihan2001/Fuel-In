<?php
include 'navbar.php';
?>
<?php
include('connect/connection.php');

if (isset($_POST['servicestationname'])) {
  $servicestationname = $_POST['servicestationname'];
  $fuel_type = $_POST['fuel_type'];
  $reqQty = $_POST['reqQty'];
  $date = $_POST['reqDate'];
  $status = "pending";


  if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
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


                  <!-- <div class="form-group row">
                    <label for="fueltype" class="col-md-4 col-form-label text-md-right">Fuel Type</label>
                    <div class="col-md-6">
                      <label for="petrol" class="radio-inline"><input type="radio" name="fueltype" value="petrol" id="petrol" />Petrol</label> <br>
                      <label for="diesel" class="radio-inline"><input type="radio" name="fueltype" value="diesel" id="diesel" />Diesel</label>
                    </div>
                  </div>
 -->
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

</body>

</html>