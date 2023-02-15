<?php include 'Header.php'?>
<?php include 'adminNavBar.php' ?>


<div style="margin: auto; width: 900px; background-color: #c2d8e6; padding: 50px;">
        <h1 style="padding-bottom: 15px;">Fuel Station register</h1>
        <form action="addStaffDetails.php" method="POST" name="staffadd">
            <label>Staff Name : </label><br>
            <input type="text" name="Fname" id="Fname" value="" required />
            <br /><br />

            <label>Staff NIC : </label><br>
            <input type="text" name="address" id="address" value="" required />
            <br /><br />

            <label>Staff Tel: </label><br>
            <input type="number" name="capacity" id="capacity" value="" required />
            <br />
            <br/>
            <input class="btn btn-success" type="submit" value="Submit" />

        </form>

    </div>

    <?php include 'Footer.php'?>
