
<?php
            $my_id = "";
            $stname = "";
            $staddress = "";
            $stcapcity = "";
            $stcontactno = "";

            include 'mysqldbconnection.php';

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                $my_id = $_REQUEST['myid'];
                $sql = "SELECT *  From fuelstation where id='$my_id' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {


                        $stname = $row["name"];
                        $staddress = $row["address"];
                        $stcapcity = $row["capacity"];
                        $stcontactno = $row["contactno"];


            ?>

                        <div class="modal-body" style="margin: auto; width: auto; padding: 50px; text-align: center;">
                            <form action="Fuelstationupdate.php" method="POST" name="staffadd">
                                <label>Station name : </label><br>
                                <input type="text" name="sname" id="Fname" value="<?php echo $stname; ?>" required />
                                <br /><br />

                                <label>Station Address : </label><br>
                                <input type="text" name="saddress" id="address" value="<?php echo $staddress; ?>" required />
                                <br /><br />

                                <label>Station contact number :</label><br>
                                <input type="text" name="scontactno" id="contactno" value="<?php echo $stcontactno; ?>" required />
                                <br /><br />

                                <label>Capacity of the Station : </label><br>
                                <input type="number" name="scapacity" id="capacity" value="<?php echo $stcapcity; ?>" required />
                                <br /><br />
                                <input style="display: none;" type="text" name="sid" id="sid" value="<?php echo $my_id; ?>" required />

                                <input class="btn btn-success" type="submit" value="Submit changes" />
                            </form>

                        </div>

            <?php
                    }
                }
                $conn->close();
            }




            ?>
