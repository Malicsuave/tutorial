<?php
// Get the user ID from the request
$user_id = $_REQUEST["id"];

// Include the database connection file
include("connections.php");

// Fetch the user record based on the provided user ID
$get_record = mysqli_query($connections, "SELECT * FROM mytbl WHERE id='$user_id'");

// Initialize variables to store user information
$fName = $mName = $lName = $section = $address = $email = $contact = "";

// Check if a record was found and populate the variables
if ($row_edit = mysqli_fetch_assoc($get_record)) {
    $fName = $row_edit["fName"];
    $mName = $row_edit["mName"];
    $lName = $row_edit["lName"];
    $section = $row_edit["section"];
    $address = $row_edit["address"];
    $email = $row_edit["email"];
    $contact = $row_edit["contact"];
} else {
    // Handle the case where no record was found for the given ID
    echo "Record not found!";
    exit; // Stop further execution
}
?>

<link rel="stylesheet" href="style.css">
<?php include ("nav.php"); ?>
</head>
<body>

<div class="form-container">
    <!-- HTML form for editing user information -->
    <form method="POST" action="Update_Record.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user_id); ?>">
        <input type="text" name="fName" value="<?php echo htmlspecialchars($fName); ?>" placeholder="First Name">
        <br>
        <input type="text" name="mName" value="<?php echo htmlspecialchars($mName); ?>" placeholder="Middle Name">
        <br>
        <input type="text" name="lName" value="<?php echo htmlspecialchars($lName); ?>" placeholder="Last Name">
        <br>
        <input type="text" name="section" value="<?php echo htmlspecialchars($section); ?>" placeholder="Section">
        <br>
        <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>" placeholder="Address">
        <br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Email">
        <br>
        <input type="text" name="contact" value="<?php echo htmlspecialchars($contact); ?>" placeholder="Contact Number">
        <br>
        <input type="submit" value="Update">
        <a href="index.php" class="back-btn">Back to Home</a>
    </form>
</div>

</body>
</html>
