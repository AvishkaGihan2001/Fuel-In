<?php
$FuelType = "";
$fuel_type = "";

include 'mysqldbconnection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $my_id = $_REQUEST['myid'];
    $sql = "SELECT * FROM fueltype WHERE  id='$my_id' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $FuelType = $row["fuaname"];
            $Fuelprice = $row["price"];
?>
            <div class="modal-body">
                <form action="FuelPriceUpdate.php" method="Post">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Fuel type </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="Fuelt" name="Fuelt" value="<?php echo $FuelType; ?>"   readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Price</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="FPrice" name="FPrice" value="<?php echo $Fuelprice; ?>" required />
                        </div>
                    </div>
                    <input style="display: none;" type="text" name="sid" id="sid" value="<?php echo $my_id; ?>" required />

                    <div class="col-md-6 offset-md-4">
                        <input class="btn btn-success" type="submit" value="Save changes" />
                    </div>
                </form>
            </div>
<?php
        }
    }
    $conn->close();
}
?>