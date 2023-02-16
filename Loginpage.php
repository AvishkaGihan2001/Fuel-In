<?php include 'Header.php'?>
<style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-image: linear-gradient(#1D976C,#93F9B9);
            background-size: auto;
            background-repeat: no-repeat;
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
    </style>
</head>
<body>
    <div id="fullbg" style="width: 100%; height: 100%;">
        <div id="login-content">
            <form>
                <h1>Login Form</h1>
                <input type="text" name="uname" id="uname" placeholder="&#128100; Email or Phone">
                <br><br>
                <input type="password" name="upass" id="upass" class="pass" placeholder="&#128274; Password">
                <br><br>
                <div style="text-align: left; margin-left: 30px;">
                    <label>Forgot password?</label>
                </div>
                <br>
                <input type="submit" value="LOGIN">
            </form>
        </div>
<?php include 'Footer.php'?>