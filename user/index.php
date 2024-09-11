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
    }

    echo "<div class='container'>";
    echo "<div class='greeting'>Welcome $db_fName $db_mName $db_lName!</div>";
    echo "<p><strong>Section:</strong> $db_section</p>";
    echo "<p><strong>Address:</strong> $db_address</p>";
    echo "<p><strong>Email:</strong> $db_email</p>";
    echo "<p><strong>Contact:</strong> $db_contact</p>";
    echo "<a href='logout.php' class='btn logout'>Logout</a>";
    echo "</div>";
} else {
    echo "You must log in first! <a href='../login.php'>Login now!</a>";
}

?>
<link rel="stylesheet" href="../style.css">

<!-- Place this logout button HTML outside of the PHP block if necessary -->
