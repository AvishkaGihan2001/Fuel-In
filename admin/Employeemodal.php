<?php
$staffname = "";
$staffnic = "";
$stafftype = "";
$stafftel = "";
$staffemail = "";
$staffuname = "";
$staffpassword = "";

include 'mysqldbconnection.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $my_id = $_REQUEST['myid'];
    $sql = "SELECT * FROM employee WHERE  id='$my_id' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {


            $staffname = $row["name"];
            $staffnic = $row["nic"];
            $stafftype = $row["type"];
            $stafftel = $row["tel"];
            $staffemail = $row["email"];
?>
            <div class="modal-body">
                <div style="margin: auto; width: auto; padding: 50px; text-align: center;">

                    <form action="Employeeupdate.php" method="POST" name="staffadd">

                        <label>Name of the Employee : </label><br>
                        <input type="text" name="stname" id="stname" value="<?php echo $staffname;?>" required />
                        <br /><br />

                        <label>National Identity Card Number : </label><br>
                        <input type="text" name="stnic" id="stnic" value="<?php echo $staffnic;?>" required />
                        <br /><br />

                        <label>Role of the Employee : </label><br>
                        <select name="sttype" id="sttype" value="<?php echo $stafftype;?>" required>
                            <option value="">Select the type</option>
                            <option value="Admin">Admin</option>
                            <option value="Dispatch Office">Dispatch Office</option>
                            <option value="station manger">station manger</option>
                        </select>
                        <br /><br />

                        <label>Contact Number: </label><br>
                        <input type="number" name="sttel" id="sttel" value="<?php echo $stafftel;?>" required />
                        <br /><br />


                        <label>Email Address: </label><br>
                        <input type="text" name="stemail" id="stemail" value="<?php echo $staffemail;?>" required />
                        <br /><br />

                        <br /><br />
                        <input style="display: none;" type="text" name="sid" id="sid" value="<?php echo $my_id; ?>" required />


                        <input class="btn btn-success" type="submit" value="Submit" />

                    </form>

                </div>
            </div>
<?php
        }
    }
    $conn->close();
}
?>