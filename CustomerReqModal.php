<?php
$full_name ="";
$email ="";
$nic="";
$fuel_amount =""; 
$station ="";
$date ="";
$status = "";

include 'mysqldbconnection.php';
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $my_id = $_REQUEST['myid'];
    $sql = "SELECT * FROM req_fuel WHERE  id='$my_id' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $full_name = $row["full_name"];
            $email =$row["email"];
            $nic=$row["nic"];
            $fuel_amount =$row["fuel_amount"];
            $station =$row["station"];
            $date =$row["date"];
            $status = $row["status"];
?>
            <div class="modal-body">
                <form action="CustomerReqUpdate.php" method="Post">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Customer Full Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo $full_name; ?>" required  />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Customer Email Address</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Customer NIC</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nic" name="nic" value="<?php echo $nic; ?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Request Fuel Amount</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="fuel_amount" name="fuel_amount" value="<?php echo $fuel_amount; ?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Request Station</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="station" name="station" value="<?php echo $station; ?>" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class=" col-md-4 col-form-label text-md-right">Request date</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="date" name="date" value="<?php echo $date; ?>" required />
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