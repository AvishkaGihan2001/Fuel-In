<?php include 'Header.php'?>
<?php include 'adminNavBar.php' ?>
<div style="margin: 80px">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Employee_Id</th>
                    <th>First Name</th>
                    <th>lastname</th>
                    <th>email</th>
                    <th>gender</th>
                    <th>category</th>
                    <th>password</th>
                    <th>re-password</th>
                </tr>
            </thead>
            <tbody>
                <?php include 'mysqldbconnection.php'; ?>
                <?php

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {

                    $sql = "SELECT *  From employee ";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $my_id = $row["Eid"];

                            echo "<tr>";
                            echo "<td>" . $row["Eid"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["nic"] . "</td>";
                            echo "<td>" . $row["etype"] . "</td>";
                            echo "<td>" . $row["tel"] . "</td>";
                            echo "<td>" . $row["address"] . "</td>";
                            echo "<td> <button class='btn btn-success' myid='" . $row['Eid'] . "' onclick='staffUpdate(" . $my_id . ");'>Update</button></td>";
                            echo "<td></td>";
                            echo "</tr>";
                        }
                    }

                    $conn->close();
                }
                ?>
                <!-- <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function staffUpdate(staffid) {
            window.location.href = 'staffUpdatePage.php?staffid=' + staffid;
        }
    </script>

<?php include 'Footer.php'?>

