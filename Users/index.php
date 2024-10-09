<?php
session_start();

if (isset($_SESSION["id"])) {

    $user_id = $_SESSION["id"];

    include ("../connections.php");

    // Update query to use the correct column name in your new database
}
?>
<link rel="stylesheet" href="../style.css">
