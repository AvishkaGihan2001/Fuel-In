<?php include 'Header.php'?>
<style>
    body{
        background-image: linear-gradient(#DD5E89, #F7BB97);
        background-size: auto;
}
</style>
<?php include 'mysqldbconnection.php'; ?>

<div style="margin: auto; width: auto; padding: 50px; float: left;">
<h3 style="padding-bottom: 15px;">Fuel Station register</h3>
        <form action="addStaffDetails.php" method="POST" name="staffadd">
            <label>Station name : </label><br>
            <input type="text" name="Fname" id="Fname" value="" required />
            <br /><br />

            <label>Station Address : </label><br>
            <input type="text" name="address" id="address" value="" required />
            <br /><br />

            <label>Station contact number :</label><br>
            <input type="number" name="capacity" id="capacity" value="" required />
            <br /><br/>

            <label>Capacity of the Station : </label><br>
            <input type="number" name="address" id="address" value="" required />
            <br /><br />

            <input class="btn btn-success" type="submit" value="Submit" />
        </form>
</div>
<?php
if(isset($_POST["name"])){
    $fuelstation=$_POST["name"];
    $fuelstation=$_POST["address"];
    $fuelstation=$_post["contactno"];
    $fuelstation=$_POST["capacity"];
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "insert into fuelstation (name,address,contactno,capacity) 
        values ('" . $name . "', '" . $address . "', '" . $contactno . "', '" . $capacity . "')";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('Employee details added successfully');</script>";
             header("Location: NewFuelStation.php");
            $_POST["stname"] = null;
            exit();
        } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
        $conn->close();

    }

}
?>

<div style="margin: auto; width: auto; padding: 50px; float: left;">
<h3 style="padding-bottom: 15px;">Fuel Station deatils</h3>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>EID</th>
                    <th>Station name</th>
                    <th>Address</th>
                    <th>Capacity of the Station</th>
                    <th>Station contact number</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {

                    $sql = "SELECT *  From fuelstation ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $my_id = $row["Eid"];

                            echo "<tr>";
                            echo "<td>" . $row["Eid"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["nic"] . "</td>";
                            echo "<td>" . $row["etype"] . "</td>";
                            echo "<td>" . $row["tel"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td> <button class='btn btn-success' myid='" . $row['Eid'] . "' onclick='stationid(" . $my_id . ");'>Update</button></td>";
                            echo "<td></td>";
                            echo "</tr>";
                        }
                    }

                    $conn->close();
                }
                ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function stationid() {
            window.location.href = '=' + stationid;
        }
    </script>

    <?php include 'Footer.php'?>
