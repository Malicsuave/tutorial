<?php

session_start();

if (isset($_SESSION["id"])) {

    $user_id = $_SESSION["id"];

        include ("../connections.php");

        $get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id= '$user_id'");
        while ($row_edit = mysqli_fetch_array($get_record)) {

            $db_fName = $row_edit["fName"];
            $db_mName = $row_edit["mName"];
            $db_lName = $row_edit["lName"];
            $db_section = $row_edit["section"];
            $db_address = $row_edit["address"];
            $db_email = $row_edit["email"];
            $db_contact = $row_edit["contact"];
            $db_password = $row_edit["password"];
            $db_account_type = $row_edit["account_type"];

            // $db_fName = $row["fName"];
            // $db_mName = $row["mName"];
            // $db_lName = $row["lName"];
            // $db_section = $row["section"];
            // $db_address = $row["address"];
            // $db_email = $row["email"];
            // $db_contact = $row["contact"];
            // $db_password = $row["password"];
            // $db_account_type = $row["account_type"];



        }

            echo   "Welcome $db_fName $db_mName $db_lName ! <a href='logout.php'>Logout</a>";


    }else{

        echo "You must login first! <a href='../login.php'>Login now!</a>";	





    }



?>