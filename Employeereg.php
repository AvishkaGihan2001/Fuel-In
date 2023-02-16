<?php include 'header.php'; ?>
<style>
    body {
        background-image: linear-gradient(#003973, #E5E5BE);
        background-size: auto;
    }

    div.scrollmenu {
        overflow: auto;
        white-space: nowrap;
        padding: 50px;
    }

    div.scrollmenu a {
        display: inline-block;
        color: teal;
        text-align: center;
        padding: 14px;
        text-decoration: none;
    }

    #navbar a:hover {
        background-color: #E5E5BE;
        color: black;
    }
</style>
<!-- insert Data to the data base -->
<div style="margin: auto; width: auto; padding: 50px; float: left;">
    <h3 style="padding-bottom: 15px;">Employee profile create</h3>

    <form action="Employeereg.php" method="POST" name="staffadd">

        <label>Name of the Employee : </label><br>
        <input type="text" name="stname" id="stname" value="" required />
        <br /><br />

        <label>National Identity Card Number : </label><br>
        <input type="text" name="stnic" id="stnic" value="" required />
        <br /><br />

        <label>Role of the Employee : </label><br>
        <select name="sttype" id="sttype" required>
            <option value="">Select the type</option>
            <option value="1">Admin</option>
            <option value="2">Dispatch Office</option>
            <option value="3">fuel manger</option>
        </select>
        <br /><br />

        <label>Contact Number: </label><br>
        <input type="number" name="sttel" id="sttel" value="" required />
        <br /><br />


        <label>Email Address: </label><br>
        <input type="text" name="stemail" id="stemail" value="" required />
        <br /><br />

        <label>Staff Username: </label><br>
        <input type="text" name="stuname" id="stuname" value="" required />
        <br /><br />

        <label>Staff Password: </label><br>
        <input type="password" name="stpass" id="stpass" value="" required />
        <br /><br />

        <input class="btn btn-success" type="submit" value="Submit" />

    </form>

</div>
<!-- view the data in the table -->
<div class="scrollmenu">
    <h3 style="padding-bottom: 15px;">Employee Details</h3>

    <table id="example" class="table table-striped" style="width:100%; text-align: center; ">
        <thead>
            <tr>
                <th>EID</th>
                <th>Name of the Employee</th>
                <th>National Identity Card Number</th>
                <th>Role of the Employee</th>
                <th>Contact Number</th>
                <th>Email Address</th>
                <th>Update</th>
                <th>Delete</th>
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
                        $my_id = $row["eid"];
                        echo "<tr>";
                        echo "<td>" . $row["eid"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["nic"] . "</td>";
                        echo "<td>" . $row["type"] . "</td>";
                        echo "<td>" . $row["tel"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td> <button class='btn btn-success' myid='" . $row['eid'] . "' onclick='staffUpdate(" . $my_id . ");'>Update</button></td>";
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
<!-- inser queary  -->
<?php
if (isset($_POST["stname"]) && $_POST["stname"] != null) {
    $staffname = $_POST["stname"];
    $staffnic = $_POST["stnic"];
    $stafftype = $_POST["sttype"];
    $stafftel = $_POST["sttel"];
    $staffemail = $_POST["stemail"];
    $staffuname = $_POST["stuname"];
    $staffpassword = $_POST["stpass"];
    include 'mysqldbconnection.php';
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "insert into employee (name,nic,type,tel,email,username, password) 
            values ('" . $staffname . "', '" . $staffnic . "', '" . $stafftype . "', '" . $stafftel . "', '" . $staffemail . "', '" . $staffuname . "', '" . $staffpassword . "') ";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('employee details added successfully');</script>";
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
<!-- java script  -->
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-50px";
        }
        prevScrollpos = currentScrollPos;
    }
</script>

<?php include 'footer.php'; ?>