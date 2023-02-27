<?php
include("connect/connection.php");
include("login.php")
?>



<!DOCTYPE html>
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

    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form name="form" action="smlogin.php" onsubmit="return isvalid()" method="POST">
        <h2 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; text-align:center;">Station Manager Login Form</h2>


        <label>User Name :</label>
        <input type="text" id="user" name="user" placeholder="User Name "><br>

        <label>Password :</label>
        <input type="password" id="pass" name="pass" placeholder="Password"><br>

        <div class="col-md-6 offset-md-4">
            <input class="btn btn-success" type="submit" value="Login" name="submit" id="btn" />
        </div>
    </form>

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