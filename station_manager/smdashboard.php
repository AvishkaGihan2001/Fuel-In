
<?php
include 'connect\connection.php';
include 'navbar.php';
if(!$connect){
    echo "Problem in database connection..." ;
}else{
    $sql = "SELECT * FROM stock";
    $result = mysqli_query($connect,$sql);
    $chart_data = "";
    while($row = mysqli_fetch_array($result)){
        $fueltype[] = $row['fueltype'];
        $Quantity[] = $row['Qty'];
    }
}


?>


<!DOCTYPE HTML>
<html>
<head>  
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Token Requests </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fuelrequest.php">Fuel Requests </a>
                    </li>
                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Fual Station Registation</a></li>
                            <li><a class="dropdown-item" href="#">Fual Statiion Employee Registation</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="EmployeeReg.php">Employee Register</a></li>
                        </ul>
                    </li>-->
                    <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Fual Station Registation</a></li>
                        <li><a class="dropdown-item" href="#">Fual Statiion Employee Registation</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> -->
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    
                    <button class="btn btn-outline-success" name="logout_btn" type="submit">Logout</button>
                    

                </form>
            </div>
        </div>
    </nav>



<br>

<h1>Maradana, Colombo 10 - Fuel Station</h1><br><br>
<script>
window.onload = function () {
	
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	
	title:{
		text:"Remaining Fuel Stock"
	},
	axisX:{
		interval: 1
	},
	
	data: [{
		type: "bar",
		name: "Fueltype",
		axisYType: "secondary",
		color: "#014D65",
		dataPoints: [
			{ y: 100, label: "Petrol" },
			{ y: 1000, label: "Diesel" },
			
		]
	}]
});
chart.render();

}
</script>
</head>



<body>



<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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

