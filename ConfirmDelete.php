<?php

$user_id = $_REQUEST["id"];

include("connections.php");

$query_delete = mysqli_query($connections, "SELECT * FROM mytbl WHERE id = '$user_id'");

while ($row_delete = mysqli_fetch_assoc($query_delete)) {
    $user_id = $row_delete["id"];
    $db_name = $row_delete["fName"];
    $db_address = $row_delete["address"];
    $db_email = $row_delete["email"];
    $db_contact = $row_delete["contact"];
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php

        $user_id = $_REQUEST["id"];

        include("connections.php");

        $query_delete = mysqli_query($connections, "SELECT * FROM mytbl WHERE id = '$user_id'");

        while ($row_delete = mysqli_fetch_assoc($query_delete)) {
            $user_id = $row_delete["id"];
            $db_name = $row_delete["fName"];
            $db_address = $row_delete["address"];
            $db_email = $row_delete["email"];
            $db_contact = $row_delete["contact"];
        }

        echo "<h1>Are you sure you want to delete $db_name?</h1>";

        ?>
  <form method="POST" action="Delete_Now.php">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="submit" name="confirm" value="Yes" class="confirm-btn">
    <a href='index.php' class="confirm-btn cancel-btn">No</a>
</form>

</form>
      
    </div>
</body>
</html>
