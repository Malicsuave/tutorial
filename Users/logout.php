<?php
session_start();
if (isset($_SESSION['email'])) {
    unset($_SESSION['email']);
}
session_unset();
session_destroy();
$logout = md5(rand()); 
$email_md5 = md5(rand()); 
$redirect_url = "../login?logout=$logout&v_1=$email_md5";
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Logging Out</title>
    <link rel='stylesheet' href='../style.css'>
</head>
<body>
    <div class='logout-container'>
        <div class='logout-message'>
            Logging out ... Please wait ...
        </div>
    </div>
</body>
</html>";
header("Refresh: 3; url=$redirect_url");
exit();
?>
