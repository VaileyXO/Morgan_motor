<?php
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $regUsername = $_POST["username"];
            $regPassword = $_POST["password"];
    
            $con = mysqli_connect("localhost", "root", "", "search_engine");
            $error = '';
            
            if (!$con)
            {
                echo "Failed to connect to MySQL : ".mysqli_connect_err();
                exit();
            }
    
            $sql = "SELECT * FROM `user` WHERE username = '$regUsername'";
            $result = mysqli_query($con, $sql) or die (mysql_error());
            $rows = mysqli_num_rows($result);
            
            if($rows == 1) {
                echo "Username existed";
            } else {
                $sql = "INSERT INTO `user` (username, passwd) VALUES ('$regUsername', '$regPassword')";
                $result = mysqli_query($con, $sql);
        
                if ($result) {
                    mysqli_close($con);
                }
            }
        }
        
?>