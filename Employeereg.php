<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
		
		<div class="p-4 mx-auto mr-4 shadow rounded" style="margin-top: 50px;width:100%;max-width: 340px;">
			<h2 class="text-center">Fuel In (pvt) ltd</h2>
			<img src="Logo.png" class="border border-primary d-block mx-auto " style="width:100px;">
			<h3>Add User</h3>
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
				<option value="student">Student</option>
				<option value="reception">Reception</option>
				<option value="lecturer">Lecturer</option>
				<option value="admin">Admin</option>
				<option value="super_admin">Super Admin</option>
			</select>

			<input class="my-2 form-control" type="text" name="password" placeholder="Password">
			<input class="my-2 form-control" type="text" name="password2" placeholder="Retype Password">
			<br>
			<button class="btn btn-primary float-end">Add User</button>
			<button class="btn btn-danger">Cancel</button>
		</div>
	</div>
	
</body>
</html>