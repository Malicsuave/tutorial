

<?php


include("../connections.php");
$first_name = $middle_name = $last_name = $gender = $preffix = $seven_digit = $email = "";
$first_nameErr = $middle_nameErr = $last_nameErr = $genderErr = $preffixErr = $seven_digitErr = $emailErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["first_name"])) {
        $first_nameErr = "Required";
    } else {
        $first_name = $_POST["first_name"];
    }

    if (empty($_POST["middle_name"])) {
        $middle_nameErr = "Required";
    } else {
        $middle_name = $_POST["middle_name"];
    }

    if (empty($_POST["last_name"])) {
        $last_nameErr = "Required";
    } else {
        $last_name = $_POST["last_name"];
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Required";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["preffix"])) {
        $preffixErr = "Required";
    } else {
        $preffix = $_POST["preffix"];
    }

    if (empty($_POST["seven_digit"])) {
        $seven_digitErr = "Required";
    } elseif (!preg_match('/^[0-9]{7}$/', $_POST["seven_digit"])) {
        $seven_digitErr = "Must be 7 digits";
    } else {
        $seven_digit = $_POST["seven_digit"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Required";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        $email = $_POST["email"];
    }

    if($first_name && $middle_name && $last_name && $gender && $preffix && $seven_digit && $email) {
           if (!preg_match("/^[a-zA-Z  ]*$/", $first_name)) {
                $first_nameErr = "Only letters and spaces are allowed";
           }else{
                $count_first_name_string = strlen($first_name);
           if($count_first_name_string <2 ){
                $first_nameErr = "First name must be at least 2 characters long";
           }else{
                $count_middle_name_string = strlen($middle_name);

           if($count_middle_name_string <2 ){
                $middle_nameErr = "Middle name must be at least 2 characters long";
           }else{
                $count_last_name_string = strlen($last_name);
           if($count_last_name_string < 2) {
                $last_nameErr = "Last name must be at least 2 characters long";
           }else{
            
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }else{
                    $count_seven_digit_string = strlen($seven_digit);
                    
                    if($count_seven_digit_string < 7){
                        $seven_digitErr = "Seven digit must be at least 7 characters long";
                    }else{

                        function random_password ( $length = 5) {
                            $str ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ01234567890";
                            $shuffled = substr (str_shuffle($str), 0, $length);
                            return $shuffled;
                        }
                        $password = random_password(8);

                      include("../connections.php");

                      mysqli_query($connections, "INSERT INTO tbl_user(first_name,middle_name,last_name,gender,preffix,seven_digit,email,password, account_type) VALUES('$first_name' , '$middle_name' , '$last_name' , '$gender' , '$preffix' , '$seven_digit' , '$email' , '$password' , '2') ");

                       echo "<script>window.location.href='../success.php';</script>";
                    }
                }
            }
           }
    }
}

}
}
?>

<style>
    .error {
        color: red;
    }

</style>

<script type="application/javascript">

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode

    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

</script>

<link rel="stylesheet" href="styles.css">

<?php include ("nav.php"); ?>


<form method="POST">
    <center>
        <table border="2" width="50%">
            <tr>
                <td>
                    <input type="text" name="first_name" placeholder="First Name" value="<?php echo htmlspecialchars($first_name); ?>">
                    <span class="error"><?php echo $first_nameErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="middle_name" placeholder="Middle Name" value="<?php echo htmlspecialchars($middle_name); ?>">
                    <span class="error"><?php echo $middle_nameErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="last_name" placeholder="Last Name" value="<?php echo htmlspecialchars($last_name); ?>">
                    <span class="error"><?php echo $last_nameErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="gender">
                        <option value="">Select Gender</option>
                        <option value="Male" <?php if ($gender == "Male") echo "selected"; ?>>Male</option>
                        <option value="Female" <?php if ($gender == "Female") echo "selected"; ?>>Female</option>
                    </select>
                    <span class="error"><?php echo $genderErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="preffix">
                        <option value="">Network Provided (Globe, Smart, etc.)</option>
                        <option value="0813" <?php if ($preffix == "0813") echo "selected"; ?>>0813</option>
                        <option value="0817" <?php if ($preffix == "0817") echo "selected"; ?>>0817</option>
                        <option value="0905" <?php if ($preffix == "0905") echo "selected"; ?>>0905</option>
                        <option value="0906" <?php if ($preffix == "0906") echo "selected"; ?>>0906</option>
                        <option value="0907" <?php if ($preffix == "0907") echo "selected"; ?>>0907</option>
                    </select>
                    <input type="text" name="seven_digit" maxlength="7" placeholder="Other Seven Digit"  onkeypress='return isNumberKey(event)' value="<?php echo htmlspecialchars($seven_digit); ?>">
                    <span class="error"><?php echo $preffixErr . ' ' . $seven_digitErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="btnRegister" value="Register">
                </td>
                
            </tr>
        </table>
    </center>
</form>
