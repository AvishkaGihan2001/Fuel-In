<?php include 'Header.php'; ?>
<div style="margin: auto; width: auto; padding: 50px; float: left;">
    <h3 style="padding-bottom: 15px;">Fuel price register</h3>
    <form action="FuelPrice.php" method="POST" name="staffadd">
        <label>Fuel type : </label><br>
        <select class="form-control" name="Fuelt" id="Fuelt" required>
            <option value="">Select the Fuel</option>
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
        </select>
        <br />
        <label>Price :</label><br>
        <input class="form-control" type=" text" name="FPrice" id="Fprice" value="" required />
        <br /><br />

        <input class="btn btn-success btn-update" type="submit" value="Submit" />
    </form>
</div>
<div style="margin: auto; width: auto; padding: 50px; float: left;">
    <h3 style="padding-bottom: 15px;">Fuel Station deatils</h3>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fuel Name</th>
                <th>Price of the Fuel (Rs)</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include 'mysqldbconnection.php';
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {

                $sql = "SELECT *  From fueltype ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $my_id = $row["id"];

                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["fuaname"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td> <button   myid='" . $row['id'] . "' class='myModal btn btn-success btn-update' data-toggle='modal' data-target='#exampleModalCenter'>Update</button></td>";
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
<!-- insert queary to the fuel table -->
<?php
if (isset($_POST["Fuelt"]) && $_POST["Fuelt"] != NULL) {

    $FuelType = $_POST["Fuelt"];
    $Fuelprice = $_POST["FPrice"];

    include 'mysqldbconnection.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "insert into fueltype (fuaname,price) 
        values ('" . $FuelType . "', '" . $Fuelprice . "')";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('station details added successfully');</script>";
            $_POST["Fuelt"] = NULL;
            //   header("Location: NewFuelStation.php");

            exit();
        } else {
            echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
        }
        $conn->close();
    }
}
?>


<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });


    $('button.myModal').on('click', function() {

        var bb = $(this).attr("myid");
        $.ajax({
            url: 'FuelPriceModal.php?myid=' + bb,
            type: 'GET',
            success: function(data) {
                $('#modalContent').html(data);
            }
        });

        $('#exampleModalCenter').modal('show');
    });
    $('#bdel').on('click', function() {
        $('#exampleModalCenter').modal('hide');
    });
    $('#hidem').on('click', function() {
        $('#exampleModalCenter').modal('hide');
    });


    function saffDelete() {
        $.post('FuelPriceDelete.php', {
            'fuelid': fuelid
        }, function(result) {
            alert(result)
        })
        location.reload();
    };
</script>
<?php include 'Footer.php'; ?>