<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">

        <div>
            <h2 class="text-center">Employee Register From</h2>
            <!-- <h3>Add User</h3> -->
            <p>First Name</p>
            <input class="my-2 form-control" type="firstname" name="firstname" placeholder="Frist Name">
            <p>Last Name</p>
            <input class="my-2 form-control" type="lastname" name="lastname" placeholder="Last Name">
            <p>Email Address</p>
            <input class="my-2 form-control" type="email" name="email" placeholder="Email">
            <p>Select a Gender</p>
            <select class="my-2 form-control">
                <option>--Select a Gender--</option>
                <option>Male</option>
                <option>Female</option>
            </select>
            <p>Select a Rank</p>
            <select class="my-2 form-control">
                <option value="">--Select a Rank--</option>
                <option value="student">Admin</option>
                <option value="reception"></option>
                <option value="lecturer"></option>
                <option value="admin"></option>
                <option value="super_admin"></option>
            </select>
            <p>password</p>
            <input class="my-2 form-control" type="text" name="password" placeholder="Password">
            <p>Retype Password</p>
            <input class="my-2 form-control" type="text" name="password2" placeholder="Retype Password">
            <br>
            <button class="btn btn-primary float-end">Add User</button>
            <button class="btn btn-danger">Cancel</button>
        </div>
    </div>
</body>

</html>