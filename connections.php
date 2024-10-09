<?php
    $connections = mysqli_connect("localhost", "root", "", "my_database");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: ". mysqli_connect_error();
        }// else{
        //     echo "";
        // }
        
?>
<style>    .btn-primary{
        -webkit-border-rarduis:0;
        -moz-border-radius:0;
        border-radius: 0px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        color:white;
        font-size:16px;
        background: #34d9bd;
        padding:6px 20px 8px 20px;
        text-decoration:none;
    }
    .btn-primary:hover {
        background: #4ccfb3;
        text-decoration: none;
    }
    .btn-delete {
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: #ffffff;
        font-size: 15px;
        background: #d93434;
        padding: 10px 20px 10px 20px;
        text-decoration: none;
    }
    btn-delete:hover{
        background: #fc3c3c;
        text-decoration: none;
    }
</style>

