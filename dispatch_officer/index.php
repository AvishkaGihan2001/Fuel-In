<?php
include 'connect\connection.php';
include("login.php");


?>


<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Login</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="Images/logo2.png" style="width:100px;"></a>
            <a class="navbar-brand" href="#">Welcome to Fuel In</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php" style="font-weight:bold; color:black; text-decoration:underline">Login</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



    <br>
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <form action="index.php" method="POST" name="login">
                                <div id="form">
                                    <form name="form" action="index.php" onsubmit="return isvalid()" method="POST">

                                        <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">User name</label>
                                            <div class="col-md-6">
                                                <input type="text" id="user" class="form-control" name="user">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                            <div class="col-md-6">
                                                <input type="password" id="pass" class="form-control" name="pass">
                                            </div>
                                        </div>


                                        <div class="col-md-6 offset-md-4">
                                            <input class="btn btn-success" type="submit" value="Login" name="submit" id="btn" />
                                        </div>

                                    </form>
                                </div>
                                <script>
                                    function isvalid() {
                                        var user = document.form.user.value;
                                        var pass = document.form.pass.value;
                                        if (user.length == "" && pass.length == "") {
                                            alert(" Username and password field is empty!!!");
                                            return false;
                                        } else if (user.length == "") {
                                            alert(" Username field is empty!!!");
                                            return false;
                                        } else if (pass.length == "") {
                                            alert(" Password field is empty!!!");
                                            return false;
                                        }

                                    }
                                </script>
</body>

</html>