<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<style>
	
	</style>
</head>
<body>
     <a href="payment.php">&#8592;</a>
     <?php 
          $sql = "SELECT * FROM payment ORDER BY pay_id DESC";
          $res = mysqli_query($connect,  $sql);

          if (mysqli_num_rows($res) > 0) {
          	while ($images = mysqli_fetch_assoc($res)) {  ?>
             
             <div class="alb">
             	<img src="uploads/<?=$images['image_url']?>">
             </div>
          		
    <?php } }?>
</body>
</html>