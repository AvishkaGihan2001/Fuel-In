<?php include 'Header.php'; ?>
<div style="margin: auto; width: auto; padding: 50px; float: left;">
    <h3 style="padding-bottom: 15px;">Fuel Station register</h3>
    <form action="NewFuelStation.php" method="POST" name="staffadd">
        <label>Station District : </label><br>
        <select class="form-control" name="address" id="address" required>
            <option value="">Select the Fuel</option>
            <option value="Colombo">Colombo</option>
            <option value="Gampaha">Gampaha</option>
        </select>
        <br />
        <label>Price :</label><br>
        <input class="form-control type="text" name="contactno" id="contactno" value="" required />
        <br /><br />

        <input class="btn btn-success btn-update" type="submit" value="Submit" />
    </form>
</div>
<?php include 'Footer.php'; ?>
<div style="margin: auto; width: auto; padding: 50px; float: left;">
    <h3 style="padding-bottom: 15px;">Fuel Station deatils</h3>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>EID</th>
                <th>Station name</th>
                <th>District</th>
                <th>Capacity of the Station</th>
                <th>Station contact number</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include 'mysqldbconnection.php';
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {

                $sql = "SELECT *  From fuelstation ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $my_id = $row["id"];

                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["capacity"] . "</td>";
                        echo "<td>" . $row["contactno"] . "</td>";
                        echo "<td> <button   myid='" . $row['id'] . "' class='myModal btn btn-success btn-update' data-toggle='modal' data-target='#exampleModalCenter'>Update</button></td>";
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
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Fuel station details </h5>
                <button id="hidem" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div id="modalContent"></div>

            <div class="modal-footer">
                <button type="button" id="bdel" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
