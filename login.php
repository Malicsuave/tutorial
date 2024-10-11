<?php

session_start();
include("connections.php");
include("nav.php");
if(isset($_SESSION["email"])){
    $email = $_SESSION["email"];
    $query_account_type = mysqli_query($connections, "SELECT * FROM tbl_user WHERE email='$email'");
    $get_account_type = mysqli_fetch_assoc( $query_account_type );

    $account_type = $get_account_type['account_type'];
    
    if ($account_type == 1){
        echo  "<script>window.location.href='Admin';</script>";

    }else {
        echo "<script>window.location.href='Users';</script>";

    }
}
date_default_timezone_set("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i a");
$notify = $attempt = $log_time = "";

$email = $password = "";
$emailErr = $passwordErr = "";


if(isset($_POST["btnLogin"])){
    
    if(empty($_POST["email"])){
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    // Validate password
    if(empty($_POST["password"])){  
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

  
    if($email && $password){
        $check_email = mysqli_query($connections, "SELECT * FROM tbl_user WHERE email='$email' ");
        $check_row = mysqli_num_rows($check_email);

        if($check_row > 0) {
            $fetch = mysqli_fetch_assoc($check_email);
            $db_password = $fetch["password"];
            $db_attempt = $fetch["attempt"];
            $db_log_time = strtotime($fetch["log_time"]);
            $my_log_time = $fetch["log_time"];
            $new_time = strtotime($time_now);

            $account_type = $fetch["account_type"];

            if ($account_type == "1") {
               if($db_password == $password){
                    $_SESSION["email"] = $email;
                    echo "<script>windows.location.href='Admin'</script>";
               }else{
                $passwordErr = "Hi Admin! Your Password is incorrect!";
               }
                   
            } else {
                
                if ($new_time >= $db_log_time) {
                    
                    if ($db_password == $password) {
                        
                        $_SESSION["email"] = $email;
                        mysqli_query($connections, "UPDATE tbl_user SET attempt = 0, log_time = NULL WHERE email='$email'");
                        echo  "<script>windows.location.href='Users'</script>";

                       
                        session_start();
                        $_SESSION["id"] = $fetch["id"]; 
                        
                        
                        header("Location: users/");
                        exit(); 
                    } else {
                     
                        $attempt = (int)$db_attempt + 1;
            
                        if ($attempt >= 3) {
                            
                            $lockout_time = date("Y-m-d H:i:s", strtotime("+15 minutes")); // Store future lockout time in the database
                            mysqli_query($connections, "UPDATE tbl_user SET attempt = 3, log_time = '$lockout_time' WHERE email='$email'");
                            $passwordErr = "Password is incorrect. You have reached the maximum attempts. Please try again after 15 minutes.";
                        } else {
                            
                            mysqli_query($connections, "UPDATE tbl_user SET attempt = '$attempt' WHERE email='$email'");
                            $passwordErr = "Password is incorrect. Login Attempt: <b>$attempt</b>";
                        }
                    }
                } else {
                    
                    $notify = "I'm sorry, you have to wait until: <b>$my_log_time</b> before logging in.";
                }
            }
        } else {
            $emailErr = "Email is not registered!";
        }
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="form-container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Login</h2>

        Email: <input type="text" name="email" value="<?php echo $email; ?>"> <br>
        <span class="error"><?php echo $emailErr; ?></span> <br>

        Password: <input type="password" name="password" value=""> <br>
        <span class="error"><?php echo $passwordErr; ?></span> <br>

        <input type="submit" name="btnLogin" value="Login">

        <br>
        <span class="error"><?php echo $notify; ?></span>
        <br>

        <a href="?forgot=<?php echo md5(rand(1,9)); ?>">Forgot Password</a>
    </form>
    <a href="index.php" class="back-btn">Back</a>
</div>
