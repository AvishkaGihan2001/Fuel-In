<?php include 'Header.php'?>
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
                    <th>Notification ID</th>
                    <th>Customer Email</th>
                    <th>Request Status</th>
                    <th>Customer Request Fuel type</th>
                    <th>Customer Request Fuel Ammount</th>
                    <th>Fuel price (1L)</th>
                    <th>Total Amount</th>
                    <th>Issue Date</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'mysqldbconnection.php';
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    $sql = "SELECT * FROM customermsg ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $my_id = $row["CusnotId"];
                            echo "<tr>";
                            echo "<td>" . $row["CusnotId"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["status"] . "</td>";
                            echo "<td>" . $row["Fuel_type"] . "</td>";
                            echo "<td>" . $row["fuel_amount"] . "</td>";
                            echo "<td>" . $row["fuel_price"] . "</td>";
                            echo "<td>" . $row["totalamount"] . "</td>";
                            echo "<td>" . $row["date"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";
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

