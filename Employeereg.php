<?php include 'Header.php'?>
<?php include 'adminNavBar.php' ?>


<div class="container-fluid">
		
		<div>
			<!-- <h2 class="text-center">Fuel In (pvt) ltd</h2>
			<img src="Logo.png" class="border border-primary d-block mx-auto " style="width:100px;"> -->
			<h3 style="text-align: center;">Create User</h3>
			<input class="my-2 form-control" type="firstname" name="firstname" placeholder="Frist Name" >
			<input class="my-2 form-control" type="lastname" name="lastname" placeholder="Last Name" >
			<input class="my-2 form-control" type="email" name="email" placeholder="Email" >

			<select class="my-2 form-control">
				<option>--Select a Gender--</option>
				<option>Male</option>
				<option>Female</option>
			</select>
			<select class="my-2 form-control">
				<option value="">--Select a Rank--</option>
				<option value="student">Admin</option>
				<option value="reception">Dispatch officer</option>
				<option value="lecturer">station employee</option>
			</select>

			<input class="my-2 form-control" type="text" name="password" placeholder="Password">
			<input class="my-2 form-control" type="text" name="password2" placeholder="Retype Password">
			<br>
            <input class="btn btn-success" type="submit" value="Submit" />
			<button class="btn btn-danger">Cancel</button>
		</div>
	</div>
	<?php
	include 'mysqldbconnection.php';

	if(isset($_POST["Employee_Id"]) && $_POST["Employee_Id"]){
		$employeereg=$_POST["firstname"];
		$employeereg=$_POST["lastname"];
		$employeereg=$_POST["email"];
		$employeereg=$_POST["gender"];
		$employeereg=$_POST["category"];
		$employeereg=$_POST["password"];
		$employeereg=$_POST["re_password"];

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
			$sql = "insert into employee (Employee_Id,firstname,lastname,email,gender,category,password,re_password) values ('" . $firstname . "', '" . $lastname . "', '" . $email . "', '" . $gender . "', '" . $category . "', '" . $password . "', '" . $re_password . "') ";
            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('Employee details added successfully');</script>";

                //  header("Location: staffAll.php");
                $_POST["stname"] = null;
                exit();
            } else {
                echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            }
            $conn->close();

		}
	}
	
	?>


    <?php include 'Footer.php'?>
