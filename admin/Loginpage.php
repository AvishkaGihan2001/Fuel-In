<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-image: linear-gradient(#1D976C, #93F9B9);
            min-height: 80vh;
            color: #c2c2c2;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        #uname {
            padding: 10px;
            border: grey 1px solid;
            width: 270px;
        }

        .pass {
            padding: 10px;
            border: grey 1px solid;
            width: 270px;
        }

        #login-content {
            margin: auto;
            margin-top: 12%;

            text-align: center;
            padding: 30px;
            width: 350px;
            color: white;
            -webkit-box-shadow: 0px 0px 35px 3px rgba(0, 0, 0, 1);
            -moz-box-shadow: 0px 0px 35px 3px rgba(0, 0, 0, 1);
            box-shadow: 0px 0px 35px 3px rgba(0, 0, 0, 1);
        }

        input[type="submit"] {
            padding: 10px;
            width: 120px;
            border: none;
            background-color: darkcyan;
            color: white;
            width: 290px;
        }

        h1 {
            font-family: Arial !important;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: '5000px' !important;
        }

        .footer span {
            color: #fff;

        }
        .box{
            background-color: #c2c2c2;
        }
    </style>


</head>

<body>
    <div id="fullbg" style="width: 100%; height: 100%;">
        <div id="login-content">
            <form action="login.php">
                <h1>Login Form</h1>
                <input type="text" name="uname" id="uname" placeholder="&#128100; Email or Phone">
                <br><br>
                <input type="password" name="upass" id="upass" class="pass" placeholder="&#128274; Password">
                <br><br>
                <div style="text-align: left; margin-left: 30px;">
                </div>
                <br>
                <input type="submit" value="LOGIN">
            </form>
        </div>
        <div class="footer">
            <div class="row mx-0">
                <div class="col-md-12 box">
                    <span>copy right by team 02 </span>
                </div>
            </div>
        </div>
</body>

</html>