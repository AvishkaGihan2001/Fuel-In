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
    <?php include 'Footer.php'?>
