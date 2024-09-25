<?php
    $connections = mysqli_connect("localhost", "root", "", "my_database");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: ". mysqli_connect_error();
        }// else{
        //     echo "";
        // }
?>