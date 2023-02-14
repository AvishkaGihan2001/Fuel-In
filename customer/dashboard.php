

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'navbar.php';
    ?>
<div style="  margin : 100px">
<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Vehicle number</th>
                <th>Chasse number</th>
                <th>Vehicle type</th>
                
            </tr>
        </thead>
        <tbody>

        <?php
        session_start();
        $_SESSION['user_id'] = $user_id;
            include 'connect\connection.php';
        ?>

        <?php
            if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
            } else {    

                $sql = "SELECT * FROM add_vehicle  WHERE user_id = '$user_id'";
                $result = mysqli_query($connect, $sql);

                if ($result -> num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        echo "<tr>
                        <td>" . $row["vehicle_no"] . "</td>
                        <td>" . $row["chasse_no"] . "</td>
                        <td>" . $row["vehicle_type"] . "</td>
                        
                        <td><a href='updateStaff.php?EID=".$row['user_id']."'>Update</a></td>
                        <td><a href='deleteStaff.php?EID=".$row['user_id']."'>Delete</a></td>
                        </tr>";
                        
                    }
                    echo "</table>";
                } else {
                    echo "0 result";
                }

                


            }
        ?>


<script>
$(document).ready(function() {  
        $('#example').DataTable();  
} );
</script>
</body>
</html>