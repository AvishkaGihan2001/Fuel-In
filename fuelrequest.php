<?php include 'header.php'; ?>
<style>
    body {
        background-color: gray;
    }
</style>

<div style="color: #fff;">
    <div style="margin: auto; width: auto; padding: 50px;">
        <h3 style="padding-bottom: 15px;">Fuel Station deatils</h3>
        <table id="example" class="table table-striped" style="width:100%; color: #fff;">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Station name</th>
                    <th>Fuel Type</th>
                    <th>Reuest Qty</th>
                    <th>Request Date</th>
                    <th>Respond Date</th>
                    <th>Status</th>
                    <th>Respond</th>

                </tr>
            </thead>
            <tbody>

                <?php
                include 'mysqldbconnection.php';
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {

                    $sql = "SELECT * FROM fuelrequest";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $my_id = $row["id"];

                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["servicestationname"] . "</td>";
                            echo "<td>" . $row["fueltype"] . "</td>";
                            echo "<td>" . $row["reqQty"] . "</td>";
                            echo "<td>" . $row["reqDate"] . "</td>";
                            echo "<td>" . $row["resdate"] . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td> <button   myid='" . $row['id'] . "' class='myModal btn btn-success' data-toggle='modal' data-target='#exampleModalCenter'>Update</button></td>";
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
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="padding-bottom: 15px;">Fuel Request approvel</h3>
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

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });


    $('button.myModal').on('click', function() {

        var bb = $(this).attr("myid");
        $.ajax({
            url: 'fuelrequestmodal.php?myid=' + bb,
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
<?php include 'Footer.php'; ?>