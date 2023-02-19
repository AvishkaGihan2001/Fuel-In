<?php include 'header.php'; ?>
<style>
    body {
        background: #acb6e5;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #86fde8, #acb6e5);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #86fde8, #acb6e5);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
</style>

<div>
    <div style="margin: auto; width: auto; padding: 50px;">
        <h3 style="padding-bottom: 15px; text-align: center;">Customer Fual Request Deatils</h3>
        <table id="example" class="table table-striped" style="width:100%; ">
            <thead>
                <tr>
                    <th>Request ID</th>
                    <th>Customer Full Name</th>
                    <th>Customer email</th>
                    <th>Customer NIC No.</th>
                    <th>Request Fuel Amount</th>
                    <th>Request Station</th>
                    <th>Request date</th>
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

                    $sql = "SELECT * FROM req_fuel ";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $my_id = $row["id"];

                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["full_name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["nic"] . "</td>";
                            echo "<td>" . $row["fuel_amount"] . "</td>";
                            echo "<td>" . $row["station"] . "</td>";
                            echo "<td>" . $row["date"] . "</td>";
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
                <h3 style="padding-bottom: 15px;">customer Request approvel</h3>
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
            url: 'CustomerReqModal.php?myid=' + bb,
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