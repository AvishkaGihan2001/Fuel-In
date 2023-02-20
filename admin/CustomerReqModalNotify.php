<?php
$fuel_amount =""; 
$status = "";
$message="";
$date ="";




include 'mysqldbconnection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $my_id = $_REQUEST['my2id'];
    $sql = "SELECT * FROM req_fuel WHERE  id='$my_id' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $status = $row["status"];
            $fuel_amount =$row["fuel_amount"];
            $amountpay =$row["amountpay"];
            $date =$row["date"];
?>
            <div class="modal-body">
                <form action="#" method="Post">
                <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Status Type</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" required  readonly/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Request Fuel Amount</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="fuel_amount" name="fuel_amount" value="<?php echo $fuel_amount; ?>" required readonly />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Amount to pay</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="camount" name="camount" value="<?php echo $amountpay; ?>" required  readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Issue Date</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="Issudate" name="Issudate" value="<?php echo $date; ?>" required />
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