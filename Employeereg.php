<?php include'header.php';?>
<div style="margin: auto; width: 900px; background-color: #c2d8e6; padding: 50px;">
        <h1 style="padding-bottom: 15px;">Add Staff Details</h1>

        <form action="addStaffDetails.php" method="POST" name="staffadd">

            <label>Staff Name : </label><br>
            <input type="text" name="stname" id="stname" value="" required />
            <br /><br />

            <label>Staff NIC : </label><br>
            <input type="text" name="stnic" id="stnic" value="" required />
            <br /><br />

            <label>Staff Tel: </label><br>
            <input type="number" name="sttel" id="sttel" value="" required />
            <br /><br />

            <label>Staff Type : </label><br>
            <select name="sttype" id="sttype" required>
                <option value="">Select the type</option>
                <option value="1">Admin</option>
                <option value="2">Dispatch Office</option>
                <option value="3">fuel manger</option>
            </select>
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


    <?php

    if (isset($_POST["stname"]) && $_POST["stname"]!= null) {

        $staffname = $_POST["stname"];
        $staffnic = $_POST["stnic"];
        $stafftype = $_POST["sttype"];
        $stafftel = $_POST["sttel"];
        $staffuname = $_POST["stuname"];
        $staffpassword = $_POST["stpass"];

        $sever_name = "localhost";
        $db_uname = "root";
        $db_pass = "";
        $db_name = "fualindb";

        $conn = mysqli_connect($sever_name, $db_uname, $db_pass, $db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {


            $sql = "insert into employee (name,nic,etype,tel,address,username, password) values ('" . $staffname . "', '" . $staffnic . "', '" . $stafftype . "', '" . $stafftel . "', '" . $staffaddress . "', '" . $staffuname . "', '" . $staffpassword . "') ";

            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('Employee details added successfully');</script>";

              //  header("Location: staffAll.php");
                $_POST["stname"] = null;
                exit();
            } else {
                echo "<script> alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
            }

            $conn->close();
        }
    }
    ?>
<?php include'footer.php'; ?>