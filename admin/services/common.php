<?php
function getDataCount($con,$type){
$query = "SELECT SUM(capacity) as 'count' FROM `fuelstation` WHERE address='$type' LIMIT 1";

$rejectResult = mysqli_fetch_assoc(mysqli_query($con, $query));
return $rejectResult['count'];

}

?>