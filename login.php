<?php
include("connections.php");
include("nav.php");

date_default_timezone_set("Asia/Manila");
$date_now = date("m/d/Y");
$time_now = date("h:i a");
$notify = $attempt = $log_time = "";

$email = $password = "";
$emailErr = $passwordErr = "";

// Check if the login button was pressed
if(isset($_POST["btnLogin"])){
    // Validate email
    if(empty($_POST["email"])){  // Use empty() to check if the email field is empty
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    // Validate password
    if(empty($_POST["password"])){  // Use empty() to check if the password field is empty
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    // If both fields are filled
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
                // Allow admin to log in without lockout restrictions
            } else {
                // If lockout time has passed
                if ($new_time >= $db_log_time) {
                    // Compare passwords
                    if ($db_password == $password) {
                        // Password is correct, reset attempts
                        mysqli_query($connections, "UPDATE tbl_user SET attempt = 0, log_time = NULL WHERE email='$email'");
                        
                        // Start a session for the user (if not already done)
                        session_start();
                        $_SESSION["id"] = $fetch["id"]; // Assuming you have an 'id' column in your table
                        
                        // Redirect to the users folder
                        header("Location: users/index.php");
                        exit(); // Stop script execution after the redirect
                    } else {
                        // Password is incorrect, increment the attempt count
                        $attempt = (int)$db_attempt + 1;
            
                        if ($attempt >= 3) {
                            // Lock the user out for 15 minutes
                            $lockout_time = date("Y-m-d H:i:s", strtotime("+15 minutes")); // Store future lockout time in the database
                            mysqli_query($connections, "UPDATE tbl_user SET attempt = 3, log_time = '$lockout_time' WHERE email='$email'");
                            $passwordErr = "Password is incorrect. You have reached the maximum attempts. Please try again after 15 minutes.";
                        } else {
                            // Update attempt count and notify user
                            mysqli_query($connections, "UPDATE tbl_user SET attempt = '$attempt' WHERE email='$email'");
                            $passwordErr = "Password is incorrect. Login Attempt: <b>$attempt</b>";
                        }
                    }
                } else {
                    // Notify the user to wait before trying again
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
