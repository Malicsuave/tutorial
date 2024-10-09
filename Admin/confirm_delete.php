<?php

$id_user = $_GET["id_user"] ?? ''; 

if ($id_user) {
    $query_name = mysqli_query($connections, "SELECT * FROM tbl_user WHERE id_user='$id_user'");

    if ($query_name && mysqli_num_rows($query_name) > 0) {
        $row_ = mysqli_fetch_assoc($query_name);

        $db_first_name = $row_["first_name"];
        $db_middle_name = $row_["middle_name"];
        $db_last_name = $row_["last_name"];
        $db_gender = $row_["gender"];

        if($db_gender ==  "Male"){
            $gender_preffix="Mr.";
        }else{
            $gender_preffix="Ms.";
        }
        $full_name = $gender_preffix . " " . ucfirst($db_first_name) . " " . ucfirst($db_middle_name) . " " . ucfirst($db_last_name);
    } else {
        echo "No user found with ID $id_user.";
    }
} else {
    echo "No user ID provided.";
}
if(isset($_POST["btnDelete"])) {

    mysqli_query($connections, "DELETE FROM tbl_user WHERE id_user='$id_user'");
    echo "<script>windows.location.href='ViewRecord?notify=$full_name has been successfully deleted!;
    '</script>";
}
?>
<br><br><hr>
<center>
    <form method="POST">
        <h4>You are about to delete this user: <font color="red"><?php echo $full_name; ?></font></h4>
        <input type="submit" name="btnDelete" value="Confirm" class="btn-primary">
        &nbsp;&nbsp;<a href="?" class="btn delete">Cancel</a>
    </form>
</center>
