<?php
include 'navbar.php';
?>
<?php
include('connect/connection.php');

if (isset($_POST['fuel_type'])) {;
 
  $fuel_type = $_POST['fuel_type'];
  $Qty = $_POST['Qty'];


  if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }
  
  $sql = "UPDATE stock SET Qty ='$Qty' where fueltype = $fuel_type";
  
  if ($connect->query($sql) === TRUE) {
      echo "<script> alert(' Fuel stock updated successfully');
      
      </script>";
  
  } else {
      echo "<script> alert('Error updating record: " . $connect->error . "');
      
      </script>";
  }
}
  
  $connect->close();
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

  <form action="fuelupdate.php" method="Post">
    <main class="login-form">
      <div class="cotainer">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">Fuel request</div>
              <div class="card-body">
                <form action="fuelupdate.php" method="POST" name="register">

                
                <div class="form-group row">
                    <label for="id" class="col-md-4 col-form-label text-md-right">Stock Id</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="id" name="id" />
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
                    <label for="Qty" class="col-md-4 col-form-label text-md-right">Required Quantity</label>
                    <div class="col-md-6">
                      <input type="text" class="form-control" id="Qty" name="Qty" />
                    </div>
                  </div>



                  <div class="col-md-6 offset-md-4">
                    <input class="btn btn-success" type="submit" value="Update" />
                  </div>
                </form>

              </div>


            </div>
          </div>
        </div>

</body>

</html>