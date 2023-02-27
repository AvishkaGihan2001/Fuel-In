<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $mail = new PHPMailer(true);

    $mail -> isSMTP();
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'hubman2001@gmail.com';                     //SMTP username
    $mail->Password   = 'qexictiorlmiosny';                               //SMTP password
    $mail->SMTPSecure = 'ssl';                                   //Enable implicit TLS encryption
    $mail->Port       = 465;
    
    $name = $_POST["cusname"];
    $date = $_POST["date"];


    $mail-> setFrom('hubman2001@gmail.com'); // Your gmail address
    $mail-> addAddress($_POST["email"]);
    $mail-> isHTML(true);

    $mail-> Subject = "This is a reminder regarding your fuel request";
    $mail-> Body =  "<p>Dear  $name, </p> <h3>The allocated date for your request is $date. Please make sure to collect your quota as soon as possible! <br></h3>
    <br><br>
    <p>Thank you for using our service.</p>
    <p>With regrads,</p>
    <b>Fuel In team</b>";
    $mail->AddAttachment('images/qrcode.png');
    $mail-> send();

    echo
    "
    <script>
    alert('Sent successfully');


    </script>
    
    ";

}
?>
<?php
include 'navbar.php';
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

    <title>Send reminder</title>
</head>

<body>
    <br>


    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Send reminder</div>
                        <div class="card-body">
                            <form action="reminder.php" method="POST" name="reminder">

                                <div class="form-group row">
                                    <label for="cusname" class="col-md-4 col-form-label text-md-right">Customer name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="cusname" class="form-control" name="cusname">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email address</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
                                    <div class="col-md-6">
                                        <input type="date" id="date" class="form-control" name="date" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">Token</label>
                                    <div class="col-md-6">
                                        <input type="file" id="token" class="form-control" name="token" >
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                <input class="btn btn-success" type="submit" value="Send" name="send"  />
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
