<?php
session_start();

if(isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    echo "<script>window.location.href='../index.php';</script>";
    exit(); // Stop further script execution after the redirect
}

include("../connections.php");
include("nav.php");
?>
