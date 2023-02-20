<?php
$servicestationname = "";
$fuel_type = "";
$reqQty = "";
$date = "";
$resdate = "";
$status = "";

include 'mysqldbconnection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $my_id = $_REQUEST['myid'];
    $sql = "SELECT * FROM fuelrequest WHERE  id='$my_id' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $servicestationname = $row["servicestationname"];
            $fuel_type = $row["fueltype"];
            $reqQty = $row["reqQty"];
            $date = $row["reqDate"];
            $resdate = $row["resdate"];
            $status = $row["status"];
?>
            <div class="modal-body">
                <form action="fuelrequestupdate.php" method="Post">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Fuel Station Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="servicestationname" name="servicestationname" value="<?php echo $servicestationname; ?>" required  />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Fuel Type</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="fueltype" name="fueltype" value="<?php echo $fuel_type; ?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Required Qty (L)</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="reqQty" name="reqQty" value="<?php echo $reqQty; ?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Required Date</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="reqDate" name="reqDate" value="<?php echo $date; ?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Respond Date</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="resdate" name="resdate" value="<?php echo $resdate; ?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Status Type</label>
                        <div class="col-md-6">
                            <select class="form-control" name="status" id="status" required>
                                <option value="">Select the status</option>
                                <option value="Approval">Approval</option>
                                <option value="Reject">Reject</option>
                            </select>
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