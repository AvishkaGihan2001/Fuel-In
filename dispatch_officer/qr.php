<?php
    include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

	<title>QR code</title>
</head>
<body>
<br>
	<main class="login-form">
		<div class="cotainer">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">Genarate QR code</div>
						<div class="card-body">

   
    <div class="input-form">
      <input type="text" class="qr-input" placeholder="Enter url or text">
      <button class="generate-btn">Generate QR Code</button>
    </div>
    <div class="qr-code">
      <img src="images/qrcode.png" class="qr-image">
    </div>
  </div>

  <script>
    var container = document.querySelector(".container");
    var generateBtn = document.querySelector(".generate-btn");
    var qrInput = document.querySelector(".qr-input");
    var qrImg = document.querySelector(".qr-image");

    generateBtn.onclick = function () {      
      if(qrInput.value.length > 0){ 
        generateBtn.innerText = "Generating QR Code..."       
        qrImg.src = "https://api.qrserver.com/v1/create-qr-code/?size=170x170&data="+qrInput.value;
        qrImg.onload = function () {
          container.classList.add("active");
          generateBtn.innerText = "Generate QR Code";
        }
      }
    }
  </script>
</body>
</html>