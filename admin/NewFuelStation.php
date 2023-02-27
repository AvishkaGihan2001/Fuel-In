<?php include 'Header.php' ?>
<style>
    body {
        background-image: linear-gradient(#DD5E89, #F7BB97);
        background-size: auto;
    }
    .btn-update{
        background-color: #009695;
        
    }
    .btn-update:hover{
        background-color: #c2c2c2;
    }
</style>


<div style="margin: auto; width: auto; padding: 50px; float: left;">
    <h3 style="padding-bottom: 15px;">Fuel Station register</h3>
    <form action="NewFuelStation.php" method="POST" name="staffadd">
        <label>Station name : </label><br>
        <input class="form-control" type=text" name="Fname" id="Fname" value="" required />
        <br /><br />


        <label>Station District : </label><br>
        <select class="form-control" name="address" id="address" required>
            <option value="">Select the District</option>
            <option value="Colombo">Colombo</option>
            <option value="Gampaha">Gampaha</option>
            <option value="Kalutara">Kalutara</option>
            <option value="Kandy">Kandy</option>
            <option value="Matale">Matale</option>
            <option value="Nuwara Eliya">Nuwara Eliya</option>
            <option value="Galle">Galle</option>
            <option value="Matara">Matara</option>
            <option value="Hambantota">Hambantota</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Kilinochchi">Kilinochchi</option>
            <option value="Mannar">Mannar</option>
            <option value="Vavuniya">Vavuniya</option>
            <option value="Mullaitivu">Mullaitivu</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Ampara">Ampara</option>
            <option value="Trincomalee">Trincomalee</option>
            <option value="Kurunegala">Kurunegala</option>
            <option value="Puttalam">Puttalam</option>
            <option value="Anuradhapura">Anuradhapura</option>
            <option value="Polonnaruwa">Polonnaruwa</option>
            <option value="Badulla">Badulla</option>
            <option value="Moneragala">Moneragala</option>
            <option value="Ratnapura">Ratnapura</option>
        </select>
        <br /><br />

        <label>Station contact number :</label><br>
        <input class="form-control type=text" name="contactno" id="contactno" value="" required />
        <br /><br />

        <label>Capacity of the Station : </label><br>
        <input class="form-control" type=number" name="capacity" id="capacity" value="" required />
        <br /><br />

        <input class="btn btn-success btn-update" type="submit" value="Submit" />
    </form>
</div>
<?php
if (isset($_POST["Fname"]) && $_POST["Fname"] != NULL) {

    $fuelstation = $_POST["Fname"];
    $fuelstationaddress = $_POST["address"];
    $fuelstationcontact = $_POST["contactno"];
    $fuelstationcapacity = $_POST["capacity"];

    include 'mysqldbconnection.php';

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "insert into fuelstation (name,address,contactno,capacity) 
        values ('" . $fuelstation . "', '" . $fuelstationaddress . "', '" . $fuelstationcontact . "', '" . $fuelstationcapacity . "')";
        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('station details added successfully');</script>";
            $_POST["Fname"] = NULL;
            //   header("Location: NewFuelStation.php");

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
                <th>District</th>
                <th>Capacity of the Station</th>
                <th>Station contact number</th>
                <th>Update</th>
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





<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });


    $('button.myModal').on('click', function() {

        var bb = $(this).attr("myid");
        $.ajax({
            url: 'NewFuelStationModal.php?myid='+bb,
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
</script>





<?php include 'Footer.php' ?>