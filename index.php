<?php

include("connections.php");

$fName = $mName = $lName = $address = $email = $section = $contact = $password = $cpassword= "";
$fnameErr = $mnameErr = $lnameErr = $addressErr = $emailErr = $sectionErr = $contactErr = $passwordErr = $cpasswordErr=  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if (empty($_POST["fName"])) {
        $fnameErr = "First name is required";
    } else {
        $fName = $_POST["fName"];
    }

    if (empty($_POST["mName"])) {
        $mnameErr = "Middle name is required";
    } else {
        $mName = $_POST["mName"];
    }

    if (empty($_POST["lName"])) {
        $lnameErr = "Last name is required";
    } else {
        $lName = $_POST["lName"];
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = $_POST["address"];
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST["email"];
    }

    if (empty($_POST["section"])) {
        $sectionErr = "Section is required";
    } else {
        $section = $_POST["section"];
    }

    if (empty($_POST["contact"])) {
        $contactErr = "Contact number is required";
    } else {
        $contact = $_POST["contact"];
    }
    if (empty($_POST["password"])) {
        $passwordErr = " Password is required";
    } else {
        $password = $_POST["password"];
    }
    if (empty($_POST["cpassword"])) {
        $cpasswordErr = " Confirm Password is required";
    } else {
        $cpassword = $_POST["cpassword"];
    }


    if ($fName && $mName && $lName && $address && $email && $section && $contact && $password && $cpassword) {

        $check_email = mysqli_query($connections, "SELECT * FROM mytbl WHERE email ='$email'");
        $check_email_row = mysqli_num_rows($check_email);

        if($check_email_row > 0) {

                $emailErr = "Email is already registered";
        }else{

          $query = mysqli_query($connections, "INSERT INTO mytbl (fName, mName, lName, section, address, email, contact, password, account_type) 
          
          VALUES ('$fName','$mName','$lName', '$section', '$address', '$email', '$contact', '$password', '2')");

            echo "<div class='data-display'>";
            echo "<h2>Submitted Information</h2>";
            echo "<p><strong>First Name:</strong> " . htmlspecialchars($fName) . "</p>";
            echo "<p><strong>Middle Name:</strong> " . htmlspecialchars($mName) . "</p>";
            echo "<p><strong>Last Name:</strong> " . htmlspecialchars($lName) . "</p>";
            echo "<p><strong>Section:</strong> " . htmlspecialchars($section) . "</p>";
            echo "<p><strong>Address:</strong> " . htmlspecialchars($address) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Contact Number:</strong> " . htmlspecialchars($contact) . "</p>";
            echo "</div>";

            echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
            echo "<script>window.location.href='index.php'</script>";


    }




}
}
?>
<!-- Link to the external CSS file -->
<link rel="stylesheet" href="styles.css">

<?php include ("nav.php"); ?>

<!-- HTML form -->
<div class="form-container">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

FirstName: <input type="text" name="fName" placeholder="First Name" value="<?php echo $fName; ?>"> <br>
           <span class="error"><?php echo $fnameErr; ?></span> <br>

MiddleName:<input type="text" name="mName" placeholder="Middle Name" value="<?php echo $mName; ?>"> <br>
           <span class="error"><?php echo $mnameErr; ?></span> <br>

LastName:  <input type="text" name="lName" placeholder="Last Name" value="<?php echo $lName; ?>"> <br>
           <span class="error"><?php echo $lnameErr; ?></span> <br>

Section:   <input type="text" name="section" placeholder="Section" value="<?php echo $section; ?>"> <br>
           <span class="error"><?php echo $sectionErr; ?></span> <br>

Address:   <input type="text" name="address" placeholder="Address" value="<?php echo $address; ?>"> <br>
           <span class="error"><?php echo $addressErr; ?></span> <br>

Email:     <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>"> <br>
           <span class="error"><?php echo $emailErr; ?></span> <br>

Contact:   <input type="text" name="contact" placeholder="Contact Number" value="<?php echo $contact; ?>"> <br>
           <span class="error"><?php echo $contactErr; ?></span> <br>
           
Password:  <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>"> <br>
           <span class="error"><?php echo $passwordErr; ?></span> <br>

Confirm Password:  <input type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $cpassword; ?>"> <br>
                   <span class="error"><?php echo $cpasswordErr; ?></span> <br>


<input type="submit" value="Submit">

    </form>
</div>

<hr>

<?php

$view_query = mysqli_query($connections, "SELECT * FROM mytbl");

echo "<table border='2' width='50%'>";
echo "<tr>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Section</th>
        <th>Address</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Option</th>
    </tr>";

while ($row = mysqli_fetch_assoc($view_query)) {
    $user_id = $row["id"];
    $fName = $row["fName"];
    $mName = $row["mName"];
    $lName = $row["lName"];
    $section = $row["section"];
    $address = $row["address"];
    $email = $row["email"];
    $contact = $row["contact"];

    echo "<tr>
            <td>$fName</td>
            <td>$mName</td>
            <td>$lName</td>
            <td>$section</td>
            <td>$address</td>
            <td>$email</td>
            <td>$contact</td>
            <td>
                <a class='btn update' href='Edit.php?id=$user_id'>Update</a>
                <a class='btn delete' href='ConfirmDelete.php?id=$user_id'>Delete</a>
            </td>
          </tr>";
}
echo "</table>";
?>

<hr>

<?php

// $Paul= "Paul";
// $Mica= "Mica";
// $Kaye= "Kaye";

// $names = array("$Kaye","$Paul","$Mica");

//     foreach ($names as $display_names) {
        
//         echo $display_names . "<br>";
// }
?>

<?php
// Initialize variables and error messages
$first_name = $middle_name = $last_name = $gender = $preffix = $seven_digit = $email = "";
$first_nameErr = $middle_nameErr = $last_nameErr = $genderErr = $preffixErr = $seven_digitErr = $emailErr = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate first name
    if (empty($_POST["first_name"])) {
        $first_nameErr = "Required";
    } else {
        $first_name = $_POST["first_name"];
    }

    // Validate middle name
    if (empty($_POST["middle_name"])) {
        $middle_nameErr = "Required";
    } else {
        $middle_name = $_POST["middle_name"];
    }

    // Validate last name
    if (empty($_POST["last_name"])) {
        $last_nameErr = "Required";
    } else {
        $last_name = $_POST["last_name"];
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Required";
    } else {
        $gender = $_POST["gender"];
    }

    // Validate preffix
    if (empty($_POST["preffix"])) {
        $preffixErr = "Required";
    } else {
        $preffix = $_POST["preffix"];
    }

    // Validate seven-digit phone number
    if (empty($_POST["seven_digit"])) {
        $seven_digitErr = "Required";
    } elseif (!preg_match('/^[0-9]{7}$/', $_POST["seven_digit"])) {
        $seven_digitErr = "Must be 7 digits";
    } else {
        $seven_digit = $_POST["seven_digit"];
    }

    // Validate email
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
                    <input type="text" name="seven_digit" maxlength="7" placeholder="Other Seven Digit" value="<?php echo htmlspecialchars($seven_digit); ?>">
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

