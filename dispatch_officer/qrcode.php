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
						<div class="card-header">Genarate QR code</div>
						<div class="card-body">
				

								<div class="form-group row">
									<label for="cusname" class="col-md-4 col-form-label text-md-right">Customer name</label>
									<div class="col-md-6">
										<div class="form-control">
										<input type="text" id="cusname" class="qr-input"  name="cusname">
									</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="email" class="col-md-4 col-form-label text-md-right">Email address</label>
									<div class="col-md-6">
										<div class="form-control">
										<input type="email" id="email" class="qr-input1" name="email" required autofocus>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="date" class="col-md-4 col-form-label text-md-right">Date</label>
									<div class="col-md-6">
										<div class="form-control">
										<input type="date" id="date" class="qr-input2" name="date" required autofocus>
										</div>
									</div>
								</div>

								<div class="form-group row">
									<label for="date" class="col-md-4 col-form-label text-md-right">Required fuel amount</label>
									<div class="col-md-6">
										<div class="form-control">
										<input type="text" id="req_fuel" class="qr-input3" name="req_fuel" required autofocus>
										</div>
									</div>
								</div>


								<div class="col-md-6 offset-md-4">
								<button class="generate-btn" >Generate QR Code</button>
								</div>

								<div class="qr-code">
									<img src="Images/qrcode.png" class="qr-image">
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



<script>
	//Qr code generator API

	var container = document.querySelector(".container");
	var generateBtn = document.querySelector(".generate-btn");
	var qrInput = document.querySelector(".qr-input");
	var qrInput1 = document.querySelector(".qr-input1");
	var qrInput2 = document.querySelector(".qr-input2");
	var qrInput3 = document.querySelector(".qr-input3");
	var qrImg = document.querySelector(".qr-image");

	generateBtn.onclick = function() {
		if (qrInput.value.length > 0) {
			generateBtn.innerText = "Generating QR Code..."
			qrImg.src = "https://api.qrserver.com/v1/create-qr-code/?size=170x170&data=" +    qrInput.value    +     qrInput1.value    +    qrInput2.value    +    qrInput3.value   ;
			qrImg.onload = function() {
				container.classList.add("active");
				generateBtn.innerText = "Generate QR Code";
			}
		}
	}
</script>
</body>

</html>