<?php
    include 'connect\connection.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = "select * from employee where username = '$username' and password = '$password'";  
        $result = mysqli_query($connect, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            echo  '<script>
                        window.location.href = "smdashboard.php";
                        alert("Login successful!!")
                    </script>';
        } 
        else{  
            echo  '<script>
                        window.location.href = "smlogin.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }     
    }
    ?>