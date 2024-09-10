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
<!-- CSS for centering the form and styling buttons -->
<style>
    body {
        display: center;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background-color: #e9ecef;
    }

    .form-container, .data-display {
        width: 300px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .error {
        color: red;
        font-size: 12px;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        font-size: 14px;
        text-align: left;
    }

    th, td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .btn {
        display: inline-block;
        padding: 5px 10px;
        margin: 0 5px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #45a049;
    }

    .btn.delete {
        background-color: #ff4d4d;
    }

    .btn.delete:hover {
        background-color: #ff1a1a;
    }

    .error {
        color:Red;
    }


    
</style>
<br>

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
                <a class='btn' href='Edit.php?id=$user_id'>Update</a>
                <a class='btn delete' href='ConfirmDelete.php?id=$user_id'>Delete</a>
            </td>
          </tr>";
}
echo "</table>";
?>

<hr>

<?php

$Paul= "Paul";
$Mica= "Mica";
$Kaye= "Kaye";

$names = array("$Kaye","$Paul","$Mica");

    foreach ($names as $display_names) {
        
        echo $display_names . "<br>";
}
?>


