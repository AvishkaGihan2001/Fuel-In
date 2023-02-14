<?php
    include('connect/connection.php');
    include('navbar.php');
?>

<!doctype html>
<html lang="en">

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

    <title>Payment Form</title>
</head>

<body>




    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Payment</div>
                        <div class="card-body">
                            <form action="#" method="POST" name="register">

                                <div class="form-group row">
                                    <label for="pay_amo" class="col-md-4 col-form-label text-md-right">Payment amount</label>
                                    <div class="col-md-6">
                                        <input type="text" id="pay_amo" class="form-control" name="pay_amo">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="pay_method" class="col-md-4 col-form-label text-md-right">Payment method</label>
                                    <div class="col-md-6">
                                        <select name="pay_method" class="form-control">
                                            <option value="" disabled="disabled" selected="selected">Please select a payment method</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Bank transfer">Bank transfer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="recipt" class="col-md-4 col-form-label text-md-right">Provide recipt</label>
                                    <div class="col-md-6">
                                        <input type="file" id="recipt" class="form-control" name="recipt">
                                    </div>
                                </div>

                                

                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Done" name="request">
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
</body>

</html>