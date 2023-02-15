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
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Sign In Your  Account</h2>
                    <form method="POST">
                        <div class="input-group">
                          
                            <input type="text" class="input--style-1" placeholder="Registered Email or Contact Number" required="true" name="emailcont">
                        </div>
                      
                        
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    
                                    <input type="password" class="input--style-1" placeholder="Password" name="password" required="true">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="login">Sign IN</button>
                        </div>
                        <br>
                       <a href="index.php">Don't have an account ? CREATE AN ACCOUNT</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>