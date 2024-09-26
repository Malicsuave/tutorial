<?php
session_start();

// Unset and destroy the session
unset($_SESSION["id"]);
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="logout-container">
        <div class="logout-message">
            Logging out ... Please wait ...
        </div>
    </div>

    <?php
    // Redirect to index.php after 3 seconds
    header('Refresh: 3;url=../index.php');
    exit();
    ?>
</body>
</html>
