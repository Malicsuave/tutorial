<?php
include("../connections.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Navbar Example</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="index" class="nav-link">Home</a></li>
            <li><a href="../Search" class="nav-link">Search</a></li>
            <li><a href="ViewRecord" class="nav-link">View Records</a></li>
            <li><a href="SendSMS" class="nav-link">SMS</a></li>
            <li><a href="../login" class="nav-link">Login</a></li>
            <li><a href="register" class="nav-link">Register</a></li>
            <li><a href="../Users/logout" class="nav-link">Logout</a></li>
            
        </ul>
    </div>
</body>
</html>
